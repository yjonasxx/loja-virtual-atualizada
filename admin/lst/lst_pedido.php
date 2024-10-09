<?php
	$txt_data1 = $_POST["txt_data1"];
	$txt_data2 = $_POST["txt_data2"];	
	$txt_cliente = $_POST["txt_cliente"];
	
	if($txt_data1!="" && $txt_data2!="" && $txt_cliente!=""){
		$sql="SELECT  c.cliente, v.* FROM cliente c, venda v WHERE c.id_cliente=v.id_cliente AND data_venda between '$txt_data1' AND '$txt_data2' AND cliente like '%$txt_cliente%' ";
	}elseif($txt_data1!="" && $txt_data2!="" ){
		$sql="SELECT  c.cliente, v.* FROM cliente c, venda v WHERE c.id_cliente=v.id_cliente AND data_venda between '$txt_data1' AND '$txt_data2'  ";
	}elseif($txt_cliente !=""){
		$sql="SELECT  c.cliente, v.* FROM cliente c, venda v WHERE c.id_cliente=v.id_cliente AND cliente like '%$txt_cliente%' ";
	}else{
		$sql="SELECT * FROM venda";
	}

?>

<div id="form_pesquisa">
	<h2> Selecione a pesquisa </h2>
	<form action="principal.php?link=8" method="post" enctype="multipart/form-data">
		
		
		<div class="quatro-campos">
			<label>
				<span class="titulo">Data Inicial </span>
				<input type="date" name="txt_data1" id="txt_data1" value="<?php echo $txt_data1 ?>">
			</label>
			<label>
			<span class="titulo">Data Final </span>
			<input type="date" name="txt_data2" id="txt_data2" value="<?php echo $txt_data2 ?>">
		</label>
		<label>
			<span class="titulo">Cliente </span>
			<input type="text" name="txt_cliente" id="txt_cliente" value="<?php echo $txt_cliente ?>">
		</label>
		<label>
			<input type="hidden" name="id" value="<?php  echo $id; ?>" />
		
		<input type="submit" value="Pesquisar" class="botao" />
		
		
		</label>
		</div>
		
	
		
	</form>
</div>

	<div>
			<?php
					include_once("./classes/DadosDoBanco.php");	
					include "./biblio.php";
					
					$venda		= new DadosVenda();
					$itens		= new DadosItensVenda();
				
				
				//$sql="SELECT * FROM venda";
				
				echo $sql;
				$total = $venda->totalRegistros($sql);
				echo "total:" .$total;
				for($i=0; $i<$total; $i++){
					$venda->verVenda($sql,$i);
					$idVenda = $venda->getId();
		
			?>
			<div id="lista_venda" class="tamfonte" >
				<p><strong> Num compra:</strong> <span> <?php echo $venda->getId(); ?> </span>
				<strong> Data da venda: </strong> <span> <?php echo databr($venda->getDataVenda(),0); ?> </span>					
				
				
				<strong> Rastreamento:</strong> <span> <?php echo $venda->getCodigoRastreamento(); ?> </span>
				<strong> Status: </strong> <span> <?php echo $venda->getStatusVenda(); ?> </span>
				
				<strong> Total: </strong> <span> <?php echo "R$ " .number_format($itens->somaVendas($idVenda),2,',','.'); ?> </span>				
				<span class="opcoes"> <a href='principal.php?link=9&id_venda=<?php echo $idVenda; ?>'> <img src='./imagens/alterar.gif' border='0' width="16" height="16" /></a> </span>
				<span class="opcoes"> <a href='principal.php?link=10&acao=Excluir_venda&id_venda=<?php echo $idVenda; ?>'> <img src='./imagens/excluir.gif' border='0' /></a> </span>
				
			</p>
			</div>
			
						
			<div id="meus-pedidos">					
					
					<table cellpadding="0" cellspacing="0" border="1" >
						<thead class="fontmenor">
							<tr>
								<th>Descri��o do produto </th>
								<th>Quantidade </th>
								<th>Pre�o unit�rio </th>
								<th>Subtotal </th>
								<th>Excluir </th>
							</tr>
						</thead>
						
						<tbody class="fontmenor">
						<?php
							$sql_prod= "SELECT i.*, p.* FROM itens_venda i, produto p where i.id_produto = p.id_produto and id_venda = '$idVenda'";
							
							
							$totalReg = $itens->totalRegistros($sql_prod);
							$valorTotal = 0;
								for($j=0;$j<$totalReg;$j++){
									$itens -> verItens($sql_prod, $j);
									$subtotal = $itens->getPreco() * $itens->getQtde();
									$valorTotal += $subtotal; 
									$codprod[$i] = $itens->getIdProduto();
									
						
						?>
						
							<tr>
								<td> 
									<strong> <?php echo $itens->getTituloProduto(); ?>  </strong>
								</td>
								<td> <?php echo $itens->getQtde(); ?>  </td>
								<td><?php echo "R$ " .number_format($itens->getValor(),2,',','.'); ?> </td>
								<td> <?php echo "R$ " .number_format($subtotal,2,',','.'); ?> </td>	
								<td> <a href='principal.php?link=10&acao=Excluir_item&id_item=<?php echo $itens->getId(); ?>'> <img src='./imagens/excluir.gif' border='0' width="14" height="14"/></a> </td>	
										
							</tr>			
							
							<?php } ?>							
						</tbody>
					
					</table>
	
			</div>
			<?php } ?>
		
		
		</div>