<?php
	//$id=$_GET["id"];

	$id= $explode[3];

	
	
	
	
?>

<div id="corpo-loja">
	<aside class="banner"> 
		<img src="<?php echo pg ?>/imagens/banner-meio.png">
	</aside>

	<section class="categorias">
		<h2 class="fundo_azul"> Categorias</h2>
		
		<nav>
			<?php include "sidebar.php" ?>
		</nav>
	
	<?php
		$produto->setId("$id");
		$produto->mostrarDados();
		$id_categoria= $produto->getIdCategoria();
	?>
	</section>
	
	<div id="lado-direito">		
		<section class="vitrine">
			<div id="cx-img-produto">
				<img src="<?php echo pg ?>/admin/fotos/<?php echo $produto->getImagemProduto()?>" alt=""width="220" height="330">
			</div>
			
			<div id="cx-titulo-produto">
				<h1><a href="<?php echo pg ."/carrinho" ?>"> <?php echo $produto->getTituloProduto()?></a></h1>			
			</div>
			
			<div id="cx-preco-produto">
				<span>Valor:</span> <strong><?php echo $produto->getPreco()?></strong>
			</div>
			
			<div class="duracao-autor">
				<h3> 
					<span>Duração:</span> <strong><?php echo $produto->getDuracao()?></strong></h3>
			</div>
			<div class="duracao-autor">
				<h4><span>Autor: </span> <strong> <?php echo $produto->getAutor()?></strong> </h4>
			</div>
			
			<div id="descricao-rapida">
				<h2> Descrição rápida </h2>
				dfjk fkljdkl fdkl ljrlke j kljf dlkj fdjkl 
				f
				ddf
				fd
			</div>
			
			<div id="comprar-produto">
				<form action="<?php echo pg ?>/op_carrinho.php" method="post">
							<input type="hidden" name="txt_valor" value="<?php echo $produto->getPreco()?>" />
							<input type="hidden" name="id_produto" value="<?php echo $produto->getId()?>" />
							<input type="hidden" name="acao" value="INSERIR" /> 
							<input type="submit" value=""> 
				</form>
			</div>
			
			<section id="abas-geral">
				<ul class ="menu">
					<li><a href="#aba01"> Descrição </a></li>
					<li><a href="#aba02"> Conteúdo </a></li>
				</ul>
				<section id="box">
					<div id="aba01" class="conteudo">
						<article id="descricao">
						<h5> Descrição </h5>
						
						<?php echo html_entity_decode($produto->getDescricao())?>
					</article>
					</div>
					<div id="aba02" class="conteudo">
						<article id="descricao">
						<h5> Descrição </h5>
						
						<?php echo html_entity_decode($produto->getConteudo())?>
					</article>
					</div>
				</section>
			
			</section>
			
			
			<div id="sugestao">
			<h3 class="titulo fundo_azul"> Sugestões de compra </h3>
			<ul>
				<?php 
							$produto->listarProdutos("SELECT c.*, p.* FROM categoria c,  produto p WHERE c.id_categoria=p.id_categoria and p.id_categoria = '$id_categoria'");
				?>			
			
			</ul>
			</div>

		</section>
		
	</div>
</div>