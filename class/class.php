<?php

error_reporting(0);

//reference to the Great php programmer Mr.Gbenga Copyright reserved for Sysnet Nigeria. 2009

include_once('c.php');

	
ini_set('session.gc-maxlifetime',60*1);
$agentid=gethostbyaddr($_SERVER['REMOTE_ADDR']);

$agent = detectAgent();

/*

$newform .=<<<EOD

	<form name='gbenga' action='?' method='post'>

	<select name=pp><option value='0'>sewew</option></select>

	<input type=text name=pool value=''>

	<input type=submit name=poopihh value=submit>

	</form>





EOD;

//for wordpress



		

		global $current_user;

    	get_currentuserinfo();

      	$uid= $current_user->user_login ;*/

      //echo 'User email: ' . $current_user->user_email . "\n";

//      echo 'User first name: ' . $current_user->user_firstname . "\n";

     // echo 'User last name: ' . $current_user->user_lastname . "\n";

    //  echo 'User display name: ' . $current_user->display_name . "\n";

     // echo 'User ID: ' . $current_user->ID . "\n";

//wordpress

	class Sql

	{

	var $database = '';

	var $sql = '';

	var $rs = '';

	var $numRows = '';

	var $myrow = '';

	function Sql($dbname,$sqlstmt){

		$this->database = $dbname;

		$this->sql = $sqlstmt;

		$connect = mysql_connect(DBSERVER,DBUSERID,DBPASSWORD) or die (mysql_error());

		$db = mysql_select_db($this->database,$connect);

		$this->exQuery();

	}

	

	function exQuery(){

		$this->rs = mysql_query($this->sql) or die(mysql_error());

	}

	function getResult(){

		while ($this->myrow = mysql_fetch_row($this->rs)){//this is the while loop to go thru the result from query

			return $this->myrow;			

		}

	}

	function getArrayResult(){

		while ($this->myrow = mysql_fetch_array($this->rs)){//this is the while loop to go thru the result from query

			return $this->myrow;			

		}

	}

	function setNumRows(){

		$this->numRows = mysql_num_rows($this->rs);

	}

	function getNumRows(){

		$this->setNumRows();

		return $this->numRows;

	}

	function setInsertId(){

		$this->insert_id = mysql_insert_id();

	}

	function getInsertId(){

		$this->setInsertId();

		return $this->insert_id;

	}

}



class formControl

{

	

	function drawLogin($div,$tbheader,$trstyle,$tdstyle,$butstyle)

	{

		$login.="<form action='welcome.php' method='post'><table align='center' class='login' width='300px' cellspacing='0'><tr class='".$tbheader."'><td >ADMIN LOGIN</td><td></tr><tr><br /></tr>";

		$login.="<tr class='".$trstyle."' ><td>Username: </td><td><input type='text' name='userid'/></td></tr>";

		$login.="<tr class='".$trstyle."'><td>Password: </td><td><input type='password' name='passw' /></td></tr>";

		$login.="<tr><br /></tr><tr><td></td><td align='right'><input type='submit' value='Login' class='".$butstyle."'/></td></tr></table><form>";

		return $login;	

	}

		function drawLogin2($containerClass,$tbheader,$trstyle,$tdstyle,$butstyle)

	{

		

		$login="<div class='".$containerClass."'><div position:absolute; id='errorbox' style='text-align:center;color:red;visibility:hidden'>Loading...</div><div id=apDiv1><img src=images/lock.png /></div>

		";

		$login.="<form action='welcome.php' method='post'><table align='center' cellpadding=5 cellspacing=0 width=20% colspan=2>

		<tr class='".$tbheader."'><td class='".$tdstyle."' colspan=2>LOGIN</td></tr>";

		$login.="<tr class='".$trstyle."' ><td><div class=mediumfont >Username:</div> </td><td><input type='text' name='userid' class=bigfont onfocus=this.style.background-color=\'#FFF9B2\' /></td></tr>";

		$login.="<tr class='".$trstyle."'><td class='".$tdstyle."' colspan=2></td></tr>";

		$login.="<tr class='".$trstyle."'><td><div class=mediumfont >Password: </div></td><td><input type='password' class=bigfont name='passw' /></td></tr>";

		$login.="<tr class='".$trstyle."'><td class='".$tdstyle."' colspan=2></td></tr></table><br />";

		$login.="<center><input type='submit' value='login' class='".$butstyle."'/></center><form>";

		$login.="</div>";

		return $login;	

	}

