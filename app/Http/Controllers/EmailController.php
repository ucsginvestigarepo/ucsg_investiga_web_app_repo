<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\User;
use App\Model\Publicacion;
use DB;
use App\Model\DetalleCalifica;
use App\Model\DetalleRevisado;
class EmailController extends Controller
{
    public function enviarCorreo($cedula,$nombre,$clave,$correo) //Se usa para el envio de correos a los registros nuevos de usuarios
    {
         set_time_limit(0);       
        /** Obtenemos los parametros */
        //return $request;
        //$asunto = $request->asunto;
        //$contenido = $request->contenido;
        //$adjunto = $request->file('file');
        $correoadmin=User::select('dbousuario.email')
        ->where('idRol','=',1)
        ->where('name','=','Administrador de Sitio')
        ->first();

        $contenido = array(
            "cedula" => $cedula,
            "nombre" => $nombre,
            "clave"   => $clave,
            "correo"  => $correo,
        );

        $correocopia=$correoadmin["email"];
        $asunto = "Registro de usuario UCSG-INVESTIGA ->".$nombre;
        //$contenido ="Estimado usuario,<br>Nuestra universidad le da la bienvenida a nuestro concurso Investiga. Sus credenciales son:<br>Usuario: ".$correo."<br>Password:".$clave."<br>Agradecemos su participacion.";
        $adjunto = "";
        /**
         * El primer parametro es nuestra vista
         * El segundo parametro son los valores a inyectar en la vista
         * El tercer parametro es la instancia que define los métodos necesarios para el envío del correo
         * use() nos permite introducir valores dentro del closure para ser utilizadas por la instancia
         */
        try {
            Mail::send('correo.mail', ['contenido' => $contenido], function ($mail) use ($asunto, $correo) {
                $mail->from('no-reply@ucsg.edu.ec', 'Bot UCSG');
                $mail->to($correo);
                $mail->subject($asunto);
                //$mail->attach($adjunto);
            });

             Mail::send('correo.mail', ['contenido' => $contenido], function ($mail) use ($asunto,$correocopia) {
                $mail->from('no-reply@ucsg.edu.ec', 'Bot UCSG');
                $mail->to($correocopia);
                $mail->subject($asunto);    
                //$mail->attach($adjunto);
            });
    
            /** Respondemos con status OK */
            //return response()->json(['status' => 200, 'message' => 'Envío exitoso']);
            return redirect('system')->with('flash','Se ha registrado correctamente, por favor inicie sesión con su mail y password. Hemos enviado una copia de credenciales a su correo electrónico.'); ;
        
        } catch (\Throwable $th) {
            return redirect('system')->with('flash','Se ha registrado correctamente, por favor inicie sesión con su mail y password. Lastimosamente no se ha podido enviar un correo electrónico ya que no se detecta conexión a internet o el servidor de correo no esta disponible.'); ;

        }
    }


    public function enviarClave(Request $request) //Se usa para el envio de correos a los registros nuevos de usuarios
    {
        set_time_limit(0);       
        $datos=$request->all();
        
        $existe=User::select('dbousuario.*')
        ->where('email','=',$datos['email'])
        ->first();

        if ($existe) {

            $contenido = array(
                "nombre" => $existe["name"],
                "clave" => $existe["integra"],
                "correo" => $datos['email']
            );
            $correo=$datos['email'];
            $asunto = "Recuperacion de clave UCSG-INVESTIGA";
            //$contenido ="Estimado usuario,<br>Nuestra universidad le da la bienvenida a nuestro concurso Investiga. Sus credenciales son:<br>Usuario: ".$correo."<br>Password:".$clave."<br>Agradecemos su participacion.";
            $adjunto = "";
    
            /**
             * El primer parametro es nuestra vista
             * El segundo parametro son los valores a inyectar en la vista
             * El tercer parametro es la instancia que define los métodos necesarios para el envío del correo
             * use() nos permite introducir valores dentro del closure para ser utilizadas por la instancia
             */
            try {
                Mail::send('correo.recupera', ['contenido' => $contenido], function ($mail) use ($asunto, $correo) {
                    $mail->from('no-reply@ucsg.edu.ec', 'Bot UCSG');
                    $mail->to($correo);
                    $mail->subject($asunto);
                    //$mail->attach($adjunto);
                });
        
                /** Respondemos con status OK */
                //return response()->json(['status' => 200, 'message' => 'Envío exitoso']);
                return redirect()->back()->withErrors(['Se ha enviado un correo electronico de la clave registrada en nuestro sistema.', 'The Message']);
            
            } catch (\Throwable $th) {
                return redirect()->back()->withErrors(['El servicio de correo electronico se encuentra suspendido o no esta disponible, por favor intente mas tarde.', 'The Message']);
    
            }
        }else{
            return redirect()->back()->withErrors(['El correo ingresado no se detecta en nuestro sistema, no se puede enviar el correo electronico de recuperación', 'The Message']);
        }
 

    }

