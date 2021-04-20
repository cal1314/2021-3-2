<?php
class Client{

    private $serviceUrl;

    private $serviceName;

    private $rpcConfig = [
        'UserService' => 'http://127.0.0.1:8081',
    ];

    public function __construct($serviceName)
    {
        if(array_key_exists($serviceName,$this->rpcConfig)){
            $this->serviceUrl = $this->rpcConfig[$serviceName];
            $this->serviceName = $serviceName;
        }
    }
    public function __call($actionName,$arguments){
        $content = json_decode($arguments);
        $options['http'] = [
            'timeout' => 5,
            'method'  => 'POST',
            'header'  => 'Content-type',
            'content' => $content,
        ];
        //创建资源流上下文
        $context = stream_context_create($options);
        $get = [
            'service_name' => $this->serviceName,
            'action_name' => $actionName
        ];
        $serviceUrl = $this->serviceUrl."?".http_build_query($get);
        $result = file_get_contents($serviceUrl,false,$context);

        return json_decode($result,true);
    }
}
$userService = new Client('UserService');
$result = $userService->getUserInfo(random_int(1,10));

