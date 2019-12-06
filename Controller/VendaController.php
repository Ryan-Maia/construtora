<?php
session_start();
require_once '../Model/Venda.php';
require_once '../Model/Produto.php';
require_once '../Model/Cliente.php';

class VendaController{
    private $venda,$produto,$cliente;
    public function __construct(){
        $this->venda = new Venda();
        $this->produto = new Produto();
        $this->cliente = new Cliente();
    }    
    public function listar(){
        $_REQUEST['produtos'] = $this->produto->listAll();
        $_REQUEST['clientes'] = $this->cliente->listAll();
        require_once'../View/venda_view.php';
    }
    public function adicionar($c, $p, $q){
        if($this->venda->save($c, $p, $q, 10)){
            $_SESSION['mensagem'] = "Venda realizada com sucesso!";
            $_SESSION['status'] = "success";
        }else{
            $_SESSION['mensagem'] = "Falha ao efetuar a venda!";
            $_SESSION['status'] = "error";
        }
    }
    
}

$a = new VendaController();
//$a->adicionar("Ryan", "Marmore 3", 10);


if(isset($_POST['vender'])){
    $a->adicionar($_POST['cliente'], $_POST['produto'], $_POST['quantidade']);    
}

$a->listar();
