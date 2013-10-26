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
		$articles = $this->getinfoList($sourceURL);
		return $articles;
	}

	//获取面试信息，$type 是面试，笔试，(工资,薪酬)
	function getResultList()
	{
		$sourceURL = "http://www.baidu.com/s?wd=".$this->company ."%20".$this->position."%20".$this->type;
		$articles = $this->getinfoList($sourceURL);
		$newarticles= array();
		foreach($articles as $mj)
		{
			$needle ="百度知道";
            if($this->type == "薪酬") {
                $mianshi="薪酬";
            }else{
                $mianshi="面试";
            }
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
	function getInfoList($sourceURL)
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
//        $prePos = strpos($contents,"<h3 class=\"t\"><a",0);
//        $prePos = $prePos + 15;
        $temp_str = $contents;
        $plantxt = "";
        //$prePos=0;
        $afPos=0;
        $text1="<h3 class=\"t\"><a";
        $text2="";
        $index = 1;
        //while($prePos == true && $index <=10){
        while(strpos($temp_str,$text1,0) && $index <=10){
            $item['id'] = $index;
            $prePos = strpos($temp_str,$text1,0)+15;

            $temp_str = substr($temp_str,$prePos,strlen($temp_str));
            $prePos = strpos($temp_str,"href=\"",0)+6;
            $temp_str = substr($temp_str,$prePos,strlen($temp_str));
            $afPos = strpos($temp_str,"\"",0);
            //$plantxt = $plantxt.substr($temp_str,0,$afPos);
            $item['url']  = substr($temp_str,0,$afPos);

            //取关键字
            $afPos = strpos($temp_str,"</a>",0);
            $tmp = substr($temp_str,0,$afPos);
            $prePos = strpos($tmp,"<em>",0);
            if($prePos == false){
                continue;
            }
            $prePos = $prePos +4;
            //$prePos = strpos($temp_str,"<em>",0)+4;
            $tmp = substr($tmp,$prePos,strlen($tmp));
            //$afPos = strpos($temp_str,"</a>",0);
            //$tmp = substr($temp_str,0,$afPos);
            $tmp = str_replace("<em>","",$tmp);
            $tmp = str_replace("</em>","",$tmp);
            $tmp = str_replace("<p>","",$tmp);
            $tmp = str_replace("</p>","",$tmp);

            $item['title']  = $tmp;
            $temp_str = substr($temp_str,$afPos+4,strlen($temp_str));

            $index++;
            $articles[] = $item;
        }
        //*************************************************************

//        $index = 1;
//		// Find all article blocks
//		foreach($html->find('h3') as $article) {
//            $item['id']     = $index;
//			$item['url']     = $article->find('a', 0)->href;
//			$item['title']    = $article->find('a', 0)->plaintext;
//            $index++;
//            //将em中的关键词索引取出来
//            //foreach($article->find('em') as $keyword)
//            //	$keywords[]=$keyword->plaintext;
//            //$item['keyword']=$keywords;
//            $articles[] = $item;
//        }
        return $articles;
    }
}//class end

?>
