<?php
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
	ini_set('display_errors', 0);
	
	define('pg','http://localhost/nova-loja');
	
	include_once("admin/classes/DadosDoBanco.php");	
	include "biblio.php";
	$categoria 	= new DadosCategoria();
	$produto 	= new DadosProduto();
	$carrinho	= new DadosCarrinho();
	$cliente	= new DadosCliente();
	$venda		= new DadosVenda();
	$itens		= new DadosItensVenda();
	session_start(); 

?>

<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8">
<title> Bem vindo a loja Mary Belle </title>
<link href="<?php echo pg ?>/css/reset.css" rel="stylesheet" />
<link href="<?php echo pg ?>/css/css.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo pg ?>/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="<?php echo pg ?>/js/abas.js"></script>

<script type="text/javascript" src="<?php echo pg ?>/js/jquery.accordion.js"></script> 
<script type="text/javascript" src="<?php echo pg ?>/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="<?php echo pg ?>/js/formata_textArea.js"></script>
<script type="text/javascript">
//<![CDATA[
	jQuery(document).ready(function() {		
		jQuery('#conteudo_sanfona').accordion({
			autoheight: false
		});
	});
// ]]>	
</script>
</head>
<body>

	<div id="Principal">
		<section id="cabecalho">
			<?php include_once("cabecalho.php"); ?>
		</section><!--fim topo -->
		
		<section id="corpo">
			<?php
					
					
					$url = (isset($_GET['url'])) ? $_GET['url'] :'';
						$explode = explode('/',$url);
				
					$paginas = array('detalhe','carrinho','frm_cliente','logarParaComprar','escolher_pagamento','finaliza','finaliza_deposito_transferencia','logoff','minha_conta','busca','categorias','pagseguro' );
					
					if(isset($explode[0]) && $explode[0] == '') 
						{			
							include_once "home.php";
						}
						elseif($explode[0] != '') 
						{
							
							if(isset($explode[0]) && in_array($explode[0], $paginas)){	
								
								include_once $explode[0].".php";
									
							} else{
							
								include_once "home.php";
							}
					
						}
					
					/*$link = $_GET["link"];
					
					$pag[1] = "home.php";
					$pag[2] = "detalhe.php";
					$pag[3] = "carrinho.php";
					$pag[4] = "frm_cliente.php";
					$pag[5] = "logarParaComprar.php";
					$pag[6] = "escolher_pagamento.php";
					$pag[7] = "finaliza.php";
					$pag[8] = "finaliza_deposito_transferencia.php";
					$pag[9] = "logoff.php";
					$pag[10] = "minha_conta.php";
					$pag[11] = "busca.php";
					$pag[12] = "categorias.php";
					$pag[13] = "pagseguro.php";
					
					if (!empty($link)){
						if(file_exists($pag[$link]))
						{
							include $pag[$link];
						}
						else
						{
							include "home.php";
						}
					
					}else{
					
						include "home.php";
					}
				*/
				?>
		</section><!-- fim corpo-->
			
		<footer id="rodape">
			<?php include_once("rodape.php"); ?>
		</footer><!--fim rodape -->
	
	
	</div> <!--fim principla -->
	<script type="text/javascript" src="<?php echo pg ?>/js/js.js"></script>
</body>
</html>
