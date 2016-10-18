---
layout:     post
title:      "日常工作中遇到的一些片段"
date:       2016-07-29
author:     "YingxueLiu"
category:  技术
tags:
    - 技术
    - all
---
1、判断html中是否存在某个参数
	`var d = document.getElementById("talk-to-list");
	var nodeList = d.getElementsByTagName("li");
	var mycars=new Array()
	for( i = 0;i<nodeList.length;i++){
		mycars[i]=nodeList[i].innerHTML;
	}
	var vol=mycars.indexOf(UserListCtrl.nickname);`

2、修改父页面
	`window.parent.document.getElementById('user_xb_now').innerHTML = data;
	window.parent.document.getElementById('userCurrencyPanelId').innerHTML = data;`

3、改编码
	`iconv("GB2312","UTF-8//IGNORE",urldecode($remark))`

4、`scrollLeft`

5、正则表达式

[\u4e00-\u9fa5] 匹配中文字符

[^\x00-\xff]匹配双字节字符(包括汉字在内)

\n\s*\r 匹配空白行

[\w!#$%&'*+/=?^_`{|}~-]+(?:\.[\w!#$%&'*+/=?^_`{|}~-]+)*@(?:[\w](?:[\w-]*[\w])?\.)+[\w](?:[\w-]*[\w])? 匹配email地址

[a-zA-z]+://[^\s]*匹配网址url

\d{3}-\d{8}|\d{4}-\{7,8}匹配国内固定电话

[1-9][0-9]{4,}匹配腾讯QQ号

[1-9]\d{5}(?!\d)匹配中国邮政编码

^(\d{6})(\d{4})(\d{2})(\d{2})(\d{3})([0-9]|X)$匹配18位邮政编码

([0-9]{3}[1-9]|[0-9]{2}[1-9][0-9]{1}|[0-9]{1}[1-9][0-9]{2}|[1-9][0-9]{3})-(((0[13578]|1[02])-(0[1-9]|[12][0-9]|3[01]))|((0[469]|11)-(0[1-9]|[12][0-9]|30))|(02-(0[1-9]|[1][0-9]|2[0-8])))
匹配年-月-日格式

^[1-9]\d*$ 匹配正整数

^-[1-9]\d*$ 匹配负整数

^-?[1-9]\d*$ 匹配整数

^[1-9]\d*|0$ 匹配非负整数（正整数 + 0）

^-[1-9]\d*|0$ 匹配非正整数（负整数 + 0）

^[1-9]\d*\.\d*|0\.\d*[1-9]\d*$ 匹配正浮点数

^-[1-9]\d*\.\d*|-0\.\d*[1-9]\d*$ 匹配负浮点数

6、写日志

	$fp = fopen($_SERVER['DOCUMENT_ROOT']."/Lib/Game/xdjh.txt","a+"); 
	fwrite($fp, "||".$aa);
	fclose($fp);

7、`$ip=$_SERVER["REMOTE_ADDR"];`

8、路由

	tracert -d 114.114.114.114
	ipconfig/flushdns

9、post
	
	$request=$url.'&'.http_build_query($spost);
	$ch =curl_init();
	curl_setopt($ch, CURLOPT_URL, $request);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 0);
	//curl_setopt($ch, CURLOPT_POSTFIELDS, $PostArray);
	$aa = curl_exec($ch);
	curl_close($ch);

10、excel

读取excel文件
	require_once 'PHPExcel.php';
	/**对excel里的日期进行格式转化*/
	function GetData($val){
		$jd = GregorianToJD(1, 1, 1970);
		$gregorian = JDToGregorian($jd+intval($val)-25569);
		return $gregorian;/**显示格式为 “月/日/年” */
	}
	$filePath = 'test.xlsx';
	$PHPExcel = new PHPExcel();
	/**默认用excel2007读取excel，若格式不对，则用之前的版本进行读取*/
	$PHPReader = new PHPExcel_Reader_Excel2007();
	if(!$PHPReader->canRead($filePath)){
		$PHPReader = new PHPExcel_Reader_Excel5();
		if(!$PHPReader->canRead($filePath)){
			echo 'no Excel';
			return ;
		}
	}
	$PHPExcel = $PHPReader->load($filePath);
	/**读取excel文件中的第一个工作表*/
	$currentSheet = $PHPExcel->getSheet(0);
	/**取得最大的列号*/
	$allColumn = $currentSheet->getHighestColumn();
	/**取得一共有多少行*/
	$allRow = $currentSheet->getHighestRow();
	/**从第二行开始输出，因为excel表中第一行为列名*/
	for($currentRow = 2;$currentRow <= $allRow;$currentRow++){
		/**从第A列开始输出*/
	for($currentColumn= 'A';$currentColumn<= $allColumn; $currentColumn++){
		$val = $currentSheet->getCellByColumnAndRow(ord($currentColumn) - 65,$currentRow)->getValue();/**ord()将字符转为十进制数*/
		if($currentColumn == 'A'){
			echo GetData($val)."\t";
		}else{
			//echo $val;
			/**如果输出汉字有乱码，则需将输出内容用iconv函数进行编码转换，如下将gb2312编码转为utf-8编码输出*/
			echo iconv('utf-8','gb2312', $val)."\t";
		}
	}
	echo "</br>";
	}
	echo "\n";
	//excel
	//echo count($project_list);exit();
			include './Lib/ORG/Excel/PHPExcel.php';
			//创建对象
			$excel = new PHPExcel();
			//Excel表格式,这里简略写了8列
			$letter = array('A','B','C','D','E','F','F','G','H','J','K');
			//表头数组
			$tableheader = array('编号','项目组','管理平台','负责人','电话','备注','当月费用','服务器数','结算月');
			//填充表头信息
			for($i = 0;$i < count($tableheader);$i++) {
				$excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
			}
			//表格数组
			//$data = $project_list;
			//var_dump($project_list);exit();
			$length=count($project_list);
			
			foreach ($project_list as $k => $v) {
				//echo $k;
				$project_list[$k]['id']=$k+1;
				$project_list[$k]['time']=date("Y-m",$v['time']);
			}
			//var_dump($project_list);
			//exit();
			$data=$project_list;
			unset($project_list);
			for ($i = 2;$i <= count($data) + 1;$i++) {
				$j = 0;
				foreach ($data[$i - 2] as $key=>$value) {
					$excel->getActiveSheet()->setCellValue("$letter[$j]$i",PHPExcel_Cell_DataType::TYPE_STRING);
					$excel->getActiveSheet()->setCellValue("$letter[$j]$i","$value");
					$j++;
				}
			}
			//创建Excel输入对象
			$write = new PHPExcel_Writer_Excel5($excel);
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
			header("Content-Type:application/force-download");
			header("Content-Type:application/vnd.ms-execl");
			header("Content-Type:application/octet-stream");
			header("Content-Type:application/download");;
			header('Content-Disposition:attachment;filename="testdata.xls"');
			header("Content-Transfer-Encoding:binary");
			$write->save('php://output');

11、滚

	function Marquee(){
		document.getElementById('radiocontent').scrollLeft++; 
	}
	var MyMar=setInterval(Marquee,20);

12、 