    public function enviarEstadoPropuesta($idPropuesta,$retorno,$proceso) //Se usa para el envio de correos a los registros nuevos de usuarios
    {
         set_time_limit(0);       
        $sql="select tabla.idPropuesta,count(tabla.idPropuesta) cantidadcalificaciones FROM (
            select idPropuesta,idUsuario,sum(nota) as nota from dbodetallecalificacion
            where idPropuesta=".$idPropuesta."
            GROUP BY idPropuesta,idUsuario) as tabla
            GROUP BY tabla.idPropuesta";

        $cantidadrevision=DB::select($sql);
        //return $cantidadrevision;
        $cantidadrevision=json_decode(json_encode($cantidadrevision), true);
        //return $cantidadrevision;
        $mensaje="";
        $notaex[0]=0;
        $notaex[1]=0;

        if($cantidadrevision)
        {
            if ($cantidadrevision[0]['cantidadcalificaciones']==2) {
                $sql="select idPropuesta,idUsuario,sum(nota) as nota from dbodetallecalificacion
                where idPropuesta=".$idPropuesta."
                GROUP BY idPropuesta,idUsuario ORDER BY sum(nota) DESC";
                $califica=DB::select($sql);
                $califica=json_decode(json_encode($califica), true);
                
                $i=0;
                for ($i=0; $i < count($califica); $i++) { 
                    $notaex[$i]=$califica[$i]["nota"];
                }
                $resul=$notaex[0]-$notaex[1];
                if ($resul>=30) {
                    $mensaje="RECALIFICAR";
                }

                if ($mensaje=="RECALIFICAR") {
                    Publicacion::whereId($idPropuesta)->update([
                        "idEstado"=>15 //recalificar
                        ]);
                }else{
                    Publicacion::whereId($idPropuesta)->update([
                        "idEstado"=>13 //calificado
                    ]);
                }
                        
            }else{
                if ($cantidadrevision[0]['cantidadcalificaciones']==1) {
                    Publicacion::whereId($idPropuesta)->update([
                        "idEstado"=>16 //precalificado
                    ]);
                }else{
                    if ($cantidadrevision[0]['cantidadcalificaciones']==3) {
                        Publicacion::whereId($idPropuesta)->update([
                            "idEstado"=>13 //calificado
                        ]);
                    }
                }
            }
        }   
                           
        $existe = Publicacion::select('dbopropuesta.*', 'dboestado.nombre as nombreestado', 
        'dbodominio.nombre as nombredominio', 'user1.name as nombreusuario', 'user2.name as gestor', 
        'user3.name as revisor','user4.name as revisor2','user5.name as revisor3',
        'user1.email as correo','user2.email as correog','user3.email as correor','user4.email as correor2',
        'user5.email as correor3')
        ->leftjoin('dboestado', 'dboestado.id', '=', 'dbopropuesta.idEstado')
        ->leftjoin('dbodominio', 'dbodominio.id', '=', 'dbopropuesta.idDominio')
        ->leftjoin('dbousuario as user1', 'user1.id', '=', 'dbopropuesta.idUsuario')
        ->leftjoin('dbousuario as user2', 'user2.id', '=', 'dbopropuesta.gestor_id')
        ->leftjoin('dbousuario as user3', 'user3.id', '=', 'dbopropuesta.revisor_id')
        ->leftjoin('dbousuario as user4', 'user4.id', '=', 'dbopropuesta.revisor_id2')
        ->leftjoin('dbousuario as user5', 'user5.id', '=', 'dbopropuesta.revisor_id3')
        ->where('dbopropuesta.id','=',$idPropuesta)
        ->first();
         
