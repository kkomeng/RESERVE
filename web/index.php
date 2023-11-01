<!doctype html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ご来店予約</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Original CSS -->
  <link href="../css/style.css" rel="stylesheet">
</head>

<body>
  <header>SAMPLE SHOP</header>

  <h1>ご来店予約</h1>

  <form class="m-3" method="POST" action="confirm.php">
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">【1】 予約日を選択</label>
      <select class="form-select" aria-label="Default select example">
        <option selected>日付</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">【2】 人数を選択</label>
      <select class="form-select" aria-label="Default select example">
        <option selected>人数</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">【3】予約時間を選択</label>
      <select class="form-select" aria-label="Default select example">
        <option selected>時間</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">【4】 予約者情報を入力</label>
      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="氏名">
    </div>
    <div class="mb-3">
      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="メールアドレス">
    </div>
    <div class="mb-3">
      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="電話番号">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">【5】 備考欄</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="備考欄"></textarea>
    </div>

    <div class="d-grid gap-2">
      <button class="btn btn-primary rounded-pill" type="submit">確認画面へ</button>
      <button class="btn btn-secondary rounded-pill" type="button">戻る</button>
    </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>