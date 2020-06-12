<?php

function connect_to_db()
{
    $dbn = 'mysql:dbname=gsacf_l03_01;charset=utf8;
        port=3306;
        host=localhost';
    $user = 'root';
    $pwd = '';

    try {
  // ここでDB接続処理を実行する
  // $pdo = new PDO($dbn, $user, $pwd);
    return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
  // DB接続に失敗した場合はここでエラーを出力し，以降の処理を中止する
  // echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit('DBError:' .$e->getMessage());
    }
}


function check_session_id(){

if (!isset($_SESSION['session_id']) ||
$_SESSION['session_id']!=session_id()) {
header('Location: login.php'); // ログイン画面へ移動
} else {
session_regenerate_id(true); // セッションidの再生成
$_SESSION['session_id'] = session_id(); // セッション変数に格納
}  

};
