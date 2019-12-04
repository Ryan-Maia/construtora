<?php
    $produtos = $_REQUEST['produtos'];
?>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>construtora</title>
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700">
        <link rel="stylesheet" href="../assets/css/styles.min.css">
        <style>
            input{
                cursor: pointer;
            }
            
        </style>
            
    </head>

    <body style="background-color: rgb(110,126,142);">
        <nav class="navbar navbar-light navbar-expand-md bg-primary">
            <div class="container-fluid"><a class="navbar-brand text-light" href="#">Construtora Supra</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav">
                        <li class="nav-item" role="presentation"><a class="nav-link active text-light" href="#">Produtos</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link text-light" href="#">Clientes</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link text-light" href="#">Vendas</a></li>
                    </ul>
            </div>
            </div>
        </nav>
        <div class="row">
            <div class="col">
                <h1 class="text-center text-light" style="margin-top: 44px;margin-bottom: 36px;">Produtos</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="table-responsive table-borderless table-hover table-primary">
                    <table class="table table-bordered">
                        <thead>
                            <tr id="darker">
                                <th>Modelo</th>
                                <th>Cor</th>
                                <th>Tamanho</th>
                                <th>Remover</th>
                                <th>Atualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php        
                                $count = 0;
                                foreach($produtos as $produto){
                                    echo "<tr>";
                                        echo "<form action='ProdutoController.php' method='POST'>";
                                            echo "<td><input type='text' class='form-control' name='modelo' value ='{$produto[0]}'></td>";
                                            echo "<td><input type='text' class='form-control' name='cor' value ='{$produto[1]}'></td>";
                                            echo "<td><input type='text' class='form-control' name='tamanho' value ='{$produto[2]}'></td>";
                                            echo "<input name='id' value='{$count}' hidden>";
                                            echo "<td><button class='btn btn-danger' type='submit' name='apagar'>Remover</button></td>";
                                            echo "<td><button class='btn btn-success' type='submit' name='atualizar'>Atualizar</button></td>";
                                        echo "</form>";
                                    echo "</tr>";
                                    
                                    $count++;
                                }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="contact-clean">
            <form action="ProdutoController.php" method="post">
                <h2 class="text-center">Cadastrar Produtos</h2>
                <div class="form-group"><input class="form-control" type="text" name="modelo" placeholder="Modelo" required></div>
                <div class="form-group"><input class="form-control" type="text" name="cor" placeholder="Cor" required></div>
                <div class="form-group"><input class="form-control" name="tamanho" placeholder="Tamanho" required></div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="Cadastrar">Cadastrar</button></div>
            </form>
        </div>
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    </body>

</html>

        <table>

        </table>


