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

}




































?>