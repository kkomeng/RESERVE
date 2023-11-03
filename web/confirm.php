<?php
require_once 'functions.php';

session_start();

// 予約確定ボタンが押された場合の処理
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // セッションに入力情報が取得する
  if (isset($_SESSION['RESERVE'])) {
    $reserve_date = $_SESSION['RESERVE']['reserve_date'];
    $reserve_num = $_SESSION['RESERVE']['reserve_num'];
    $reserve_time = $_SESSION['RESERVE']['reserve_time'];
    $name = $_SESSION['RESERVE']['name'];
    $email = $_SESSION['RESERVE']['email'];
    $tel = $_SESSION['RESERVE']['tel'];
    $comment = $_SESSION['RESERVE']['comment'];

    //TODO:予約が確定可能かどうか最終チェック

    // DBに接続
    $pdo = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST.';',DB_USER,DB_PASSWORD);
    $pdo->query('SET NAMES utf8;');

    // reserveテーブルにINSERT
    $stmt = $pdo->prepare('INSERT INTO reserve (reserve_date, reserve_time, reserve_num, name, email, tel, comment) VALUES (:reserve_date, :reserve_time, :reserve_num, :name, :email, :tel, :comment)');
    $stmt->bindValue(':reserve_date', $reserve_date, PDO::PARAM_STR);
    $stmt->bindValue(':reserve_time', $reserve_time, PDO::PARAM_STR);
    $stmt->bindValue(':reserve_num', $reserve_num, PDO::PARAM_INT);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
    $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
    $stmt->execute();

    // 予約者にメール送信
    $from = 'From: Web予約システムReserve <'. ADMIN_EMAIL .'>';

    $view_reserve_date = format_date($reserve_date);

    $subject = 'ご予約が確定しました。';
    $body = <<<EOT
    {$name}様

    以下の内容でご予約を承りました。

    ご予約内容
    [日時]{$view_reserve_date} {$reserve_time}
    [人数]{$reserve_num}人
    [氏名]{$name}
    [メールアドレス]{$email}
    [電話番号]{$tel}
    [備考]{$comment}

    ご来店をお待ちしております。
    EOT;

    //TODO:メール送信テストはサーバー上で実装
    //mb_send_mail($email, $subject, $body, $from);

    // 予約が正常に完了したらセッションのデータをクリアする
    unset($_SESSION['RESERVE']);

    // DBから切断
    unset($pdo);

    // 予約完了画面の表示
    header('Location: ./complete.php');
    exit;

  } else {
    // セッションからデータが取得出来ない場合はエラー
    //TODO: エラー処理
  }
}
?>

<!doctype html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>予約内容確認</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Original CSS -->
  <link href="../css/style.css" rel="stylesheet">
</head>

<body>
  <header>SAMPLE SHOP</header>

  <h1>予約内容確認</h1>

  <form method="POST">
    <table class="table">
      <tbody>
        <tr>
          <th scope="row">日時</th>
          <td>
            <?= format_date($_SESSION['RESERVE']['reserve_date']) ?>
            <?= $_SESSION['RESERVE']['reserve_time'] ?>
          </td>
        </tr>
        <tr>
          <th scope="row">人数</th>
          <td>
            <?= $_SESSION['RESERVE']['reserve_num'] ?>名
          </td>
        </tr>
        <tr>
          <th scope="row">氏名</th>
          <td colspan="2">
            <?= $_SESSION['RESERVE']['name'] ?>
          </td>
        </tr>
        <tr>
          <th scope="row">メールアドレス</th>
          <td colspan="2">
            <?= $_SESSION['RESERVE']['email'] ?>
          </td>
        </tr>
        <tr>
          <th scope="row">電話番号</th>
          <td colspan="2">
            <?= $_SESSION['RESERVE']['tel'] ?>
          </td>
        </tr>
        <tr>
          <th scope="row">備考</th>
          <td colspan="2">
            <?= nl2br($_SESSION['RESERVE']['comment']) ?>
          </td>
        </tr>
      </tbody>
    </table>

    <div class="d-grid gap-2 mx-3">
      <button class="btn btn-primary rounded-pill" type="submit">予約確認</button>
      <a class="btn btn-secondary rounded-pill" href="index.php">戻る</a>
    </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>