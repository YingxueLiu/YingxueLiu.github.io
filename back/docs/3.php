    1  init 0
    2  vim /etc/rc.local 
    3  init 0
    4  cd lamp/
    5  ls *.tar.gz | xargs -n1 tar -zxvf
    6  ln -s /dev/hda1 /dev/cdrom
    7  mkdir /mnt/cdrom
    8  mount /dev/cdrom /mnt/cdrom
    9  yum -y install gcc
   10  yum -y install gcc-c++
   11  cd libxml2-2.6.30
   12  ./configure --prefix=/usr/local/libxml2
   13  make ; make install
   14  cd ../libmcrypt-2.5.7
   15  ./configure --prefix=/usr/local/libmcrypt
   16  make ; make install
   17  cd libltdl/
   18  ./configure --enable-ltdl-install
   19  make ; make install
   20  cd /root/lamp/zlib-1.2.3
   21  CFLAGS="-O3 -fPIC" ./configure
   22  make ; make install
   23  cd ../libpng-1.2.31
   24  ./configure --prefix=/usr/local/libpng
   25  make ; make install
   26  cd ../jpeg-9b/
   27  mkdir /usr/local/jpeg9
   28  mkdir /usr/local/jpeg9/bin
   29  mkdir /usr/local/jpeg9/lib
   30  mkdir /usr/local/jpeg9/include
   31  mkdir -p /usr/local/jpeg9/man/man1
   32  ./configure --prefix=/usr/local/jpeg9 -enable-shared --enable-static
   33  make ; make install
   44  cd /root/lamp/freetype-2.4.0
   47  ./configure --prefix=/usr/local/freetype
   48  make
   49  make install
   50  cd builds/unix/
   51  ./configure --prefix=/usr/local/freetype
   52  cd ../..
   53  make
   54  mkdir /usr/local/freetype/include/freetype2/freetype/internal
   55  make install
   56  cd ../gd-2.0.33
   57  ./configure --prefix=/usr/local/gd2 --with-jpeg=/usr/local/jpeg9 --with-freetype=/usr/local/freetype
   58  make ; make install
   59  cd ../autoconf-2.61
   60  ./configure ; make ; make install
   61  cd ..
   64  cd pcre-8.21
   65  ./configure --prefix=/usr/local/pcre
   66  make ;make install
   67  yum -y install pcre-devel
   68  cd ..
   69  cp -rf apr-1.5.2 /root/lamp/httpd-2.2.9/srclib/apr
   70  cp -rf apr-util-1.5.4 /root/lamp/httpd-2.2.9/srclib/apr-util
   71  cd httpd-2.2.9
   72  ./configure --prefix=/usr/local/apache2 --sysconfdir=/etc/httpd --with-included-apr --disable-userdir --enable-so --enable-deflate=shared --enable-expires=shared --enable-rewrite=shared --enable-static-support --with-pcre
   73  make
   74  make install
   75  cd ../ncurses-5.6
   76  ./configure --with-shared --without-debug --without-ada --enable-overwrite
   77  make ; make install
   78  groupadd mysql
   79  grep mysql /etc/group
   80  useradd -g mysql mysql
   81  grep mysql /etc/passwd
   82  cd ../mysql-5.0.41
   83  ./configure --prefix=/usr/local/mysql --with-extra-charsets=all --enable-thread-safe-client
   84  make ; make install
   85  cp support-files/my-medium.cnf /etc/my.cnf
   86  /usr/local/mysql/bin/mysql_install_db --user=mysql
   87  cp /usr/local/apache2/bin/apachectl /etc/rc.d/init.d/apachectl 
   88  cp /root/lamp/mysql-5.0.41/support-files/mysql.server /etc/rc.d/init.d/mysqld 
   89  chown root.root /etc/rc.d/init.d/mysqld 
   90  chmod 755 /etc/rc.d/init.d/mysqld
   91  chkconfig --add mysqld
   92  chkconfig --list mysqld
   93  chkconfig --levels 245 mysqld off
   94  ln -s /usr/local/mysql/bin/mysql_config /usr/local/bin/mysql_config
   95  cd ../php-5.2.6
   96  ./configure --prefix=/usr/local/php --with-config-file-path=/usr/local/php/etc --with-apxs2=/usr/local/apache2/bin/apxs --with-mysql=/usr/local/mysql/ --with-libxml-dir=/usr/local/libxml2/ --with-jpeg-dir=/usr/local/jpeg9/ --with-freetype-dir=/usr/local/freetype/ --with-gd=/usr/local/gd2/ --with-mcrypt=/usr/local/libmcrypt/ --with-mysqli=/usr/local/mysql/bin/mysql_config --enable-soap --enable-mbstring=all --enable-sockets
   97  make
   98  make install
   99  cp php.ini-dist /usr/local/php/etc/php.ini
  100  cd ../ZendOptimizer-3.3.3-linux-glibc23-x86_64
  101  ./install.sh
  102  cp -a /root/lamp/phpMyAdmin-3.0.0-rc1-all-languages /usr/local/apache2/htdocs/phpmyadmin
  103  cd /usr/local/apache2/htdocs/phpmyadmin/
  104  cp config.sample.inc.php config.inc.php