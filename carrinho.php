<?php
	
	$id_pedido = $_SESSION["id_pedido_curso"];

	if ($id_pedido!=""){
?>

<div id="base-carrinho">
	<h2 class="fundo_azul"> <img src="<?php echo pg ?>/imagens/barra-carrinho01.png"> </h2>
	<h3> <img src="<?php echo pg ?>/imagens/meu-carrinho.png"> </h3>
	<div class="dados-carrinho">
	<span> para excluir coloque a quantidade zero e clique em alterar </span>
		<form name="frm_carrinho" action="<?php echo pg ?>/op_carrinho.php" method="post">
		<table cellpadding="0" cellspacing="0" border="1">
			<thead>
				<tr>
					<th>Descri��o do produto </th>
					<th>Quantidade </th>
					<th>Pre�o unit�rio </th>
					<th>Subtotal </th>
					<th>Atualizar </th>
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
					<td> <input type="number" id="alterar" name="codprod[<?php echo $i?>][QTDE]" value="<?php echo $carrinho->getQtde(); ?>" size="3" maxlength="3" min="0" max = "100" step="1" />  </td>
					<td><?php echo "R$ " .number_format($carrinho->getValor(),2,',','.'); ?> </td>
					<td> <?php echo "R$ " .number_format($subtotal,2,',','.'); ?> </td>
					
					
					<td> 
						<input type="hidden" name="acao" value="ALTERAR" />
						<input type="hidden" name="codprod[<?php echo $i?>][IDPRODUTO]" value="<?php echo $carrinho->getIdProduto(); ?>" />
						<input type="submit" name="Alterar" value="Alterar" /> 
					</td>		
				</tr>
				
				
				<?php } ?>
				<tr>
					<td colspan="5"> Valor total: <?php echo "R$ " .number_format($valorTotal,2,',','.'); ?> </td> 
				</tr>
			</tbody>
		</table>
	</form>
	
	
	<div id="linha">
		<a href="<?php echo pg."/finaliza"; ?>"><img src="<?php echo pg ?>/imagens/finalizar-compra.png"></a><a href="<?php echo pg; ?>"><img src="<?php echo pg ?>/imagens/continuar-comprando.png"></a>
	</div>
	</div>
	
	<div id="sugestao2">	
			<h3 class=" fundo_azul"> Sugest�es de compra </h3>
			<ul>
				<?php 
							$produto->listarProdutos("SELECT c.*, p.* FROM categoria c,  produto p WHERE c.id_categoria=p.id_categoria and p.id_categoria in (SELECT p.id_categoria FROM produto p, pedido pe, carrinho c WHERE p.id_produto = c.id_produto AND pe.id_pedido=c.id_pedido AND c.id_pedido = '$id_pedido ') order by p.id_produto DESC LIMIT 0, 10");
				?>	
			
			
			</ul>
			
			</div>
		</div>
<?php } else{ ?>
	<p> N�o existe nenhum item no seu carrinho de compras </p>
<?php } ?>