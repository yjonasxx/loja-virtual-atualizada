<?php
	include_once("../classes/manipulacaoDeDados.php");
	include_once("./biblio.php");
	
	$frm        = $_POST["frm"];
	
	if ($frm !=""){
		$acao 		= $_POST["acao"];
		$id_venda  	= $_POST["id_venda"];
	}else{
		$acao 		= $_GET["acao"];
		$id_venda  	= $_GET["id_venda"];
		$id_item	= $_GET["id_item"];
	}
	
	$cat = new manipulacaoDeDados();
	$cat->setTabela("venda");
	
		
	$txt_data_venda 		= $_POST["txt_data_venda"];
	$txt_pago 				= $_POST["txt_pago"];
	$txt_codigo_rastreamento= $_POST["txt_codigo_rastreamento"];
	$txt_status 			= $_POST["txt_status"];
	

	
	if($acao=="Alterar_venda"){
		$cat ->setCampos("	data_venda 			='$txt_data_venda', 
							codigo_rastreamento	='$txt_codigo_rastreamento', 
							pago 				='$txt_pago',
							status_venda 		='$txt_status'");
		$cat->setValorNaTabela("id_venda");
		$cat->setValorPesquisa("$id_venda");
		$cat->alterar();
		
		echo "<script type='text/javascript'> location.href='../principal.php?link=8' </script> ";
	}
	
	if($acao=="Excluir_venda"){
		/** Excluir os itens da venda */
		
		$cat->setTabela("itens_venda");
		$cat->setValorNaTabela("id_venda");
		$cat->setValorPesquisa("$id_venda");
		$cat->excluir();
		
		/** Excluir a venda */
		
		$cat->setTabela("venda");
		$cat->setValorNaTabela("id_venda");
		$cat->setValorPesquisa("$id_venda");
		$cat->excluir();
		
		echo "<script type='text/javascript'> location.href='./principal.php?link=8' </script> ";
	}
	
		if($acao=="Excluir_item"){
		/** Excluir os itens da venda */
		
		$cat->setTabela("itens_venda");
		$cat->setValorNaTabela("id_item");
		$cat->setValorPesquisa("$id_item");
		$cat->excluir();
	
		
		echo "<script type='text/javascript'> location.href='./principal.php?link=8' </script> ";
	}

?>
