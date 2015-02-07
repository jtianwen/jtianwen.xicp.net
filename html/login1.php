<?php require("../lib/header.php"); ?>
<?php
    require("../etc/configuration.php");
    if(isset($_POST["user"]) && isset($_POST["pass"]))
    {
        if(($connection = mysql_connect(HOST, USER, PASS))==false)
            die("无法连接数据库：".mysql_error($connection));
        if(mysql_select_db(DB, $connection) == false)
            die("无法选择数据库：".mysql_error($connection));
        $sql = sprintf("SELECT * FROM users WHERE user='%s'",
                       mysql_real_escape_string($_POST["user"]));

        $result = mysql_query($sql);
        if ($result === false)
            die("无法查询数据库：".mysql_error($connection));

        if (mysql_num_rows($result) == 1)
        {
            $row = mysql_fetch_assoc($result);
 
            // 检测密码
            if ($row["pass"] == $_POST["pass"])
            {
                // 记住登录的用户
                $_SESSION["login"] = true;

                $host = $_SERVER["HTTP_HOST"];
                $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
                header("Location: http://$host$path/index.php");
                exit;
            }
            else
            {
                echo "密码错误";
            }
        }
        else
        {
            echo "用户名不存在";
        }
    }
?>
<html>
    <head>
        <title>登录</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <table>
                <tr>
                    <td>用户名：</td>
                    <td><input name="user" type="text" /></td>
                </tr>
                <tr>
                    <td>密码：</td>
                    <td><input name="pass" type="password" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="登录" /></td>
                </tr>
            </table>
        </form>
    </body>
</html>
