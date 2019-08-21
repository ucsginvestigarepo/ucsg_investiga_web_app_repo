<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>    

<script>
    $(document).ready(function() {
        $('#example1').DataTable({  
                    responsive: true,
                    language: {
                       url: '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json' //Ubicacion del archivo con el json del idioma.
                    }
        });
    });
 </script>