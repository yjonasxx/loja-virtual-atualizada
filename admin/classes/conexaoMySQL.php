<?php
	class conexaoMySQL
	{
		protected $servidor;
		protected $usuario;
		protected $senha;
		protected $banco;
		protected $conexao;
		protected $qry;
		protected $dados;
		protected $totalDados;
		
		
		public function __construct()
		{
			$this->servidor 	="localhost";
			$this->usuario		="root";
			$this->senha		="";
			$this->banco		="lojavirtual";
			self::conectar();
		}
		function conectar()
		{
			$this->conexao = @mysql_connect($this->servidor,$this->usuario,$this->senha) or
										die("N�o foi poss�vel conectar com o servidor de banco de dados".mysql_error());
			
			$this->banco  = @mysql_select_db($this->banco) or 
										die("N�o foi poss�vel conectar com o Banco de dados".mysql_error());		
		}

		function executarSQL($sql)
		{
			$this->qry = @mysql_query($sql) or die("Erro ao executar o comando SQL: $sql <br>".mysql_error());
			return $this->qry;
		}
		function listar($qr)
		{
			$this->dados= @mysql_fetch_assoc($qr);
			return $this->dados;
		}
		
		function contaDados($qry){
			$this->totalDados = mysql_num_rows($qry);
			return $this->totalDados;
		}
		
		
	}
?>