<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <input type="text" id="nro1"><br>
    <input type="text" id="nro2"><br>
    <div id="contenido"></div>
    <button id="traerLoad">Mostrar Load</button>
    <button id="traerGet">Mostrar Get</button>
    <button id="hacerPost">Hacer Post</button>
    <button id="hacerGetJson">Hacer GetJSON</button>
    <h1>Este contenido no ha cambiado</h1>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#traerLoad").click(function () {
            $("#contenido").load("index.html")
        });
        $("#traerGet").click(function () {
            $.get("contenido.php?id=2", function (data, status) {
                $("#contenido").html("data: "+data);
            });
        });
        $("#hacerGetJson").click(function () {
            $.getJSON("json.php", function (data, status) {
                $.each(data, function(key, value){
                    $("#contenido").append(key+ ": " + value + "\n ");
                });
            });
        });
        $("#hacerPost").click(function () {
            var nro1 = $("#nro1").val();
            var nro2 = $("#nro2").val();
            $.post("calculo.php",
                {
                    nro1:nro1,
                    nro2:nro2
                },
                function (data) {
                    $("#contenido").text("La suma es: "+data)
                });
        });
    });
</script>
</html>
