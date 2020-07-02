<?php

require_once ("php/order.php");
require_once ("php/component.php");
?>

<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Hello, world!</title>
  </head>
  <!-- ======================================================================================== -->
  <body>
    <div id="daimei">
        <h1 class="text-center mb-0 pt-5 pb-3">Gathering ENGLISH</h1>
        <hr class="mt-0 mx-3">
    </div>

    <div id="form" class="form-group d-flex justify-content-center my-5">
        <form method="POST" action="">
            <div id="input" class="d-flex flex-column justify-content-center">
                <div class="text-center text-secondary m-3"><h2 id="enw">単語を入力</h2></div>
                <?php input("text","id","番号","","readonly");?>
                <?php input("text","en","英単語","","");?>
                <?php input("text","ja","日本語","","");?>  
            </div>
            <div id="btn" class="d-flex flex-row justify-content-around">

                <?php btn("add","追加",""); ?>
                <?php btn("da","全消去","m-1"); ?>

            </div>
        </form>
    </div>
<!-- ============================================================= -->
<!-- form this table -->
<hr class="my-5 mx-5 bg-light">
<h3 id="knownwords" class="text-center my-5">覚えてる単語</h3>

<div class="row mx-auto d-flex justify-content-sm-center my-5">
    <div id="table" class="col-5">
        <table class="table">
            <thead class="text-center">
                <tr>
                    <th>番号</th>
                    <th>英単語</th>
                    <th>日本語</th>
                    <th>消去</th>
                    <th>理解</th>
                </tr>
            </thead>
            <tbody id="tbody" class="text-center">
                <!-- if(ポストされたアッドがあれば){
                    変数　＝　テーブルの全データ
                    if(テーブルデータがあれば){
                        while(変数　＝　テーブル内の配列作成){
                            それぞれのthに配列の中の要素を当てはめていく
                        }

                    }
                } -->
                <?php
                    if(isset($_POST['add']) || isset($_POST['edit']) || isset($_POST['sub']) || isset($_POST['ud']) || isset($_POST['delete'])){
                        $dataT = getTableData();

                        if($dataT){
                            while($rows = mysqli_fetch_assoc($dataT)){
                                if($rows['underS'] === "2"){
                                ?>
                                <tr class="bg-info p-2">
                                    <td data-id="<?php echo $rows['id']; ?>"><?php echo $rows['id']; ?></td>
                                    <td data-id="<?php echo $rows['id']; ?>"><?php echo $rows['english']; ?></td>
                                    <td data-id="<?php echo $rows['id']; ?>"><?php echo $rows['japanese']; ?></td>
                                    <td><?php
                                        $kame = $rows['id'];
                                        btnDELE("delete",$kame,"消去","bg-dark");?>
                                    </td>
                                    <td><?php
                                        btnDELE("ud",$kame,"understand","bg-dark");?>
                                    </td>
                                </tr>
                                <?php }else{?>
                            
                                <tr >
                                    <td data-id="<?php echo $rows['id']; ?>"><?php echo $rows['id']; ?></td>
                                    <td data-id="<?php echo $rows['id']; ?>"><?php echo $rows['english']; ?></td>
                                    <td data-id="<?php echo $rows['id']; ?>"><?php echo $rows['japanese']; ?></td>
                                    <td><?php
                                        $kame = $rows['id'];
                                        btnDELE("delete",$kame,"消去","");?>
                                    </td>
                                    <td><?php
                                        btnDELE("ud",$kame,"don't understand","");?>
                                    </td>
                                </tr>
                            <?php
                                }
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="php/main.js"></script>
  </body>
</html>