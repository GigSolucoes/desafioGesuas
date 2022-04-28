<?php

class TestValidateNis
{
    private $size;
    private $data;

    public function __construct($size = 1)
    {
        $this->size = $size;
        $this->data = $this->nisTestValidation($size);
    }

    public function getData()
    {
        return $this->data;
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

    public function nisTestValidation($size)
    {
        $arrGenerate = [];
        for($i = 0; $i < $size; $i++){
            $genNis = $this->nisGenerate();
            array_push($arrGenerate, $genNis);
        }
        return($arrGenerate);
    }
}
