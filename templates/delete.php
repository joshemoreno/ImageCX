<?php
include ('../config/connection.php');
if (isset($_GET['id'])){
    $id = $_GET['id'];
    deleteByID($id);
    header('Location: http://localhost/imagecx/templates/index.php');
}
?>