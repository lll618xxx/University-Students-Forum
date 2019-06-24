<?php 
namespace Api\Controller;
use Think\Controller;

/*user中的U一定要大写，否则会报错*/
class InfoController extends BaseController{
	// arid -> detail
	
	/**
	 * [获取热点信息]
	 * @param [type] $[name] [description]
	 */
	public function getArticleList(){
		// $data = $_GET;
		$cgid  = I('cgid');
		$field = I('field');
		$sort  = I('sort');
		$p     = I('p', 1);
		$limit = I('limit', 20);
		$map['status'] = 1;
		$other;

		if ($cgid) {
			$map['cgid'] = $cgid;
			$list = M("article")->where($map)->page($p, $limit)->order(array($field=>$sort))->select();
			$other['totalPage'] = ceil(M("article")->where($map)->count()/$limit);
		}
		else{
			$list = M("article")->where($map)->order('readnum desc')->limit(15)->select();
		}
		
		foreach ($list as $k=>$value){
			$list[$k]['date']     = timestamp_to_date($value['time']);
			$list[$k]['datetime'] = timestamp_to_datetime($value['time']);
		}
		$this->ajaxReturn(array('status' => 1, 'data' => $list, 'other' => $other));
	}

	/**
	 * [获取指定文章]
	 * @return [type] [description]
	 */
	public function getArticle(){
		$arid = I('arid');
		$map['arid'] = $arid;
		$article = M("article");

		$result = $article->where($map)->find();
		$data['readnum'] = $result['readnum'] + 1;
		$status = $article->where($map)->save($data);

		$result['date'] = timestamp_to_date($result['time']);
		$result['datetime'] = timestamp_to_datetime($result['time']);
		$this->ajaxReturn(array('status' => 1, 'data' => $result ));
	}

	/**
	 * [提交文章]
	 * @return [type] [description]
	 */
	public function postArticle(){
		$data 		  	 = $_POST;
		$data['time'] 	 = time();
		$data['readnum'] = 0;
		$status = M("article")->add($data);
		if($status)
        	$this->ajaxReturn(array('status' => $status,'info' => '提交成功'));
    	else
        	$this->ajaxReturn(array('status' => $status,'info' => '提交失败'));

	}

	// 测试用
	public function deleteArticle(){
		$map['arid'] = 13;
		$result = M("article")->where($map)->delete();
		echo($result);
	}

