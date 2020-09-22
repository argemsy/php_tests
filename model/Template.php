<?php 
require 'Link.php';

class Template {

    private $title = 'Admin Site';
    public $sub_title = '';
    public $listJs = array();
    public $listCss = array();


    public function __construct($sub_title)
    {
        $this->sub_title = $sub_title;

        // Inicio de la cabecera del HTML
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $this->title .' | '. $this->sub_title; ?></title>
            <link rel="stylesheet" href="<?php echo Link::path() . 'staticfiles/css/bootstrap.min.css'; ?>">

        </head>
        <body>
            <div class="container">
                
            

        <?php


    }



    private function loadCss(){
        $lista = $this->listCss;
        for($i=0;$i<count($lista);$i++){
            ?>
            <link rel="stylesheet" href="<?php echo Link::path() . $lista[$i]; ?>">
            <?php
        }
    }

    private function loadJs(){
        $lista = $this->listJs;
        for($i=0;$i<count($lista);$i++){
            ?>
            <script src="<?php echo Link::path() . $lista[$i]; ?>"></script>
            <?php
        }
    }

    


    public function __destruct()
    {
        // Fin del HTML
        ?>
            </div>
            <script src="<?php echo Link::path() . 'staticfiles/node_modules/jquery/dist/jquery.min.js';  ?>"></script>
            <script src="<?php echo Link::path() . 'staticfiles/node_modules/axios/dist/axios.min.js';  ?>"></script>
            <script src="<?php echo Link::path() . 'staticfiles/js/bootstrap.min.js';  ?>"></script>
            <?php 
                
                $this->loadJs();
            ?>
            </body>
        </html>
        <?php
    }

}

?>