<?php
  session_start();


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

  <table class="table">
    <tbody>
      <tr>
        <th scope="row">日時</th>
        <td> <?= $_SESSION['RESERVE']['reserve_time'] ?></td>
      </tr>
      <tr>
        <th scope="row">人数</th>
        <td><?= $_SESSION['RESERVE']['reserve_num'] ?>名</td>
      </tr>
      <tr>
        <th scope="row">氏名</th>
        <td colspan="2"><?= $_SESSION['RESERVE']['name'] ?></td>
      </tr>
      <tr>
        <th scope="row">メールアドレス</th>
        <td colspan="2"><?= $_SESSION['RESERVE']['email'] ?></td>
      </tr>
      <tr>
        <th scope="row">電話番号</th>
        <td colspan="2"><?= $_SESSION['RESERVE']['tel'] ?></td>
      </tr>
      <tr>
        <th scope="row">備考</th>
        <td colspan="2"><?= nl2br($_SESSION['RESERVE']['comment']) ?></td>
      </tr>
    </tbody>
  </table>

  <div class="d-grid gap-2 mx-3">
    <a class="btn btn-primary rounded-pill" href="complete.php">予約確認</a>
    <a class="btn btn-secondary rounded-pill" href="index.php" >戻る</a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>