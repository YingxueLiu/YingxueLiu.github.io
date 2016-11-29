  <?php
  271  ln -s /dev/hda1 /dev/cdrom
  274  mount /dev/cdrom /mnt/cdrom
  281  yum -y install gcc
  285  yum -y install gcc-c++
  291  service httpd status
  298  ps -le|grep selinux
  299  ps -le|grep iptable
  300  vi /etc/sysconfig/selinux
  301  vi /etc/sysconfig/iptable
  302  vi /etc/sysconfig/iptables
  303  vi /etc/sysconfig/iptables-config
  304  touch test.sh
  305  vi test.sh
  306  sh -x test.sh
  307  ls
  308  cat test.sh
  309  ls
  310  cd autoconf-2.61
  311  ls
  312  ls -la
  313  vi configure
  314  cd ..
  315  ls
  316  cd /root/lamp
  317  cd libxml2-2.6.30
  318  ls
  319  ./configure --help
  320  ./configure --prifix=/usr/local/libxml2
  321  ./configure --prefix=/usr/local/libxml2
  322  make
  323  make install
  324  ls -l /usr/local/libxml2
  325  ls -l /usr/local/libxml2/bin
  326  cd ..
  327  ls
  328  cd /root/lamp/libmcrypt-2.5.7
  329  ./configure --prefix=/usr/local/libmcrypt
  330  make
  331  make install
  332  cd ..
  333  ls /usr/local/libmcrypt/
  334  ls
  335  cd libmcrypt-2.5.7
  336  cd libltdl/
  337  ls
  338  ./configure --enable-ltdl-install
  339  make
  340  make install
  341  cd ../../
  342  ls
  343  cd zlib-1.2.3
  344  ls
  345  ./configure
  346  make
  347  make install
  348  history
  349  cd ..
  350  cd libpng-1.6.26
  351  ./configure --prefix=/usr/local/libpng
  352  make
  353  make install
  354  rm -rf /usr/local/libpng
  355  ls /usr/local
  356  cd ..
  357  ls
  358  rm -rf libpng-1.6.26
  359  tar -zxvf libpng-1.6.26.tar.gz 
  360  ls
  361  cd libpng-1.6.26
  362  ls
  363  ./configure --prefix=/usr/local/libpng
  364  make 
  365  rm -rf /usr/local/libpng
  366  cd ..
  367  rm -rf libpng-1.6.26
  368  ls
  369  tar -zxvf libpng-1.2.31.tar.gz 
  370  cd libpng-1.2.31
  371  ls
  372  ./configure --prefix=/usr/local/libpng
  373  make
  374  cd ..
  375  rm -rf libpng-1.2.31
  376  rm -rf /usr/local/libpng
  377  ls /usr/local/include
  378  rm -f /usr/local/include/zlib.h 
  379  ls -l /usr/local/lib
  380  rm -f /usr/local/lib/libz.a 
  381  ls -l /usr/local/share/man/man3
  382  rm -f /usr/local/share/man/man3/zlib.3 
  383  cd zlib-1.2.3
  384  ls
  385  CFLAGS="-O3 -fPIC" ./configure
  386  make
  387  make install
  388  ls
  389  cd ..
  390  ls
  391  tar -zxvf libpng-1.2.31.tar.gz 
  392  cd libpng-1.2.31
  393  ./configure --prefix=/usr/local/libpng
  394  make
  395  make install
  396  cd ..
  397  ls
  398  cd jpeg-9b/
  399  mkdir /usr/local/jpeg9
  400  mkdir /usr/loal/jpeg9/bin
  401  mkdir /usr/local/jpeg9/bin
  402  mkdir /usr/local/jpeg9/lib
  403  mkdir /usr/local/jpeg9/include
  404  mkdir-p /usr/local/jpeg9/man/man1
  405  mkdir -p /usr/local/jpeg9/man/man1
  406  ./configure --prefix=/usr/local/jpeg9 -enable-shared --enable-static
  407  make
  408  make install
  409  cd ..
  410  ls
  411  cd freetype-2.4.0
  412  ./configure --prefix=/usr/local/freetype
  413  make
  414  make install
  415  cd ..
  416  cd autoconf-2.61
  417  ./configure ; make ; make install
  418  cd ..
  419  ls
  420  cd gd-2.0.33
  421  ls
  422  ./configure --prefix=/usr/local/gd2 --with-jpeg=/usr/local/jpeg9 --with-freetype=/usr/local/freetype
  423  make ; make install
  424  cd ..
  425  ls
  426  cd httpd-2.4.23
  427  ls
  428  ./configure --prefix=/usr/local/apache2 --sysconfdir=/etc/httpd --with-included-apr --disable-userdir --enable-so eenable-deflate=shared --enable-expires=shared --enable-rewrite=shared --enable-static-support
  429  ./configure --prefix=/usr/local/apache2 --sysconfdir=/etc/httpd --with-included-apr --disable-userdir --enable-so -enable-deflate=shared --enable-expires=shared --enable-rewrite=shared --enable-static-support
  430  cd ..
  431  tar -zxvf apr-1.5.2.tar.gz 
  432  tar -zxvf apr-util-1.5.4.tar.gz 
  433  cd /usr/local/httpd
  434  ls /usr/loca
  435  ls /usr/local
  436  cd httpd-2.4.23
  437  cd ..
  438  cp -rf apr-1.5.2  /root/lamp/httpd-2.4.23/srclib/apr
  439  cp -rf apr-util-1.5.4  /root/lamp/httpd-2.4.23/srclib/apr-util
  440  cd httpd-2.4.23
  441  ./configure --prefix=/usr/local/apache2 --sysconfdir=/etc/httpd --with-included-apr --disable-userdir --enable-so -enable-deflate=shared --enable-expires=shared --enable-rewrite=shared --enable-static-support
  442  make ; make install
  443  make
  444  cd ..
  445  tar -zxvf pcre2-10.22.tar.gz 
  446  cd pcre2-10.22
  447  ./configure
  448  make
  449  make install
  450  cd ../httpd-2.4.23
  451  ./configure --prefix=/usr/local/apache2 --sysconfdir=/etc/httpd --with-included-apr --disable-userdir --enable-so -enable-deflate=shared --enable-expires=shared --enable-rewrite=shared --enable-static-support
  452  ./configure --help
  453  ./configure --help|grep pcre
  454  ./configure --prefix=/usr/local/apache2 --sysconfdir=/etc/httpd --with-included-apr --disable-userdir --enable-so --enable-deflate=shared --enable-expires=shared --enable-rewrite=shared --enable-static-support --with-pcre
  455  cd ..
  456  history
  457  ps -le|grep mysql
  458  netstat -an|grep 3306
  459  cd /root/lamp
  460  ls
  461  /usr/local/mysql/bin/mysqla
  462  /usr/local/mysql/bin/mysqladmin
  463  /usr/local/mysql/bin/mysql -u root
  464  ls
  465  cd php-5.2.6
  466  ./configure --prefix=/usr/local/php --with-cnfig-file-path=/usr/local/php/etc --with-apxs2=/usr/local/apache2/bin/apxs --with-mysql=/usr/local/mysql --with-libxml-dir=/usr/local/libxml2 --with-jpeg-dir=/usr/local/jpeg9 --with-freetype-dir=/usr/local/freetype --with-gd=/usr/local/gd2 --with-mcrypt=/usr/local/libmcrypt --with-mysqli=/usr/local/bin/mysql_config --enable-soap --enable-mbstring=all -enable-sockets 
  467  ./configure --prefix=/usr/local/php --with-config-file-path=/usr/local/php/etc --with-apxs2=/usr/local/apache2/bin/apxs --with-mysql=/usr/local/mysql --with-libxml-dir=/usr/local/libxml2 --with-jpeg-dir=/usr/local/jpeg9 --with-freetype-dir=/usr/local/freetype --with-gd=/usr/local/gd2 --with-mcrypt=/usr/local/libmcrypt --with-mysqli=/usr/local/bin/mysql_config --enable-soap --enable-mbstring=all -enable-sockets
  468  cd /usr/local/mysql/lib/mysql
  469  ls
  470  ln -s libmysqlclient.so.15.0.0 libmysqlclient_r.so
  471  cd /root/lamp/php-5.2.6
  472  ./configure --prefix=/usr/local/php --with-config-file-path=/usr/local/php/etc --with-apxs2=/usr/local/apache2/bin/apxs --with-mysql=/usr/local/mysql --with-libxml-dir=/usr/local/libxml2 --with-jpeg-dir=/usr/local/jpeg9 --with-freetype-dir=/usr/local/freetype --with-gd=/usr/local/gd2 --with-mcrypt=/usr/local/libmcrypt --with-mysqli=/usr/local/bin/mysql_config --enable-soap --enable-mbstring=all -enable-sockets
  473  cd /usr/local/mysql
  474  ls -l|grep mysql_config
  475  ln -s /usr/local/mysql/bin/mysql_config /usr/local/bin/mysql_config
  476  cd /root/lamp/php-5.2.6
  477  ./configure --prefix=/usr/local/php --with-config-file-path=/usr/local/php/etc --with-apxs2=/usr/local/apache2/bin/apxs --with-mysql=/usr/local/mysql --with-libxml-dir=/usr/local/libxml2 --with-jpeg-dir=/usr/local/jpeg9 --with-freetype-dir=/usr/local/freetype --with-gd=/usr/local/gd2 --with-mcrypt=/usr/local/libmcrypt --with-mysqli=/usr/local/bin/mysql_config --enable-soap --enable-mbstring=all -enable-sockets
  478  make ; make install
  479  cp php.ini-dist /usr/local/php/etc/php.ini
  480  vi /etc/httpd/httpd.conf
  481  cd ..
  482  /usr/local/apache2/bin/apachectl restart
  483  echo "/usr/local/lib">>/etc/ld.so.conf
  484  idconfig
  485  ldconfig
  486  /usr/local/apache2/bin/apachectl restart
  487  /usr/local/apache2/bin/apachectl restart
  488  ls -l /usr/local/apache2/modules/libphp5.so 
  489  vi /usr/local/apache2/modules/libphp5.so 
  490  cd /usr/local/apache2/
  491  ls -l|grep lib
  492  ls -l|grep libphp
  493  ps -le|grep selinux
  494  vi /etc/linux/config
  495  history
