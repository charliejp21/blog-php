<?php

Class ControladorBlog{

    //Mostrar contenido tabla blog
    static public function ctrMostrarBlog(){

        $tabla = "blog";

        $respuesta = ModeloBlog :: mdlMostrarBlog($tabla);

        return $respuesta;

    }

    //Mostrar categorias
    static public function ctrMostrarCategorias(){

        $tabla = "categorias";

        $respuesta = ModeloBlog :: mdlMostrarCategorias($tabla);

        return $respuesta;

    }

    //Mostrar articulos y categorias con inner join
    static public function ctrMostrarArticulosInnerJoin($cantidad){

        $tabla1 = "categorias";
        $tabla2 = "articulos";

        $respuesta = ModeloBlog::mdlMostrarArticulosInnerJoin($tabla1, $tabla2, $cantidad);

        return $respuesta;

    }

}