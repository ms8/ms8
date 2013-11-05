<?php 
header("Content-Type:text/html; charset=utf-8");  
include 'simple_html_dom.php';

Class GetInformation{
    public $id;
	public $company;
	public $position;
    public $type;

	//获取公司信息
	function getCompanyIntro()
	{
		$sourceURL = "http://www.baidu.com/s?wd=site%3Abaike.baidu.com+".$this->company;
		$articles = $this->getinfoList($sourceURL,"0",5);
		return $articles;
	}

	//获取面试信息，$type 是面试，笔试，(工资,薪酬)
	function getResultList()
	{
		$sourceURL = "http://www.baidu.com/s?wd=".$this->company ."%20".$this->position."%20".$this->type;
        $mianshi = "";
        $type="";
        if($this->type == "薪酬") {
            $mianshi="薪酬";
            $type = "1";
        }else if($this->type == "面试"){
            $mianshi="面试";
            $type = "2";
        }else if($this->type == "笔试"){
            $mianshi="笔试";
            $type = "3";
        }
		$articles = $this->getinfoList($sourceURL,$type,10);
		$newarticles= array();
		foreach($articles as $mj)
		{
			$needle ="百度知道";
			//1.百度知道的URL从结果中剔除；--扩展，类似百度知道这样的网站
			//如果是百度知道的网址，则不加入
			if(strpos($mj['title'],$needle)===false && strpos($mj['title'],$this->position)!==false)
			{
                if(isset($this->type)&& $this->type == "薪酬" && (strpos($mj['title'],"待遇")!==false || strpos($mj['title'],"待遇")!==false ||
                    strpos($mj['title'],"工资")!==false || strpos($mj['title'],"收入")!==false)){
                    $newarticles[]=$mj;
                }elseif(strpos($mj['title'],$mianshi)!==false){
                    $newarticles[]=$mj;
                }
			}
		}
		return $newarticles;
	}

	//获取百度的第一页列表
	function getInfoList($sourceURL,$type,$n)
	{
		// Create DOM from URL
		//$html = file_get_html($sourceURL);

        //*************************************************************
        $contents = file_get_contents($sourceURL, false, null, -1);
        if (empty($contents) || strlen($contents) > MAX_FILE_SIZE)
        {
            return null;
        }
        //匹配解析
        $temp_str = $contents;
        $plantxt = "";
        $afPos=0;
        //百度结果列表的开始标志
        $text1="<h3 class=\"t\"><a";
        $text2="";
        $index = 1;
        while(strpos($temp_str,$text1,0) && $index <=$n){
            $item['id'] = $index;
            $prePos = strpos($temp_str,$text1,0)+15;
            //从开始标志往后截取
            $temp_str = substr($temp_str,$prePos,strlen($temp_str));
            //寻找url
            $prePos = strpos($temp_str,"href=\"",0)+6;
            $temp_str = substr($temp_str,$prePos,strlen($temp_str));
            $afPos = strpos($temp_str,"\"",0);
            $item['url']  = substr($temp_str,0,$afPos);

            //取关键字，关键字一定是在<a>..</a>这对标志之内
            $afPos = strpos($temp_str,"</a>",0);
            $tmp = substr($temp_str,0,$afPos);
            $prePos = strpos($tmp,"<em>",0);
            if($prePos == false){
                continue;
            }
            $prePos = $prePos +4;
            $tmp = substr($tmp,$prePos,strlen($tmp));
            $tmp = str_replace("<em>","",$tmp);
            $tmp = str_replace("</em>","",$tmp);
            $tmp = str_replace("<p>","",$tmp);
            $tmp = str_replace("</p>","",$tmp);

            $item['title']  = $tmp;
            $item['type'] = $type;
            $temp_str = substr($temp_str,$afPos+4,strlen($temp_str));

            $index++;
            $articles[] = $item;
        }
        //*************************************************************
        return $articles;
    }
}//class end

?>
