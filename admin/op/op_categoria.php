<?php
include_once("../classes/manipulacaoDeDados.php");
	include_once("../biblio.php");
	$acao = $_POST["acao"];
	$id	  = $_POST["id"];

	
	$cat = new manipulacaoDeDados();
	$cat->setTabela("categoria");
	

	$txt_titulo 	= $_POST["txt_titulo"];
	$slug_categoria = gen_slug($txt_titulo);
	$txt_ordem 		= $_POST["txt_ordem"];
	$txt_ativo 		= $_POST["txt_ativo"];
	
	
	if($acao=="Inserir"){
		$cat ->setCampos("categoria, slug_categoria, ordem_categoria,ativo_categoria");
		$cat ->setDados(" '$txt_titulo', '$slug_categoria', '$txt_ordem', '$txt_ativo'");
		$cat-> inserir();
		
		echo "<script type='text/javascript'> location.href='../principal.php?link=2' </script> ";
	}
	
	if($acao=="Alterar"){
		$cat ->setCampos("	categoria ='$txt_titulo', 
							slug_categoria='$slug_categoria', 
							ordem_categoria ='$txt_ordem',
							ativo_categoria ='$txt_ativo'");
		$cat->setValorNaTabela("id_categoria");
		$cat->setValorPesquisa("$id");
		$cat->alterar();
		
		echo "<script type='text/javascript'> location.href='../principal.php?link=2' </script> ";
	}
	
	if($acao=="Excluir"){
		
		$cat->setValorNaTabela("id_categoria");
		$cat->setValorPesquisa("$id");
		$cat->excluir();
		
		echo "<script type='text/javascript'> location.href='../principal.php?link=2' </script> ";
	}

?>
