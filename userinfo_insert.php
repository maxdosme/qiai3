<?php

//  通过post获取页面提交数据信息
    $user_name = $_POST["username"];
    $sex = $_POST["sex1"];
    $phone = $_POST["myphone"];

    echo "用户：".$user_name."<br />";
    echo "性别：".$sex."<br/>";
    echo "电话：".$phone."<br/>";

    //设置服务器的连接信息
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "testdb";

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

    $sql = "INSERT INTO user (name, sex, phone)
        VALUES ('$user_name', '$sex', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "新记录插入成功";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    //  关闭数据
    $conn->close();
?>