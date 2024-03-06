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