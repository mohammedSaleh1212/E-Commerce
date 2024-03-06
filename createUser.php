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
    <script src="scripts/createUser.js"></script>
    <link rel="stylesheet" href="styles/createUser.css">
    <title>انشاء حساب</title>



    <script>
    
    

 


    
    

  </script>

</head>

<body>

    <div class="col-12 col-lg-6 mt-5 mx-auto p-5 shadow-lg rounded">
        <form action="createUser.php" onsubmit="create(event)">
            <div class="mb-3">
                <label for="user_name" class="form-label">الاسم </label>
                <input type="username" class="form-control" name="user_name" id="user_name" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="email" class="form-label">البريد الالكتروني </label>
                <input type="email" class="form-control" name="emai" id="email" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="password" class="form-label">كلمة السر</label>
                <input type="password" class="form-control" id="password">
            </div>
            <div class="mb-3">
                <label for="confirm-password" class="form-label">تأكيد كلمة السر </label>
                <input type="password" class="form-control" id="confirm-password">
            </div>



            <button type="submit" id="createUser" class="btn btn-primary"> انشاء حساب</button>
        </form>
    </div>

</body>

</html>