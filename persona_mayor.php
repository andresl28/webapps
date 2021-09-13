<?php

$enviado=false;
if(isset( $_GET["persona_1_nombre"]) && isset( $_GET["persona_1_edad"]) && isset( $_GET["persona_2_nombre"]) && isset( $_GET["persona_2_edad"]) ){ 
    $enviado=true;
    $r = $_GET;  
    
    $persona_1_nombre = $r["persona_1_nombre"];
    $persona_1_edad = $r["persona_1_edad"];
    $persona_2_nombre = $r["persona_2_nombre"];
    $persona_2_edad = $r["persona_2_edad"];

    if ($persona_1_edad > $persona_2_edad ){
      $mayor_por =  $persona_1_edad - $persona_2_edad;
      $resultado = "$persona_1_nombre es mayor que $persona_2_nombre por $mayor_por años";
    }else if ($persona_2_edad > $persona_1_edad){
        $mayor_por =  $persona_2_edad - $persona_1_edad;
      $resultado = "$persona_2_nombre es mayor que $persona_1_nombre por $mayor_por años";
    }else if($persona_2_edad == $persona_1_edad){
        $resultado = "$persona_2_nombre y $persona_1_nombre tienen la misma edad";

    }

}
 
 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persona Mayor</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Applicaciones web</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="asignacion_calculadora.php">Calculadora</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="elige_una_puerta.php">Elige una puerta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="persona_mayor.php">Persona Mayor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="formulario.php">Formulario</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<body>


    <div class="container">
        <div class="row">

            <div class="col-1"></div>
            <div class="col-10 ">
                <br>
                <h2>Ingrese datos de las personas para saber quien es mayor</h2>
                <br>
                <form id="my_form" method="get" action="persona_mayor.php">

                    <div class="input-group">
                        <span class="input-group-text">Persona 1:</span>
                        <input id="persona_1_nombre" name="persona_1_nombre" type="text" class="form-control"
                            placeholder="Nombre de la persona" aria-label="Nombre de la persona">
                        <span class="input-group-text">Edad:</span>
                        <input id="persona_1_edad" name="persona_1_edad" type="number" class="form-control"
                            placeholder="Edad de la persona" aria-label="Edad de la persona">
                    </div>

                    <br>

                    <div class="input-group">
                        <span class="input-group-text">Persona 2:</span>
                        <input id="persona_2_nombre" name="persona_2_nombre" type="text" class="form-control"
                            placeholder="Nombre de la persona 2" aria-label="Nombre de la persona">
                        <span class="input-group-text">Edad:</span>
                        <input id="persona_2_edad" name="persona_2_edad" type="number" class="form-control"
                            placeholder="Edad de la persona 2" aria-label="Edad de la persona 2">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-lg float-right" disabled
                        id="btn_calcular">Calcular</button>


                </form>
            </div>
            <div class="col-1"></div>
        </div>
    </div>





    <?php if($enviado){ ?>


    <script>
   
        $(window).on('load', function() {

            $('#modal_result_text').html("<?=$resultado?>");

            $('#modal_result').modal('show');


        });

 
    </script>

    <?php } ?>
</body>

</html>

<div class="modal fade" id="modal_result" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Resultado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id='modal_result_text'></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    //Siempre que salgamos de un campo de texto, se chequeará esta función
    $("#my_form input").keyup(function() {
        var form = $(this).parents("#my_form");
        var check = checkCampos(form);
        if (check) {
            $("#btn_calcular").prop("disabled", false);
        } else {
            $("#btn_calcular").prop("disabled", true);
        }
    });
});

//Función para comprobar los campos de texto y nuestro select
function checkCampos(obj) {
    var camposRellenados = true;
    obj.find("input").each(function() {
        var $this = $(this);
        if ($this.val().length <= 0) {
            camposRellenados = false;
            return false;
        }
    });
    if (camposRellenados == false) {
        return false;
    } else {
        return true;
    }
}
</script>