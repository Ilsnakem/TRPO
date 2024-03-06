<?php
$data = file_get_contents('php://input');
file_put_contents('userData.json', $data);
?>
