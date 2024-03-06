<?php include('zzzheader.php') ?>


<link rel="stylesheet" href="styles/products.css">
<script src="scripts/products.js"></script>
<script>
 
</script>

<style>


</style>




<div class="text-center mt-5 d-flex justify-content-center gap-3" id="loading">
  <div class="spinner-border text-primary mt-5" role="status">
  </div>
  <p class="mt-5 text-primary">جار التحميل...</p>
</div>

<form action="#" onsubmit="searchProduct(event)" class="col-10 col-md-6 mx-auto mb-5 d-none" id="search-form" style="margin-top: 100px;">
  <div class="input-group rounded ">
    <input id="search-box" type="search" class="form-control " placeholder="ابحث هنا...." aria-label="Search" aria-describedby="search-addon" />
    <!-- <button class="btn btn-primary " id="search" type="submit">
      <img src="assets/icons/search.svg" class="" alt="">
    </button> -->
  </div>
</form>



<div class=" shop-content | row mt-5 container-fluid  mx-auto justify-content-center  " id="products-container">


</div>

<div class="btn-group mx-auto" role="group" id="pagination">

</div>
<nav aria-label="Page navigation  " id="pagination-wrapper">
  <ul class="pagination justify-content-center" id='pagination-list'>


  </ul>
</nav>






<?php include('zzzfooter.php') ?>