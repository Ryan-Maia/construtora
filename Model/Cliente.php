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
    private function checkId($id){
        //true : Usuario utilizado
        //false : Usuario não utilizado
        $isIn = false;
        if(isset($_SESSION['vendas'])){
            foreach($_SESSION['vendas'] as $i){
                if($i[0] == $_SESSION['clientes'][$id][0]){
                    $isIn = true;
                }
            }
            if ($isIn){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
        
    }
    public function remove($id){
        
        
        try{
            if (!$this->checkId($id)){
                unset($_SESSION['clientes'][$id]);
                $_SESSION['clientes'] = array_values($_SESSION['clientes']);
                return true;
            }else{
                return false;
            }
            
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

