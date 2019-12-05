<html>
    <body>
        <a href="Controller/ProdutoController.php">Controller</a>
        <?php
            session_start();
            if(isset($_SESSION['vendas'])){
                print_r($_SESSION['vendas']);
            }
        
        ?>
    </body>
</html>