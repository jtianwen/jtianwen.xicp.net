<?php require("../lib/header.php"); ?>

<html>
    <head>
        <title>首页</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
        <h1>hello, world!(你好，世界！)</h1>
        <?php
	    if($_SESSION['login'])
	    {
	    	echo "已登录!<br />";
		echo "<a href='logout.php'>登出</a>";
	    }
	    else
	    {
	    	echo "未登录!<br /><br />";
	    }
        ?>
	<b>登录方式：</b>
	<ul>
	    <li><a href="login1.php">版本 1</a></li>
	    <li><a href="login2.php">版本 2</a></li>
	    <li><a href="login3.php">版本 3</a></li>
	    <li><a href="login4.php">版本 4</a></li>
	</ul>
    </body>
</html>
