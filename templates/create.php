<?php
include ('../config/connection.php');

if((isset($_POST) && !empty($_POST))) {
    $name = $_POST['name'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $id=postName($name,$city);
    // postPhone($id,$phone);
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Image CX</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/custom.css">
</head>

<body>
  <div class="container container-fluid top">
    <div class="row">
      <div class="col-md-6">
        <h2>Agregar <b>contacto</b></h2>
      </div>
      <div class="col-md-6 add">
        <a href="index.php" class="btn btn-info add-new"> Regresar</a>
      </div>
    </div>
    <br>
  </div>
  <div class="container container-fluid">
  <form method="post" accion="create.php" >
    <div class="input-group">
      <div class="col-md-6">
        <label>Nombre:</label>
        <input type="text" name="name" id="name" class='form-control' maxlength="100" required>
      </div>
      <div class="col-md-6">
        <label>Ciudad:</label>
        <input name="city" id="city" class='form-control' maxlength="255" required>
      </div>
      <div class="col-md-6">
        <label>Teléfono:</label>
        <input type="number" name="phone" id="phone" class='form-control' maxlength="15" required>
      </div>
      <div class="col-md-6">
        <label>Correo electrónico:</label>
        <input type="email" name="email" id="email" class='form-control' maxlength="64" required>
      </div>
      <div class="col-md-12 pull-right">
        <hr>
        <button type="submit" class="btn btn-success">Guardar datos</button>
      </div>
    </div>
  </form>
</div>
</body>
<script src="/path/to/flickity.pkgd.min.js"></script>
<!-- <script src="../js/app.js"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
  integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
  integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>