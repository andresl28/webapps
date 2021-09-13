
<?php

$enviado=false;

if( isset( $_GET["dato_1"]) && isset( $_GET["dato_2"]) && isset( $_GET["operacion"]) ){ 
    $enviado=true;
    $r = $_GET;  
    
    $dato_1 = $r["dato_1"];
    $dato_2 = $r["dato_2"];
    $operacion = $r["operacion"];
    
    switch ($operacion) {

        case 'suma':
            $resultado = $dato_1 + $dato_2;
            break;

        case 'resta':
            $resultado = $dato_1 - $dato_2;
            break;

        case 'multiplicacion':
            $resultado = $dato_1 * $dato_2;
            break;

        case 'division':
            $resultado = $dato_1 / $dato_2;
            break;    

        default:
             $resultado = null;   
            break;
    }

}
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Applicaciones web</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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

    <div class="container" >
        <div class="row" >

            <div class="col-2"></div>
            <div class="col-8 ">
                <br>
                 <h1>Calculadora</h1>
                    <br>
                   <form id="my_form" method="get" action="asignacion_calculadora.php" >
    
                   <div class="input-group">
                     <input id="dato_1" name="dato_1" type="number" class="form-control" placeholder="Primer dato" aria-label="primer dato">
                     <span class="input-group-text" id="operation_text">+</span>
                     <input id="dato_2" name="dato_2" type="number" class="form-control" placeholder="Segundo dato" aria-label="segundo dato">
                   </div>
                  
                      <br>

                      <div class="row">
                       <div class="col-10">
                       <select id="operacion" name="operacion" class="form-select" aria-label="Default select example">
                          <option selected value="null">Seleccionar operacion</option>
                          <option value="suma">Suma</option>
                          <option value="resta">Resta</option>
                          <option value="multiplicacion">Multiplicacion</option>
                          <option value="division">Division</option>
                        </select>
                       </div>

                       <div class="col-2">
                       <button type="submit" class="btn btn-primary" disabled id="btn_calcular">Calcular</button>
                       </div>
                       </div>
                    
    
                   </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

    <?php if($enviado){?> 
     
        <script>
      $(window).on('load', function(){ 
      
        $('#modal_result_text').html(<?=$resultado?>);
         
      $('#modal_result').modal('show');   
      
       
        });
        </script>

   <?php } ?> 



</body>
</html>

<div class="modal fade" id="modal_result" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" >
    <div class="modal-content" >
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
        if(check) {
            $("#btn_calcular").prop("disabled", false);
        }
        else {
            $("#btn_calcular").prop("disabled", true);
        }
    });
});

//Función para comprobar los campos de texto y nuestro select
function checkCampos(obj) {
    var camposRellenados = true;
    obj.find("input","select").each(function() {
    var $this = $(this);
        if( $this.val().length <= 0 || $('#operacion').val() == "null") {
            camposRellenados = false;
            return false;
        }
    });
    if(camposRellenados == false) {
        return false;
    }
    else {
        return true;
    }
}

    $('#operacion').on('change', function(){

        //Validar que nuestro este seleccionado para habilitar el boton de operacion
        var form = $(this).parents("#my_form");
        var check = checkCampos(form);
        if(check) {
            $("#btn_calcular").prop("disabled", false);
        }
        else {
            $("#btn_calcular").prop("disabled", true);
        }

      
        //Validar que tipo de operacion es
        if($('#operacion').val() == "suma"){
            $('#operation_text').html("+")
        }
        if($('#operacion').val() == "resta"){
            $('#operation_text').html("-")
        }
        if($('#operacion').val() == "multiplicacion"){
            $('#operation_text').html("*")
        }
        if($('#operacion').val() == "division"){
            $('#operation_text').html("/")
        }
    })      
</script>
