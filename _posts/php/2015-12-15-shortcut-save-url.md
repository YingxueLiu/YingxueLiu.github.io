---
layout:     post
title:      "收藏到桌面的快捷方式"
subtitle:   "收藏到桌面的快捷方式"
date:       2015-05-28
author:     "YingxueLiu"
category:  技术
tags:
    - 技术
    - php
    - 快捷方式
---

收藏到桌面的快捷方式，使用链接：`_path_/shortcut.php?url=_url_&filename=_filename_`

    //shortcut.php
    <?php
    $url      = $_GET['url'];
    $filename = $_GET['filename'];
    $ShortCut = "
    [DEFAULT]
    BASEURL=".$url."
    [InternetShortcut]
    URL=".$url."
    Modified=B07A55D9386FCA01CA
    IconFile=_url_/favicon.ico
    IconIndex=1
    ";
    Header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=".$filename.".url;");
    echo $ShortCut; 