	function singleFLogin($divclass,$tbheader,$trstyle,$tdstyle,$butstyle)

	{

		

		$login="<div class='".$divclass."'>";

		$login="<form action='welcome.php' method='post'>

		<table align='center' cellspacing='0' cellpadding='1' width='50%'>

		<tr >

			<td class='".$tbheader."' colspan='100%'>LOGIN</td><td class='".$tbheader."'></td>

		</tr>";

		$login.="<tr class='".$trstyle."'>

			<td >MAt no.</td><td colspan='100%'><input type='password' id='passw' name='passw' value='' /></td>

		</tr>";

		$login.="<tr class='".$trstyle."'>

			<td colspan='100%'><input type='button' value='Login' class='".$butstyle."' onClick=\"validateLogin(this.form)\"></td><td></td></tr>

</table><div id='msg' style=\"position:absolute;\"</div><form>";

		return $login;

	}

		

	

	function loginAs($divclass,$tbheader,$trstyle,$tdstyle,$butstyle){

		$login="<div class='".$containerClass."'><div position:absolute; id='errorbox' style='text-align:center;color:red;visibility:hidden'>Loading...</div><div id=apDiv1><img src=images/lock.png /></div>

		";

		$login.="<form action='welcome.php' method='post'><table align='center' cellpadding=5 cellspacing=0 width=20% colspan=2>

		<tr class='".$tbheader."'><td class='".$tdstyle."' colspan=2>LOGIN</td></tr>";

		$login.="<tr class='".$trstyle."' ><td><div class=mediumfont >Username:</div> </td><td><input type='text' name='userid' class=bigfont onfocus=this.style.background-color=\'#FFF9B2\' /></td></tr>";

		$login.="<tr class='".$trstyle."'><td class='".$tdstyle."' colspan=2></td></tr>";

		$login.="<tr class='".$trstyle."'><td><div class=mediumfont >Password: </div></td><td><input type='password' class=bigfont name='passw' /></td></tr>";

		

			$login.="<tr class='".$trstyle."'><td><div class=mediumfont >Login As: </div></td><td><select class=bigfont name='as'><option>Writer</option><option>Publisher</option><option>Judge</option> <select/></td></tr>";

			

		$login.="<tr class='".$trstyle."'><td class='".$tdstyle."' colspan=2></td></tr></table><br />";

		$login.="<center><input type='submit' value='login' class='".$butstyle."'/></center><form>";

		$login.="</div>";

		return $login;	

		

		}

	

		function initLogin()

		{

				$query="CREATE TABLE users";

	

			

			}

		function polls($op,$val,$contName,$id,$ds)

		{

								echo"<input type=radio id=".$id." name=".$contName." value=".$val." onclick=vote('".$id."','".$ds."') /> ".$op."<br>";

		}

			

			

		

	function populateCombo($query)

	{

		$cmbobj = new sql(DBNAME,$query);

		$cmbop='<option>--Select--</option>';

		while($row=$cmbobj->getResult())

		{

			

			$cmbop.='<option value="'.$row[0].'">'.$row[1].'</option>';

		}

		$cmbop.='<option value="other">Other...</option>';

		

	return $cmbop;

	}

	

	function validateLogin($userTable,$userid,$passw,$useridcol,$userpasswcol,$useridstatuscol)

	{

		$auth0="select ".$useridcol." from ".$userTable." where ".$useridcol."='".$userid."'";

		$auth1="select ".$useridcol.",".$userpasswcol." from ".$userTable." where ".$useridcol."='".$userid."' AND ".$userpasswcol."='".$passw."'";

	

$auth2="select ".$useridcol.",".$useridstatuscol." from ".$userTable." where ".$useridcol."='".$userid."' AND ".$useridstatuscol."='A'";





		

		//three sets of validation

		$valobj0= new Sql(DBNAME,$auth0);

		$valobj1= new Sql(DBNAME,$auth1);

		$valobj2= new Sql(DBNAME,$auth2);



		//test if username exist at all

		$nrows=$valobj0->getNumRows();

		if($nrows>0)

		$val0=1;

		else

		$val0=0;

		

		//matching valid userid and password 

		$nrows=$valobj1->getNumRows();

		if($nrows>0)

		$val1=1;

		else

		$val1=0;

		

		//test for user status

		$nrows=$valobj2->getNumRows();

		if($nrows>0)

		$val2=1; //user active

		else

		$val2=0;

		return $val0.$val1.$val2;

		

	}

function captcha()

{

$rand_name = rand(2,12);

$cimg = imagecreatetruecolor(100,40);

$rand = substr(md5(rand(-9000,-2000)),0,7);

imagestring($cimg,30,7,10,$rand,255129122);

imagejpeg($cimg,"images/capt/$rand_name.jpg",30);

imagedestroy($cimg);

$captval = $rand;

$imageloc="<img src='images/capt/$rand_name.jpg' />";

$returnvals = $imageloc.'+'.$captval;

return $returnvals;

	

}





	

}





