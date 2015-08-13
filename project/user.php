<?php


/**
* Blog application
* user can upload a new status
* also view previous status
*
*/
define("true-access",true);
include("lib/layout.php");

$totalPosts = intval(file_get_contents("./blogs/totalPosts"));



ob_start();
session_start();
startOfPage("blogWorld");



define("form_blog_input_name","blog");
define("form_blog_title_name","title");







function view_past_uploads()
{
	global $totalPosts;

	//we just want to print the last 5 posts of our blog.

	for($j=$totalPosts; $j>=$totalPosts-5 ;$j--){

		$blogPath= "./blogs/blog".$j."/";

		if (file_exists($blogPath)){

			$titlePath=$blogPath."title.txt";
			$textPath=$blogPath."text.txt";
			$imagePath=$blogPath."image";
	
			

			$stringText=file_get_contents($textPath);
			$stringText=str_replace("\r","<br>",$stringText);

			$stringTitle=file_get_contents($titlePath);


			

			
			echo '<a href="/src/user.php?post='.$j.'"><h2>'.$stringTitle.'</h2></a>';
			echo '<p>'.$stringText.'</p>';

			if(file_exists( $imagePath )){
				echo "<img width='500px' heigth='500px' src='blogs/blog".$j."/image'>";

			}

		}
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
	echo '<h4><a href="?">View Posts </a></h4>';

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

	//view existing blog entries
	view_past_uploads();


}



//this method gives us the number of times the page has been visited. you can also reset the value.
printsesion();


endOfPage();
ob_end_flush(); 




?>