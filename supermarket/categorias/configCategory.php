<?php

require_once("../config/db.php");
require_once("../config/conexion.php");

class Category extends Conexion{

    private $id;
    private $nombre;
    private $descripcion;
    private $imagen;
    


    public function __construct($id = 0, $nombre = "", $descripcion = "", $imagen = "",$dbCnx = ""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
        parent::__construct($dbCnx);  
    }

    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setImagen($imagen){
        $this->imagen = $imagen;
    }
    public function getImagen(){
        return $this->imagen;
    }


    public function insertCategory(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO categorias(nombre,descripcion,imagen) VALUES(?,?,?)");
            $stm -> execute([$this->nombre, $this->descripcion, $this->imagen]);
        } catch (Exception $e) {
            return $e -> getMessage();
        }
    }

    public function obtenerCategory(){
        try {
            $stm = $this -> dbCnx -> prepare("SELECT * FROM categorias");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e -> getMessage();
        }

            }

    public function deleteCategory(){
                try {
                    $stm = $this -> dbCnx -> prepare("DELETE FROM categorias WHERE categoria_id = ?");
                    $stm -> execute([$this->id]);
                    return $stm -> fetchAll();
                    echo "<script>alert('CATEGORIA ELIMINADA');document.location='categoria.php'</script>";
                } catch (Exception $e) {
                    return $e -> getMessage();
                }
            }
     //ACTUALIZAR PARTE 1 - AQUÍ ES DONDE TRAEMOS LOS DATOS A LA PÁGITA EDITARESTUDIANTES.PHP
     public function selectOne(){
        try {
            $stm = $this -> dbCnx -> prepare("SELECT * FROM categorias WHERE categoria_id = ?");
            $stm-> execute([$this->id]);
            return $stm-> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    //ACTUALIZAR PARTE 2 - AQUÍ ACTUALIZAMOS ESOS DATOS EN LA DATABASE
    public function update(){
        try {
            $stm = $this -> dbCnx -> prepare("UPDATE categorias SET nombre = ? , descripcion = ?, imagen = ?   WHERE categoria_id = ?");
            $stm-> execute([$this->nombre,$this->descripcion,$this->imagen,$this->id]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}




































?>