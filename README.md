# yaz_cmd_php
## Requires 
* `php`

* [http://zoom.z3950.org/bind/php/](http://zoom.z3950.org/bind/php/)
  * [https://www.indexdata.com/resources/software/phpyaz/](https://www.indexdata.com/resources/software/phpyaz/)
  * [pecl.php.net/package/yaz](pecl.php.net/package/yaz)
    * requires `pecl` (e.g. `apt-get install php-dev`)
    * `pecl install yaz`  (or php-yaz?)

* needs libyaz from yaz toolkit
  * [https://www.indexdata.com/resources/software/yaz/](https://www.indexdata.com/resources/software/yaz/)
  * [http://ftp.indexdata.dk/pub/yaz/yaz-5.27.1.tar.gz](http://ftp.indexdata.dk/pub/yaz/yaz-5.27.1.tar.gz)
    * `./buildconf.sh`
    * `./configure`
    * `make`
    * `sudo make install`
  * or
    * `./buildconf.sh`
    * `./configure --prefix=$HOME/myapps`
    * `make`
    * `make install`
    * ...
    * Add `export PATH="$HOME/myapps/bin:$PATH"` to `.bashrc`
    * (Reload file with `source ~/.bashrc`

## Usage
`php yaz_cmd_php.php <host> <port> <databaseName> <user> <password> <syntax> <query>`  
`php yaz_cmd_php.php --test <number_from_1-5>`  
Syntax is either `MAB`or `USMARC`  
Query in pqf format  
