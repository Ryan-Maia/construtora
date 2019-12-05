<nav class="navbar navbar-light navbar-expand-md bg-primary">
    <div class="container-fluid"><a class="navbar-brand text-light">Construtora Supra</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div
            class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav">
                <li class="nav-item" role="presentation">
                    <a <?php echo ($page==1) ? "style='color:rgb(51,255,255) !important'" : "" ?> class="nav-link active text-light" href="../Controller/ProdutoController.php">Produtos</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a <?php echo ($page==2) ? "style='color:rgb(51,255,255) !important'" : "" ?> class="nav-link text-light" href="../Controller/ClienteController.php">Clientes</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a <?php echo ($page==3) ? "style='color:rgb(51,255,255) !important'" : "" ?> class="nav-link text-light" href="../Controller/VendaController.php">Vendas</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a <?php echo ($page==4) ? "style='color:rgb(51,255,255) !important'" : "" ?> class="nav-link text-light" href="../Controller/ReciboController.php">Recibos</a>
                </li>
            </ul>
    </div>
    </div>
</nav>