class preventDuplicateData{

	var $mdString = '';

	var $page = '';

	var $user = '';

	var $duplicate_status = 'F';

		function preventDuplicateData($page, $userid, $conCommaString){

			$this->page = $page;

			$this->user = $userid;

			$this->mdString = md5($conCommaString);

			$sql2 = new Sql(DBNAME,"SELECT dl_pagename,dl_crypt_value FROM data_last WHERE dl_userid = '$userid'");

			$page = $sql2->getResult();

			if(($page[0] == $this->page) && ($page[1] == $this->mdString)){}

			else { 

				$rs = new Sql(DBNAME,"DELETE FROM data_last WHERE dl_userid = '$this->user'");

			}

		}

		function verifyData(){

			$sql1 = new Sql(DBNAME, "SELECT dl_pagename, dl_crypt_value FROM data_last WHERE dl_userid = '$this->user' AND dl_crypt_value = '$this->mdString' AND dl_pagename = '$this->page'");

			$rs = $sql1->getNumRows();

			if ($rs > 0){

				$this->duplicate_status = 'T';

			}		

		}

		function getDupStatus(){

			return $this->duplicate_status;

		}

		function clearData(){

			$sql2 = new Sql(DBNAME, "DELETE FROM data_last WHERE dl_userid = '$this->user'");

		}

		function dumpData(){

			$sql1 = new Sql(DBNAME, "INSERT INTO data_last VALUES ('$this->user', '$this->page', '$this->mdString')");

		}

}







class Email

{

// Login information for the ephase sms Gateway

var $from = "From: info@joggepro.com";



	function send($to,$subj,$msg)

	{

		mail("$to","$subject","$msg",$this->from);

		

	}

}



function detectAgent()

{

		$mobile_browser = '0';

	

	if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone)/i',

		strtolower($_SERVER['HTTP_USER_AGENT']))){

		$mobile_browser++;

		}

	if((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml')>0) or 

		((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))){

		$mobile_browser++;

		}

	

	$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));

	$mobile_agents = array(

		'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',

		'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',

		'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',

		'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',

		'newt','noki','oper','palm','pana','pant','phil','play','port','prox',

		'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',

		'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',

		'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',

		'wapr','webc','winw','winw','xda','xda-');

	

	if(in_array($mobile_ua,$mobile_agents))

	{

		$mobile_browser++;

	  }

	if (strpos(strtolower($_SERVER['ALL_HTTP']),'OperaMini')>0)

	{

		$mobile_browser++;

		}

	if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows')>0)

	{

		$mobile_browser=0;

		

	}

	

	

	if($mobile_browser>0)

	{

	   

	   //$agent = 'm';

	   return  'm';

	  // header('Location: http://corpersdiary.com/mobi/');

	 } 

	   else {

//		   	   $agent = 'w';

			    return  'w';

	   }

   

}

function getIp()

{

	

		if ( isset($_SERVER["REMOTE_ADDR"]) )

	{

		$ip=$_SERVER["REMOTE_ADDR"] . ' ';

	} 

	else if ( isset($_SERVER["HTTP_X_FORWARDED_FOR"]) ) 

	{

		$ip=$_SERVER["HTTP_X_FORWARDED_FOR"] . ' ';

	} 

	else if ( isset($_SERVER["HTTP_CLIENT_IP"]) ) 

	{

	$ip=$_SERVER["HTTP_CLIENT_IP"] . ' ';

	}

return $ip;

	}



function setTimeZone()

{

	date_default_timezone_set('Africa/Lagos');

}





class Sms

