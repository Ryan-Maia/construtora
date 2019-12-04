<?php
session_start();

class Produto{
    public function save($modelo,$cor,$tamanho){
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
