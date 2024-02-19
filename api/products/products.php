<?php
  include('../Common/headers.php');
  include ('../Common/dbManager.php');
  sleep(1);
  $props = json_decode(file_get_contents("php://input"),true);
  $token = isset($props['token']) ? $props['token'] : '';
  $small = isset($props['small']) ? $props['small'] : '';
  $big = isset($props['big']) ? $props['big'] : '';

  
  $result_arr=array();
  $result_arr["result"]=0;
  $result_arr["message"]="حدث خطأ في الإتصال" . $token ;

  if(checkConnectionAuthorized($token ,$small)) {
   

      $db = getRootConnection();
      $sql = $db->prepare(
        "SELECT * FROM products WHERE id >:small AND id<:big"
      );
      $sql->bindValue(":small", $small);
      $sql->bindValue(":big", $big);

    
      


 
      if($sql->execute()) {
        $result_arr["result"]=1;
        $result_arr["message"]="Success";
        $result_arr["records"]=array();
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
          array_push($result_arr["records"], $row);
        }
      }
      else {
        $result_arr["result"]=0;

        $result_arr["message"] = "error .." ;
      }
    

  }

  echo json_encode($result_arr);
?>