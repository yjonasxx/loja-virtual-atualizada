<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> mjailton - Criando um site completo </title>
<link href="estilo-admin.css" type = "text/css" rel="stylesheet" media="all" >
</head>

	
<body>
		<div id="box-login">
			<div id="formulario-login">
				<form id ="frmlogin" name="frmlogin" method="post" action="op/op_login.php" >
					<fieldset>
						<legend> Fa�a o login</legend>				
							<label>
								<span> Login</span>	
								<input type = "text" name="txt_login" id="txt_login">
							</label>
							
							<label>
								<span>senha</span>
								<input type="password" name="txt_senha" id="txt_senha">
							</label>
							<input type="submit" name= "logar" id="logar" value = "Logar" class="botao" >
					
					</fieldset>
				</form>
				
			</div>
		
		</div>
		
</body>
</html>