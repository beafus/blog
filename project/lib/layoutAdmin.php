<?php
if(!defined('true-access')) {
    die('Direct access not permitted');
} 

function startOfPage($title) {

	echo "<!doctype html>  "															.PHP_EOL;
	echo '<html xmlns="htpp://www.3w.org/1999/xhtml" xml:lang="en" lang="en">          '.PHP_EOL;
	echo "<head>     
	      "															.PHP_EOL;
	echo '<meta http-equiv="Content-Type" content="text/html charset=utf-8"/>'			.PHP_EOL;

	
	if (isset($title))
	{
		echo "<title>$title</title>". PHP_EOL;
	}

		?>
	 <!-- Le styles -->
   	<link href="content/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">

    


      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing messages */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
		    background: url(content/img/carta.jpg);
		    color: white;
      }

      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }

      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }


<?php
    echo'</style>';

    echo'<link href="content/css/bootstrap-responsive.css" rel="stylesheet">';

    //<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    //<!--[if lt IE 9]>
     echo' <script src="js/html5shiv.js"></script>';
   // <![endif]-->

    //<!-- Fav and touch icons -->
    echo'<link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">';
    echo'<link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">';
   	echo' <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">';
    echo'<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">';
    echo'<link rel="shortcut icon" href="ico/favicon.png">';
	echo "</head>          ".PHP_EOL;


	echo "<body>           ".PHP_EOL;


   echo' <div class="container-narrow">';

    echo'  <div class="masthead">';
    echo'    <ul class="nav nav-pills pull-right">';
    echo'      <li ><a href="user.php">Home</a></li>';
    echo'      <li class="active"><a href="admin.php">Admin</a></li>';
        
         

     echo'   </ul>';
     echo'   <h3 class="muted">Blog world</h3>';
     echo' </div>';

     echo' <hr>';

      echo'<div class="jumbotron">';
      echo'  <h1>Welcome to</h1>';
      echo'  <h1> Blog World</h1>';
      echo'  <p class="lead">We offer the most interesting blogs ever</p>';
      echo'  <a class="btn btn-large btn-success" href="admin.php">Become a blogger!</a>';
      echo'</div>';



}



function endOfPage() {

	echo'<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>';
    echo'<script src="js/bootstrap.js"></script>';
	echo "</body>          ".PHP_EOL;
	echo "</html>          ".PHP_EOL;
}

function h1($content, $class="") {
	echo "<h1 class='$class'>$content</h1>";
}

function startContent()
{
echo '<article>'.PHP_EOL;
}

function endContent()
{
echo '</article>'.PHP_EOL;
}

function startAside()
{
echo '<aside>'.PHP_EOL;
}

function endAside()
{
echo ' </aside>'.PHP_EOL;
}





function printsesion(){


if (isset($_SESSION ['hitsFromUser']))
{
	$_SESSION ['hitsFromUser'] = $_SESSION ['hitsFromUser'] + 1;
}
else
{
	$_SESSION ['hitsFromUser'] = 1;
}

 $hits = $_SESSION ['hitsFromUser'];


 if(isset($_POST["footer"])){

 		$hits=0;
		$_SESSION['hitsFromUser']=0;
	
	}


	echo "<p style=\" background:grey;\"> Number of visits to BlogWorld: $hits </p>".PHP_EOL;

	echo '<form action="" method="POST">';
	echo '<input type="submit"  name="footer" value="reset"></input> '.PHP_EOL;
	echo '</form>';
	
	



}









?>