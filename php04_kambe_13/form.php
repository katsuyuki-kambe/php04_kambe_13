<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>申請画面</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        .menu {
            background-color: yellow;
            font-size: 70px;
            color: black;
            font-weight: bold;
            text-align: center;
        }

        li {
            list-style: none;
        }

        div {
            padding: 10px;
            font-size: 16px;
        }

    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
    <div class="menu">
        <h3 class="menu">menu</h3>
    </div>
    </header>
    <!-- Main[Start] -->

    <P>※正確に入力お願いします。</P>

    <form method="POST" action="insert.php">
        <div class="jumbotron">
         <li>お名前: <input type="text" name="name"></li>
         <li>昨年度の年収（万円）: <input type="number" name="salary"></li>
         <li>申請希望金額（万円）: <input type="number" name="money"></li>
         <li>EMAIL: <input type="text" name="email"></li>
         <li>連絡可能希望日: <input type="date" name="meetdate"></li>
         <li>備考入力欄: <textarea name="text" rows="4" cols="40"></textarea></li>
         <li><input type="submit" value="送信"></li>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>