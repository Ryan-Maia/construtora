<?php
    $clientes = $_REQUEST['clientes'];
    if(isset($_REQUEST['dados'])){
        $dados = $_REQUEST['dados'];
    }
    
?>

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
        $page=4;
        require_once '../View/menu.php';
        require_once '../View/alerta.php';
    ?>    
    <h1 class="text-center text-light" style="margin-top: 44px;margin-bottom: 36px;">Recibos</h1>
    <div class="contact-clean">
        <form method="post" action="ReciboController.php">
            <h2 class="text-center">Pesquisar Recibo</h2>
            <div class="form-group">
                <select class="form-control" name="cliente" required>
                    <optgroup label="Clientes">
                        <?php
                            if(isset($clientes)){
                                foreach($clientes as $c){
                                    echo "<option value='{$c[0]}'>{$c[0]}</option>";
                                }
                            }
                        ?>
                    </optgroup>
                </select>
            </div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="consultar">Pesquisar</button></div>
        </form>
    </div>
    <div class="row">
        <div class="col-xl-6 offset-xl-3">
            
            <h1 style="font-size: 28px;"><?php echo (isset($dados)) ? "Cliente: " . $dados[0][0] : "Cliente:";?></h1>
            <div class="row">
                <div class="col">
                    <div class="table-responsive table-borderless table-hover table-primary">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr id="darker">
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Valor Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if (isset($dados)){
                                        $valorFinal=0;
                                        foreach($dados as $i){
                                            $valorFinal+=$i[3];
                                            echo"<tr>";
                                                echo"<td>{$i[1]}</td>";
                                                echo"<td>{$i[2]}<br></td>";
                                                echo"<td>R$: {$i[3]}<br></td>";
                                            echo"</tr>";
                                        }
                                        echo"<tfoot>";
                                            echo"<tr>";
                                                echo"<td></td>";
                                                echo"<td><br></td>";
                                                echo"<td>R$: {$valorFinal}<br></td>";
                                            echo"</tr>";
                                        echo"</tfoot>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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