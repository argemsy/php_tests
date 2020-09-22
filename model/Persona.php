<?php 

    class Persona
    {

        public $name,$last_name,$age;

        public function __construct($name,$last_name="",$age=20)
        {
            $this->name=$name;
            $this->last_name=$last_name;
            $this->age=$age;
        }

        public function fullName(){
            return $this->name .' '. $this->last_name;
        }

        public function saludar(){
            return "Hola mi nombre es " . $this->fullName();
        }

        public function despedir(){
            return "Chao, recuerda que mi nombre es " . $this->fullName();
        }


    }    


    class Juego {

        public function jugador($name){
            $jugador = new Persona($name);
        }


        public function juego(){

            $jugadores = ['Argenis','Anderson','Mathias'];

            for($i=0;$i<count($jugadores);$i++){
                $jugador. '_'. $i = $this->jugador($jugadores[$i]);
            }
            echo $jugador_0->saludar();

        }

    }


?>