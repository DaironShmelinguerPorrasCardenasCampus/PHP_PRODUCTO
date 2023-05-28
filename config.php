<?php

require_once("db.php");

class Config{

    private $id;
    private $nombre;
    private $descripcion;
    private $imagen;
    protected $dbCnx;

    public function __construct($id = 0, $nombre = "", $descripcion = "", $imagen = ""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
       
     
        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC] );
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
            $stm = $this-> dbCnx -> prepare("INSERT INTO categorias(nombre,descripcion,imagen) values(?,?,?)");
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