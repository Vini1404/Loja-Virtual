<?php

include 'conexão.php';  // conexao com banco de dados

$cd = $_GET['id'];  // pegando o id que é enviado pelo botão excluir que esta na pagina lista.php

$pasta = "Produtos/"; //localizar pasta aonde estão as imagens

// criando consulta pelo id que foi pego
$consulta = $cn->query("SELECT * FROM tbl_produtos WHERE id_produto='$cd'");

//criando um array para exibir os dados
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);

// comando para excluir o registro pelo cd_livro que foi recebido na variavel.
$excluir = $cn->query("DELETE FROM tbl_produtos WHERE id_produto='$cd'");

$foto1 = $exibe['ds_img'];  //salvando nesta variável a imagem do select

if ($foto1!="") {  // se o conteudo não estiver vazio o comando unlink fará a exclusão, indicando a pasta
	unlink($pasta.$foto1);
}
//redirecionado usuario para página lista.php
header('location:lista.php');
?>