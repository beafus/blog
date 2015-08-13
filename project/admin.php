<?php


/**
* Blog application
* user can upload a new status
* also view previous status
*
*/
define("true-access",true);
include("lib/layoutAdmin.php");

$totalPosts = intval(file_get_contents("./blogs/totalPosts"));



ob_start();
session_start();
startOfPage("blogWorld");



define("form_blog_input_name","blog");
define("form_blog_title_name","title");




function  confirm_update()
{

	global $totalPosts;
	//blog title name
	$inputTitle = $_POST[form_blog_title_name];
	//blog is the name of the text field
	$inputData = $_POST[form_blog_input_name];

	//$replace=str_replace("\r","<br>",$inputData);

	if (!empty($_POST[form_blog_input_name]) &&  !empty($_POST[form_blog_title_name])  ) {
	

		//creation of a folder for each blog. In that folder the title, text and optional image will be stored.
		$blogPath= "./blogs/blog".$totalPosts."/";
		$titlePath=$blogPath."title.txt";
		$textPath=$blogPath."text.txt";
		$imagePath=$blogPath."image";



		




		

		mkdir($blogPath);

		

		file_put_contents($titlePath, htmlspecialchars($inputTitle),FILE_APPEND | LOCK_EX);

		file_put_contents($textPath, htmlspecialchars($inputData), FILE_APPEND | LOCK_EX);


		//we want the image to be in the correct format and size. 

		if(!empty($_FILES['file1']['tmp_name'])){

		if ((($_FILES["file1"]["type"] == "image/gif")
		|| ($_FILES["file1"]["type"] == "image/jpeg")
		|| ($_FILES["file1"]["type"] == "image/jpg")
		|| ($_FILES["file1"]["type"] == "image/pjpeg")
		|| ($_FILES["file1"]["type"] == "image/x-png")
		|| ($_FILES["file1"]["type"] == "image/png"))
		&& ($_FILES["file1"]["size"] < 400000)) {


		  if ($_FILES["file1"]["error"] > 0) {
		    echo "Error: " . $_FILES["file1"]["error"] . "<br>";
		  } 

		 else {
		 	
		   file_put_contents($imagePath, $_FILES['file1']['tmp_name']);

			move_uploaded_file($_FILES['file1']['tmp_name'],$imagePath );
			
		  }
		}

		else {
		  echo "Invalid file. We could not upload your Image.";
		
		}
	}
		


		$totalPosts++;
		//we increment this variable so the next blog will be stored in a folder named blogX. X will be the post number.

		file_put_contents("./blogs/totalPosts", $totalPosts);
		

		echo "<h3>Post uploaded</h3>";
	}
	
}






function linkPost($postNumber){

	$blogPath= "./blogs/blog".$postNumber."/";

	if (file_exists($blogPath)){

		$titlePath=$blogPath."title.txt";
		$textPath=$blogPath."text.txt";
		$imagePath=$blogPath."image";
			

		$stringText=file_get_contents($textPath);
		$stringText=str_replace("\r","<br>",$stringText);

		$stringTitle=file_get_contents($titlePath);


			
		echo '<h2>'.$stringTitle.'</h2>';
		echo '<p>'.$stringText.'</p>';

		if(file_exists( $imagePath )){
			echo "<img width='500px' heigth='500px' src='blogs/blog".$postNumber."/image'>";
		}

	}

}





function  create_link()
{
	//after writing their post they should be able to see it and the old ones.
	echo '<h4><a href="user.php">View Posts </a></h4>';

}



function display_update_form()
{

	echo '<form enctype="multipart/form-data" method="POST" action="#">'.PHP_EOL;

	//Text field to write your new title
	echo '<table>';
	echo '<tr><h4> Write your own blog!</h4><td><textarea type="textfield" rows="1" cols="40"name="'.form_blog_title_name.'" placeholder="Write a title"></textarea></td></tr>'.PHP_EOL;
	//Text field to write your new entrie
	echo '<tr><td><textarea type="textfield" rows="10" cols="40" name="'.form_blog_input_name.'" placeholder="Upload your new blog entrie"></textarea></td></tr>'.PHP_EOL;
	echo '</table>';

	//to add an optional image
	echo '<input type="file" name="file1" />'.PHP_EOL;


	//Button to submit your entrie
	echo '<input type="submit"  name="submit" value="Submit"/> '.PHP_EOL;
	echo '</form>'.PHP_EOL;

	//uploadImage();

	if (!empty($_POST["submit"])&& (empty($_POST[form_blog_input_name])|| empty($_POST[form_blog_title_name])  )     ){

		//display an error message in case the blogger didn´t write a title or the text.
		//as the image is optinal if an image is not uploaded there wont be an error message.
		echo '<p style="color: red;">Please enter a title and a post</p>'.PHP_EOL;	
	}

}



function print_page_title()
{
	h1("Blog World");

}


//some sort of upload happened
if(!empty($_POST[form_blog_input_name]) && !empty($_POST[form_blog_title_name])){
	

	print_page_title();

	//confirm update
	confirm_update();


	//give them a link to view it and old posts
	create_link();

}

elseif(!empty($_GET) && $_GET["post"] != null){

	
	print_page_title();

	//this gives acces to just view the post selected
	linkPost($_GET["post"]);

	//give them a link to view it and old posts
	create_link();
	
}

else//regular viewing of the page
{

	print_page_title();


	display_update_form();


}



//this method gives us the number of times the page has been visited. you can also reset the value.
printsesion();


endOfPage();
ob_end_flush(); 




?>