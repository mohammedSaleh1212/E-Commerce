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



const cartCount=document.querySelector('.cart-count');

let count=itemList.length;

cartCount.innerHTML=count;




}