<?php
    date_default_timezone_set('Europe/Copenhagen)');
    include 'db.link.php';
    include 'comments.link.php';
    session_start();
    
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>COMMENT SECTION</title>

    <link rel="stylesheet" href="stylesheet.css">
    
</head>
<body>
     <div class="container">
       
        <img class="logo" src="chaselogo.png"  alt="logo">
        <div class="item presentation">MAKING FASHION ACCESIBLE TO ANYONE</div>
        <div class="item nav">
            	 <ul id="navigation">
                    <li><a href="index.html" >HOME</a></li>
                    <li><a href="adduser.php">SIGN UP</a></li>
                    <li><a href="login.php">LOG IN</a></li> 
                </ul>
         </div>
        


    
<br><br>

<?php   
   
    
getComments($conn);
?>
   

</body>
</html>
