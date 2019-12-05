<?php
$clientes = $_REQUEST['clientes'];
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
    <nav class="navbar navbar-light navbar-expand-md bg-primary">
        <div class="container-fluid"><a class="navbar-brand text-light">Construtora Supra</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"><a class="nav-link active text-light" href="../Controller/ProdutoController.php">Produtos</a></li>
                    <li class="nav-item" role="presentation"><a style="color:#33ffff !important;" class="nav-link text-light" href="../Controller/ClienteController.php">Clientes</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-light" href="../Controller/VendaController.php">Vendas</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-light" href="../Controller/ReciboController.php">Recibos</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <?php
    if($_SESSION['status'] == "error"){
        echo "<div class='alert alert-dismissible alert-danger' style='display: none'>";
        unset($_SESSION['status']);
    }else{
        echo "<div class='alert alert-dismissible alert-info' style='display: none'>";
    }
    ?>
    
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Aviso</strong>  
            <?php if(isset($_SESSION['mensagem'])){
                        $mensagem = $_SESSION['mensagem'];
                        echo $mensagem;
                  }
            ?>
    </div>
    <div class="row">
        <div class="col">
            <h1 class="text-center text-light" style="margin-top: 44px;margin-bottom: 36px;">Clientes</h1>
        </div>
    </div>
    <div class="contact-clean">
        <form method="POST" action="ClienteController.php">
            <h2 class="text-center">Cadastrar Clientes</h2>
            <div class="form-group"><input class="form-control" type="text" name="nome" placeholder="Nome" required></div>
            <div class="form-group">Data de nascimento<input class="form-control" type="date" name="dt_nasc" placeholder="dd/mm/aaaa" autocomplete="off" required></div>
            <div class="form-group"><input class="form-control" type="text" name="end_cli" placeholder="Endereço Cliente" required></div>
            <div class="form-group text-center">
                <p class="text-center" style="font-size: 20px;font-weight: bold;font-style: normal;">Sexo</p>
                <div class="form-check form-check-inline"><input class="form-check-input" name="sexo" type="radio" id="formCheck-3" value="M" required><label class="form-check-label" for="formCheck-3">Masculino</label></div>
                <div class="form-check form-check-inline"><input class="form-check-input" name="sexo" type="radio" id="formCheck-4" value="F" required><label class="form-check-label" for="formCheck-4">Feminino</label></div>
            </div>
            <div class="form-group"><input class="form-control" type="text" name="end_ent" placeholder="Endereço Entrega" required></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="cadastrar">Cadastrar</button></div>
        </form>
    </div>
    <div class="row">
        <div class="col-xl-10 offset-xl-1">
            <div class="table-responsive table-borderless table-hover table-primary">
                <table class="table table-bordered">
                    <thead>
                        <tr id="darker">
                            <th>Nome</th>
                            <th>Data de Nascimento</th>
                            <th>Sexo</th>
                            <th>Endereço Cliente</th>
                            <th>Endereço Entrega</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($clientes)){
                                $clientes = array_reverse($clientes);
                                $count = count($clientes) - 1;
                                foreach($clientes as $cliente){
                                    echo "<tr>";
                                        echo "<form action='ClienteController.php' method='POST'>";
                                            echo "<td><input type='text' class='form-control' name='nome' value='{$cliente[0]}'></td>";
                                            echo "<td><input type='date' class='form-control' name='dt_nasc' value='{$cliente[1]}'></td>";
                                            echo "<td class='text-center'>";
                                                if($cliente[2] == "M"){
                                                    echo "<select class='form-control' name='sexo'><optgroup label='Sexo'><option value='M'>Masculino</option><option value='F'>Feminino</option></optgroup></select>";
                                                }else if($cliente[2] == "F"){
                                                    echo "<select class='form-control' name='sexo'><optgroup label='Sexo'><option value='M' selected>Masculino</option><option value='F' selected>Feminino</option></optgroup></select>";   
                                                }
                                            echo "</td>";
                                            echo "<td><input type='text' class='form-control' name='end_cli' value='{$cliente[3]}'></td>";
                                            echo "<td><input type='text' class='form-control' name='end_ent' value='{$cliente[4]}'></td>";
                                            echo "<input name='id' value='{$count}' hidden>";
                                            echo "<td><button class='btn btn-success' type='submit' name='atualizar' style='width:100'>Editar</button></td>";
                                            echo "<td><button class='btn btn-danger' type='submit' name='apagar' style='width:100'>Remover</button></td>";
                                        echo "</form>";
                                    echo "</tr>";
                                    $count --;
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <?php
        if(isset($mensagem)){
            echo "<script>$('.alert').show().delay(1500).fadeOut(400);</script>";
            unset($mensagem);
            unset($_SESSION['mensagem']);
        }
    ?>
</body>

</html>

