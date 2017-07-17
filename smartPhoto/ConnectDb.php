<?php
require_once 'user.php';
function connect() {
	return mysql_connect(ip, user, password);
}
?>