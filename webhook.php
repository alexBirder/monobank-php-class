<?php

$monoData = file_get_contents('php://input');
$monoArray = json_decode($monoData, true);

// Для логгирования данных
$jsonData = json_encode($monoArray);
file_put_contents('mono.log', $jsonData);
