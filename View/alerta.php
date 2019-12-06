<?php

        
    if(isset($_SESSION['status']) && isset($_SESSION['mensagem'])){
        if($_SESSION['status'] == "error"){
            echo "<div class='alert alert-dismissible alert-danger' style='display: none'>";
            echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
            echo "<strong>ERRO </strong>";
            unset($_SESSION['status']);
        }else{
            echo "<div class='alert alert-dismissible alert-info' style='display: none'>";
            echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
            echo "<strong>Aviso </strong>";
            unset($_SESSION['status']);
        }  
        $mensagem = $_SESSION['mensagem'];
        echo $mensagem;
        echo "</div>";
    } 
?>