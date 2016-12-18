<?php

$file = fopen("../writtentext", "w") or die("NONO");

$method = $_SERVER['REQUEST_METHOD'];

if ($method !== "GET") {
    http_response_code(400);
    echo json_encode([
        "code" => 400,
        "msg" => "This API will process only get requests"
    ]);
    die;
}
$text = null;

if (isset($_GET["text"])) {
    $text = $_GET["text"];
}else{
    echo json_encode(false);
    exit();
}

if ($text !== null) {
    fwrite($file, $text);
}

fclose($file);

echo json_encode(true);
exit();