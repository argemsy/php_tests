<?php session_start();


class Link {

    static function path(){
        return 'http://localhost/';

    }

    static function autoload()
    {
        spl_autoload_register(function($class){
            include 'model/'.$class.'.php';
        });
    }

    static function mvc()


    {
        $accion = $_REQUEST['accion'];
        !empty($accion) ? $accion = $accion : $accion = 'index';


        is_file('controller/'.$accion.'/'.$accion.'Controller.php') ? include 'controller/'.$accion.'/'.$accion.'Controller.php' : include 'controller/error/errorController.php' ;
    
    
    }

    

}


?>
