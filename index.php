<?php include('zzzheader.php') ?>
<style>
  @keyframes left {
  from { 
    transform: translate(54%,0%);
  }
  to { transform: translate(0%,0%);}
}
  body {
    background-image: url('images/hero4.png');
    background-repeat: no-repeat;
    background-size: cover;
  }



  .animation1 {
    font-size: 60px;
    animation-name: left;
    animation-duration: 1s;
    animation-fill-mode: backwards;
  }
  .animation2 {
    animation-name: left;
    animation-delay: 1s;
    animation-duration: 1s;
    animation-fill-mode: backwards;
  }
  .animation3 {
    animation-name: left;
    animation-duration: 1s;
    animation-fill-mode: backwards;
    animation-delay: 2s;
  }

  .text-red {
    color: #800000;
  }

  .dropdown-menu li:hover {
    transition: 0.4s ease;
    margin-right: 5px;


  }
</style>








<div class="container-fluid py-5 " style="height: 100vh;">
  <div class=" position-relative">
    <!-- <h1 class="mt-5 position-absolute top-50 start-50 translate-middle"> اهلا بكم شرفتونا</h1> -->
    <div class="head fs-1 fs-lg-3 ps-0 ps-lg-5 mt-5">
      <h2 class=" animation1  text-primary text-center text-md-start d-none d-md-block ">عروض خاصة <div class="">على كافة منتجاتنا</div>
      </h2>
      <p class="animation2 text-red fs-2 text-center text-md-start mt-5 d-none d-md-block">حسومات تصل الى 70%</p>
      <div class="animation3 position-relative mt-5 ms-5 d-none d-md-block ">


        <a href="products.php" class=" bg-transparent text-black" role="button"> <button class="btn btn-primary fs-1">تسوق الان</button></a>
        
         
        
      </div>


    </div>

  </div>
 
</div>







<?php 
// include('zzzfooter.php')
 ?>