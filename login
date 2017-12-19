<?php session_start(); ?>

<!doctype html>

<html>

<head>

<meta charset="UTF-8">
<link rel="stylesheet" href="stylesheet.css">


<title>Untitled Document</title>

</head>



<body><div class="container">
       
        <img class="logo" src="chaselogo.png"  alt="logo">
        <div class="item presentation">MAKING FASHION ACCESIBLE TO ANYONE</div>



<?php

	/* ALL THE RELEVANT COMENTS FOR THIS PAGE HAVE BEEN ADDED TO THE LOG IN PAGE. This one is only used because it has the message 'Log in with your alread existing account': this is used just for the people that already has an account and that wants to get there through the home page. */

if(!empty(filter_input(INPUT_POST, 'submit'))) {

	require_once('dbcon.php');

	

	$un = filter_input(INPUT_POST, 'un') 

		or die('Missing/illegal name parameter');

	$pw = filter_input(INPUT_POST, 'pw') 

		or die('Missing/illegal password parameter');

	$sql = 'SELECT id, pwhash FROM user WHERE username=?';

	$stmt = $link->prepare($sql);

	$stmt->bind_param('s', $un);

	$stmt->execute();

	$stmt->bind_result($uid, $pwhash);

	while ($stmt->fetch()) {} // fill result variables

	

	if (password_verify($pw, $pwhash)){

		echo 'logged in as user '.$uid;

		$_SESSION['uid'] = $uid;

		echo("<script>location.href = 'http://fernandogestomoreno.dk/chase/indexcommentsallowed.php';</script>");

		$_SESSION['un'] = $un;

	}

	else {

		echo 'illegal username/password combination';

	}

}

?>



<p>



<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

	<fieldset>

    	<legend>Login</legend>

    	<input name="un" type="text" placeholder="Username" required />

    	<input name="pw" type="password" placeholder="Password"  required/>

    	<input type="submit" name="submit" value="Login" />

	</fieldset>

</form>





</body>

</html>
