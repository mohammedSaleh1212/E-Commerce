<?php include('zzzheader.php'); ?>
<script src="scripts/deleteProducts.js"></script>
<script>





</script>


<form action="deleteProducts.php" onsubmit="deleteProduct(event)" class="row mt-5">
    <div class="my-5 col-6 mx-auto ">
        <label for="id" class="form-label">رقم المنتج المراد حذفه</label>
        <input type="number" class="form-control" id="id">

        <button type="submit" id="delete-button" class="btn btn-danger mt-3"> حذف البيانات</button>

    </div>
</form>

<?php include('zzzfooter.php'); ?>
