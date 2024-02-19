<?php
  include('../Common/headers.php');


  function getRootConnection(){
    $host = "localhost";
    $db_name = "mystore";
    $username = "root";
    $password = "";

    $connection = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
    $connection->exec("SET CHARACTER SET UTF8");
    return $connection;
  }

  

  function checkToken($token) {
    return $token == 'abc';
  }

  function checkConnectionAuthorized($token) {
    return $_SERVER['REQUEST_METHOD'] == 'POST' && $token != "" && checkToken($token);
  }

  function checkUserIsActive($db) {
    return $db != "";
  }

  function checkRequiredFields($a='a',$b='b',$c='c',$d='d',$e='e',$f='f',$g='g',$h='h') {
    return $a != '' && $b != '' && $c != '' && $d != '' && $e != '' && $f != '' && $g != '' && $h != '';
  }

  function checkDateFormat($string) {
    if ($string <> "" && strtotime($string)) return true;
    else return false;
  }
  







  sleep(1);
  $props = json_decode(file_get_contents("php://input"),true);
  $token = isset($props['token']) ? $props['token'] : ''; 
  $email = isset($props['email']) ? $props['email'] : '';
  $user_password = isset($props['user_password']) ? $props['user_password'] : '';
  
  $result_arr=array();
  $result_arr["result"]=0;
  $result_arr["message"]="حدث خطأ في الإتصال" . $token ;

  if(checkConnectionAuthorized($token)) {
    if(checkRequiredFields($email,$user_password)) {

      $db = getRootConnection();
      $sql = $db->prepare(
        "SELECT id,is_admin FROM users 
         WHERE email=:email AND user_password=:user_password AND is_valid = 1"
      );
      $sql->bindValue(":email", $email);
      $sql->bindValue(":user_password", sha1( $user_password ));
      if($sql->execute() && $sql->rowCount() > 0) {
        $result_arr["result"]=1;
        $result_arr["message"]="Success";
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $result_arr["is_admin"]=$is_admin;
        $result_arr["id"]=$id;
    


      }
      else {
        $result_arr["message"] = "بيانات المستخدم الحالي غير صالحة, يرحى التأكد من صلاحية الإشتراك" ;
      }
    }
    else {
      $result_arr["message"]="يرجى إدخال إسم المستخدم وكلمة المرور";
    }
  }

  echo json_encode($result_arr);
?>