	// 测试用
	public function insertData(){
		$value['promulgator'] 	= 	'翔哥仔';
		$value['category']  	= 	'新闻分享';
		$value['cgid'] 			= 	4;
		$value['title']   		= 	'新闻分享新闻分享新闻分享新闻分享';
		$value['time'] 			= 	time();
		$value['readnum']   	= 	80;
		$value['status'] 		= 	1;
		$value['content'] 		= 	'<p><span style="font-weight: bold; font-size: x-large;">30年来，深圳从一个小渔村，发展成为世界级的大都市，这其中也诞生了很多知名的民营企业，比如华为、腾讯、万科等，华为靠着“全球通讯业巨头”名号而闻名全球，腾讯靠着“中国社交霸主”为用户所知，万科靠着“王石花边新闻”成吃瓜群众谈资。</span></p><p><span style="font-weight: bold; font-size: x-large;"><br></span></p><p><span style="font-weight: bold; font-size: x-large;">之前，大家都说华为的营收是BAT三家之和，印象中应该是最赚钱的了吧，但实际上，深圳还有一家低调的金融业霸主，业务涉及银行、保险、财险、互联网金融等业务，是名副其实的金融业巨头，2017年营收达到了9745.7亿元，它就是中国平安。</span></p><p><span style="font-weight: bold; font-size: x-large;"><br></span></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img src="http://p3.pstatp.com/large/pgc-image/153503830142610832e10ed" style="max-width:100%;"><span style="font-weight: bold; font-size: x-large;"><br></span></p><p><br></p><p><span style="font-size: large; font-family: 宋体; font-weight: bold;">根据7月公布的财富《2018年世界500强》名单，中国平安位列第29名，是深圳第一大企业。8月21日，中国平安公布2018上半年财报，公司实现营运利润593.39亿元，净利润580.95亿元，等于是日赚3.2亿，不比中国移动、中国工商银行等企业差。</span></p><p><span style="font-size: large; font-family: 宋体; font-weight: bold;">同在深圳的华为上半年运营利润455亿元，腾讯净利润425.53亿，万科净利润91.2亿元，也就是深圳最赚钱的公司是中国平安，而不是华为，净利润是腾讯的一倍多，是万科6倍多。网友们集体惊叹：华为都比不过，还是搞金融赚钱啊。</span></p><p><span style="font-size: large; font-family: 宋体; font-weight: bold;">不得不说，深圳民营经济发达，在《2018年世界500强》名单中，除了中国平安，还有华为、正威国际集团、招商银行、恒大集团、腾讯、万科上榜，是广东省入榜最多的城市。</span></p><p><span style="font-size: large; font-family: 宋体; font-weight: bold;"><br></span></p><p><span style="font-size: x-large;">1、中国平安</span></p><p><span style="font-size: x-large;">今年是中国平安成立30周年，1988年，平安保险公司挂牌成立，只有招商局和中国工商银行两个股东，其中工行持股51%，招商局持股49%，32岁的马明哲被任命为平安保险总经理，没有任何股份。</span></p><p><span style="font-size: x-large;"><br></span></p><p><span style="font-size: x-large;">后来，中国平安股东经过多次变化，股权变得很分散。目前单一最大股东是泰国正大集团，深圳市政府的持股平台深圳投资控股公司是第二大股东。这两家股东持有的股份比例分别为9.3%和5.3%。马明哲说中国平安没有控股股东，也没有实际控制人。</span></p><p><span style="font-size: x-large;"><br></span></p><p><span style="font-size: x-large;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><img src="http://p99.pstatp.com/large/pgc-image/1535038301478d51eff7dca" style="font-size: 12px; max-width: 100%;"></p><p><br></p><p><br></p><p><span style="font-size: large;">马明哲三十年如一日，几乎每天都工作13到15个小时，而且永远带着强烈的危机感推动创新，中国平安从418万的营收，打造成了一艘金融行业的巨轮缔造了一个5.77万亿的金融帝国。</span></p><p><span style="font-size: large;"><br></span></p><p><span style="font-size: large;">马明哲出生在广东湛江，算是“红二代”。父亲是“四野”的干部，吉林蛟河人，随军征战一路南下，直至打下海南岛后，转业到广东省公安厅，再到湛江地区公安系统担任领导职务。马明哲继承了父亲坚毅不服输的军人性格，敢闯敢干、敢为天下先，正式这种性格，让他带领中国平安经历多少挫折都不怕。</span></p><p><span style="font-size: large;"><br></span></p><p><span style="font-size: large;">当然，马明哲和平安的成功，离不开“蛇口之父”袁庚的帮助。袁庚是深圳蛇口工业区的创建者，当时，马明哲就担任蛇口工业区社会保险公司副经理，中国平安就是在他的支持下成立的。坊间一直有传说，马明哲当过袁庚的司机，实际上并没有，但袁庚可以称得上是马明哲的人生伯乐和导师。</span></p><p><span style="font-size: large;"><br></span></p><p><span style="font-size: large;">虽然马明哲后来通过股份改造拥有了一点点平安股份，但是更引起争议是他的年薪。早在2007年，马明哲的薪酬就达到了6616.1万元，折合每天薪酬为18.12万元。</span></p>';


		$status = M("article")->add($value);
		echo($status);
	}

	public function gettime(){
		echo(timestamp_to_date('1535273796000'));
		echo(timestamp_to_datetime('1535273796000'));
	}
}

?>