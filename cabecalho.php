<?php 
	$nomecliente = $_SESSION['cliente_curso']['CLIENTE']; 
	if ($nomecliente==""){
		$nomecliente= "Visitante";
		$txt_log="Logar";
		$txt_link="logarParaComprar";
	}else
	{		
		$txt_log="Logoff";
		$txt_link="logoff";
	}
	
	$id_pedido = $_SESSION["id_pedido_curso"];
	$sql="SELECT * FROM carrinho WHERE id_pedido = '$id_pedido' ";
	$totalItem=$carrinho->totalRegistros($sql);
	
	if ($totalItem ==0){
		$msgItens = "Nenhum item no seu carrinho de compras";
	}elseif($totalItem ==1){
		$msgItens = "01 item no seu carrinho de compras";
	}else{
		$msgItens = $totalItem. " itens no seu carrinho de compras";
	}
?> 
<div id="cabecalho_superior">

	<nav id="menu-cima">
	<span> <?php echo "Ola $nomecliente Seja bem vindo a nossa loja" ;?>  </span>
		<ul>
			<li><a href="<?php echo pg.'/minha_conta'; ?>">Minha conta </a> </li>
			<li><a href="<?php echo pg.'/carrinho'; ?>">Meu carrinho </a> </li>
			<li><a href="<?php echo pg."/$txt_link/minha_conta"; ?>"><?php echo $txt_log;?> </a> </li>
			<li><a href="<?php echo pg."/frm_cliente"; ?>">Cadastrar </a> </li>
		</ul>
	</nav>
</div>
<div id="cabecalho_meio" class="fundo_rosa">	
	<p> <img src="/imagens/img-logo.png" /> </p>
	<p class="sacola"> <?php echo $msgItens; ?> </p>
	<section class="busca">
		<form action="<?php echo pg ."/busca"; ?>" method="post">
			<label>
				<span> buscar </span>
				<input type="search" name="txt_pesquisa" id="txt_pesquisa">
				<input type="image" src="<?php echo pg?>/imagens/lupa.png">
			</label>		
		</form>
	</section>
</div>
<div id="cabecalho_inferior" class="fundo_principal">
	<nav id="menu-principal">
		<ul>
			<li class="linha-vertical"> <a href="<?php echo pg; ?>">Home</a> </li>
			<li class="linha-vertical"> <a href="#"> Produtos</a></li>
			<li class="linha-vertical"> <a href="#"> Fale Conosco </a> </li>
			<li class="linha-vertical"> <a href="#"> Quem Somos </a></li>
		</ul>
	</nav>
</div>