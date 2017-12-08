<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<section class="container">
        <?php
        //设置服务器的连接信息
        $servername = "hdm149690346.my3w.com";
        $username = "hdm149690346";
        $password = "maxdosme123";
        $dbname = "hdm149690346_db";

        // 创建连接
        $conn = new mysqli($servername, $username, $password, $dbname);
        // 检测连接
        if ($conn->connect_error) {
            die("连接失败: " . $conn->connect_error);
        }
        // 设置字符集utf-8
        if (!$conn->set_charset("utf8")) {
            printf("Error: %s\n", $conn->error);
        } else {}

       $sql = "SELECT id,name,sex,phone FROM user";
        $result = $conn->query($sql);
        if ($result) {
            if($result->num_rows>0){                                         //判断结果集中行的数目是否大于0
                while($row =$result->fetch_array() ){                        //循环输出结果集中的记录
                    echo <<< EOT
                        <div class="user_boxAll">
                            <div class="user_box">
                                <ul>
                                    <li class="">ID号:$row[0]</li>
                                    <li>客户名：$row[1]</li>
                                    <li>性别：$row[2]</li>
                                    <li>联系电话：$row[3]</li>
                                    <hr />
                                </ul>
                            </div>
                        </div>
EOT;

                    /*echo "<div class='user_id'>ID号：".($row[0])."</div>";
                    echo "<div class='user_name'>客户名：".($row[1])."</div>";
                    echo "<div class='user_sex'>性别：".($row[2])."</div>";
                    echo "<div class='user_phone'>联系电话：".($row[3])."</div>";
                    echo "<hr>";*/
                }
            }
        }else {
            echo "查询失败";
        }
        $conn->close();

        ?>
    <a href="./">网站首页</a>
</section>
<script src="js/jquery-1.8.3.min.js"></script>
<script>
    $(document).ready(function () {
        $(".user_box").each(function () {
            $(this).prependTo(".container");
        });
    })
</script>
</body>
</html>