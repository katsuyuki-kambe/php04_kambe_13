<?php
require_once('funcs.php');

$name = $_POST['name'];
$salary = $_POST['salary'];
$money = $_POST['money'];
$email = $_POST['email'];
$meetdate = $_POST['meetdate'];
$text = $_POST['text'];
$id = $_POST['id'];

$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE
                        gs_bm_table
                    SET
                        name = :name,
                        salary = :salary,
                        money = :money,
                        email = :email,
                        meetdate = :meetdate,
                        text = :text,
                        datetime = sysdate()
                    WHERE
                        id = :id;");

                        

//UPDATE
 //テーブル
// SET
  //場所 = 値

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':salary', $salary, PDO::PARAM_INT);
$stmt->bindValue(':money', $money, PDO::PARAM_INT);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':meetdate', $meetdate, PDO::PARAM_STR);
$stmt->bindValue(':text', $text, PDO::PARAM_STR);
$stmt->bindValue(':id', $id,PDO::PARAM_INT); 
$status = $stmt->execute(); //実行


//４．データ登録処理後
if ($status == false) {
    //*** function化する！******\
   sql_error($stmt);
} else {
    //*** function化する！*****************
   redirect('index.php');
}