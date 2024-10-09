<?php


 function data()
 {
  $dia_da_semana = array("Domingo", "Segunda", "Ter�a", "Quarta", "Quinta", "Sexta", "S�bado");
  
  $mes_extenso = array("Janeiro", "Fevereiro", "Mar�o", "Abril", "Maio", "junho", 	"Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
  
  $dia = date("d");//01-31
  $mes =date("n")-1; //1-12
  $ano = date("Y"); //YYYY
  $dia_sem = date("w"); //0-6  
   
 // $data_final = $dia_da_semana[$dia_sem]. ", $dia de " .$mes_extenso[$mes]. " de $ano";
  $data_final = "$dia de " .$mes_extenso[$mes]. " de $ano";
  return $data_final;
 }
 
 function databr($data,$opt)
{
    if ($opt==1)
	{    
        $dia = substr($data,0,2);
        $mes = substr($data,3,2);
        $ano = substr($data,6,4);
        $databr = $ano . "-" . $mes . "-" . $dia;
    } else 
	{
        $dia = substr($data,8,2);
        $mes = substr($data,5,2);
        $ano = substr($data,0,4);
        $databr = $dia . "/" . $mes . "/" . $ano;
    }
    return $databr;
}

function config_upload(){
	$limitar_ext ="sim";
	$extensoes_validas = array(".gif", ".jpg",".jpeg",".png");
	$caminho_absoluto = "C:\wamp\www\nova-loja\admin\img";
	$limitar_tamanho = "nao";
	$tamanho_bytes="200000";
	$sobrescrever = "nao";

}
 function limitarString($string, $length = 150){
        if(strlen($string) <= $length)
            return $string;
        $corta = substr($string, 0, $length);
        $espaco = strrpos($corta, ' ');
        return substr($string, 0, $espaco);
    }
	
	
		function upload_jpg($tmp, $nome, $largura, $pasta){
	
		$img = imagecreatefromjpeg($tmp);
		$x = imagesx($img);
		$y = imagesy($img);
		$altura = ($largura*$y)/$x;
		$nova = imagecreatetruecolor($largura, $altura);
		imagecopyresampled($nova, $img,0,0,0,0,$largura, $altura,$x,$y);
		imagejpeg($nova,"$pasta/$nome");
		imagedestroy($nova);
		imagedestroy($img);
		return($nome);
	}
	
		function upload_png($tmp, $nome, $largura, $pasta){
	
		$img = imagecreatefrompng($tmp);
		$x = imagesx($img);
		$y = imagesy($img);
		$altura = ($largura*$y)/$x;
		$nova = imagecreatetruecolor($largura, $altura);
		imagecopyresampled($nova, $img,0,0,0,0,$largura, $altura,$x,$y);
		imagejpeg($nova,"$pasta/$nome");
		imagedestroy($nova);
		imagedestroy($img);
		return($nome);
	}
	
		function upload_gif($tmp, $nome, $largura, $pasta){
	
		$img = imagecreatefromgif($tmp);
		$x = imagesx($img);
		$y = imagesy($img);
		$altura = ($largura*$y)/$x;
		$nova = imagecreatetruecolor($largura, $altura);
		imagecopyresampled($nova, $img,0,0,0,0,$largura, $altura,$x,$y);
		imagejpeg($nova,"$pasta/$nome");
		imagedestroy($nova);
		imagedestroy($img);
		return($nome);
	}
	
	function anti_sql_injection($str) {
    if (!is_numeric($str)) {
        $str = get_magic_quotes_gpc() ? stripslashes($str) : $str;
        $str = function_exists('mysql_real_escape_string') ? mysql_real_escape_string($str) : mysql_escape_string($str);
    }
    return $str;
}
	
	
function gen_slug($str){
    # special accents
    $a = array('�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','�','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','?','?','J','j','K','k','L','l','L','l','L','l','?','?','L','l','N','n','N','n','N','n','?','O','o','O','o','O','o','�','�','R','r','R','r','R','r','S','s','S','s','S','s','�','�','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','�','Z','z','Z','z','�','�','?','�','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','?','?','?','?','?','?');
    $b = array('A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o');
    return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/','/[ -]+/','/^-|-$/'),array('','-',''),str_replace($a,$b,$str)));
}	
?>