<?php

$enviado=false;

if( isset( $_GET["puerta"]) ){ 
    $enviado=true;
    $r = $_GET;  
    
    $puerta = $r["puerta"];
   
    switch ($puerta) {

        case 'puerta_1':
            $resultado = "http://2.bp.blogspot.com/-ldGXEgsKb-8/UGWaoz18JBI/AAAAAAAAAKo/hji598eRG2k/s1600/png_carro.png";
            $resultado_texto = "Un Carro del año!";
            break;

        case 'puerta_2':
            $resultado = "https://www.diccionario.geotecnia.online/wp-content/uploads/2020/05/Roca-1024x683.jpg";
            $resultado_texto = "Una Piedra!";
            break;

        case 'puerta_3':
            $resultado = "https://cdn.pixabay.com/photo/2020/06/22/15/50/goat-5329670_960_720.png";
            $resultado_texto = "Una Cabra!";
            break;  

        default:
             $resultado = "No selecciono";   
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
    <title>MontyHall</title>
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
                <form id="my_form" method="get" action="elige_una_puerta.php">
                    <div class="row">
                        <div class="col-4">
                            <div class="card" style="width: 18rem; margin:6px;">
                                <img id="src_puerta_1" src="https://www.pngrepo.com/png/268066/512/door.png" class="card-img-top"
                                    alt="Puerta 1">
                                <div class="card-body">
                                    <h5 class="card-title">Puerta 1</h5>
                                    <p class="card-text">Esta no es</p>
                                    <button name="puerta" value="puerta_1" type="submit" class="btn btn-primary" id="btn_puerta_1">Abrir</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card" style="width: 18rem; margin: 6px;">
                                <img src="https://www.pngrepo.com/png/268066/512/door.png" class="card-img-top"
                                    alt="Puerta 2">
                                <div class="card-body">
                                    <h5 class="card-title">Puerta 2</h5>
                                    <p class="card-text">Sera esta?</p>
                                    <button name="puerta" value="puerta_2" type="submit" class="btn btn-primary" id="btn_puerta_2">Abrir</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card" style="width: 18rem; margin: 6px;">
                                <img src="https://www.pngrepo.com/png/268066/512/door.png" class="card-img-top"
                                    alt="Puerta 3">
                                <div class="card-body">
                                    <h5 class="card-title">Puerta 3</h5>
                                    <p class="card-text">O esta?</p>
                                    <button name="puerta" value="puerta_3" type="submit" class="btn btn-primary" id="btn_puerta_3">Abrir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>




            </div>
            <div class="col-1"></div>
        </div>
    </div>

    <?php if($enviado){ ?>
      

    <script>
      $(window).on('load', function(){ 
      
      $('#src_puerta').attr("src","<?=$resultado?>");
      $("#modal_text").html("  " + "<?=$resultado_texto?>");
       
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
        <h5 class="modal-title">Ganaste!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <h5 id="modal_text" class="modal-title">Resultado</h5>

      <div class="modal-body">
      <img id="src_puerta" src="" class="img-fluid rounded">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>


</script>