http://www.cnblogs.com/lightnear/archive/2012/10/03/2710952.html更换yum源


ls *.tar.gz | xargs -n1 tar -zxvf
ln -s /dev/hda1 /dev/cdrom
mkdir /mnt/cdrom
mount /dev/cdrom /mnt/cdrom
yum -y install gcc
yum -y install gcc-c++
cd /root/lamp

tar -zxvf libxml2-2.6.30.tar.gz 
cd libxml2-2.6.30
./configure --prefix=/usr/local/libxml2
make ; make install
tar -zxvf libmcrypt-2.5.7.tar.gz 
cd /root/lamp/libmcrypt-2.5.7
./configure --prefix=/usr/local/libmcrypt
make ; make install
cd libltdl/
./configure --enable-ltdl-install
make ; make install
cd /root/lamp
tar -zxvf zlib-1.2.3.tar.gz 
cd zlib-1.2.3
CFLAGS="-O3 -fPIC" ./configure
make ; make install
cd /root/lamp
tar -zxvf libpng-1.2.31.tar.gz 
cd libpng-1.2.31
./configure --prefix=/usr/local/libpng
make ; make install
cd /root/lamp
tar -zxvf jpegsrc.v9b.tar.gz 
cd jpeg-9b/
mkdir /usr/local/jpeg9
mkdir /usr/local/jpeg9/bin
mkdir /usr/local/jpeg9/lib
mkdir /usr/local/jpeg9/include
mkdir -p /usr/local/jpeg9/man/man1
./configure --prefix=/usr/local/jpeg9 -enable-shared --enable-static
make ; make install
cd /root/lamp
tar -zxvf freetype-2.4.0.tar.gz 
cd freetype-2.4.0
因为make的时候会报make: Nothing to be done for `unix'.的错误，于是，先进入builds/unix路径configure
./configure --prefix=/usr/local/freetype上一级也要编译
然后再回到freetype-2.4.0进行make
make ; 
然后再执行mkdir /usr/local/freetype/include/freetype2/freetype/internal然后再make install
make install
cd /root/lamp
tar -zxvf gd-2.0.33.tar.gz 
cd gd-2.0.33
./configure --prefix=/usr/local/gd2 --with-jpeg=/usr/local/jpeg9 --with-freetype=/usr/local/freetype
make ; make install
cd /root/lamp
tar -zxvf autoconf-2.61.tar.gz 
cd autoconf-2.61
./configure ; make ; make install
cd /root/lamp
tar -zxvf apr-1.5.2.tar.gz 
tar -zxvf apr-util-1.5.4.tar.gz 
cp -rf apr-1.5.2  /root/lamp/httpd-2.4.23/srclib/apr
cp -rf apr-util-1.5.4  /root/lamp/httpd-2.4.23/srclib/apr-util

tar -zxvf pcre-8.00.tar.gz 
cd pcre-8.00
./configure --prefix=/usr/local/pcre ; make ;make install
tar -zxvf httpd-2.4.23.tar.gz 
cd httpd-2.4.23
在configure 的时候configure: error: pcre-config for libpcre not found. PCRE is required and available from http://pcre.org/报这个错误，但是已经安装了pcre了，
yum -y install pcre-devel
然后再configure
 'PCRE_DUPNAMES' undeclared (first use in this function)这个错误要升级pcre到最近的
cd pcre-8.21/
./configure ; make ; make install
./configure --prefix=/usr/local/apache2 --sysconfdir=/etc/httpd --with-included-apr --disable-userdir --enable-so --enable-deflate=shared --enable-expires=shared --enable-rewrite=shared --enable-static-support --with-pcre
make; make install
/etc/httpd.conf和/etc/hosts要配置一下

cd ../ncurses-5.6
./configure --with-shared --without-debug --without-ada --enable-overwrite
make ; make install


groupadd mysql
grep mysql /etc/group
useradd -g mysql mysql
grep mysql /etc/passwd
cd mysql-5.0.41
./configure --prefix=/usr/local/mysql --with-extra-charsets=all --enable-thread-safe-client
make ; make install
cp support-files/my-medium.cnf /etc/my.cnf
数据库授权表的创建
/usr/local/mysql/bin/mysql_install_db --user=mysql


chown -R root /usr/local/mysql
chown -R mysql /usr/local/mysql/var
chgrp -R mysql /usr/local/mysql

/usr/local/mysql/bin/mysqld_safe --user=mysql
/usr/local/mysql/bin/mysqld -u root进入mysql

set password for 'root'@'localhost'=password('123456');设置root密码

echo "/usr/local/apache2/bin/apachectl start" >> /etc/rc.d/rc.local将放进系统默认启动的列表里
cp /usr/local/apache2/bin/apachectl /etc/rc.d/init.d/apachectl   用service apachectl 来操作
cp /root/lamp/mysql-5.0.41/support-files/mysql.server /etc/rc.d/init.d/mysqld   用service mysqld 操作
chown root.root /etc/rc.d/init.d/mysqld 
chmod 755 /etc/rc.d/init.d/mysqld
chkconfig --add mysqld
chkconfig --list mysqld
chkconfig --levels 245 mysqld off
<!-- ln -s /usr/local/mysql/lib/mysql/libmysqlclient.15.0.0 /usr/local/mysql/libmysqlclient_r.so
ln -s /usr/local/mysql/lib/mysql/libmysqlclient.15.0.0 /usr/lib/libmysqlclient.so -->
ln -s /usr/local/mysql/bin/mysql_config /usr/local/bin/mysql_config
cd /root/lamp/php-5.2.6

在编译下面的php时，报错error: Cannot find libmysqlclient_r under /usr/local/mysql/.
Note that the MySQL client library is not bundled anymore!报错，做上面的软连没有，正在尝试新办法
卸载了mysql然后重新编译加了--enable-thread-safe-client这个参数也不用给libmysqlclient做软连了

./configure --prefix=/usr/local/php --with-config-file-path=/usr/local/php/etc --with-apxs2=/usr/local/apache2/bin/apxs --with-mysql=/usr/local/mysql/ --with-libxml-dir=/usr/local/libxml2/ --with-jpeg-dir=/usr/local/jpeg9/ --with-freetype-dir=/usr/local/freetype/ --with-gd=/usr/local/gd2/ --with-mcrypt=/usr/local/libmcrypt/ --with-mysqli=/usr/local/mysql/bin/mysql_config --enable-soap --enable-mbstring=all --enable-sockets

make ; make install


cp php.ini-dist /usr/local/php/etc/php.ini

在/etc/httpd/httpd.conf增加
addtype application/x-httpd-php .php .phtml

cd ../ZendOptimizer-3.3.3-linux-glibc23-x86_64
./install.sh

cp -a /root/lamp/phpMyAdmin-3.0.0-rc1-all-languages /usr/local/apache2/htdocs/phpmyadmin
cd /usr/local/apache2/htdocs/phpmyadmin/
cp config.sample.inc.php config.inc.php
把config.inc.php的auth_type改成http


在/usr/local/apache2/htdocs增加一个文件，测试


启动mysql的时候报错下面的错误
MySQL manager or server PID file could not be found! 
用ps aux |grep mysq*命令查看是否卡死，超过1个用kill加命令标识关掉kill 27506


为mysql添加远程访问用户
GRANT ALL PRIVILEGES ON *.* TO 'itoffice'@'%' IDENTIFIED BY 'itoffice' WITH GRANT OPTION;



httpd.conf添加
Include conf/vhost/*.conf

因为要配置Php文件
在httpd.conf添加了
<IfModule dir_module>
    <IfModule php5_module>
        DirectoryIndex index.php index.html
        <FilesMatch "\.php$">
            SetHandler application/x-httpd-php
        </FilesMatch>
        <FilesMatch "\.phps$">
            SetHandler application/x-httpd-php-source
        </FilesMatch>
    </IfModule>
</IfModule> 
#LoadModule php5_module modules/libphp5.so
报如下错误
httpd: Syntax error on line 263 of /etc/httpd/httpd.conf: Cannot load modules/libphp5.so into server: /usr/local/apache2/modules/libphp5.so: undefined symbol: unixd_config

可能是php和httpd不配套，现卸载php重装，下载的php-5.6.28希望可以管用
编译的时候报错configure: error: png.h not found.正在yum装libpng-devel

然后接着编译又报错
configure: error: Unable to find libgd.(a|so) >= 2.1.0 anywhere under /usr/local/gd2/
要升级gd库到2.1以上
./bootstrap.sh    报错aclocal   command not found 
yum -y install automake
yum -y install libtool


以上纯属扯淡，我卸了apache装的2.2.9哈哈哈哈






groupadd mysql
grep mysql /etc/group
useradd -g mysql mysql
grep mysql /etc/passwd







cd lamp
ls *.tar.gz >ls.list

FOR TAR in 'cat ls.list'
do 
	tar -zxf $TAR
done



httpd.conf
Listen *:80
User www
Group www
ServerName localhost


User daemon
Group daemon

vhost/default.conf

<VirtualHost *:80>
  ServerName 192.168.95.195
  DocumentRoot "/www/web/default"
  ErrorLog "/www/web_logs/error.log"
  CustomLog "|www/yile/cronolog-1.6.2/sbin/cronolog  /www/web_logs/access_%Y%m%d.log" combined

  <Directory /www/web/default>
    Options FollowSymLinks
    AllowOverride None
    Order allow,deny
    allow from all
  </Directory>
</VirtualHost>
