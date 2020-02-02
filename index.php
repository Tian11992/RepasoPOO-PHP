<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="content-type" content="text/html; charset">
        <title>Ejemplo POO herencia básica 2 en php y jquery</title>
        
        <script>
            
            function proceso(txthorastrabajadas, txtcostohoratrabajo, boton){
                switch(boton){
                    case "Calcular":
                    var parametros = {
                        "txthorastrabajadas" : txthorastrabajadas,
                        "txtcostohoratrabajo" : txtcostohoratrabajo,
                        "btncalcular" : boton
                    }
                    break;
                }
                $.ajax({
                    data: parametros,
                    url: 'calcular.php',
                    type: 'post',
                    beforeSend:
                    function(){
                        $('#resultado').html('Cargando...');
                    },
                    success:
                    function(response){
                        $('#resultado').html(response);
                    }
                });
            }
        
        </script>
    </head>
    <body>
            <h1>Ejemplo POO herencia básica 2 en php y jquery</h1>
    <form name="form1" method="POST" action="calcular.php">
            <p>Cantidad de horas trabajadas
                <input type="text" name="txthorastrabajadas" id="txthorastrabajadas">
            </p>
            <p>Costo de la hora trabajada
                <input type="text" name="txtcostohoratrabajo" id="txtcostohoratrabajo">
            </p>
            <p><input type="button" name="btncalcular" id="btncalcular" value="Calcular"
            onclick="proceso($('#txthorastrabajadas').val(), $('#txtcostohoratrabajo').val(), $('#btncalcular').val());"></p>
        </form>
        <span id="resultado"></span>
        <script src="js/jquery-3.4.1.js"></script>
    </body>
</html>