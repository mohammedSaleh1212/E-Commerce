<?php
  include('../Common/headers.php');
  include ('../Common/dbManager.php');
  sleep(1);
  $props = json_decode(file_get_contents("php://input"),true);
  $token = isset($props['token']) ? $props['token'] : '';
  $logintoken = isset($props['logintoken']) ? $props['logintoken'] : '';
  
  $result_arr=array();
  $result_arr["result"]=0;
  $result_arr["message"]="خطأ في الإتصال" ;

  if(checkConnectionAuthorized($token)) {
    if(checkRequiredFields($logintoken)) {
      $db = getRootConnection();
      $sql = $db->prepare(
        "SELECT users.id, users.logintoken, users.isactive, users.username, users.fullname, users.email, users.mobile,
        users.lastlogin, users.isadmin, users.isdoctor, users.notes, clinics.clinicname, clinics.clinicnotes, 
        clinics.foldername, clinics.validuntil, clinics.istrial, clinics.ispro FROM users LEFT JOIN clinics ON users.clinicid = clinics.id 
        HAVING users.logintoken = :logintoken AND users.isactive = 1 AND clinics.validuntil > CURRENT_DATE()"
      );
      $sql->bindValue(":logintoken", $logintoken);
      if($sql->execute() && $sql->rowCount() > 0) {
        $result_arr["result"]=1;
        $result_arr["message"]="Success";
        $result_arr["records"]=array();
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        array_push($result_arr["records"], $row);
      }
      else {
        $result_arr["message"]="بيانات المستخدم الحالي غير صالحة, يرحى التأكد من صلاحية الإشتراك" ;
        $result_arr["result"]=-1;
      }
    }
    else {
      $result_arr["message"]="يرجى إدخال كافة البيانات المطلوبة";
    }
  }

  echo json_encode($result_arr);
?>