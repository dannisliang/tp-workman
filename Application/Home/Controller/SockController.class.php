<?php
namespace Home\Controller;
use Think\Controller;
class SockController extends Controller {
    public function index(){
    	$content = '你是傻子!';
    	$url = "http://localhost:2121?type=publish&to=&content=".$content;
    	$info = $this->http_curl($url); 
    	dump($info);exit;
    	$this->display();
    }

     /**
     * $urls 接口地址  $type 提交方式   $res 返回数据类型 json 或者 xml  $arr post请求参数
     */
    function http_curl($urls,$type="get",$res="json",$arr='')
    {
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$urls);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        if($type=="post")
        {
            //定义是post发送请求
            curl_setopt($ch, CURLOPT_POST,1);
            //如果是post提交数据
            curl_setopt($ch, CURLOPT_POSTFIELDS,$arr);
        }

        $output=curl_exec($ch);
        return $output;
        // var_dump($output);
        // curl_close($ch);
        // if($res=="json")
        // {
        //     if(curl_errno($ch))
        //     {
        //         //请求失败，返回错误代码
        //         return curl_errno($ch);
        //     }
        //     else
        //     {

        //         return json_decode($output,true);//把json格式转换成数组
        //     }
        // }
    }
}