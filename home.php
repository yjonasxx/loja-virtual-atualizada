

<div id="corpo-loja">
	<aside class="banner"> 
		<img src="<?php echo pg ?>/imagens/banner-meioo.png">
	</aside>

	<section class="categorias">
		<h2 class="fundo_azul"> Categorias</h2>
		
		<nav>
			<ul>
				<?php include "sidebar.php" ?>
		</nav>
	
	</section>
	
	<div id="lado-direito">
		<h3 class="titulo fundo_azul"> lista de produtos </h3>
		<section class="vitrine">
		<?php 
					$sql = "SELECT * FROM categoria LIMIT 0,3 ";
					$total = $categoria->totalRegistros($sql);
					for($i=0;$i<$total;$i++){
						$categoria-> verCategorias($sql,$i);
						$idcat = $categoria->getId();
				?>
			<h2> <?php echo $categoria->getCategoria()?> </h2>
				<ul>
					<?php 
							$produto->listarProdutos("SELECT c.*, p.* FROM categoria c,  produto p WHERE c.id_categoria=p.id_categoria and p.id_categoria = '$idcat'");
					?>
				</ul>
			<?php } ?>
		</section>
	</div>
	



</div>