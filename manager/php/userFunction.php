<?php
function saveNewUser($data){
    $username = $data[0]["value"];
    $email = $data[1]["value"];
    $alias = $data[2]["value"];
    $password = $data[3]["value"];
    $passwordAgain = $data[4]["value"];
    $passwordEncode = password_hash($password,PASSWORD_BCRYPT);

    $email_check = filter_var($email, FILTER_VALIDATE_EMAIL);
    if(!$email_check){
        return ['success'=>false,"error"=>"email_not_valid"];
    }
    if($password == $passwordAgain){
        $db_connection = new db_connection();

        $sql_un = "SELECT * FROM `users` WHERE `username` = ?";
        $params_un = [$username];
        
        $exists_un = $db_connection->fetchQuery($sql_un,$params_un);
        if($exists_un == false){
            if($exists_un == false){
                $sql = "INSERT INTO `users` (`username`, `alias`, `image`, `password`, `email`) VALUES (?, ?, ?, ?, ?)";
                $params = [$username,$alias,"img/path.jpg",$passwordEncode,$email];
                if($success = $db_connection->Query($sql,$params)){
                    return ['success'=>true,"loginCheck"=>userLoginCheck([["value"=>$username],["value"=>$password]]),"msg"=>"signup_complete"];
                }else{
                    return ['success'=>false,"error"=>"signup_failed"];
                }
            }else{
                return ['success'=>false,"error"=>"email_exists"];
            }
        }else{
            return ['success'=>false,"error"=>"username_exists"];
        }
    }
    return ['success'=>false,"error"=>"passwords_dont_match"];
} 
function userLoginCheck($data){
    $username = $data[0]["value"];
    $password = $data[1]["value"];
    
    $db_connection = new db_connection();

    $sql = "SELECT `uid`,`username`,`alias`,`image`,`password` FROM `users` WHERE `username` = ?";
    $params = [$username];
    $userData = $db_connection->fetchQuery($sql,$params);
    // var_dump($userData);
    if($userData != false){
        if(password_verify($password,$userData["password"])){        
            return ['success'=>true,"loginStatus"=>setSessionUser($userData['uid']),"msg"=>"login_check_passed"];
        }else{
            return ['success'=>false,"error"=>"passwords_dont_match"];
        }
    }else{
        return ['success'=>false,"error"=>"username_not_found"];
    }
}
function setSessionUser($uid){
    $uid = (int) $uid;

    $db_connection = new db_connection();
    
    if(is_int( $uid )){
        $sql = "SELECT `uid`,`username`,`alias`,`image`,`bio`,`email`,`role_ids` FROM `users` WHERE `uid` = ?";
        $params = [$uid];
        $userData = $db_connection->fetchQuery($sql,$params);
        $_SESSION['userData']=$userData;
        return ['success'=>true];
    }else{        
        return ['success'=>false,"error_ignore"=>"uid_not_a_number"];
    }
}
function getUserFromSession(){
    if(isset($_SESSION['userData']["uid"])){
        setSessionUser($_SESSION['userData']["uid"]);
        if(isset($_SESSION['userData'])){
            return ['success'=>true,'data'=>$_SESSION['userData']] ;
        }else{
            return ['success'=>false,'error_ignore'=>"userdata_not_set"] ;
        }
    }else{
        return ['success'=>false,'error_ignore'=>"uid_not_set"] ;
    }
}
function userLogout(){
    session_destroy();
}
function getUserPermission($allowed_roles = [1]){
    $access = 0;
    if(isset($_SESSION['userData'])){
        foreach($_SESSION['userData']["role_ids"] as $role_id){
            if(in_array($role_id,$allowed_roles) || $role_id == 1){
                $access = 1;
            }
        }
    }
    return $access;
}
?>