<?php
session_start();

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

    /*public function save($modelo,$cor,$tamanho){
     // lógica para salvar o produto na $_SESSION
        try{
            $_SESSION['produtos'][] = [$modelo,$cor,$tamanho];
            return true;
        }
        catch(Exception $e){
            return false;
        }
        
    }
    public function update($id,$modelo,$cor,$tamanho){
        try{
            $_SESSION['produtos'][$id] = [$modelo,$cor,$tamanho];
            return true;
        }catch(Exception $e){
            return false;
        }
    }
    public function remove($id){
        try{
            unset($_SESSION['produtos'][$id]);
            $_SESSION['produtos'] = array_values($_SESSION['produtos']);
            return true;
        } catch (Exception $e) {
            return false;
        }
        
    }
    public function listAll(){
        if(isset($_SESSION['produtos'])){
            return $_SESSION['produtos'];
        }
    }
    public function removeAll(){
        if(isset($_SESSION['produtos'])){
            unset($_SESSION['produtos']);
        }
    }
}
*/