        if ($existe) {

            $contenido = array(
                "usuario" => $existe["nombreusuario"],
                "dominio" => $existe["nombredominio"],
                "estado" => $existe["nombreestado"],
                "propuesta" => $existe["nombrepropuesta"],
                "creado" => $existe["created_at"],
                "gestor" => $existe["gestor"],
                "revisor" => $existe["revisor"],
                "revisor2" => $existe["revisor2"],
                "revisor3" => $existe["revisor3"],
                "proceso" => $proceso,
                "correo" => $existe["correo"],
                "mensaje" =>$mensaje,
                "nota1"=>$notaex[0],
                "nota2"=>$notaex[1],
                "motivorechazo"=>$existe["motivorechazo"]
                               
            );
            //return $contenido;
            $correo=$existe["correo"];//.';'.$existe["correog"].';'.$existe["correor"].';'.$existe["correor2"].';'.$existe["correor3"];
            
            if ($existe["nombreestado"]<>'INGRESADO') {
                $correocopia[0]=$existe["correog"];
                $correocopia[1]=$existe["correor"];
                $correocopia[2]=$existe["correor2"];
                $correocopia[3]=$existe["correor3"];
            }else{
                $correocopia[0]="bot@prueba.com";
                $correocopia[1]="bot@prueba.com";
                $correocopia[2]="bot@prueba.com";
                $correocopia[3]="bot@prueba.com";
            }
                    
            
            $asunto = $proceso." de Propuesta para concurso UCSG-INVESTIGA";
            //$contenido ="Estimado usuario,<br>Nuestra universidad le da la bienvenida a nuestro concurso Investiga. Sus credenciales son:<br>Usuario: ".$correo."<br>Password:".$clave."<br>Agradecemos su participacion.";
            $adjunto = "";
    
            /**
             * El primer parametro es nuestra vista
             * El segundo parametro son los valores a inyectar en la vista
             * El tercer parametro es la instancia que define los métodos necesarios para el envío del correo
             * use() nos permite introducir valores dentro del closure para ser utilizadas por la instancia
             */

            $correoadmin=User::select('dbousuario.email')
            ->where('idRol','=',1)
            ->where('name','=','Administrador de Sitio')
            ->first();

            $correocopia =  $correoadmin['email'];

            try {
                Mail::send('correo.propuesta', ['contenido' => $contenido], function ($mail) use ($asunto, $correo) {
                    $mail->from('no-reply@ucsg.edu.ec', 'Bot UCSG');
                    $mail->to($correo);
                    $mail->subject($asunto);
                    //$mail->attach($adjunto);
                });

                Mail::send('correo.propuesta', ['contenido' => $contenido], function ($mail) use ($asunto,$correocopia) {
                    $mail->from('no-reply@ucsg.edu.ec', 'Bot UCSG');
                    $mail->to($correocopia);
                    $mail->subject($asunto);
                    //$mail->attach($adjunto);
                });
        
                /** Respondemos con status OK */
                //return response()->json(['status' => 200, 'message' => 'Envío exitoso']);
                //return redirect()->back()->withErrors(['Se ha enviado un correo electronico de la clave registrada en nuestro sistema.', 'The Message']);
                
                if ($retorno=='gestion') {
                    return redirect('gestion/aplicanota/'.$idPropuesta)->with('flash','Se ha revisado correctamente.');;
                } else {
                    if ($retorno=='asignacion') { 
                        return redirect('asignaciones/crear');
                    } else {
                        if ($retorno=='calificacion') {
                            return redirect('calificacion/aplicanota/'.$idPropuesta);
                        } else {
                            if ($retorno=='gestionrechazo') {
                                return redirect('gestion');
                            } else {
                                return redirect($retorno);//Registro de propuesta
                            }
                        }     
                    }
                }
                
                
            } catch (\Throwable $th) {
                return redirect()->back()->withErrors(['El servicio de correo electrónico se encuentra suspendido o no esta disponible, por favor intente mas tarde.', 'The Message']);
    
            }
        }else{
            return redirect()->back()->withErrors(['El correo ingresado no se detecta en nuestro sistema, no se puede enviar el correo electronico de recuperación', 'The Message']);
        }
   }

   public function enviarCertificado_Gestor_Revisor($idUsuario)//Se usa para el envio de correos de los cerficados de participacion de gestor y revisor en el concurso.
   {    
        set_time_limit(0);       
        $sql="select us.id,year(us.created_at) ano,us.cedula,us.name nombres,us.email,rol.nombre rol from dbousuario us
        left join dborol rol on rol.id=us.idRol
        where us.id=".$idUsuario;

        $datos=DB::select($sql);
        $pdf = \PDF::loadView('certificado.gestoryrevisor.modelo',compact('datos'));
        $pdf->save("certificados\\CERT-GESTOR-REVISOR-".$idUsuario.".pdf");
    
    
        $datos1=User::select('dbousuario.*')
       ->where('id','=',$idUsuario)
       ->first();
       
       /** Obtenemos los parametros */
       //return $request;
       //$asunto = $request->asunto;
       //$contenido = $request->contenido;
       //$adjunto = $request->file('file');

       $contenido = array(
           "cedula" => $datos1["cedula"],
           "nombre" => $datos1["name"],
           "clave"   => $datos1["id"]         
       );

       $correo=$datos1["email"];
       $asunto = "Certificado de participacion UCSG-INVESTIGA ->".$datos1["name"];
       //$contenido ="Estimado usuario,<br>Nuestra universidad le da la bienvenida a nuestro concurso Investiga. Sus credenciales son:<br>Usuario: ".$correo."<br>Password:".$clave."<br>Agradecemos su participacion.";
       $adjunto = "certificados/CERT-GESTOR-REVISOR-".$idUsuario.".pdf";

       /**
        * El primer parametro es nuestra vista
        * El segundo parametro son los valores a inyectar en la vista
        * El tercer parametro es la instancia que define los métodos necesarios para el envío del correo
        * use() nos permite introducir valores dentro del closure para ser utilizadas por la instancia
        */
       try {
           Mail::send('correo.notificacion_gestores_revisores', ['contenido' => $contenido], function ($mail) use ($asunto, $correo, $adjunto) {
               $mail->from('no-reply@ucsg.edu.ec', 'Bot UCSG');
               $mail->to($correo);
               $mail->subject($asunto);
               $mail->attach($adjunto);
           });
   
           /** Respondemos con status OK */
           //return response()->json(['status' => 200, 'message' => 'Envío exitoso']);
           //Se envia actualizar que se envio el certificado

            User::whereId($idUsuario)->update([
            "certificado"=>'SI' 
            ]);

            return redirect()->back()->with('flash','Se ha enviado correctamente, por favor inicie sesión con su mail y password. Hemos enviado una copia del certificado a su correo.'); ;
       
       } catch (\Throwable $th) {
           return redirect('/')->with('flash','Lastimosamente no se ha podido enviar un correo electrónico ya que no se detecta conexión a internet o el servidor de correo no esta disponible.'); ;

       }
   }

   public function enviarCertificado_Profesor($idUsuario) //Se usa para el envio de correos de los cerficados de ganador a los profesores.
   {
         set_time_limit(0);       
        $sql="select us.id,year(us.created_at) ano,us.cedula,us.name nombres,
          prop.nombrepropuesta nombre_propuesta,us.email,domi.nombre dominio,rol.nombre rol
          from dbousuario us
        left join dborol rol on rol.id=us.idRol
        LEFT JOIN dbopropuesta prop ON prop.idUsuario = us.id
        LEFT JOIN dbodominio domi ON prop.idDominio = domi.id
        where us.id=".$idUsuario;

        $datos=DB::select($sql);
        $pdf = \PDF::loadView('certificado.profesor.modelo',compact('datos'));
        $pdf->save("certificados\\CERT-GANADOR-".$idUsuario.".pdf");
    
    
        $datos1=User::select('dbousuario.*')
       ->where('id','=',$idUsuario)
       ->first();
       
       /** Obtenemos los parametros */
       //return $request;
       //$asunto = $request->asunto;
       //$contenido = $request->contenido;
       //$adjunto = $request->file('file');

       $contenido = array(
           "cedula" => $datos1["cedula"],
           "nombre" => $datos1["name"],
           "clave"   => $datos1["id"],
           "ano_ganador" => date("Y")
       );

       $correo=$datos1["email"];
       $asunto = "Certificado de participacion UCSG-INVESTIGA ->".$datos1["name"];
       //$contenido ="Estimado usuario,<br>Nuestra universidad le da la bienvenida a nuestro concurso Investiga. Sus credenciales son:<br>Usuario: ".$correo."<br>Password:".$clave."<br>Agradecemos su participacion.";
       $adjunto = "certificados/CERT-GANADOR-".$idUsuario.".pdf";

       /**
        * El primer parametro es nuestra vista
        * El segundo parametro son los valores a inyectar en la vista
        * El tercer parametro es la instancia que define los métodos necesarios para el envío del correo
        * use() nos permite introducir valores dentro del closure para ser utilizadas por la instancia
        */
       try {
           Mail::send('correo.notificacion_ganadores', ['contenido' => $contenido], function ($mail) use ($asunto, $correo, $adjunto) {
               $mail->from('no-reply@ucsg.edu.ec', 'Bot UCSG');
               $mail->to($correo);
               $mail->subject($asunto);
               $mail->attach($adjunto);
           });
   
           /** Respondemos con status OK */
           //return response()->json(['status' => 200, 'message' => 'Envío exitoso']);
           //Se envia actualizar que se envio el certificado

            User::whereId($idUsuario)->update([
            "certificado"=>'SI' 
            ]);

            return redirect()->back()->with('flash','Se ha enviado correctamente, por favor inicie sesión con su mail y password. Hemos enviado una copia del certificado a su correo.'); ;
       
       } catch (\Throwable $th) {
           return redirect('system')->with('flash','Lastimosamente no se ha podido enviar un correo electrónico ya que no se detecta conexión a internet o el servidor de correo no esta disponible.'); ;

       }
   }


    public function enviarComentarioToAdmin(Request $request) //Se usa para el envio de correos a los registros nuevos de usuarios
    {

         set_time_limit(0);       
        /** Obtenemos los parametros */
        //return $request;
        //$asunto = $request->asunto;
        //$contenido = $request->contenido;
        //$adjunto = $request->file('file');
         $correoadmin=User::select('email')
        ->where('idRol','=',1)
        ->where('name','=','Administrador de Sitio')
        ->first();

        $correoadmin=$correoadmin["email"];
        $asunto = "Comentarios - Contactos";
        //$contenido ="Estimado usuario,<br>Nuestra universidad le da la bienvenida a nuestro concurso Investiga. Sus credenciales son:<br>Usuario: ".$correo."<br>Password:".$clave."<br>Agradecemos su participacion.";

        $datos=$request->all();
        // $contenido = $datos["nombre"] . '<br>' .
        //             $datos["email"] . '<br>' .
        //             $datos["asunto"] . '<br>' .
        //             $datos["comentario"] . '<br>';

        $contenido = array(
                "nombre" => $datos["nombre"],
                "email" => $datos['email'],
                "asunto" => $datos['asunto'],
                "comentario" => $datos['comentario']
        );

        $adjunto = "";
        /**
         * El primer parametro es nuestra vista
         * El segundo parametro son los valores a inyectar en la vista
         * El tercer parametro es la instancia que define los métodos necesarios para el envío del correo
         * use() nos permite introducir valores dentro del closure para ser utilizadas por la instancia
         */
        
        try {
              Mail::send('correo.mailContactAdministrador', ['contenido' => $contenido], function ($mail) use ($asunto, $correoadmin) {
                $mail->from('no-reply@ucsg.edu.ec', 'Bot UCSG');
                $mail->to($correoadmin);
                $mail->subject($asunto);
                //$mail->attach($adjunto);
            });
    
            /** Respondemos con status OK */
            //return response()->json(['status' => 200, 'message' => 'Envío exitoso']);

             return redirect()->back()->with('flash','Se ha enviado correctamente.'); ;
        
        } catch (\Throwable $th) {
            return redirect()->back()->with('flash','Lastimosamente no se ha podido enviar un correo electrónico ya que no se detecta conexión a internet o el servidor de correo no esta disponible.'); ;

        }
    }

    
}
