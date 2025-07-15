<?php 
    include_once("db_connect.php");
    $retVal = "";
    $isValid = true;
    $status = 400;
    $data = []; 

    $username = trim($_REQUEST['username']);
    $password = trim($_REQUEST['password']);

    // Check fields are empty or not
    if($username == '' || $password == ''){
        $isValid = false;
        $retVal = "Please fill all fields.";
    }

    // Check if email already exists
    if($isValid){
        $stmt = $con->prepare("SELECT * FROM users WHERE Username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $obj = mysqli_fetch_object($result); 
        $stmt->close();
        if($result->num_rows > 0){
            $isPassword = password_verify ($password , $obj->password);
            if($isPassword == true){
                $status = 200;
                $retVal = "Success.";
                $data = $obj;
                $_SESSION['users_Username'] = $obj->username;
                $_SESSION['users_Userid'] = $obj->userid;
                $_SESSION['user_Role'] = $obj->role;
            }else{
                $retVal = "You may have entered a wrong username or password.";
            }
        }else{
            $retVal = "Account does not exist.";
        }
    }

    $myObj = array(
        'status' => $status,
        'data' => $data,
        'message' => $retVal  
    );
    $myJSON = json_encode($myObj, JSON_FORCE_OBJECT);
    echo $myJSON;
?>