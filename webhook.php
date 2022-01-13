<?php
if (!isset($_POST)) {
    exit('No post');
}
$data = json_decode(file_get_contents('php://input'), false, 5);
if ($data->ref != 'refs/heads/main' && $data->ref != 'refs/heads/master') {
    exit('Not pushed to master');
}
exec("git pull 2>&1", $output);
file_put_contents('git.log', $output, FILE_APPEND);
//var_dump($output);
