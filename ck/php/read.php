<?php

$file = fopen("../writtentext", "r") or die("NONO");
$text = "";
if (filesize("../writtentext")) {
    $text = fread($file, filesize("../writtentext"));
}
fclose($file);
$method = $_SERVER['REQUEST_METHOD'];

if ($method !== "GET") {
    http_response_code(400);
    echo json_encode([
        "code" => 400,
        "msg" => "This API will process only get requests"
    ]);
    die;
}

echo json_encode(['text' => $text]);
exit();
