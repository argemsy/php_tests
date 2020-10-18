<?php 

    class Auth_User extends Database
    {

        private $id,$first_name,$last_name,$password,$email,$age;

        public function __construct($first_name,$last_name,$age)
        {
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->age = $age;
        }


    }    



?>