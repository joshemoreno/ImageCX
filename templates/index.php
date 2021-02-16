<?php
include ('../config/connection.php');

  $id = getAll();
  $data = getEach($id);
  $phonesLinks = getPhonesLinks($data);
  $phones = getPhone($phonesLinks);
  $emailsLinks = getEmailsLinks($data);
  $emails = getEmail($emailsLinks);

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
        <h2>Listado de <b>contactos</b></h2>
      </div>
      <div class="col-md-6 add">
        <a href="create.php" class="btn btn-info add-new"> Agregar contacto</a>
      </div>
    </div>
    <br>
  </div>
  <div class="container container-fluid">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Ciudad</th>
          <th scope="col">Teléfono</th>
          <th scope="col">E-mail</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
      <?php
        for ($i = 0; $i <= 10; $i++) {
          if (!isset($data[$i]['lookupName'])){
              $name[$i] = "No registra";
          }else{
              $name[$i] = $data[$i]['lookupName'];
          }if(!isset($data[$i]['address']['city'])){
              $city[$i] = "No registra";
          }else{
              $city[$i] = $data[$i]['address']['city'];
          }if(!isset($phones[$i])){
              $phone[$i] = "No registra";
          }else{
              $phone[$i] = $phones[$i]['number'];
          }if(!isset($emails[$i])){
              $email[$i] = "No registra";
          }else{
              $email[$i] = $emails[$i]['address'];
          }
              
              ?>
              <tr>
              <td><?php echo $name[$i] ?></td>
              <td><?php echo $city[$i] ?></td>
              <td><?php echo $phone[$i] ?></td>
              <td><?php echo $email[$i] ?></td>
              <td>
                    <a href="update.php?id=<?php echo $data[$i]['id'];?>" class="btn btn-warning">Editar</a>
                    <a href="delete.php?id=<?php echo $data[$i]['id'];?>" class="btn btn-danger">Eliminar</a>
              </td>
              <?php

        } 
      ?>
        </tr>
      </tbody>
    </table>
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