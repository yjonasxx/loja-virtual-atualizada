<?php
	//$irpara=$_GET[irpara];
	$irpara = $explode[1];
?>
<div id="base-carrinho">
	<h2> <img src="<?php echo pg ?>/imagens/barra-carrinho02.png"> </h2>
	<h3> <img src="<?php echo pg ?>/imagens/identificacao.png"> </h3>
	<h4 class="fundo_azul"> Fa�a o seu login ou cadastre-se </h4>
	<div id="container-logar">
		<div id="carrinho-logar">
			<h2> J� sou cliente</h2>
				<div id="formulario-login">
					<form id="frmlogin" name="frmlogin" method="post" action="<?php echo pg; ?>/logar.php">
						<fieldset>
							<label>
								<span>Digite seu email</span>
								<input type="text" name="txt_email" id="txt_email" />
							</label>
							<label>
								<span> Digite sua senha</span>
								<input type="password" name="txt_senha" id="txt_senha" />
							</label>
							<input type="hidden" name="irpara" value="<?php echo $irpara; ?>" />
							<input type="submit" name="logar" id="logar" value="logar" class="botao fundo_azul">
						</fieldset>			
					
					</form>
				
				</div>
				<p> <a href="#">esqueci minha senha</a> </p>
		</div>
		<div id="carrinho-logar">
			<h2> Ainda n�o sou cadastrado</h2>
			<p> Caso ainda n�o seja cadastrado no site, clique no bot�o abaixo e fa�a seu cadastro para poder finalizar a compra</p>
			<h5><a href="#"><img src="<?php echo pg ?>/imagens/criar-novo.png"></a></h5>
		
		</div>
	</div>
	
</div>