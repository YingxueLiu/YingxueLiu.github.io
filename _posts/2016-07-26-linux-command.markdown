---
layout:     post
title:      "关于经常用到的linux命令备份"
date:       2016-07-26
author:     "YingxueLiu"
category:  技术
tags:
    - 技术
    - linux
---
删除缓存文件
	`rm -rf Runtime路径`
	`rm -rf Runtime路径`
只能改平台名

打包命令
	`tar cvf 包.tar 包`

停止数据库
	`service mysqld stop`


打包数据库
	`tar cvf 包.tar 包`

开启数据库
	`service mysqld start`

在新的数据库上下载
	`wget 包http路径`


解压 
	`tar xvf 包.tar 包`

属性
	`chmod -R 777 路径`
	`chown mysql:mysql 路径`

检索字符串
	`grep -rn "hello" ./`
	` find /data -name *.php | xargs grep "vip_new"`

