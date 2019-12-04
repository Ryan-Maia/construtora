<?php
session_start();
class Produto{
//    private $modelo, $cor, $tamanho;
    /**
     * 
     * Salva o produto na $_SESSION 
     * $modelo $cor $tamanho
     */
    public function save($modelo,$cor,$tamanho){
     // lógica para salvar o produto na $_SESSION
        $_SESSION['produtos'][] = [$modelo,$cor,$tamanho];
    }
    public function update($id,$modelo,$cor,$tamanho){
        $_SESSION['produtos'][$id] = [$modelo,$cor,$tamanho];
    }
    public function remove($id){
        unset($_SESSION['produtos'][$id]);
        $_SESSION['produtos'] = array_values($_SESSION['produtos']);
    }
    public function listAll(){
        return $_SESSION['produtos'];
    }
    public function removeAll(){
        if(isset($_SESSION['produtos'])){
            unset($_SESSION['produtos']);
        }
    }
}
