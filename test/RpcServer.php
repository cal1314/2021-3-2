<?php
/**
 * user : chenjj
 * createTime: 2021/4/14
 * Description: Rpc服务端
 */
class RpcServer{

    private $params = [
        'host' => '', //ip地址，列出来的目的是为了友好看出来此变量中存储的信息
        'port' => '', //端口
        'path' => '' //服务目录
    ];

    private $config = [
        'real_path' =>'',
        'max_size'  =>2048 //最大接受数据大小
    ];
    private $server = null;

    public function __construct($params)
    {
        $this->check();
        $this->init($params);
    }
    private function check(){
        $this->serverPath();
    }
    private function init($params){
        //将传递过来的参数初始化
        $this->params = $params;
        //创建tcpsocket 服务
        $this->createServer();
    }
    private function createServer(){
        $this->server = stream_socket_server("tcp://{$this->params['host']}:{$this->params['port']}",$errno,$errstr);
    }
    public function serverPath(){
        $path = $this->params['path'];
        $realPath = realpath(__DIR__.$path);
        if($realPath === false || !file_exists($realPath)){
            exit("{$path} error!");
        }
        $this->config['real_path'] = $realPath;
    }
    public static function instance($params) {
        return new RpcServer($params);
    }
    public function run(){
        while(true){
            $client = stream_socket_accept($this->server);
            if($client){
                echo "有新连接\n";
                $buf = fread($client,$this->config['max_size']);
                print_r('接收到的原始数据'.$buf."\n");
                //自定义协议目的是拿到类方法和参数（可改成自己定义的）
                $this->parseProtocol($buf,$class,$method,$params);
                //执行方法
                $this->execMethod($client,$class,$method,$params);
                //关闭客户端
                fclose($client);
            }
        }
    }
    private function execMethod($client,$class,$method,$params){
        if($class && $method){
            //首字母转大写
            $class = ucfirst($class);
            $file = $this->params['path']."/".$class.'.php';
            //判断文件是否存在，如果有，则引入文件
            if(file_exist($file)){
                require_once $file;
                //实例化类，并调用客户端指定的方法
                $obj = new $class();
                //如果有参数，则传入指定参数
                if(!$params){
                    $data = $obj->$method();
                }else{
                    $data = $obj->$method($params);
                }
                //打包数据
                $this->packProtocol($data);
                //把运行后的结果返回给客户端
                fwrite($client,$data);
            }else{
                fwrite($client,'class or method error');
            }
        }
    }
    private function parseProtocol($buf,&$class,&$method,&$params){
        $buf = json_decode($buf,true);
        $class = $buf['class'];
        $method = $buf['method'];
        $params = $buf['params'];
    }
    private function packProtocol(&$data){
        $data = json_encode($data,JSON_UNESCAPED_UNICODE);
    }
}
RpcServer::instance([
    'host' => '127.0.0.1',
    'port' => 8888,
    'path' => './api'
])->run();

