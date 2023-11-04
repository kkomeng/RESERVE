<?php
require_once(dirname(__FILE__) . "/../functions.php");

session_start();
$err = array();
$complete_message = '';

// DBに接続
$pdo = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';', DB_USER, DB_PASSWORD);
$pdo->query('SET NAMES utf8');

// ショップデータを取得
$stmt = $pdo->prepare('SELECT * FROM shop WHERE id=:id');
$stmt->bindValue(':id', 1, PDO::PARAM_INT);
$stmt->execute();
$shop = $stmt->fetch();

$reservable_date_array = array();
for ($i = 0; $i <= 10; $i++) {
  $reservable_date_array[$i] = $i . '日前';
}

$time_array = array();
for ($i = 0; $i <= 23; $i++) {
  $time_array[sprintf('%02d', $i) . ':00'] = sprintf('%02d', $i) . ':00';
}

$max_reserve_num_array = array();
for ($i = 0; $i <= 10; $i++) {
  $max_reserve_num_array[$i] = $i . '人';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // 入力を取得
  $reservable_date = $_POST['reservable_date'];
  $start_time = $_POST['start_time'];
  $end_time = $_POST['end_time'];
  $max_reserve_num = $_POST['max_reserve_num'];

  // バリデーションチェック
  if (is_null($reservable_date)) {
    $err['reservable_date'] = '予約可能日を入力してください。';
  } else if (!array_key_exists($reservable_date, $reservable_date_array)) {
    $err['reservable_date'] = '予約可能日を正しく入力してください。';
  }

  if (is_null($start_time)) {
    $err['start_time'] = '営業時間（開始）を入力してください。';
  } else if (!array_key_exists($start_time, $time_array)) {
    $err['start_time'] = '営業時間（開始）を正しく入力してください。';
  }

  if (is_null($end_time)) {
    $err['end_time'] = '営業時間（終了）を入力してください。';
  } else if (!array_key_exists($end_time, $time_array)) {
    $err['end_time'] = '営業時間（終了）を正しく入力してください。';
  }

  if (is_null($max_reserve_num)) {
    $err['max_reserve_num'] = '1時間当たりの予約上限人数を入力してください。';
  } else if (!array_key_exists($max_reserve_num, $max_reserve_num_array)) {
    $err['max_reserve_num'] = '1時間当たりの予約上限人数を正しく入力してください。';
  }

  if (empty($err)) {
    $sql = "UPDATE shop SET reservable_date = :reservable_date, start_time = :start_time, end_time = :end_time, max_reserve_num = :max_reserve_num WHERE id = :id LIMIT 1;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':reservable_date', $reservable_date, PDO::PARAM_INT);
    $stmt->bindValue(':start_time', $start_time, PDO::PARAM_STR);
    $stmt->bindValue(':end_time', $end_time, PDO::PARAM_STR);
    $stmt->bindValue(':max_reserve_num', $max_reserve_num, PDO::PARAM_INT);
    $stmt->bindValue(':id', $shop['id'], PDO::PARAM_INT);
    $stmt->execute();

    $complete_message = '登録が完了しました。';
  }
} else {
  $reservable_date = $shop['reservable_date'];
  $start_time = format_time($shop['start_time']);
  $end_time = format_time($shop['end_time']);
  $max_reserve_num = $shop['max_reserve_num'];
}
?>

<!doctype html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>設定</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <!-- Original CSS -->
  <link href="../css/style.css" rel="stylesheet">
</head>

<body>
  <header class="navbar">
    <div class="container-fluid">SAMPLE SHOP
      <div class="navbar-brand"></div>
      <form class="d-flex">
        <a href="reserve_list.php" class="mx-3"><i class="bi bi-list-task nav-icon"></i></a>
        <a href="setting.php"><i class="bi bi-gear nav-icon"></i></a>
      </form>
    </div>
  </header>

  <h1>設定</h1>

  <form class="card" method="POST">
    <div class="card-body">
      <?php if ($complete_message): ?>
        <div class="alert alert-success" role="alert">
          <?= $complete_message ?>
        </div>
      <?php endif; ?>

      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">予約可能日</label>
        <?php
        $class = 'form-select';
        if (isset($err['reservable_date'])) {
          $class .= ' is-invalid';
        }
        ?>
        <?= arrayToSelect('reservable_date', $reservable_date_array, $reservable_date, $class) ?>
        <div class="invalid-feedback">
          <?= $err['reservable_date'] ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">営業時間（予約可能時間）</label>
        <div class="row">
          <div class="col-5">
            <?php
            $class = 'form-select';
            if (isset($err['start_time'])) {
              $class .= ' is-invalid';
            }
            ?>
            <?= arrayToSelect('start_time', $time_array, $start_time, $class) ?>
            <div class="invalid-feedback">
              <?= $err['start_time'] ?>
            </div>
          </div>
          <div class="col-2 text-center pt-2">～</div>
          <div class="col-5">
            <?php
            $class = 'form-select';
            if (isset($err['end_time'])) {
              $class .= ' is-invalid';
            }
            ?>
            <?= arrayToSelect('end_time', $time_array, $end_time, $class) ?>
            <div class="invalid-feedback">
              <?= $err['end_time'] ?>
            </div>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">1時間当りの予約上限人数</label>
        <?php
        $class = 'form-select';
        if (isset($err['max_reserve_num'])) {
          $class .= ' is-invalid';
        }
        ?>
        <?= arrayToSelect('max_reserve_num', $max_reserve_num_array, $max_reserve_num, $class) ?>
        <div class="invalid-feedback">
          <?= $err['max_reserve_num'] ?>
        </div>
      </div>
      <div class="d-grid gap-2 my-3">
        <button type="submit" class="btn btn-primary rounded-pill">登録</button>
      </div>
    </div>
  </form>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>