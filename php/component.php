<?php

    require_once dirname(__FILE__)."/../index.php";
    require_once ("order.php");
    // session_start();

// インプット
    function input($type,$name,$ph,$css,$readonly){

        echo "<div>
                <input type = \"$type\" name = \"$name\" class = \"m-3 form-control\" placeholder = \"$ph\" style = \" width:250px;\" style=\"$css\" $readonly>
            </div>
        ";
    }

// ボタン
    function btn($name,$fn,$class){
        echo "<div>
                <input type = \"submit\" name = \"$name\" class = \"btn btn-secondary mx-3 $class\" value=\"$fn\">
            </div>";


    }

    // 消去ボタン
    function btnDELE($name,$id,$display,$class){
        echo "
                <form action=\"\" method=\"POST\">
                    <button type=\"submit\" class=\"btn btn-info $class\" name=\"$name\" value=\"$id\">$display</button>
                <form>
        
        ";
    }

// アラート
    function alert($message){

        echo "<script> alert('$message'); </script>";

        return;
    
    }    
?>