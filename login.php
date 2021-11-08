<?php
// DBの環境変数を定義
$host = '127.0.0.1:3306';
$username = 'root';
$passwd = 'root';
 
// DBへ接続
$db_conn = mysqli_connect($host, $username, $passwd);

//DBの選択
mysqli_select_db($db_conn,'test_db');

//POSTデータの値を変数に入れる
$user_id = $_POST['user_id'];
$passwd = $_POST['passwd'];

$sql="SELECT user_id,passwd FROM users WHERE user_id='$user_id' AND passwd='$passwd';";
$result=mysqli_query($db_conn,$sql);

if(mysqli_num_rows($result)!=0){
  # ログイン成功したらこちら
  echo "login success";
}else{
  # ログイン失敗したら最初のページに戻る
  $url = '/';
  header('Location: ' . $url, true, 301);
}
mysqli_close($db_conn);
exit;
?>