<?php
	session_start();
	include_once("admin/classes/DadosDoBanco.php");
	include ("biblio.php");
	
	$cliente = new DadosCliente();
	
	$irpara = $_POST[irpara];
	echo $irpara;
	$txt_email = strip_tags($_POST["txt_email"]); 
	$txt_senha = strip_tags($_POST["txt_senha"]);
	

	$sql= "SELECT * FROM cliente where email = '".anti_sql_injection($txt_email)."' AND senha = '" .anti_sql_injection($txt_senha)."' ";
	

	$totalReg = $cliente->totalRegistros($sql);
	
	if ($totalReg>0){		
		$cliente ->verCliente($sql,0);
		
		$cli[ID] 		= $cliente->getId();
		$cli[CLIENTE]	= $cliente->getCliente();
		$cli[EMAIL] 	= $cliente->getEmail();
		
		$_SESSION[cliente_curso] = $cli; 
		
		echo "<script type='text/javascript'> location.href='pg/$irpara' </script>";
		
	}else{
		unset($_SESSION[cliente_curso][ID]);
		unset($_SESSION[cliente_curso][EMAIL]);
		unset($_SESSION[cliente_curso][CLIENTE]);		
	
		
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT= '0;URL=pg/$irpara'>
			<script type= \"text/JavaScript\">
				alert(\"Login ou senha não encontrado, tente novamente\");
			</script>"; 
	}


?>