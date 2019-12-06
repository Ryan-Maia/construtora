<?php
    $clientes = $_REQUEST['clientes'];
    $produtos = $_REQUEST['produtos'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>construtora</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700">
    <link rel="stylesheet" href="../assets/css/styles.min.css">
</head>

<body style="background-color: rgb(110,126,142);">
    <?php
        $page=3;
        require_once '../View/menu.php';
        require_once '../View/alerta.php';
    ?>
    <div class="row">
        <div class="col">
            <h1 class="text-center text-light" style="margin-top: 44px;margin-bottom: 36px;">Venda</h1>
        </div>
    </div>
    <div class="contact-clean">
        <form method="POST" action="VendaController.php">
            <h2 class="text-center">Efetuar Venda</h2>
            <div class="form-group">
                <select class="form-control" name="cliente" required>
                    <optgroup label="Clientes">
                        <?php
                            foreach($clientes as $c){
                                echo "<option value='{$c[0]}'>{$c[0]}</option>";
                            }
                        ?>
                    </optgroup>
                </select>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-xl-8">            
                        <select class="form-control" name="produto" required>
                            <optgroup label="Produtos">
                                <?php
                                foreach($produtos as $p){
                                    echo "<option value='{$p[0]}'>{$p[0]}</option>";
                                }
                                ?>
                            </optgroup>
                        </select>
                    </div>
                    <div class="col-xl-4"><input class="form-control" min="1" type="number" name="quantidade" placeholder="Quantidade" autocomplete="off" inputmode="numeric" required></div>
                </div>
            </div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="vender">vender</button></div>
        </form>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <?php
        if(isset($mensagem)){
            echo "<script>$('.alert').show().delay(1500).fadeOut(400);</script>";
        }
    ?>
</body>

</html>