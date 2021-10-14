<?php
require_once('funcs.php');
$pdo = db_conn();
$id = $_GET['id'];

//２．データ登録SQL作成
//削除するSQL
$stmt = $pdo->prepare('DELETE 
                    FROM 
                        gs_bm_table 
                    WHERE 
                        id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
//->は前後スペースしない                        
$status = $stmt->execute();

//DELETE
//FROM
//テーブル名
//WHERE 場所 ＝ 値

//３．データ表示
$view = '';
if ($status == false) {
    sql_error($status);
} else {
    redirect('bm_list_view.php');
}
