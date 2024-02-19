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

  <script src="assets/script.js"></script>
  <title> my shop</title>
  <style>
    .trash-icon {
      width: 20px;
    }

    #cart-close {
      position: absolute;
      top: 1rem;
      right: 0.8rem;
      font-size: 2rem;
      cursor: pointer;
    }

    .cart-title {
      text-align: center;
      font-size: 1.5rem;
      font-weight: 500;
      margin-bottom: 1rem;
      padding-bottom: 20px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .cart-box {
      display: grid;
      grid-template-columns: 32% 50% 18%;
      align-items: center;
      gap: 1rem;
      margin-top: 1rem;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
      padding-bottom: 10px;
    }

    .cart-img {
      width: 75px;
      height: 75px;
      object-fit: cover;
      border: 2px solid rgba(0, 0, 0, 0.1);
      padding: 5px;
    }

    .detail-box {
      display: grid;
      row-gap: 0.5rem;
    }

    .price-box {
      display: flex;
      justify-content: space-between;
    }

    .cart-food-title {
      font-size: 1rem;
      text-transform: uppercase;
      color: #ff6348;
      font-weight: 500;
    }

    .cart-price {
      font-weight: 500;
    }

    .cart-quantity {
      border: 1px solid rgba(0, 0, 0, 0.1);
      outline: none;
      width: 2.4rem;
      text-align: center;
      font-size: 1rem;
    }

    .cart-remove {
      font-size: 24px;
      color: red;
      cursor: pointer;
    }

    .total {
      display: flex;
      justify-content: flex-end;
      margin-top: 1.5rem;
    }

    .total-title {
      font-size: 1rem;
      font-weight: 600;
    }

    .total-price {
      margin-left: 0.5rem;
    }

    .btn-buy {
      padding: 12px 20px;
      background-color: #2f3542;
      color: #fff;
      border: none;
      font-size: 1rem;
      font-weight: 500;
      cursor: pointer;
    }

    #cart-icon {
      font-size: 1.5rem;
      cursor: pointer;
      padding-top: 10px;
    }








    .cart {
      position: fixed;
      top: 0;
      right: -100%;
      width: 400px;
      height: 100vh;
      overflow-y: auto;
      overflow-x: hidden;
      padding: 20px;
      background-color: white;
      box-shadow: 0 1px 4px rgba(40, 37, 37, 0.1);
      z-index: 100;
    }

    .cart-active {
      right: 0;
      transition: 0.5s;
    }

    .box {
      color: white;
      width: 30px;
      height: 30px;
      text-align: center;
      position: relative;
    }

    .cart-count {
      position: absolute;
      background-color: #2f3542;
      top: -5px;
      right: 0;
      padding: 3px;
      height: 20px;
      width: 20px;
      line-height: 20px;
      border-radius: 50%;
      z-index: 99;
    }
  </style>














  <script>
   let admin = 0
    function Logout() {
      if (confirm("هل تريد تسجيل الخروج")) {

        // const logoutButton = document.getElementById('logout')
        window.location.href = "zzznotokay.php"
      }



    }








function loadCartCount() {
  sessionStorage.setItem("cart-count" ,document.querySelector('.cart-count').innerHTML)
  sessionStorage.setItem("cart-content" , document.querySelector('.cart-content').innerHTML)

}


    document.addEventListener("DOMContentLoaded",async() => {
     
    
      
     console.log(sessionStorage.getItem("cart-count"))
 
     document.querySelector('.cart-count').textContent = sessionStorage.getItem("cart-count")
     document.querySelector('.cart-content').innerHTML = sessionStorage.getItem("cart-content")
     loadFood()
      
     



    });
    // document.getElementsByClassName('cart-count') = sessionStorage.getItem("cart-content")




//this is for fun
const btnCart=document.querySelector('#cart-icon');
const cart=document.querySelector('.cart');
const btnClose=document.querySelector('#cart-close');





function loadFood(){
  loadContent();

}

function loadContent(){
  //Remove Food Items  From Cart
  let btnRemove=document.querySelectorAll('.cart-remove');
  btnRemove.forEach((btn)=>{
    btn.addEventListener('click',removeItem);
   
    // console.log(localStorage.getItem("cart-content"))

  });

  //Product Item Change Event
  let qtyElements=document.querySelectorAll('.cart-quantity');
  qtyElements.forEach((input)=>{
    input.addEventListener('change',changeQty);
  });

  //Product Cart
  
  let cartBtns=document.querySelectorAll('.add-cart');
  cartBtns.forEach((btn)=>{
    btn.addEventListener('click',addCart);


  });

  updateTotal();
}


//Remove Item
function removeItem(){
  if(confirm('Are Your Sure to Remove')){
    let title=this.parentElement.querySelector('.cart-food-title').innerHTML;
    itemList=itemList.filter(el=>el.title!=title);
    this.parentElement.remove();
    loadContent();
    loadCartCount()
  
    

    
  }
}

//Change Quantity
function changeQty(){
  if(isNaN(this.value) || this.value<1){
    this.value=1;
  }
  loadContent();
}

let itemList=[];

