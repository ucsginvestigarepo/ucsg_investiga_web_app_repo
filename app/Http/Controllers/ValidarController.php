<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidarController extends Controller
{
    public function validarCedula($numero = '')
    {
        // fuerzo parametro de entrada a string
        $numero = (string)$numero;
        // borro por si acaso errores de llamadas anteriores.
        //$this->setError('');
        // validaciones
        try {
            //$this->validarInicial($numero, '10');
            //$this->validarCodigoProvincia(substr($numero, 0, 2));
            //$this->validarTercerDigito($numero[2], 'cedula');
            return $this->algoritmoModulo10(substr($numero, 0, 9), $numero[9]);
        } catch (Exception $e) {
            //$this->setError($e->getMessage());
            return false;
        }
        return true;
    }
    
    protected function algoritmoModulo10($digitosIniciales, $digitoVerificador)
    {
        $arrayCoeficientes = array(2,1,2,1,2,1,2,1,2);
        $digitoVerificador = (int)$digitoVerificador;
        $digitosIniciales = str_split($digitosIniciales);
        $total = 0;
        foreach ($digitosIniciales as $key => $value) {
            $valorPosicion = ( (int)$value * $arrayCoeficientes[$key] );
            if ($valorPosicion >= 10) {
                $valorPosicion = str_split($valorPosicion);
                $valorPosicion = array_sum($valorPosicion);
                $valorPosicion = (int)$valorPosicion;
            }
            $total = $total + $valorPosicion;
        }
        $residuo =  $total % 10;
        if ($residuo == 0) {
            $resultado = 0;
        } else {
            $resultado = 10 - $residuo;
        }
        if ($resultado != $digitoVerificador) {
            return false;//throw new Exception('Dígitos iniciales no validan contra Dígito Idenficador');
        }
        return true;
        
    }
}
