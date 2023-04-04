<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <title>Emperium Street Wear</title>
    <meta name="Author" content="Marcus Vinicius">
    <link rel="icon" href="./Logos/Logotipo Escuro.png">
    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php 
	session_start();
	include 'conexão.php';
	include 'nav.php';
    include 'cabecalho.html';
	$Consulta = $cn -> query('select * from vw_produto'); 
	?>

    <div class="container-fluid text-center">
			<div class="row">
				<?php
					while($Exibir = $Consulta -> fetch(PDO::FETCH_ASSOC))
					{ ?>
						<div class="col-sm-3">
							<img src="Produtos/<?php echo $Exibir['ds_img']; ?>" class="img-responsive" style="width:100%">
							<div><h4><b><?php echo mb_strimwidth($Exibir['nm_nome'],0,17,'...'); ?></b></h4></div>
							<div><h5>R$ <?php echo number_format($Exibir['vl_produto'],2,',','.'); ?></h5></div>
							<div class="text-center" style="margin-top:7px;">
								<?php 
									if($Exibir['qtd_estoque'] > 0) { ?>
									<a href="carrinho.php?id=<?php echo $Exibir['id_produto'] ?>" style="text-decoration:none;">
									<button class="btn btn-block btn-default" style="background:#fdeb00; color:black;">
										<span class="glyphicon glyphicon-usd"></span> Comprar
									</button>
									</a>
								<?php } 
								else { ?>
									<button class="btn btn-block btn-danger" disabled>
										<span class="glyphicon glyphicon-exclamation-sign"></span> Fora de Estoque
									</button>
									<?php } ?>
									<br>
									<a href="detalhes.php?id=<?php echo $Exibir['id_produto'] ?>" style="text-decoration:none;">
									<button class="btn btn-block btn-primary">
										<span class="glyphicon glyphicon-info-sign"></span> Detalhes
									</button>
									</a>
							</div>
						</div>
					<?php } ?>
			</div><!-- fechamento da class="row" -->
	</div><!-- fechamento da class="container-fluid" -->
	<br>
	<br>
    <?php include 'rodape.html' ?>
</body>
</html>