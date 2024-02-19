<?php
  include('../Common/headers.php');
  include ('../Common/dbManager.php');
  sleep(1);
  $props = json_decode(file_get_contents("php://input"),true);
  $token = isset($props['token']) ? $props['token'] : '';
  $id = isset($props['id']) ? $props['id'] : '';
  

  
  $result_arr=array();
  $result_arr["result"]=0;
  $result_arr["message"]="حدث خطأ في الإتصال" . $token ;
 

  if(checkConnectionAuthorized($token)) {
   
    if(checkRequiredFields($id)) { 

        $db = getRootConnection();
        $sql = $db->prepare(
          "DELETE FROM products where id=?"
        );
        $sql->execute([$id]);

        
          $result_arr["result"]=1;
          $result_arr["message"]="تم حذف البيانات بنجاح";
          $result_arr["id"]=$id;

        
     
      }
      else {
        $result_arr["message"]="يرجى ادخال رقم المنتج" ;
      }
    }
    

  

  echo json_encode($result_arr);
?>


