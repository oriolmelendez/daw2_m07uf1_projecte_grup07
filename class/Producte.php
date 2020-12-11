<?php 
 
    class Producte{ 
 
        private $id; 
        private $nom; 
        private $preu; 
        private $imatge; 
        private $section; 
 
        public function __construct($id, $nom, $preu, $imatge, $section) 
        { 
            $this->id = $id; 
            $this->nom = $nom; 
            $this->preu = $preu; 
            $this->imatge = $imatge; 
            $this->section = $section; 
        } 
 
        public function __get($valor) 
        { 
            return $this->$valor; 
        } 
     
        public function __set($valor, $n_valor){ 
            if(property_exists($this,$valor)){ 
            $this->$valor = $n_valor; 
            } 
        } 
 
        public function AfegeixArticle($art){ 
 
            $doc = "/var/www/html/fitxers/articles.txt"; 
 
            $df = fopen($doc,"a") or die("L'article no s'ha pogut crear"); 
            fwrite($df,$art."\n"); 
            fclose($df); 
 
        } 
 
        public function ModificaArticle($art){ 
 
            $doc = "/var/www/html/fitxers/articles.txt"; 
 
            $df = fopen($doc,"w") or die("L'article no s'ha pogut modificar"); 
            fwrite($df,$art."\n"); 
            fclose($df); 
 
        } 
 
    } 
?>