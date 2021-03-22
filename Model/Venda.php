<?php
class Venda{
    public function save($cliente,$produto,$quantidade,$valorUnitario){
        try{
            $valorFinal = $valorUnitario * $quantidade;
            $_SESSION['vendas'][] = [$cliente,$produto,$quantidade,$valorFinal];
            return true;
        }
        catch (Exception $e){
            return false;
        }
    }
    public function listAll(){
        if(isset($_SESSION['vendas'])){
            return $_SESSION['vendas'];
        }    
    } 
}
