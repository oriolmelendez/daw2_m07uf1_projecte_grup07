<?php

require_once("Persona.php");

    //Classe client que ereta de persona

    class Client extends Persona{

        public function __construct($user,$pass,$nom,$cognom,$adreça,$mail,$telf,$visa){
            $this->user = $user;
            $this->pass = $pass;
            $this->nom = $nom;
            $this->cognom = $cognom;
            $this->$adreça = $adreça;
            $this->$mail = $mail;
            $this->$telf = $telf;
            $this->$visa = $visa;
        }

        public function AfegeixUsuari($info){

            $doc = "/var/www/html/users/usuaris.txt";

            $df = fopen($doc,"a") or die("L'usuari no s'ha pogut crear");
            fwrite($df,$info."\n");
            fclose($df);
        }

    }

?>