<?php
require_once('funcs.php');
$pdo = db_conn();
$id = $_GET['id'];

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id =' . $id . ';');
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status == false) {
    sql_error($status);
} else {
    $row = $stmt->fetch(); 
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>申請一覧</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">データ登録</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->

    <form method="POST" action="bm_update.php">
        <div class="jumbotron">
        <li>お名前: <input type="text" name="name"></li>
         <li>昨年度の年収（万円）: <input type="number" name="salary"></li>
         <li>申請希望金額（万円）: <input type="number" name="money"></li>
         <li>EMAIL: <input type="text" name="email"></li>
         <li>連絡可能希望日: <input type="date" name="meetdate"></li>
         <li>備考入力欄: <textarea name="text" rows="4" cols="40"></textarea></li>
        </div>
    </form>




    <!-- Main[End] -->

</body>

</html>