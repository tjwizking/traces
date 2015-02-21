<?php

include_once('class/class.php');

$table = 'rf_checkinCounter_'.date("m_d_y_H_i_s");

$qw = "CREATE TABLE `$table` (`id` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, `checkins` CHAR(5) NOT NULL, `checkinTime` CHAR(20) NOT NULL,  `elaspedtime` CHAR(9) NOT NULL  ) COLLATE='latin1_swedish_ci';";

$q = new Sql(DBNAME,$qw);

//phpinfo();
$i = 0; 
while($_POST[timestp.$i])
{
 $et = $_POST['timestp'.$i];
 $spi = explode("_",$et);

$q = new Sql (DBNAME,"insert into `$table` (checkinTime,elaspedtime) value('$spi[0]','$spi[1]')");
$i++;
}


echo "$i records exported Sucessfully!";

mysql_close();

?>