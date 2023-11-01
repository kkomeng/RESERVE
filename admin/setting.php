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
      <form>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">予約可能日</label>
          <select class="form-select" aria-label="Default select example">
            <option selected>0日前</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">営業時間（予約可能時間）</label>
          <div class="row">
            <div class="col-5">
              <select class="form-select" aria-label="Default select example">
                <option selected>00:00</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="col-2 text-center pt-2">～</div>
            <div class="col-5">
              <select class="form-select" aria-label="Default select example">
                <option selected>00:00</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">1時間当りの予約上限人数</label>
          <select class="form-select" aria-label="Default select example">
            <option selected>1人</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
      </form>
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