{

	



function SmsSend($recip,$sender,$msg) //constructor

{

	//trying to do multiple apis.

	



		

	$selapi = "select * from jg_apis where status ='1'";

	$apio = new Sql(DBNAME,$selapi);

	$apirs = $apio -> getResult();





if($apirs[34] == 1) //means xml method in use

{



$recipa = explode(',',$recip);

$noofrecip = sizeof($recipa);



//compile recips in xml form

for($i = 0; $i < $noofrecip; $i++)

	{

		 $recipstr = $recipstr."<to id='$i' pno='$recipa[$i]' />";

	}



$post_string ="<?xml version='1.0' ?><push><userid>$apirs[5]</userid><pwd>$apirs[7]</pwd><ctype>1</ctype><sender>$sender</sender><multisms><detail msgid='$i' msgtxt='$msg' siurl='NA'>".$recipstr."</detail></multisms><dlr>1</dlr><alert>0</alert></push>";





$curl_handle = curl_init();

if (!$curl_handle) {

  die('fail to initialize');

}



curl_setopt($curl_handle, CURLOPT_TIMEOUT, 30);

curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 30);



//target URL setup

curl_setopt($curl_handle, CURLOPT_URL, $apirs[3]);



//mime type setup, change if necessary

curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array("Content-Type: application/xml"));



curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($curl_handle, CURLOPT_FAILONERROR, 1);

curl_setopt($curl_handle, CURLOPT_POST, 1);



//here you assign the body of your request

curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $post_string);



$response = curl_exec($curl_handle);



if (curl_errno($curl_handle)) {

  die(curl_error($curl_handle));            

}



//printf("Received :\n%s", $response);

	



return $response.'-------'.$post_stringo;



}

	

	

else if($apirs[34] == 0)// query string in use

{

		//i need to buid the url..so let's go..

			//note..column whose value comes from user should be first.

			$build = $apirs[2].$apirs[4].'='.$apirs[5].'&'.$apirs[6].'='.$apirs[7].'&'.$apirs[8].'='.$recip.'&'.$apirs[10].'='.urlencode($sender).'&'.$apirs[12].'='.urlencode($msg); // login credentials _+ basic messgae params built

			

			//for special urls with extra params

			// other params ..testing if they exist b4 appending

			if($apirs[14] == "")

			{

				//no more params..now send

				$urltouse = $build;

			}	

			else

			{

			 $build.='&'.$apirs[14].'='.$apirs[15];

			}

			if($apirs[16] == "") 

			{

				// no more

				$urltouse = $build;

			}

			else

			{

				$build.='&'.$apirs[16].'='.$apirs[17];

			}

			if ($apirs[18] == "")

			{

				//no more parameters to append

				$urltouse = $build;

			}

			else

			{

				$build.= '&'.$apirs[18].'='.$apirs[19];	

			}

			if ($apirs[20] == "" )

			{

				//no more parameters to append

				$urltouse = $build;

			}

			else

			{

				$build.= '&'.$apirs[20].'='.$apirs[21];

			}

	//echo $build;

			

			$req =  curl_init($urltouse);

				curl_setopt($req, CURLOPT_POST, 1);

				curl_setopt($req, CURLOPT_RETURNTRANSFER, true);

				$rs = curl_exec($req);

				curl_close($req);

				return $rs;

	}

} //end of constructor







	

}// end of sms class







function gimmeCode($tablename,$idcolumn,$namecolumn,$ncvalue)

{

	$fq = "select $idcolumn from $tablename where $namecolumn ='$ncvalue'";	

	$rso = new Sql(DBNAME,$fq);

	$rs = $rso ->getResult();

	return $rs[0];

	

}



/*

function notifyBalance()

{

		$email =  gimmeCode('wp_users','user_login',$uid,'user_email');

		$phone =  gimmeCode('wp_users','user_login',$uid,'user_mobile');

		$emailnotif = gimmeCode('wp_users','user_login',$uid,'emailnotif');

		$phonenotif = gimmeCode($tablename,$user_login,$uid,'smsnotif');

		

		//$units = "select user_unitsleft from wp_users where user_login = '$uid'";

		//$un = new Sql(DBNAME,$units);

		//$unl = $un ->getResult();

		

		if (($emailnotif == 'on' ) $$ ($phonenotif == 'on'))

		{

			//send to both email and phone

			

			//sms

			

			

		}

		else if(($emailnotif != 'on' ) && ($phonenotif == 'on'))

		{

			//send to phone only

			

			//sms

		//$smso = new Sms();

		//$go = $smso->SmsSend($phone,"JoggeSMS","You have ".$unl[0]." units of messages left on Joggesms");



$unl." units of messages left on Joggesms");

			

		}

		else if (($emailnotif == 'on' ) && ($phonenotif != 'on'))

		{

			//send to email only

			

			

		}

		

}*/











function cleanString($string)

{

	$clean1 = stripslashes($string);

	$cleaned= mysql_real_escape_string($clean1);

	

	return $cleaned;

}




function currentpage() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}










?>