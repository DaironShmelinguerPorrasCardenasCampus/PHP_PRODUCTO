<?php
require_once("configCategory.php");
$record = new Category();

if (isset($_GET['categoria_id']) && isset($_GET['req'])){
    if ($_GET['req'] == "delete"){
            $record-> setId($_GET['categoria_id']);
            $record-> deleteCategory();
            echo "<script>alert('CATEGORIA BORRADA DE LA BASE DE DATOS');document.location='categoria.php'</script>";
    }
}





?>