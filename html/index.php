<?php
    /**
     *Tianwen Jiang
     */
                  
    // enable sessions
    session_start();
?>
<!DOCTYPE html>
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
	    	echo "已登录!";
    		echo "<a href='logout.php'>登出</a>";
	    }
	    else
	    {
	    	echo "未登录!";
	        echo "<a href='login.php'>登录</a>";
	    }
        ?>
    </body>
</html>
