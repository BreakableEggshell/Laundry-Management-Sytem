<?php
    session_start();
    if(isset($_SESSION["users_Username"])){
        header("Location: dashboard.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <title>PHP Sample</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="../src/css/main.css">
    <script type="text/javascript" src="../src/js/auth.js"></script>
  <title>Laundry System Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #34495e;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-container {
      background: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.3);
      width: 300px;
      text-align: center;
    }
    h2 {
      margin-bottom: 20px;
      color: #2c3e50;
    }
    input, select {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      box-sizing: border-box;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      background-color: #2ecc71;
      color: white;
      padding: 10px;
      width: 100%;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }
    button:hover {
      background-color: #27ae60;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Laundry System Login</h2>
   <form id="signinForm" method="get" onsubmit="signinSubmit(event)">
      <input type="text" id="username" name="username" placeholder="Username" required>
      <input type="password" id="password" name="password" placeholder="Password" required>
      <select name="role" required>
        <option value="">Select Role</option>
        <option value="staff">Staff</option>
        <option value="admin">Admin</option>
      </select>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
