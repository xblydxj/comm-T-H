<?php
	$link = mysqli_connect('localhost:3306','root','') or die('数据库连接失败');
	mysqli_select_db($link,'data') or die('数据库选择失败');
	mysqli_query($link,'set names utf8');
	$rs = mysqli_query($link,'select * from data');
?>
<table>

<?php
while($rows=mysqli_fetch_row($rs))
{
	echo '<tr>';
	echo '<td>'.$rows[1].'~~'.$rows[2].'~~'.$rows[3].'~~'.$rows[4].'~~'.$rows[5].'</td>';
	// echo '<td>'.$rows[2].'</td>';
	// echo '<td>'.$rows[3].'</td>';
	// echo '<td>'.$rows[4].'</td>';
	// echo '<td>'.$rows[5].'</td>';
	echo '</tr>';
}
?>
