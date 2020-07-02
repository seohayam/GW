<?php

    function creatDB(){

        $host       ="localhost";
        $user       ="root";
        $password   ="root";

        $con = mysqli_connect($host,$user,$password);


        if(!$con){
            die("接続失敗");
        }

        $dbName = "GatheringE";

        $sql = "CREATE DATABASE IF NOT EXISTS $dbName";
        if(mysqli_query($con,$sql)){
            $con = mysqli_connect($host,$user,$password,$dbName);
            $sql = "CREATE TABLE IF NOT EXISTS words(
                        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        japanese VARCHAR (25) NOT NULL,
                        english VARCHAR (20) NOT NULL,
                        underS INT NOT NULL DEFAULT 1
                        );
            ";
            if(mysqli_query($con,$sql)){
                // echo "テーブル作成成功";
                return $con;
            }else{
                alert("テーブル作成失敗");
            }
        }else{
            alert("データベース作成失敗");
        }


    }
    






?>