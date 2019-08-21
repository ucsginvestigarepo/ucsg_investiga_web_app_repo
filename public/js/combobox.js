$("#facultad").change(function (event){
    $.get("/carreras/"+event.target.value+"",function(response,facultad){
        $("#carrera").empty();
        for(i=0;i<response.length;i++){
            $("#carrera").append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>");
        }
    });
});