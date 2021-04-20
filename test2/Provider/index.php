<?php
namespace rpc\Provider;

require_once './Services/UserService.php';

use rpc\Provider\Services\{
    UserService
};

$serviceName = trim($_GET['service_name']);
$actionName = trim($_GET['action_name']);

$argv = file_get_contents("php://input");

if(empty($serviceName) || empty($serviceAction)) die('params is missing');

if(!empty($argv)){
    $argv = json_encode($argv,true);
}
$result = call_user_func_array([$serviceName,$actionName],$argv);

echo json_encode($result);