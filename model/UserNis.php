<?php

class UserNis
{
    private $id;
    private $name;
    private $nis;

    public function __construct($id = null, $name = null, $description = null, $image = null, $price = null, $category_id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->nis = $this->nisGenerate();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getNis()
    {
        return $this->nis;
    }

    public function nisGenerate()
    {
        $d1 = 9;
        $d2 = 1;
        $d3 = 2;
        $d4 = rand(1,9);
        $d5 = rand(0,9);
        $d6 = rand(0,9);
        $d7 = rand(0,9);
        $d8 = rand(0,9);
        $d9 = rand(0,9);
        $d10 = rand(0,9);
        $d11 = rand(0,9);
        $soma = $d2 * 3 + $d3 * 2 + $d4 * 9 + $d5 * 8 + $d6 * 7 + $d7 * 6 + $d8 * 5 + $d9 * 4 + $d10 * 3 + $d11 * 2;
        $mod = $soma % 11;
        $dv = 0;
        $mod > 1 ? $dv = 11 - $mod : $dv = 0;
        $nis = $d2 . $d3 . $d4 . "." . $d5 . $d6 . $d7 . $d8 . "." . $d9 . $d10 . $d11 . "-" . $dv;
        return $nis;
    }
}
