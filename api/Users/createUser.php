<?php
  include('../Common/headers.php');
  include ('../Common/dbManager.php');
  sleep(1);
  $props = json_decode(file_get_contents("php://input"),true);
  $token = isset($props['token']) ? $props['token'] : '';
  $user_name = isset($props['user_name']) ? $props['user_name'] : '';
  $user_password = isset($props['user_password']) ? $props['user_password'] : '';
  $email = isset($props['email']) ? $props['email'] : '';


  
  $result_arr=array();
  $result_arr["result"]=0;
  $result_arr["message"]="لحدث خطأ في الإتصال" . $token ;
 

  if(checkConnectionAuthorized($token)) {
   
    if(checkRequiredFields($user_name,$user_password,$email)) {


        $db = getRootConnection();
         $sql = $db->prepare(
          "SELECT id FROM users  WHERE email=:email "
        );
        $sql->bindValue(":email", $email);

     if($sql->execute() && $sql->rowCount() > 0) {
      $result_arr["result"]=0;
      $result_arr["message"]="هذا الحساب موجود مسبقا  ";

     }
     else {
      $sql->bindValue(":user_name", $user_name);
      $sql->bindValue(":user_password", $user_password);

        $sql = $db->prepare(
          "INSERT INTO users (user_name  , user_password, email )
          VALUES (?,?,?)"
        );
        $sql->execute( [$user_name ,sha1( $user_password ), $email ]);

        
          $result_arr["result"]=1;
          $result_arr["message"]="تم ادخال البيانات بنجاح";

        
      }
      }
      else {
        $result_arr["message"]="يرجى ادخال جميع الحقول المطلوبة";
      }
      
    }
    

  

  echo json_encode($result_arr);
?>


