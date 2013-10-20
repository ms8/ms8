<?php 
header("Content-Type:text/html; charset=utf-8");  
include 'simple_html_dom.php';

Class GetInformation{
	public $company;
	public $position;
	//获取公司信息
	function getCompanyIntro()
	{
		//$sourceURL = "http://www.baidu.com/s?wd=site%3Abaike.baidu.com+".$this->company;
		//$articles = $this->getinfoList($sourceURL);
        $articles = $this->getResultList($this->company,$this->position,"面试");
		return $articles[0];
       // return $articles;
	}

	//获取面试信息，$type 是面试，笔试，(工资,薪酬)
	function getResultList($company,$position,$type)
	{
		$sourceURL = "http://www.baidu.com/s?wd=".$company."+".$position."+".$type;
        //$sourceURL = "http://www.baidu.com/s?wd=".$this->company;
		$articles = $this->getinfoList($sourceURL);
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
        $stime=microtime(true); //获取程序开始执行的时间
		$html = file_get_html($sourceURL);
        $etime=microtime(true);//获取程序执行结束的时间
        $total=$etime-$stime;   //计算差值
		// Find all article blocks
		foreach($html->find('h3') as $article) {
			$item['url']     = $article->find('a', 0)->href;
			$item['title']    = $article->find('a', 0)->plaintext;
	
            //将em中的关键词索引取出来
            //foreach($article->find('em') as $keyword)
            //	$keywords[]=$keyword->plaintext;
            //$item['keyword']=$keywords;
            $articles[] = $item;
        }
        //usleep(3000*1000);
        $etime=microtime(true);//获取程序执行结束的时间
        $total=$etime-$stime;   //计算差值
        echo $total;
        return $articles;
    }
}//class end

?>
