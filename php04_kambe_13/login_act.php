<?php
session_start();
//POST値を受け取る
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

require_once("funcs.php");
$pdo = db_conn();

//データ登録SQL作成
$stmt = $pdo->prepare('SELECT
                            *
                        FROM
                            gs_user_table
                        WHERE
                            lid = :lid
                        AND
                            lpw = :lpw;');
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();

//SQL実行時にエラーがある場合STOP
if ($status == false) {
    sql_error($stmt);
}

//抽出データ数を取得
$val = $stmt->fetch(); //1レコードだけ取得する方法


//該当レコードがあればSESSIONに値を代入
if ($val["id"] != "") {
    //Login成功時
    $_SESSION["chk_ssid"]  = session_id();
    $_SESSION["kanri_flg"] = $val['kanri_flg'];
    $_SESSION["name"]      = $val['name'];
    header('Location: select.php');
} else {
    //Login失敗時(Logout経由)
    header('Location: select2.php');
}
exit();