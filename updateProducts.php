<?php include('zzzheader.php'); ?>



<script>
   async function updateProduct(event) {
    event.preventDefault()
    const product_name = document.getElementById('product_name').value
    const description = document.getElementById('description').value
    const image_path = document.getElementById('image_path').files[0].name
    const quantity = document.getElementById('quantity').value
    const price = document.getElementById('price').value
    const id = document.getElementById('id').value

    const res = await callAPI('api/products/updateProducts.php', {

      'product_name': product_name,
      'description': description,
      'image_path': image_path,
      'quantity': quantity,
      'price': price,
      'id' : id


});
        if (res.result == 1) {
            alert('تم تعديل المنتج بنجاح')
           
           
        } else {
            alert(res.message)
        }
       

     
    
   }




</script>

<div class="col-12 col-lg-4  mx-auto p-5 shadow-lg rounded " style="margin-top: 50px;">
    <form action="updateProducts.php" onsubmit="updateProduct(event)" class="">
        <div class="mb-2">
            <label for="id" class="form-label">رقم المنتج</label>
            <input type="number" class="form-control" id="id">
        </div>

        <div class="mb-2">
            <label for="product_name" class="form-label">اسم المنتج</label>
            <input type="product_name" class="form-control" id="product_name">
        </div>
        <div class="mb-2">
            <label for="description" class="form-label"> الوصف</label>
            <input type="description" class="form-control" id="description">
        </div>
        <div class="mb-2">
            <label for="image_path" class="form-label">  الصورة</label>
            <input type="file" class="form-control" id="image_path">
        </div>
        <div class="mb-2">
            <label for="quantity" class="form-label">اكمية </label>
            <input type="quantity" class="form-control" id="quantity">
        </div>
        <div class="mb-2">
            <label for="price" class="form-label"> السعر</label>
            <input type="price" class="form-control" id="price">
        </div>
        <div class="mb-3">


            <button type="submit" id="send" class="btn btn-primary">تعديل البيانات</button>
        </div>
    </form>
</div>


<?php include('zzzfooter.php'); ?>