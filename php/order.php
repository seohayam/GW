<?php

    require_once ("component.php");
    require_once ("DB.php");
    session_start();

    $con = creatDB();   //データベース作成　これをグローバルにする
    // 追加
    if(isset($_POST['add'])){
        add();
    }
    // 消去
    if(isset($_POST['delete'])){
        delete();
    }
    // 全消去
    if(isset($_POST['da'])){
        deleteAll();
    }
    // 分からなかった
    if(isset($_POST['ud'])){
        ud();
    }
// ===============情報追加====================================
function add(){

    $inputEn = inputValue("en");
    $inputJa = inputValue("ja");

    $sql = "INSERT INTO words (japanese,english)
            VALUES ('$inputJa','$inputEn')";

    if($inputEn && $inputJa){
        if(mysqli_query($GLOBALS['con'],$sql)){
            alert("インサート成功");
        }else{
            alert("インサート失敗");
        }
    }
}

//消去
function delete(){
    $id = $_POST['delete'];

    $sql = "DELETE FROM words WHERE `id` = '$id'";

    if(mysqli_query($GLOBALS['con'],$sql)){
        alert("消去しました");
    }else{
        alert("消去できませんでした");
    }


}

//テーブルデータ全部
function getTableData(){

    $sql = "SELECT * FROM words";
    $result = mysqli_query($GLOBALS['con'],$sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }


}

// =============文字最適化==================================
    function inputValue($inputed){

        $escapeS = mysqli_real_escape_string($GLOBALS['con'],$_POST[$inputed]);
        if($escapeS){
            return $escapeS;
        }else{
            echo "wrong";
        }

    }

//全消去
function deleteAll(){
    $sql = "DROP TABLE IF EXISTS words";

    $result = mysqli_query($GLOBALS['con'],$sql);

    if($result){
        alert("全消去完了");
        creatDB();
    }else{
        alert("消去出来ませんでした");
    }
    
}

// 消す

    function displayNone($id){
        echo "<script>
            $('$id').addClass('none');
        </script>";
    }

// 分からなかった所

    function ud(){
        $id = $_POST['ud'];
        $sql = "SELECT * FROM words WHERE id=$id";
        $result = mysqli_query($GLOBALS['con'],$sql);  
        $rows = mysqli_fetch_assoc($result);

        if($rows['underS'] === '1'){
            $sql = "UPDATE words SET underS='2' WHERE id= '$id'";
            if(mysqli_query($GLOBALS['con'],$sql)){
                // alert("覚えられてないに登録");
            }else{
                alert("覚えてないリストに登録失敗");
            }
        }else if($rows['underS'] === "2"){
            $sql = "UPDATE words SET underS='1' WHERE id= '$id'";
            if(mysqli_query($GLOBALS['con'],$sql)){
                // alert("覚えたね！");
            }else{
                alert("覚えたリストに登録失敗");
            }
        }else{
            alert("error");
        }






    }