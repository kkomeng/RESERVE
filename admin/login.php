<!doctype html>
<html lang="ja">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <!-- Original CSS -->
  <link href="../css/style.css" rel="stylesheet">

  <title>予約システムログイン</title>
</head>

<body>
  <header>SAMPLE SHOP</header>

  <h1>予約システムログイン</h1>

  <form class="card text-center" method="POST" action="reserve_list.php">
    <div class="card-body">
      <form>
        <div class="mb-3">
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ID">
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="PASSWORD">
        </div>
      </form>
      <div class="d-grid gap-2 my-3">
        <button type="submit" class="btn btn-primary rounded-pill">ログイン</button>
      </div>
    </div>
  </form>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>