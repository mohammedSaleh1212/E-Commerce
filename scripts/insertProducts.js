async function sendProduct(event) {
    const send = document.getElementById('send')
    event.preventDefault();

    const product_name = document.getElementById('product_name').value;
    const description = document.getElementById('description').value;
    const image_path = document.getElementById('image_path').files[0].name;
    const quantity = document.getElementById('quantity').value;
    const price = document.getElementById('price').value;

    const res = await callAPI('api/products/insertProducts.php', {

        'product_name': product_name,
        'description': description,
        'image_path': image_path,
        'quantity': quantity,
        'price': price


    });
    if (res.result == 1) {
        alert('تم ادخال القيم بنجاح')
    } else {
        alert(res.message)
    }


}
async function addThousend(event) {
    const send = document.getElementById('send')
    event.preventDefault();

    const product_name =  'example';
    const description = 'example';
    const image_path = 'images/products/f1.jpg';
    const quantity = 22;
    const price = 220000;

    const res = await callAPI('api/products/addThousend.php', {

        'product_name': product_name,
        'description': description,
        'image_path': image_path,
        'quantity': quantity,
        'price': price


    });
    if (res.result == 1) {
        alert('تم ادخال القيم بنجاح')
    } else {
        alert(res.message)
    }


}
