<?php

Class ControladorBlog{

    //Mostrar contenido tabla blog
    static public function ctrMostrarBlog(){

        $tabla = "blog";

        $respuesta = ModeloBlog :: mdlMostrarBlog($tabla);

        return $respuesta;

    }


}