<?php
class Account{
    public $user = 1;
    private $pwd = 2;

    //自定义的格式化输出方法 xx
    public function __toString(){
        return "当前对象的用户名是$this->user,密码是$this->user";
    }

}
$a = new Account();
echo $a;
