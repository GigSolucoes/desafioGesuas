<?php

require_once "model/UserNisDAO.php";
require_once "model/UserNis.php";
require_once "view/View.php";

class UserNisController
{
    private $data;

    public function index($retorno = '')
    {
        $this->data = array();
        $userNisDAO = new UserNisDAO();

        try {
            $userNis = $userNisDAO->selectAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $this->data['usernis'] = $userNis;
        $retorno !== '' ? $this->data['sucesso'] = $retorno : null;

        View::load('view/template/header.html');
        View::load('view/usernis/index.php', $this->data);
        View::load('view/template/footer.html');
    }

    public function search($data = null)
    {
        if($data !== null){
            $this->data = array();
            $userNisDAO = new UserNisDAO();

            try {
                $userNis = $userNisDAO->selectAllFilter($data);
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $this->data['results'] = 0;

            if(count($userNis) > 0){
                $this->data['usernis'] = $userNis;
                $this->data['results'] = 1;
            }
        }
        View::load('view/template/header.html');
        View::load('view/usernis/search.php', $this->data);
        View::load('view/template/footer.html');
    }

    public function create()
    {
        View::load('view/template/header.html');
        View::load('view/usernis/create.php');
        View::load('view/template/footer.html');
    }

    public function store($data)
    {
        try {
            $userNisDAO = new UserNisDAO();
            if (strlen($data['name']) >= 2) {
                $newUserNis = new UserNis();
                $newUserNis->setName($data['name']);
                $userNisDAO->insert($newUserNis);
                
                $this->data = [];
                $this->data['success'] = ['Cadastro realizado com sucesso! Gerado o NIS ' . $newUserNis->getNis()];
                View::load('view/template/header.html');
                View::load('view/usernis/create.php', $this->data);
                View::load('view/template/footer.html');
            } else {
                $this->data = [];
                $this->data['errors'] = ['Nome não informado'];
                View::load('view/template/header.html');
                View::load('view/usernis/create.php', $this->data);
                View::load('view/template/footer.html');
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $userNisDAO = new UserNisDAO();
        try {
            $userNisDAO->delete($id);
            header('location: index.php?usernis=index');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function test()
    {
        View::load('view/template/header.html');
        View::load('view/usernis/test.php');
        View::load('view/template/footer.html');
    }
}
