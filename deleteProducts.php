<?php include('zzzheader.php'); ?>
<script>
        async function deleteProduct(event) {
        event.preventDefault();
        const id = document.getElementById('id').value
        const res = callAPI('api/products/deleteProducts.php', {

            'id': id
        });
        if (res.result == 1) {
            alert('تم حذف المنتج بنجاح')
        } else {
            alert(res.message)

        }

        id=' '


    }




</script>


<form action="deleteProducts.php" onsubmit="deleteProduct(event)" class="row mt-5">
    <div class="my-5 col-6 mx-auto ">
        <label for="id" class="form-label">رقم المنتج المراد حذفه</label>
        <input type="number" class="form-control" id="id">

        <button type="submit" id="delete-button" class="btn btn-danger mt-3"> حذف البيانات</button>

    </div>
</form>

<?php include('zzzfooter.php'); ?>
