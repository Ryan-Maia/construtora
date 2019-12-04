<?php
require_once '../Model/Produto.php';

class ProdutoController{
    private $produto;
    public function __construct(){
        $this->produto = new Produto();
    }
    public function listar(){
        $produtos = $this->produto->listAll();
        $_REQUEST['produtos'] = $produtos;
        require_once'../View/produto_view.php';
    }
    public function adicionar($a,$b,$c){
        $this->produto->save($a,$b,$c);
    }
    public function alterar($id,$a,$b,$c){
        $this->produto->update($id,$a,$b,$c);
    }
    public function removerId($id){
        $this->produto->remove($id);
    }
    public function removerTodos(){
        $this->produto->removeAll();
    }
}

$a = new ProdutoController();
//$a->removerTodos();
//$a->adicionar("Marmore","Branco","10 x 10 x 10cm");
//$a->adicionar("Tijolo","Cinza","30 x 24 x 51cm");
//$a->adicionar("Marmore","Branco","10 x 10 x 10cm");


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