//Add Cart
function addCart(){
 let food=this.parentElement;
 let title=food.querySelector('.product-title').innerHTML;
 let price=food.querySelector('.price span').innerHTML;
 let imgSrc=food.querySelector('.product-image').src;
 //console.log(title,price,imgSrc);
 
 let newProduct={title,price,imgSrc}

 //Check Product already Exist in Cart
 if(itemList.find((el)=>el.title==newProduct.title)){
  alert("Product Already added in Cart");
  return;
 }else{
  itemList.push(newProduct);

 }


let newProductElement= createCartProduct(title,price,imgSrc);
let element=document.createElement('div')
element.innerHTML=newProductElement
let cartBasket=document.querySelector('.cart-content')
cartBasket.append(element)
loadContent()
loadCartCount()

   
}


function createCartProduct(title,price,imgSrc){

  return `
  <div class="cart-box">
  <img src="${imgSrc}" class="cart-img">
  <div class="detail-box">
    <div class="cart-food-title">${title}</div>
    <div class="price-box">
      <div class="cart-price">${price}</div>
       <div class="cart-amt">${price}</div>
   </div>
    <input type="number" value="1" class="cart-quantity">
  </div>
  <ion-icon name="trash" class="cart-remove"><img src="assets/icons/trash.svg" alt="" class='trash-icon' ></ion-icon>
</div>
  `;
}

function updateTotal()
{
  const cartItems=document.querySelectorAll('.cart-box');
  const totalValue=document.querySelector('.total-price');

  let total=0;

  cartItems.forEach(product=>{
    let priceElement=product.querySelector('.cart-price');
    let price=parseFloat(priceElement.innerHTML.replace("ل.س",""));
    let qty=product.querySelector('.cart-quantity').value;
    total+=(price*qty);
    product.querySelector('.cart-amt').innerText="ل.س"+(price*qty);

  });

  totalValue.innerHTML=' ل.س '+total;


  // Add Product Count in Cart Icon

  const cartCount=document.querySelector('.cart-count');
  
  let count=itemList.length;
 
  cartCount.innerHTML=count;

  

  // if(count==0){
  //   cartCount.style.display='none';
  // }else{
  //   cartCount.style.display='block';
  // }


}
    

  </script>
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
              <script>
              // function modifyProduct() {
              //   document.querySelectorAll(".product").forEach(product => {
            
              //     const productTitle = product.querySelector(".product-title")
              //     const imagepath = product.querySelector(".product-image").getAttribute("src")
              //     const description = product.querySelector(".description span")
              //     const price = product.querySelector(".price span")
              //     const id = product.getAttribute("product-id")
              //     const quantity = product.getAttribute("quantity")
            
              //     const titleValue = productTitle.textContent
              //     const descriptionValue = description.textContent
              //     const priceValue = price.innerHTML
              //     productTitle.classList.add("clickable")
              //     description.classList.add("clickable")
              //     price.classList.add("clickable")
              //     product.querySelectorAll(".clickable").forEach(clickableElement => {
            
              //       clickableElement.addEventListener("dblclick", () => {
              //         productTitle.innerHTML = `<input type="text" class ="form-control" value="${titleValue}">`
              //         description.innerHTML = `<input type="text" class ="form-control" value="${descriptionValue}">`
              //         price.innerHTML = `<input type="text" class ="form-control" value="${priceValue}">`
            
              //         const productTitleField = productTitle.querySelector("input")
              //         const productPriceField = price.querySelector("input")
              //         const productDescriptionField = description.querySelector("input")
              //         const productQuantityField = clickableElement.closest(".product").getAttribute("quantity")
              //         const productIdField = clickableElement.closest(".product").getAttribute("product-id")
              //         clickableElement.querySelector("input").focus()
            
            
            
              //         product.querySelectorAll("input").forEach(element => {
            
            
            
              //           element.addEventListener("keypress", (event) => {
              //             if (event.key == "Enter") {
            
            
              //               const newTitleValue = productTitleField.value
              //               productTitle.innerHTML = newTitleValue
              //               const newPriceValue = parseFloat(productPriceField.value)
              //               price.innerHTML = newPriceValue
            
              //               const newDescriptionValue = productDescriptionField.value
              //               description.innerHTML = newDescriptionValue
              //               if (confirm("هل تريد حفظ التغييرات ؟")) {
              //                 if (newDescriptionValue == "" || newPriceValue =="" || newTitleValue == "") {
            
              //                   alert("يرجى ادخال كافة الحقول المطلوبة")
            
              //                   return
              //                 }
              //                 if (typeof newPriceValue === "number" && !isNaN(newPriceValue)) {
            
            
            
              //                   updateProduct()
              //                 } else {
              //                   alert("يرجى التاكد من صحة البيانات المدخلة")
              //                 }
              //               }
            
            
            
            
              //               //api
              //               async function updateProduct() {
            
            
              //                 const product_name = newTitleValue
              //                 const description = newDescriptionValue
              //                 const price = newPriceValue
              //                 const image_path = "f1.jpg"
            
              //                 const quantity = productQuantityField
              //                 const id = productIdField
            
            
              //                 const res = await callAPI("api/products/updateProducts.php", {
            
              //                   "product_name": product_name,
              //                   "description": description,
              //                   "image_path": image_path,
              //                   "quantity": quantity,
              //                   "price": price,
              //                   "id": id
            
            
              //                 });
              //                 if (res.result == 1) {
              //                   alert("تم ادخال القيم بنجاح")
              //                 } else {
              //                   alert(res.message)
              //                 }
            
            
              //               }
            
              //               //end api
              //             }
              //           })
            
              //         })
              //       })
              //     })
            
            
              //   })
              // }
              //  admin = 1
              
              // </script>
              
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