<?php
require_once(dirname(__FILE__) . "/../functions.php");

// DBに接続
$pdo = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';', DB_USER, DB_PASSWORD);
$pdo->query('SET NAMES utf8');

$year = @$_GET['year'];
$month = @$_GET['month'];

if (!$year) {
  $year = date('Y');
}

if (!$month) {
  $year = date('m');
}

// 対象年月の予約データを取得
$stmt = $pdo->prepare("SELECT * FROM reserve
WHERE DATE_FORMAT(reserve_date, '%Y%m') = :yyyymm
ORDER BY reserve_date, reserve_time");
$stmt->bindValue(':yyyymm', $year . $month, PDO::PARAM_STR);
$stmt->execute();
$reserve_list = $stmt->fetchAll();

// 年プルダウンの構築
$year_array = array();
$current_year = date('Y');
for ($i = ($current_year - 1); $i <= ($current_year + 3); $i++) {
  $year_array[$i] = $i . '年';
}

// 月プルダウンの構築
$month_array = array();
for ($i = 1; $i <= 12; $i++) {
  $month_array[sprintf('%02d', $i)] = $i . '月';
}

?>

<!doctype html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>予約リスト</title>
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

  <h1>予約リスト</h1>

  <form id="filter-form" method="GET">
    <div class="row m-3">
      <div class="col">
        <?= arrayToSelect('year', $year_array, $year) ?>
      </div>
      <div class="col">
        <?= arrayToSelect('month', $month_array, $month) ?>
      </div>
    </div>
  </form>

  <?php if (!$reserve_list): ?>
    <div class="alert alert-warning" role="alert">予約データがありません。</div>
    <?php else: ?>
  <table class="table">
    <tbody>
      <?php foreach ($reserve_list as $reserve): ?>
        <tr>
          <td>
            <?= format_date($reserve['reserve_date']) ?>
          </td>
          <td>
            <?= format_time($reserve['reserve_time']) ?>
          </td>
          <td>
            <?= $reserve['name'] ?>　<?= $reserve['reserve_num'] ?>名<br>
            <?= $reserve['email'] ?><br>
            <?= $reserve['tel'] ?><br>
            <?= mb_strimwidth($reserve['comment'], 0, 90, '...') ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script>
    $('.form-select').change(function() {
      $('#filter-form').submit();
    });
  </script>
</body>

</html>