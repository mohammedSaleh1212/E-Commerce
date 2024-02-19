<?php
  include('../Common/headers.php');
  include ('../Common/dbManager.php');
  sleep(1);
  $props = json_decode(file_get_contents("php://input"),true);
  $token = isset($props['token']) ? $props['token'] : '';
  $product_name = isset($props['product_name']) ? $props['product_name'] : '';
  $description = isset($props['description']) ? $props['description'] : '';
  $image_path = isset($props['image_path']) ? $props['image_path'] : '';
  $quantity = isset($props['quantity']) ? $props['quantity'] : '';
  $price = isset($props['price']) ? $props['price'] : '';

//   $image_path = 'images/products/' . $image_path ;
  
  $result_arr=array();
  $result_arr["result"]=0;
  $result_arr["message"]="لحدث خطأ في الإتصال" . $token ;
 

  if(checkConnectionAuthorized($token)) {
   
    if(checkRequiredFields($product_name ,$description , $image_path , $quantity, $price)) {

        $db = getRootConnection();
        for ( $i=0; $i<100 ; $i++) {
            $sql = $db->prepare(
                "INSERT INTO products (product_name , description , image_path , quantity ,price )
                VALUES (?,?,?,?,?)"
              );
              $sql->execute( [ $product_name,$description,$image_path,$quantity,$price]);

        }


        
          $result_arr["result"]=1;
          $result_arr["message"]="تم ادخال البيانات بنجاح";

        
     
      }
      else {
        $result_arr["message"]="يرجى ادخال جميع الحقول المطلوبة";
      }
    }
    

  

  echo json_encode($result_arr);
?>


