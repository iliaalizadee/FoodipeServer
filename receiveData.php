<?php
$json= file_get_contents('php://input');
file_put_contents("Comments.txt",PHP_EOL . $json,FILE_APPEND);

echo json_encode(array('success' => true));
?>
