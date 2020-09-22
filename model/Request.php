<?php 

class Request
{
    static private $controller, $method, $args;

    public function __construct()
    {
        $url = array();

        if(isset($_REQUEST['accion'])){
            $direccion = strtolower($_REQUEST['accion']);
        }
        $url = explode("/",$direccion);
        self::$controller = array_shift($url);
        self::$method = array_shift($url);
        self::$args = array_shift($url);
    }

    static public function get_controller()
    {
        return self::$controller;
    }

    static public function get_method()
    {
        return self::$method;
    }

    static public function get_args()
    {
        return self::$args;
    }
}


?>