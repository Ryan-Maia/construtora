<?php
session_start();
require_once '../Model/Produto.php';

class ProdutoController{
    private $produto;
    public function __construct(){
        $this->produto = new Produto();
    }
    public function listar(){
        $_REQUEST['produtos'] = $this->produto->listAll();
        require_once'../View/produto_view.php';
    }
    public function adicionar($a,$b,$c){
        if($this->produto->save($a,$b,$c)){
            $_SESSION['mensagem'] = "Adicionado com sucesso!";
            $_SESSION['status'] = "success";
        }else{
            $_SESSION['mensagem'] = "Falha ao adicionar!";
            $_SESSION['status'] = "error";
        }
        
    }
    public function alterar($id,$a,$b,$c){
        if($this->produto->update($id,$a,$b,$c)){
            $_SESSION['mensagem'] = "Alteração salva com sucesso!";
            $_SESSION['status'] = "success";
        }else{
            $_SESSION['mensagem'] = "Falha na alteração!";
            $_SESSION['status'] = "error";
        }
    }
    public function removerId($id){
        if($this->produto->remove($id)){
            $_SESSION['mensagem'] = "Remoção realizada com sucesso!";
            $_SESSION['status'] = "success";
        }else{
            $_SESSION['mensagem'] = "Falha ao remover!";
            $_SESSION['status'] = "error";
        }
    }
    public function removerTodos(){
        $this->produto->removeAll();
    }
}

$a = new ProdutoController();

if(isset($_POST['apagar'])){
    $a->removerId($_POST['id']);
    $a->listar();
}else if(isset($_POST['atualizar'])){
    $a->alterar($_POST['id'],$_POST['modelo'],$_POST['cor'],$_POST['tamanho']);
}

if(isset($_POST['Cadastrar'])){
    $a->adicionar($_POST['modelo'], $_POST['cor'], $_POST['tamanho']);
}

$a->listar();



