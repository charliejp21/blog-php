<?php

require_once "conexion.php";

Class ModeloBlog{

    //Mostrar contenido tabla blog
    static public function mdlMostrarBlog($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }

    //Mostrar categorias del blog
    static public function mdlMostrarCategorias($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
    }

    //mostrar articulos y categorias con inner join
    static public function mdlMostrarArticulosInnerJoin($tabla1, $tabla2, $cantidad){

        $stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.*, DATE_FORMAT(fecha_articulo, '%d, %m, %Y') AS fecha_articulo FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id = $tabla2.id_cat ORDER BY $tabla2.id DESC LIMIT $cantidad");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
    }
}

