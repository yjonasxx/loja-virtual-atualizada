
<?php
	
	
	
	include_once("Paginacao.php");
	
	class Lista extends Paginacao{
		private $strNumPagina, $strPaginas, $strUrl;
		
		public function setNumPagina($valor){
			$this->strNumPagina = $valor;
		}
		
		public function setUrl($valor){
			$this->strUrl = $valor;
		}
		
		public function getPaginas(){
			return $this-> strNumPagina;
		}
		
		public function listaCategoria(){
			$sql = "SELECT * FROM categoria";
			$this->setParametro($this->strNumPagina);
			$this->setFileName($this->strUrl);
			$this->setInfoMaxPag(10);
			$this->setMaximoLinks(50);
			$this->setSQL($sql);
			
			self::iniciaPaginacao();
			$cont = 0;
			
			while ($linha = self::results()){
				$cont++;
				echo "
				
				<tr>
				<td> $linha[id_categoria] </td>
				<td> $linha[categoria] </td>
				<td> $linha[ativo_categoria] </td>
				<td> <a href='principal.php?link=3&acao=Alterar&id=$linha[id_categoria]'> <img src='imagens/alterar.gif' border='0' /></a> </td>
				<td> <a href='principal.php?link=3&acao=Excluir&id=$linha[id_categoria]'> <img src='imagens/excluir.gif' border='0' /></a> </td>		
				</tr>
				
				
				";
				
				self::setContador($cont);
			}		
			
		}
		
		
		
		public function listaBanner(){
			$sql = "SELECT * FROM Banner";
			$this->setParametro($this->strNumPagina);
			$this->setFileName($this->strUrl);
			$this->setInfoMaxPag(10);
			$this->setMaximoLinks(50);
			$this->setSQL($sql);
			
			self::iniciaPaginacao();
			$cont = 0;
			
			while ($linha = self::results()){
				$cont++;
				echo "
				
				<tr>
				<td> $linha[id_banner] </td>
				<td> $linha[titulo_banner] </td>
				<td> $linha[ativo_banner] </td>
				<td> <a href='principal.php?link=5&acao=Alterar&id=$linha[id_banner]'> <img src='imagens/alterar.gif' border='0' /></a> </td>
				<td> <a href='principal.php?link=5&acao=Excluir&id=$linha[id_banner]'> <img src='imagens/excluir.gif' border='0' /></a> </td>		
				</tr>
				
				
				";
				
				self::setContador($cont);
			}		
			
		}
		
		
		
		public function listaProduto($comp){
			$sql = "SELECT * FROM produto $comp";
			$this->setParametro($this->strNumPagina);
			$this->setFileName($this->strUrl);
			$this->setInfoMaxPag(10);
			$this->setMaximoLinks(50);
			$this->setSQL($sql);
			
			self::iniciaPaginacao();
			$cont = 0;
			
			while ($linha = self::results()){
				$cont++;
				echo "
				
				<tr>
				<td> $linha[id_produto] </td>
				<td> $linha[titulo_produto] </td>
				<td> $linha[ativo_produto] </td>
				<td> <a href='principal.php?link=7&acao=Alterar&id=$linha[id_produto]'> <img src='imagens/alterar.gif' border='0' /></a> </td>
				<td> <a href='principal.php?link=7&acao=Excluir&id=$linha[id_produto]'> <img src='imagens/excluir.gif' border='0' /></a> </td>		
				</tr>
				
				
				";
				
				self::setContador($cont);
			}		
			
		}
		
		public function listaAdministrador(){
			$sql = "SELECT * FROM administracao ";
			$this->setParametro($this->strNumPagina);
			$this->setFileName($this->strUrl);
			$this->setInfoMaxPag(10);
			$this->setMaximoLinks(50);
			$this->setSQL($sql);
			
			self::iniciaPaginacao();
			$cont = 0;
			
			while ($linha = self::results()){
				$cont++;
				echo "
				
				<tr>
				<td> $linha[id_administracao] </td>
				<td> $linha[nome] </td>
				<td> $linha[login] </td>
				<td> <a href='principal.php?link=12&acao=Alterar&id=$linha[id_administracao]'> <img src='imagens/alterar.gif' border='0' /></a> </td>
				<td> <a href='principal.php?link12&acao=Excluir&id=$linha[id_administracao]'> <img src='imagens/excluir.gif' border='0' /></a> </td>		
				</tr>
				
				
				";
				
				self::setContador($cont);
			}		
			
		}
	}
	
	
?>