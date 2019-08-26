<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    //下面这个分组的参数需要注意，比如这个 :id和 :name 这个在url中需要注意下不要轻易写参数
//     '[user]'     => [
//         'index'   => ['index/user/index', ['method' => 'get'], ['id' => '\d+']],
//         'add/:name' => ['index/user/adduser', ['method' => 'post']],
//     ],
    //新加的两个访问前台和后台的路由
    '__alias__' =>  [
        'myindex'        =>  'index/index/index',
    	'myadmin'        =>  'admin/index/index',
    ],
    

    // '__miss__'  => 'index/common/_empty',        这个不要开，基本上，如果说是在route中没有设定所有的路由路径的话，在执行一个操作或者访问一个控制器的话就会执行这个路由，直接访问index/commod/_empty这个方法。
];
