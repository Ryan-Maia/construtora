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
    public function adicionar($c, $p, $q){
        if($this->venda->save($c, $p, $q, 10)){
            $_SESSION['mensagem'] = "Adicionado com sucesso!";
        }else{
            $_SESSION['mensagem'] = "Falha ao adicionar!";
        }
    }
    public function listar(){
        $_REQUEST['produtos'] = $this->produto->listAll();
        $_REQUEST['clientes'] = $this->cliente->listAll();
        require_once'../View/venda_view.php';
    }
}

$a = new VendaController();
$a->adicionar("Ryan", "Marmore 3", 10);
$a->listar();
