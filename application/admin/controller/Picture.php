<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Image;
class Picture extends Aclcommon
{
	public function addpic(){
        // 获取表单上传文件 例如上传了001.jpg
        $files = request()->file('image');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($files){
            foreach($files as $file){
                $info = $file->validate(['size'=>3145728,'ext'=>'jpg,png,gif,jpeg'])->move(ROOT_PATH . 'public' . DS . 'uploads');
                if($info){
                	//dump($info->getInfo("name"));
                    // 成功上传后 获取上传信息
                    // 输出 jpg
                    echo "<br />".$info->getExtension()."<br />";
                    // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getSaveName()."<br />";
                    // 输出 42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getFilename()."<br />";

                    //var_dump("/public/uploads".$info->getSaveName());die;
                	$image = \think\Image::open("./public/uploads/".$info->getSaveName());
                	// 返回图片的宽度
					$width = $image->width();
					// 返回图片的高度
					$height = $image->height();
					// 返回图片的类型
					$type = $image->type();
					// 返回图片的mime类型
					$mime = $image->mime();
					// 返回图片的尺寸数组 0 图片宽度 1 图片高度
					//$size = $image->size();
					echo "宽"."$width"."高"."$height"."类型"."$type";
					$img['uid'] = session('uid');
					$img['url'] = $info->getSaveName();
					$img['width'] = $image->width();
					$img['height'] = $image->height();
					$img['type'] = $image->type();
					$img['name'] = $info->getInfo("name");
					Db::name('pubuliu')->insert($img);
                }else{
                    // 上传失败获取错误信息
                    echo $file->getError()."失败";
                }
            }
        }
        return $this->fetch("picadd");
    }
	public function index(){
		for ($i=0;$i<10;$i++){
			$res[$i] = rand(100, 400);
		}
		$this->assign('height', $res);
		return $this->fetch();
	}
	
	//获取下一栏数据
	public function getMore(){
		for ($i=0;$i<6;$i++){
			$res[$i] = rand(100, 400);
		}
		return json($res);
	}
	
	//初始化数据
	public function useDb(){
		//ASC是按id从小网大排，DESC
		$list = db::name('pubuliu')->order('id ASC')->limit(10)->select();
		$this->assign('list', $list);
		return $this->fetch("index");
	}
	
	//获取下一栏数据
	public function getDbMore(){
		$last_id = input('post.last_id');
        $map['id'] = array('GT', $last_id);
        $list = db::name('pubuliu')->where($map)->order('id ASC')->limit(3)->select();
        //如果不加判断直接return数据，会造成前台ajax无限的请求后台container，这里加了下判断，可以在前台访问数据之后，如果有数据就可以返回数据，或者再次请求，如果没有请求到数据的话就可以直接返回，不在执行，避免死循环。
        if($list){
        	return json($list);
        }else{
        	return;
        }
	}

}