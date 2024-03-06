<?php
session_start();
if (isset($_SESSION["isOkay"]) && $_SESSION["isOkay"] == 1) {
} else {
  header("Location: login.php");
  exit();
}
?>


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
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <link rel="stylesheet" href="styles/zzzheader.css">

  <script src="assets/script.js"></script>
  <script src="scripts/zzzheader.js"></script>
  <link rel="stylesheet" href="styles/zzzheader.css">
  <title> my shop</title>

</head>

<body>

  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">MY Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
            <li class="nav-item">
              <a class="nav-link position-relative" aria-current="page" href="index.php">الصفحة الرئيسية <img src="assets/icons/house-door.svg" alt=""></a>

            </li>
            <li class="nav-item">
              <a class="nav-link" href="products.php">المنتجات <img src="assets/icons/bag.svg" alt=""></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link " href="aboutUs.php">
                معلومات عنا
                <img src="assets/icons/info-square.svg" alt="">
              </a>

            </li>
            <?php 
            if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1){
              echo'
           
              
              <li class="nav-item dropdown">
                <a class="nav-link " href="manage.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  الاعدادات
                  <img src="assets/icons/gear.svg" alt="">
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="insertProducts.php">اضافة منتج <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-bag" viewBox="0 0 16 16">
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                      </svg></a></li>
                  <li><a class="dropdown-item" href="deleteProducts.php">حذف منتج <img src="assets/icons/x-circle.svg" alt=""></a></li>
                  <li><a class="dropdown-item" href="updateProducts.php">تعديل منتج <img src="assets/icons/wrench-adjustable-circle.svg" alt=""> </a></li>
                </ul>
              </li>
 
              
              ';
            }

            
            ?>



          </ul>


          <div class="box">
            <div class="cart-count"></div>
            <icon name="cart" id="cart-icon" onclick="document.querySelector('.cart').classList.toggle('cart-active')">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#3071a9" class="bi bi-cart-fill" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
              </svg>
              <!-- <img src="assets/icons/cart4.svg" alt=""> -->
            </icon>
          </div>

          <div class="cart">
            <div class="cart-title">عناصر السلة </div>
            <div class="cart-content">

            </div>

            <div class="total ">
              <div class="total-title">المبلغ الاجمالي : </div>
              <div class="total-price ms-1">   0 ل.س  </div>
            </div>

            <button class="btn-buy">Place Order</button>

            <ion-icon name="close" id="cart-close" onclick="document.querySelector('.cart').classList.remove('cart-active')"><img src="assets/icons/x-circle.svg" alt=""></ion-icon>

          </div>








          <button id="logout" class="btn btn-danger" type="button" onclick="Logout()">تسجيل الخروج</button>

        </div>
      </div>
    </nav>







  </header>
  <h1><?php 
  echo $_SESSION["isAdmin"];
  
  ?></h1>