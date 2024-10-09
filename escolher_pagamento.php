<?php
		$id	  = $_SESSION[cliente_curso][IDCLIENTE];	
		
		$cliente->mostrarDados();
		$cliente->setId($id);
		
		
	
		$txt_cliente	= $cliente-> getCliente(); 
		$txt_endereco	= $cliente-> getEndereco();
		$txt_cidade 	= $cliente-> getCidade();
		$txt_bairro 	= $cliente-> getBairro();
		$txt_uf  		= $cliente-> getUf();
		$txt_cep  		= $cliente-> getCep();
		$txt_email  	= $cliente-> getEmail();
		$txt_sexo  		= $cliente-> getSexo();
        $txt_fone  		= $cliente-> getFone();
		$txt_senha		= $cliente-> getSenha();
		$txt_ativo		= $cliente-> getAtivo();
		
		
	$id_pedido = $_SESSION["id_pedido_curso"];

?>

<div id="base-carrinho">
	<h2 class="fundo_azul"> <img src="<?php echo pg ?>/imagens/barra-carrinho03.png"> </h2>
	<h3> <img src="<?php echo pg ?>/imagens/forma-pag.png"> </h3>
	<div class="dados-carrinho">
	
		
		<table cellpadding="0" cellspacing="0" border="1">
			<thead>
				<tr>
					<th>Descri��o do produto </th>
					<th>Quantidade </th>
					<th>Pre�o unit�rio </th>
					<th>Subtotal </th>
					
				</tr>
			</thead>
			
			<tbody>
			<?php
				$sql= "SELECT c.*, p.* FROM carrinho c, produto p where c.id_produto = p.id_produto and id_pedido = '$id_pedido'";
				$totalReg = $carrinho->totalRegistros($sql);
				$valorTotal = 0;
					for($i=0;$i<$totalReg;$i++){
						$carrinho -> verCarrinho($sql, $i);
						$subtotal = $carrinho->getPreco() * $carrinho->getQtde();
						$valorTotal += $subtotal; 
						$codprod[$i] = $carrinho->getIdProduto();
						
			
			?>
				<tr>
					<td> 
						<img src="<?php echo pg ?>/admin/fotos/<?php echo $carrinho->getImagemProduto()?>"alt="Curso de Firebird" width="92" height="139"> 
						<strong> <?php echo $carrinho->getTituloProduto(); ?>  </strong>
					</td>
					<td> <?php echo $carrinho->getQtde(); ?>  </td>
					<td><?php echo "R$ " .number_format($carrinho->getValor(),2,',','.'); ?> </td>
					<td> <?php echo "R$ " .number_format($subtotal,2,',','.'); ?> </td>				
							
				</tr>			
				
				<?php } ?>
				<tr>
					<td colspan="5"> Valor total: <?php echo "R$ " .number_format($valorTotal,2,',','.'); ?> </td> 
				</tr>
			</tbody>

		</table>
	
	<h4 class="fundo_azul"> OP��O 01 - DEP�SITO / TRANSFER�NCIA </h4>
	<div id="container-logar">
		<div id="container-bancos-geral">
			<p> Finalize o seu pedido e depois escolha um dos bancos abaixo para efetuar o dep�sito/transfer�ncia </p>
			<div id="container-banco">
				<img src="<?php echo pg ?>/imagens/bb.png">
				<p>
				BANCO DO BRASIL <br />
				Ag�ncia: 1613-6 <br />
				Conta: 13644-1 <br />
				Manoel Jailton S. do Nascimento<br />
				</p>
			</div>
			<div id="container-banco">
				<img src="<?php echo pg ?>/imagens/bradesco.png">
				<p>
				BANCO BRADESCO <br />
				Ag�ncia: 1180-0 <br />
				Conta: 12068-5 <br />
				Manoel Jailton Sousa do Nascimento<br />
				</p>
			</div>
			<div id="container-banco">
				<img src="<?php echo pg ?>/imagens/itau.png">
				<p>
				BANCO ITA� <br />
				Ag�ncia: 7861 <br />
				Conta: 05159-2 <br />
				Intelimax Com�rcio LTDA<br />
				</p>
			</div>
			<div id="container-banco">
				<img src="<?php echo pg ?>/imagens/caixa.png">
				<p>
				CEF <br />
				Opera��o: 013 <br />
				Ag�ncia: 1649 <br />
				Poupan�a: 46136-2 <br />
				Manoel Jailton Sousa do Nascimento<br />
				</p>
			</div>
			<h2> <a href="<?php echo pg ."/finaliza_deposito_transferencia" ?>"><img src="<?php echo pg ?>/imagens/finalizar-pedido.gif" alt="pagamento"> </a>   </h2>
		</div>
		
	</div>
	
	
		<h4 class="fundo_azul"> OP��O 02 - PAGSEGURO </h4>
	<div id="container-logar">
		<div id="container-bancos-geral">
			<p> Finalize o seu pedido e depois escolha um dos bancos abaixo para efetuar o dep�sito/transfer�ncia </p>
			
				<img src="<?php echo pg ?>/imagens/pagseguro_1.jpg">
			
		
		
			<h2> <a href="<?php echo pg ."/pagseguro" ?>"><img src="<?php echo pg ?>/imagens/finalizar-pedido.gif" alt="pagamento"> </a>   </h2>
		</div>
		
	</div>
	
	</div>
</div>
		
	