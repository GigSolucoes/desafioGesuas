<?php

require_once "model/TestValidateNis.php";
require_once "view/View.php";

class TestValidateNisController
{
    private $data;

    public function test($size = 0)
    {
        if($size > 0){
            $this->data = array();
            $testValidateNis = new TestValidateNis($size);
            $this->data['results'] = $testValidateNis->getData();;
        }
        View::load('view/template/header.html');
        View::load('view/usernis/test.php', $this->data);
        View::load('view/template/footer.html');
    }
}
