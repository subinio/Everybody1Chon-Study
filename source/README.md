# 웹서버 설정

```md
cd Apache24\conf\httpd.conf

파일에서
```

```md
DocumentRoot "${SRVROOT}/htdocs"
<Directory "${SRVROOT}/htdocs">

위의 코드를 
```

```md
DocumentRoot "${SRVROOT}/htdocs/Project_1chon"
<Directory "${SRVROOT}/htdocs/Project_1chon">

로 수정
```

```md
<IfModule dir_module>
    DirectoryIndex index.html
</IfModule>

 을 아래와 같이 바꿔준다.

<IfModule dir_module>
    DirectoryIndex php/Index/home.php
</IfModule>
```