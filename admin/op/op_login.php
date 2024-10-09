<?php
	session_start();
	include_once("../classes/DadosDoBanco.php");
	include ("../biblio.php");
	
	$cliente = new DadosAdministrador();
	

	$txt_login = strip_tags($_POST["txt_login"]); 
	$txt_senha = strip_tags($_POST["txt_senha"]);
	

	$sql= "SELECT * FROM administracao where login = '".anti_sql_injection($txt_login)."' AND senha = '" .anti_sql_injection($txt_senha)."' ";
	

	$totalReg = $cliente->totalRegistros($sql);
	
	if ($totalReg>0){	 
		$_SESSION["mjailton_logado_senha"] = $txt_senha;
		$_SESSION["mjailton_logado_email"] = $txt_login;
		
		echo "<script type='text/javascript'> location.href='../principal.php' </script>";
		
	}else{	
		unset($_SESSION["mjailton_logado_senha"]);
		unset($_SESSION["mjailton_logado_email"]);
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT= '0;URL=../index.php'>
			<script type= \"text/JavaScript\">
				alert(\"Login ou senha não encontrado, tente novamente\");
			</script>"; 
	}


?>