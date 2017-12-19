<?php
function setComments($conn) {
    if(isset($_POST['commentSubmit'])){
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message= $_POST['message'];
        
        $sql = "INSERT INTO comments (uid, date, message) VALUES ('$uid', '$date', '$message')";
        $result = mysqli_query($conn, $sql);
        header("Location: http://fernandogestomoreno.dk/chase/indexcomments.php");
    }
}
function getComments($conn) {
     $sql = "SELECT * FROM comments";
     $result = mysqli_query($conn, $sql);
     while ($row = $result->fetch_assoc()){
         echo "<div class='commentbox'><p>";
           echo $row['uid']."<br>";
           echo $row['date']."<br>";
           echo nl2br($row['message']);
         echo "</p>
           <form class='editform' method='POST' action='editcomments.php'>
             <input type='hidden' name='cid' value='".$row['cid']."'>
             <input type='hidden' name='uid' value='".$row['uid']."'>
             <input type='hidden' name='date' value='".$row['date']."'>
             <input type='hidden' name='message' value='".$row['message']."'>
             <button>Edit</button>
           </form>
         </div>";
     }
 }
function editComments($conn) {
    if(isset($_POST['commentSubmit'])){
        $cid = $_POST['cid'];
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message= $_POST['message'];
        $sql = "UPDATE comments SET message='$message' WHERE cid='$cid'";
        $result = mysqli_query($conn, $sql);
        header("Location: http://fernandogestomoreno.dk/chase/indexcomments.php");
    }
}
function getLogin($conn) {
     if(isset($_POST['loginSubmit'])){
     $id = $_POST['id'];
     $pwd = $_POST['pwd'];
    $sql = "SELECT * FROM user WHERE id='$id' AND pwd='$pwd'";
     $result = mysqli_query($conn, $sql);   
      if($row = mysqli_fetch_assoc($result) > 0){
       $_SESSION['id'] = $row['id'];
       header("Location: http://fernandogestomoreno.dk/chase/indexcomments.php?loginsuccess");
       exit();
      } else {
           header("Location: http://fernandogestomoreno.dk/chase/indexcomments.php?loginfailed");
       exit();
    }
  }
}
function userLogout(){
    if (isset($_POST['logoutSubmit'])){
        session_start();
        session_destroy();
        header('location: http://' . $_SERVER['HTTP_HOST'] . '/chase/indexcomments.php');
        exit();
    }
}
?>
