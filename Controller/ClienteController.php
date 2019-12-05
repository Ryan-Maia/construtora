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
            }else{
                $_SESSION['mensagem'] = "Falha no cadastro!";
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
            }else{
                $_SESSION['mensagem'] = "Falha na alteração!";
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
    //    $_SESSION['status'] = 'ok';
    $a->adicionar($_POST['nome'],$_POST['dt_nasc'],$_POST['sexo'],$_POST['end_cli'],$_POST['end_ent']);
    
}

if(isset($_POST['atualizar'])){
    $a->alterar($_POST['id'],$_POST['nome'],$_POST['dt_nasc'],$_POST['sexo'],$_POST['end_cli'],$_POST['end_ent']);
}
//$a->adicionar("Ryan","07/10/2001","M","Rua Costa Rica","Rua Costa Rica");
$a->listar();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

