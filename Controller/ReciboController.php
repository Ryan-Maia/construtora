<?php
session_start();

require_once '../Model/Venda.php';
require_once '../Model/Cliente.php';
class ReciboController{
    private $venda,$cliente;
    private $dados = array();
    
    public function __construct(){
        $this->venda = new Venda();
        $this->cliente = new Cliente();
    }
    public function pesquisar($id){
        $dados = [];
        $count=0;
        foreach($this->venda->listAll() as $i){
            
            if($i[0] == $id){
                $this->dados[] = $i;
                $count++;
            }
        }
        if($count==0){
            return false;
        }else{
            return $this->dados;
        }
    }
    public function listar(){        
        $_REQUEST['clientes'] = $this->cliente->listAll();
        require_once'../View/recibo_view.php';
    }
    
}

$a = new ReciboController();
//
if(isset($_POST['consultar'])){
    $r = $a->pesquisar($_POST['cliente']);
    if($r != false){
        $_REQUEST['dados'] = $r;
    }else{
        $_SESSION['mensagem'] = "O usuário não possui nenhuma compra";
        
    }
}

$a->listar();
echo "ue";
