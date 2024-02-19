<?php
  include('../Common/headers.php');
  include ('../Common/dbManager.php');
  sleep(1);
  $props = json_decode(file_get_contents("php://input"),true);
  $token = isset($props['token']) ? $props['token'] : '';
  $limitation = isset($props['limitation']) ? $props['limitation'] : '';
 


  
  $result_arr=array();
  $result_arr["result"]=0;
  $result_arr["message"]="حدث خطأ في الإتصال" . $token ;
//   limitation page*limitation

  if(checkConnectionAuthorized($token ,$limitation)) {
   

      $db = getRootConnection();
      $sql = $db->prepare(
        "SELECT id FROM products  "
      );

      if($sql->execute()) {
        $result_arr["result"]=1;
        $result_arr["message"]="Success";
        $result_arr["records"]=array();
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
          array_push($result_arr["records"], $row);
        }
     
        $result_arr["numPages"] = sizeof($result_arr["records"])/$limitation;
      }
      else {
        $result_arr["result"]=0;

        $result_arr["message"] = "error .." ;
      }
    

  }

  echo json_encode($result_arr);
?>