<?php
session_start();
require_once '../Model/Cliente.php';

class ClienteController{
    private $cliente;
    
    public function __construct(){
        $this->cliente = new Cliente();
    }
    public function adicionar($n,$d,$s,$ec,$ee){
        $dataNasc = explode("-", $d);

        if(intval($dataNasc[0]) <= intval(date("Y"))){
            if($this->cliente->save($n,$d,$s,$ec,$ee)){
            $_SESSION['mensagem'] = "Cadastro realizado com sucesso!";
            $_SESSION['status'] = "success";
            }else{
                $_SESSION['mensagem'] = "Falha no cadastro!";
                $_SESSION['status'] = "error";
            }
        }else{
            $_SESSION['mensagem'] = "Data inserida inválida!";
            $_SESSION['status'] = "error";
        }   
    }
    public function alterar($id,$n,$d,$s,$ec,$ee){
        $dataNasc = explode("-", $d);

        if(intval($dataNasc[0]) <= intval(date("Y"))){
            if($this->cliente->update($id,$n,$d,$s,$ec,$ee)){
                $_SESSION['mensagem'] = "Alteração salva com sucesso!";
                $_SESSION['status'] = "success";
            }else{
                $_SESSION['mensagem'] = "Falha na alteração!";
                $_SESSION['status'] = "error";
            }
        }else{
            $_SESSION['mensagem'] = "Data inserida inválida!";
            $_SESSION['status'] = "error";
        }
    }
    public function listar(){
        $_REQUEST['clientes'] = $this->cliente->listAll();
        require_once'../View/cliente_view.php';
    }
    public function removerId($id){
        if($this->cliente->remove($id)){
            $_SESSION['mensagem'] = "Remoção realizada com sucesso!";
            $_SESSION['status'] = "success";
        }else{
            $_SESSION['mensagem'] = "Falha ao remover cliente!";
            $_SESSION['status'] = "error";
        }
    }
}

$a = new ClienteController();

if(isset($_POST['apagar'])){
    $a->removerId($_POST['id']);
}
if(isset($_POST['cadastrar'])){
    $a->adicionar($_POST['nome'],$_POST['dt_nasc'],$_POST['sexo'],$_POST['end_cli'],$_POST['end_ent']);
    
}

if(isset($_POST['atualizar'])){
    $a->alterar($_POST['id'],$_POST['nome'],$_POST['dt_nasc'],$_POST['sexo'],$_POST['end_cli'],$_POST['end_ent']);
}
$a->listar();

