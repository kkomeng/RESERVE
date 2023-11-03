<?php

$err = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // POSTパラメータから各種入力値を受取る
  $reserve_date = $_POST['reserve_date'];
  $reserve_num = $_POST['reserve_num'];
  $reserve_time = $_POST['reserve_time'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $comment = $_POST['comment'];

  // 各種入力値のバリデーション
  if (!$reserve_date) {
    $err['reserve_date'] = '予約日を入力してください。';
  }

  // TODO:予約日はプルダウン設定値を決定後にバリデーション実装
  
  if (!$reserve_num) {
    $err['reserve_num'] = '人数を入力してください。';
  } else if (!preg_match('/^[0-9]+$/', $reserve_num)) {
    $err['reserve_num'] = '人数を正しく入力してください。';
  }

  //TODO:予約時間はプルダウン設定値を決定後にバリデーション実装

  if (!$reserve_time) {
    $err['reserve_time'] = '予約時間を入力してください。';
  }

  if (!$name) {
    $err['name'] = '氏名を入力してください。';
  } else if (mb_strlen($name, 'utf-8') > 20) {
    $err['name'] = '氏名は20文字以内で入力してください。';
  }

  if (!$email) {
    $err['email'] = 'メールアドレスを入力してください。';
  } else if (mb_strlen($name, 'utf-8') > 100) {
    $err['email'] = 'メールアドレスは100文字以内で入力してください。';
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $err['email'] = 'メールアドレスが不正です。';
  }

  if (!$tel) {
    $err['tel'] = '電話番号を入力してください。';
  } else if (mb_strlen($tel, 'utf-8') > 20) {
    $err['tel'] = '電話番号は20文字以内で入力してください。';
  } else if (!preg_match('/^\d{2,4}-\d{2,4}-\d{3,4}$/', $tel)) {
    $err['tel'] = '電話番号が不正です。';
  }

  if (mb_strlen($comment, 'utf-8') > 2000) {
    $err['comment'] = '備考欄は2000文字以内で入力してください。';
  }

  if (empty($err)) {
    // 各種入力値をセッション変数に保存する
    $_SESSION['RESERVE']['reserve_date'] = $reserve_date;
    $_SESSION['RESERVE']['reserve_num'] = $reserve_num;
    $_SESSION['RESERVE']['reserve_time'] = $reserve_time;
    $_SESSION['RESERVE']['name'] = $name;
    $_SESSION['RESERVE']['email'] = $email;
    $_SESSION['RESERVE']['tel'] = $tel;
    $_SESSION['RESERVE']['comment'] = $comment;

    // 予約確認画面へ遷移する
    header('Location: ./confirm.php');
    exit;
  }
}
?>

<!doctype html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ご来店予約</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Original CSS -->
  <link href="../css/style.css" rel="stylesheet">
</head>

<body>
  <header>SAMPLE SHOP</header>

  <h1>ご来店予約</h1>

  <form class="m-3" method="POST">
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">【1】 予約日を選択</label>
      <select class="form-select <?php if (isset($err['reserve_date'])) echo 'is-invalid' ?>" name="reserve_date">
        <option selected>日付</option>
        <option value="6/1">6/1</option>
        <option value="6/2">6/2</option>
        <option value="6/3">6/3</option>
      </select>
      <div class="invalid-feedback"><?= $err['reserve_date'] ?></div>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">【2】 人数を選択</label>
      <select class="form-select <?php if (isset($err['reserve_num'])) echo 'is-invalid' ?>"" name=" reserve_num">
        <option selected>人数</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <div class="invalid-feedback"><?= $err['reserve_num'] ?></div>
      </select>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">【3】予約時間を選択</label>
      <select class="form-select <?php if (isset($err['reserve_time'])) echo 'is-invalid' ?>"" name=" reserve_time">
        <option selected>時間</option>
        <option value="12:00">12:00</option>
        <option value="13:00">13:00</option>
        <option value="14:00">14:00</option>
        <div class="invalid-feedback"><?= $err['reserve_time'] ?></div>
      </select>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">【4】 予約者情報を入力</label>
      <input type="text" class="form-control <?php if (isset($err['name'])) echo 'is-invalid' ?>"" name=" name" placeholder="氏名">
      <div class="invalid-feedback"><?= $err['name'] ?></div>
    </div>
    <div class="mb-3">
      <input type="text" class="form-control <?php if (isset($err['email'])) echo 'is-invalid' ?>"" name=" email" placeholder="メールアドレス">
      <div class="invalid-feedback"><?= $err['email'] ?></div>
    </div>
    <div class="mb-3">
      <input type="text" class="form-control <?php if (isset($err['tel'])) echo 'is-invalid' ?>"" name=" tel" placeholder="電話番号">
      <div class="invalid-feedback"><?= $err['tel'] ?></div>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">【5】 備考欄</label>
      <textarea class="form-control <?php if (isset($err['comment'])) echo 'is-invalid' ?>"" name=" comment" rows="3" placeholder="備考欄"></textarea>
      <div class="invalid-feedback"><?= $err['comment'] ?></div>
    </div>

    <div class="d-grid gap-2">
      <button class="btn btn-primary rounded-pill" type="submit">確認画面へ</button>
      <button class="btn btn-secondary rounded-pill" type="button">戻る</button>
    </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>