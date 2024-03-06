<?php
include('zzzheader.php');
?>
<script src="scripts/insertProducts.js">




</script>
<style>
    
</style>



<main>
    <div class="col-12 col-lg-4 mt-5 mx-auto py-3 px-5 shadow-lg rounded ">
        <form  class="mt-5" action="insertProducts.php" onsubmit="sendProduct(event)">

            <div class="mb-2">
                <label for="product_name" class="form-label">اسم المنتج</label>
                <input type="product_name" class="form-control" id="product_name">
            </div>
            <div class="mb-2">
                <label for="description" class="form-label"> الوصف</label>
                <input type="description" class="form-control" id="description">
            </div>
            <div class="mb-2">
                <label for="image_path" class="form-label">  صورة المنتج</label>
                <input type="file" class="form-control" id="image_path">
            </div>
            <div class="mb-2">
                <label for="quantity" class="form-label">الكمية </label>
                <input type="number" class="form-control" id="quantity">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label"> السعر</label>
                <input type="number" class="form-control" id="price">
            </div>

            <div class="mb-3">


                <button type="submit" id="send" class="btn btn-primary"><img class="mt-1" src="assets/icons/plus-circle.svg" alt="plus">  اضافة المنتج</button>
                
            </div>
        </form>
        <!-- <button class="btn btn-primary" id="addThousend" onclick="addThousend(event)">add</button> -->
    </div>
</main>


<?php include('zzzfooter.php') ?>