<?php 
header("Content-Type:text/html; charset=utf-8");  
include 'simple_html_dom.php';

Class GetInformation{
	public $company;
	public $position;
	//获取公司信息
	function getCompanyIntro()
	{
		$sourceURL = "http://www.baidu.com/s?wd=site%3Abaike.baidu.com+".$this->company;
		$articles = $this->getinfoList($sourceURL);
		return $articles[0];
	}

	//获取面试信息，$type 是面试，笔试，(工资,薪酬)
	function getResultList($company,$position,$type)
	{
		$sourceURL = "www.baidu.com/s?wd="+$company+" "+$position+" "+$type;
		$articles = getinfoList($sourceURL);
		$newarticles= array();
		foreach($articles as $mj)
		{
			$needle ="百度知道";
			$mianshi="面试";
			//1.百度知道的URL从结果中剔除；--扩展，类似百度知道这样的网站
			//如果是百度知道的网址，则不加入
			if(strpos($mj['title'],$needle)===false)
			{	
				if(strpos($mj['title'],$mianshi)!==false&&strpos($mj['title'],$position)!==false)
					$newarticles[]=$mj;
			}
		}
		return $newarticles;
	}

	//获取百度的第一页列表
	function getInfoList($sourceURL)
	{
		// Create DOM from URL
		$html = file_get_html($sourceURL);

		// Find all article blocks
		foreach($html->find('h3') as $article) {
			$item['url']     = $article->find('a', 0)->href;
			$item['title']    = $article->find('a', 0)->plaintext;
	
            //将em中的关键词索引取出来
            //foreach($article->find('em') as $keyword)
            //	$keywords[]=$keyword->plaintext;
            //$item['keyword']=$keywords;
            $articles[] = $item;
            return $articles;
        }
    }
}//class end

?>
