<?php

class Cliente{
    //private $nome,$dataNascimento,$sexo,$endCliente,$endEntrega;
    
    public function save($nome,$dataNascimento,$sexo,$endCliente,$endEntrega){
        try{
            $_SESSION['clientes'][] = [$nome,$dataNascimento,$sexo,$endCliente,$endEntrega];
            return true;
        }
        catch(Exception $e){
            return false;
        }
    }
    public function listAll(){
        if(isset($_SESSION['clientes'])){
            return $_SESSION['clientes'];
        }    
    }
    public function remove($id){
        try{
            unset($_SESSION['clientes'][$id]);
            $_SESSION['clientes'] = array_values($_SESSION['clientes']);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function update($id,$nome,$dataNascimento,$sexo,$endCliente,$endEntrega){
        try{
            $_SESSION['clientes'][$id] = [$nome,$dataNascimento,$sexo,$endCliente,$endEntrega];
            return true;
        }
        catch(Exception $e){
            return false;
        }
    }
}

