---
layout:     post
title:      "日常工作中遇到的js片段"
date:       2016-07-29
author:     "YingxueLiu"
category:  技术
tags:
    - 技术
    - js
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
