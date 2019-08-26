<?php
namespace app\index\validate;

use think\Validate;

class Login extends Validate
{
    protected $rule = [
        'name'  =>  'require|max:25',
        'password' =>  'require|max:20',
    ];

}