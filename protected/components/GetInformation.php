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
		$html = file_get_html($sourceURL);
        $index = 1;
		// Find all article blocks
		foreach($html->find('h3') as $article) {
            $item['id']     = $index;
			$item['url']     = $article->find('a', 0)->href;
			$item['title']    = $article->find('a', 0)->plaintext;
            $index++;
            //将em中的关键词索引取出来
            //foreach($article->find('em') as $keyword)
            //	$keywords[]=$keyword->plaintext;
            //$item['keyword']=$keywords;
            $articles[] = $item;
        }
        return $articles;
    }
}//class end

?>
