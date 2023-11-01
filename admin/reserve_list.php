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

  <div class="row m-3">
    <div class="col">
      <select class="form-select" aria-label="Default select example">
        <option selected>2022年</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>
    <div class="col">
      <select class="form-select" aria-label="Default select example">
        <option selected>1月</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>
  </div>

  <table class="table">
    <tbody>
      <tr>
        <td>1/1(土)</td>
        <td>12:00</td>
        <td>テスト太郎 4名<br>
          XXX@XXX.xxx<br>
          111-111-1111<br>
          概要欄に記載された文面・・・・・・・</td>
      </tr>
      <tr>
        <td>1/1(土)</td>
        <td>12:00</td>
        <td>テスト太郎　4名<br>
          XXX@XXX.xxx<br>
          111-111-1111<br>
          概要欄に記載された文面・・・・・・・</td>
      </tr>
      <tr>
        <td>1/1(土)</td>
        <td>12:00</td>
        <td>テスト太郎　4名<br>
          XXX@XXX.xxx<br>
          111-111-1111<br>
          概要欄に記載された文面・・・・・・・</td>
      </tr>
    </tbody>
  </table>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>