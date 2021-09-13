<?php
$enviado=false;

if(isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["edad"])
&& isset($_POST["telefono"])   && isset($_POST["correo"])  && isset($_POST["estado_civil"])
&& isset($_POST["ciudad"]) ){

$enviado    = true;
$r          = $_POST;  

$nombre           = ($r["nombre"]);
$apellido       = ($r["apellido"]);
$edad           = ($r["edad"]);
$telefono       = ($r["telefono"]);
$correo         = ($r["correo"]);
$estado_civil   = ($r["estado_civil"]);
$ciudad         = ($r["ciudad"]);


}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
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
                <h2>Ingrese datos de la persona</h2>
                <br>
                <form id="my_form" method="post" action="formulario.php">

                    <div class="input-group">
                        <span class="input-group-text">Nombre:</span>
                        <input id="nombre" name="nombre" type="text" class="form-control"
                            placeholder="Nombre de la persona" aria-label="Nombre de la persona">
                        <span class="input-group-text">Apellidos:</span>
                        <input id="apellido" name="apellido" type="text" class="form-control" placeholder="Apellidos"
                            aria-label="Apellidos">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Edad:</span>
                        <input id="edad" name="edad" type="number" class="form-control" placeholder="Edad"
                            aria-label="Edad">

                        <span class="input-group-text">Telefono:</span>
                        <input id="telefono" name="telefono" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" type="tel"
                            class="form-control" placeholder="Telefono" aria-label="Telefono">

                        <span class="input-group-text">Correo:</span>
                        <input id="correo" name="correo" type="email" class="form-control" placeholder="Correo"
                            aria-label="Correo">
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-6">
                            <br>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" value="Soltero" type="radio" name="estado_civil"
                                            id="estado_civil" checked>
                                        <label class="form-check-label" for="estado_civil">
                                            Soltero
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" value="Casado" type="radio" name="estado_civil"
                                            id="estado_civil">
                                        <label class="form-check-label" for="estado_civil">
                                            Casado
                                        </label>
                                    </div>
                                </div>
                            </div>




                        </div>
                        <div class="col-6">
                            <select id="ciudad" name="ciudad" class="form-select" aria-label="Ciudad">
                                <option selected value="null">Ciudad</option>
                                <option value="Guaymas">Guaymas</option>
                                <option value="Hermosillo">Hermosillo</option>
                                <option value="Obregon">Obregon</option>
                                <option value="Empalme">Empalme</option>
                                <option value="Navojoa">Navojoa</option>
                                <option value="Caborca">Caborca</option>
                                <option value="Magdalena">Magdalena</option>
                                <option value="Ures">Ures</option>
                            </select>
                        </div>
                    </div>
                    <br>




                    <button type="submit" disabled class="btn btn-primary btn-lg float-right"
                        id="btn_guardar">Guardar</button>


                </form>
            </div>
            <div class="col-1"></div>
        </div>
    </div>





    <?php if($enviado){ ?>


    <script>
    $(window).on('load', function() {

        $('#card_nombre').html("<?=$nombre." ".$apellido?>");

        $('#card_edad').html("Edad:  <?=$edad?>");
        $('#card_telefono').html("Telefono: <?=$telefono?>");
        $('#card_correo').html("Correo: <?=$correo?>");
        $('#card_estado_civil').html("Estado Civil: <?=$estado_civil?>");
        $('#card_ciudad').html("Ciudad: <?=$ciudad?>");

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
                <h5 class="modal-title">Datos de la persona</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <img width="250" height="220" src="http://assets.stickpng.com/images/585e4beacb11b227491c3399.png"
                        style="  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;" alt="...">
                    <div class="card-body">
                        <h5 id="card_nombre" class="card-title text-center"></h5>
                        <p id="card_apellido" class="card-text"></p>
                        <p id="card_edad" class="card-text"></p>
                        <p id="card_telefono" class="card-text"></p>
                        <p id="card_correo" class="card-text"></p>
                        <p id="card_estado_civil" class="card-text"></p>
                        <p id="card_ciudad" class="card-text"></p>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {

    $("#btn_guardar").click(function(e) {
        var jsonData = {};

        var formData = $("#my_form").serializeArray();
        // console.log(formData);

        $.each(formData, function() {
            if (jsonData[this.name]) {
                if (!jsonData[this.name].push) {
                    jsonData[this.name] = [jsonData[this.name]];
                }
                jsonData[this.name].push(this.value || '');
            } else {
                jsonData[this.name] = this.value || '';
            }


        });
        console.log(jsonData);
        $.ajax({
            type: "POST",
            url: "formulario.php",
            data: formData,
            success: function() {},
            dataType: "json",
            contentType: "application/json"
        });

    });



    //Siempre que salgamos de un campo de texto, se chequeará esta función
    $("#my_form input").keyup(function() {
        var form = $(this).parents("#my_form");
        var check = checkCampos(form);
        if (check) {
            $("#btn_guardar").prop("disabled", false);
        } else {
            $("#btn_guardar").prop("disabled", true);
        }
    });

    function checkCampos(obj) {
        var camposRellenados = true;
        obj.find("input", "select").each(function() {
            var $this = $(this);
            if ($this.val().length <= 0 || $('#ciudad').val() == "null") {
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
});

//Función para comprobar los campos de texto y nuestro select
</script>