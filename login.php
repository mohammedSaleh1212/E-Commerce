<!doctype html>
<html lang="ar" dir="rtl">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/style.css">
  <script src="assets/script.js"></script>
  <script src="scripts/login.js">
  <title>تسجيل الدخول</title>



   
  </script>

</head>

<body>
  <h1 class="text-center  mt-5 text-primary font-italic">MY SHOP</h1>

  <div class="col-12 col-lg-6 mt-5 mx-auto p-5 shadow-lg rounded">
    <form action="login.php" onsubmit="Login(event)">
      <div class="mb-3">
        <label for="email" class="form-label">البريد الالكتروني  </label>
        <input type="email" class="form-control"  id="email" aria-describedby="emailHelp">

      </div>
      <div class="mb-3">
        <label for="password" class="form-label">كلمة السر</label>
        <input type="password" class="form-control" id="password">
      </div>

      <button type="submit" id="login" class="btn btn-primary">تسجيل الدخول
        <div class="spinner-border text-white d-none" id="spinner" role="status" style="width:20px;height:20px;">
          <span class="visually-hidden">Loading...</span>
        </div>
      </button>
      <div class="mt-3 ">ليس لديك حساب؟ <a href="createUser.php" class="color-primary pe-auto text-decoration-none">انشاء حساب</a></div>
    </form>
  </div>


</body>

</html>