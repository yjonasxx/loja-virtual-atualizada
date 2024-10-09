<?php
	$idCliente = $_SESSION[cliente_curso][ID];	
	
		$cliente->setId($idCliente);
		$cliente->mostrarDados();
		
		
		
	
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
		
		if($idCliente !=""){	
?>

<div id="sanfona">
	<div id="conteudo_sanfona" class="formata_sanfona">
		<a> MEUS PEDIDOS </a>
		<div>
			<?php
				$sql="SELECT * FROM venda WHERE id_cliente= $idCliente";
				$total = $venda->totalRegistros($sql);
				for($i=0; $i<$total; $i++){
					$venda->verVenda($sql,$i);
					$idVenda = $venda->getId();
		
			?>
			<div id="lista_venda">
				<strong> Num compra:</strong> <span> <?php echo $venda->getId(); ?> </span>
				<strong> Data da venda: </strong> <span> <?php echo databr($venda->getDataVenda(),0); ?> </span>
				<strong> Código do Rastreamento:</strong> <span> <?php echo $venda->getCodigoRastreamento(); ?> </span>
				<strong> Status: </strong> <span> <?php echo $venda->getStatusVenda(); ?> </span>
				<strong> Total: </strong> <span> <?php echo "R$ " .number_format($itens->somaVendas($idVenda),2,',','.'); ?> </span>		
			
			</div>
			
						
			<div id="meus-pedidos">					
					
					<table cellpadding="0" cellspacing="0" border="1">
						<thead>
							<tr>
								<th>Descrição do produto </th>
								<th>Quantidade </th>
								<th>Preço unitário </th>
								<th>Subtotal </th>
								
							</tr>
						</thead>
						
						<tbody>
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
									<img src="<?php echo pg ?>/admin/fotos/<?php echo $itens->getImagemProduto()?>"alt="Curso de Firebird" width="20" height="30"> 
									<strong> <?php echo $itens->getTituloProduto(); ?>  </strong>
								</td>
								<td> <?php echo $itens->getQtde(); ?>  </td>
								<td><?php echo "R$ " .number_format($itens->getValor(),2,',','.'); ?> </td>
								<td> <?php echo "R$ " .number_format($subtotal,2,',','.'); ?> </td>				
										
							</tr>			
							
							<?php } ?>							
						</tbody>
					
					</table>
	
			</div>
			<?php } ?>
		
		
		</div>
		<a href="#"> DADOS DE ACESSO </a>
		<div>			
		
			
			<div id="formulario-maior">
			<form action="op_cliente.php" method="post" name="form1" id="form1" onsubmit="return validar()">
				
					<fieldset>
						<legend> Dados para acesso </legend>				
							<label>
								<span> E-mail (login)*</span>	
								<input type = "text" name="txt_email" id="txt_email" value ="<?php echo $txt_email  ?>">
							</label>														
							
							<label>
								<span> Senha*</span>	
								<input type = "password" name="txt_senha" id="txt_senha"  value ="<?php echo $txt_senha  ?>">
							</label>
							
							<label>
								<span> Confirmar senha*</span>	
								<input type = "password" name="txt_confirma" id="txt_confirma" value ="<?php echo $txt_senha  ?>">
							</label>
							
							<input type="hidden" name ="id" value="<?php echo $idCliente ?>">							
							<input type="hidden" name ="acao" value="Atualizar_login">	
														
							<input type="submit" name= "atualiza_login" id="atualiza_login" value = "atualizar login" class="botao" >
					</fieldset>
			</form>
			</div>
		</div>
		<a href="#"> MEUS DADOS </a>
		<div>
			<div id="formulario-maior">
			<form action="op_cliente.php" method="post" name="form1" id="form1" onsubmit="return validar()">
			<fieldset>
					<legend> Dados Pessoais </legend>
							<label>
								<span>Nome</span>
								<input type="text" name="txt_cliente" id="txt_cliente" value="<?php echo $txt_cliente ?>">
							</label>							
							<label>
								<span>Endereço</span>
								<input type="text" name="txt_endereco" id="txt_endereco" value="<?php echo $txt_endereco ?>">
							</label>
							<label>
								<span>Bairro</span>
								<input type="text" name="txt_bairro" id="txt_bairro"  value="<?php echo $txt_bairro ?>">
							</label>
							<label>
								<span>Cidade</span>
								<input type="text" name="txt_cidade" id="txt_cidade" value="<?php echo $txt_cidade ?>">
							</label>
							<label>
								<span>Cep</span>
								<input type="text" name="txt_cep" id="txt_cep" value="<?php echo $txt_cep ?>">
							</label>
							<label>
								<span>Estado</span>
								<input type="text" name="txt_uf" id="txt_uf" value="<?php echo $txt_uf ?>">
							</label>							
							
							<label>
								<span>Telefone</span>
								<input type="text" name="txt_fone" id="txt_fone" value="<?php echo $txt_fone ?>">
							</label>
							
							
							<input type="hidden" name ="id" value="<?php echo $idCliente ?>">							
							<input type="hidden" name ="acao" value="atualiza_cadastro">	
														
							<input type="submit" name= "atualiza_cadastro" id="atualiza_cadastro" value = "atualizar cadastro" class="botao" >					
					</fieldset>
				</form>				
			</div>
		
		</div>
	
	</div>


</div>

	<?php } else{
		
		 echo "<script type='text/javascript'> location.href='pg/logarParaComprar/minha_conta' </script>";
	}
	