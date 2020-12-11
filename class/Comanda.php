<?php

class Comanda
{

    private $id;
    private $nom;
    private $num;
    private $articles;

    public function __construct($id, $nom, $num, $articles)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->num = $num;
        $this->articles = $articles;
    }

    public function __get($valor)
    {
        return $this->$valor;
    }

    public function __set($valor, $n_valor)
    {
        if (property_exists($this, $valor)) {
            $this->$valor = $n_valor;
        }
    }

    public function AfegeixComanda($cmd)
    {
        $root = $_SERVER["DOCUMENT_ROOT"];
        $dir = $root .'/fitxers/comandes/'. $this->nom;
        if (is_dir($dir) == false) {
            mkdir($dir, 0755, true);
        }


        $doc = "fitxers/comandes/".$this->nom."/".$this->id.$this->num;

        $df = fopen($doc, "w") or die("L'article no s'ha pogut crear");
        foreach ($this->articles as $article) {
            fwrite($df, $article . "\n");
        }
        fclose($df);
    }

}