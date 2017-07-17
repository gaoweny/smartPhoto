<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>删除图片</title>
	</head>
	<body>
		<?php

		$url = $_GET['url'];
		$url1=substr($url, 21);
		echo $url1;
		require_once 'ConnectDb.php';
		$con = connect();
		if ($con) {
			mysql_select_db("imgdb", $con);
			mysql_query("set names 'utf-8'");

		} else {
			echo mysql_errno();
		}
		$result = mysql_query("delete  from image where url='$url1'");
		if($result>0){
			echo "<html><head><meta charset='UTF-8'></head>";
				echo "<script charset='utf-8' language='javascript' type='text/javascript' >window.location.href='index.php';alert('删除成功');</script>";
		}
		?>
	</body>
</html>
