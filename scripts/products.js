async function pagination(limitation) {

    const res = await callAPI('api/products/getNumPages.php', {

      'limitation': limitation


    });
    res.numPages = Math.ceil(res.numPages)
    console.log(res.numPages)


    for (i = 0; i < res.numPages; i++) {
      document.getElementById('pagination-list').innerHTML = document.getElementById('pagination-list').innerHTML + ' <li id= "page-item" class=" page-item" onclick=" getProducts(' + limitation + ',' + i + ') ">  <a class = "page-link">' + (i + 1) + '</a></li>'

   

    }








   



  }






  async function getProducts(limitation, page) {
    document.getElementById('loading').classList.remove('d-none')
    document.getElementById('search-form').classList.add('d-none')
    document.querySelector('footer').classList.add('d-none')
    document.getElementById('pagination-wrapper').classList.add('d-none')





    arrrr = document.querySelectorAll('.product')
    arrrr.forEach(element => {

      element.remove()
    })
    const res = await callAPI('api/products/productss.php', {

      'limitation': limitation,
      'page': page

    });


    res.records.forEach((element, index) => {


      document.getElementById('products-container').innerHTML = document.getElementById('products-container').innerHTML +
        `    <div class="food-box product col-xs-12 col-lg-3 col-xl-2 col-md-4 border p-2  rounded shadow  ms-md-5 ms-lg-5  mb-5 d-grid" quantity = ${element.quantity} product-id = ${element.id}>
        <img src="${element.image_path}" alt="" class="img-fluid rounded product-image">
        <h1 class="product-title fs-5 mt-1">${element.product_name}</h1>
        <p class="description mt-3">
        الوصف :     <span>${element.description}</span> 
        </p>
        <p class="price">
          السعر :  <span>${element.price} </span>
        </p>
        <button class="btn btn-primary mt-1 d-inline-block add-cart" id="buy-button">شراء</button>
     
    
        </div>`
    });



    loadFood() //this add events to cart elements .should 've been named loadProduct





    // if(admin == 1) {

    // }
    modifyProduct()
















    document.getElementById('loading').classList.add('d-none')
    document.getElementById('search-form').classList.remove('d-none')
    document.querySelector('footer').classList.remove('d-none')
    document.getElementById('pagination-wrapper').classList.remove('d-none')




  }







  document.addEventListener('DOMContentLoaded', async () => {
    console.log(window.screen.width)
    document.querySelector('footer').classList.add('d-none')
    limitation = 12
    await getProducts(limitation, 0)

    await pagination(limitation)
    smartSearch()









    document.getElementById('loading').classList.add('d-none')
    document.getElementById('search-form').classList.remove('d-none')
    document.querySelector('footer').classList.remove('d-none')



  })





  function modifyProduct() {
    document.querySelectorAll(".product").forEach(product => {

      const productTitle = product.querySelector(".product-title")
      const imagepath = product.querySelector(".product-image").getAttribute('src')
      const description = product.querySelector(".description span")
      const price = product.querySelector(".price span")
      const id = product.getAttribute('product-id')
      const quantity = product.getAttribute('quantity')

      const titleValue = productTitle.textContent
      const descriptionValue = description.textContent
      const priceValue = price.innerHTML
      productTitle.classList.add("clickable")
      description.classList.add("clickable")
      price.classList.add("clickable")
      product.querySelectorAll(".clickable").forEach(clickableElement => {

        clickableElement.addEventListener("dblclick", () => {
          productTitle.innerHTML = `<input type="text" class ="form-control" value="${titleValue}">`
          description.innerHTML = `<input type="text" class ="form-control" value="${descriptionValue}">`
          price.innerHTML = `<input type="text" class ="form-control" value="${priceValue}">`

          const productTitleField = productTitle.querySelector("input")
          const productPriceField = price.querySelector("input")
          const productDescriptionField = description.querySelector("input")
          const productQuantityField = clickableElement.closest('.product').getAttribute('quantity')
          const productIdField = clickableElement.closest('.product').getAttribute('product-id')
          clickableElement.querySelector("input").focus()



          product.querySelectorAll("input").forEach(element => {



            element.addEventListener("keypress", (event) => {
              if (event.key == "Enter") {


                const newTitleValue = productTitleField.value
                productTitle.innerHTML = newTitleValue
                const newPriceValue = parseFloat(productPriceField.value)
                price.innerHTML = newPriceValue

                const newDescriptionValue = productDescriptionField.value
                description.innerHTML = newDescriptionValue
                if (confirm('هل تريد حفظ التغييرات ؟')) {
                  if (newDescriptionValue == '' || newPriceValue == '' || newTitleValue == '') {

                    alert('يرجى ادخال كافة الحقول المطلوبة')

                    return
                  }
                  if (typeof newPriceValue === "number" && !isNaN(newPriceValue)) {



                    updateProduct()
                  } else {
                    alert('يرجى التاكد من صحة البيانات المدخلة')
                  }
                }




                //api
                async function updateProduct() {


                  const product_name = newTitleValue
                  const description = newDescriptionValue
                  const price = newPriceValue
                  const image_path = 'f1.jpg'

                  const quantity = productQuantityField
                  const id = productIdField


                  const res = await callAPI('api/products/updateProducts.php', {

                    'product_name': product_name,
                    'description': description,
                    'image_path': image_path,
                    'quantity': quantity,
                    'price': price,
                    'id': id


                  });
                  if (res.result == 1) {
                    alert('تم ادخال القيم بنجاح')
                  } else {
                    alert(res.message)
                  }


                }

                //end api
              }
            })

          })
        })
      })


    })
  }









  async function searchProduct(event) {




    let keyword = document.getElementById('search-box').value
    if (keyword == '') {
      await getProducts(limitation, 0)
    

      return
    }
    document.getElementById('loading').classList.remove('d-none')
    document.querySelector('#loading p').textContent = 'جار البحث'

    const res = await callAPI('api/products/searchProduct.php', {


      'keyword': keyword



    });

    if (res.result == 1) {
   
      document.querySelectorAll('.product').forEach((element) => {

        element.remove()
        console.log(res.records.length)




      })


      if (res.records.length > 0) {


        res.records.forEach((element, index) => {


          document.getElementById('products-container').innerHTML = document.getElementById('products-container').innerHTML +
            `    <div class="food-box product col-xs-12 col-lg-3 col-xl-2 col-md-4 border p-2  rounded shadow  ms-md-5 ms-lg-5  mb-5 d-grid" quantity = ${element.quantity} product-id = ${element.id}>
    <img src="${element.image_path}" alt="" class="img-fluid rounded product-image">
    <h1 class="product-title fs-5 mt-1">${element.product_name}</h1>
    <p class="description mt-3">
    الوصف :     <span>${element.description}</span> 
    </p>
    <p class="price">
      السعر :  <span>${element.price} </span>
    </p>
    <button class="btn btn-primary mt-1 d-inline-block add-cart" id="buy-button">شراء</button>
  
  
    </div>`

          document.getElementById('loading').classList.add('d-none')
          loadFood() //this add events to cart elements .should 've been named loadProduct





          modifyProduct()

        });
      }
       else {
        document.getElementById('loading').classList.add('d-none')
        document.getElementById('pagination-wrapper').classList.add('d-none')

      }


    } else {
      alert(res.message)
    }


  }

  function smartSearch() {
    let timer

    const waitTime = 1000;
    document.getElementById('search-box').addEventListener('keyup', () => {

      clearTimeout(timer);

      timer = setTimeout(() => {
        searchProduct(event)

      }, waitTime);
    });



  }