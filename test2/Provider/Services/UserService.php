<?php
namespace rpc\Provider\Services;

class UserService{

    public static function getUserInfo( int $uid ):array
    {
        return [
            'id' => $uid,
            'user_name' => 'jack_' . $uid,
        ];
    }
}