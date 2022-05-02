<?php
//Define default variables{}

if(!isset($page_title)){
	$page_title='';
}
else{
	$page_title=$page_title;
}

?>

<!--

 
          _.---._
       .-' ((O)) '-.
        \ _.\_/._ /
         /..___..\
         ;-.___.-;
        (| e ) e |)     .;.
         \  /_   /      ||||
         _\__-__/_    (\|'-|
       /` / \V/ \ `\   \ )/
      /   \  Y  /   \  /=/
     /  |  \ | / {}  \/ /
    /  /|   `|'   |\   /
    \  \|    |.   | \_/
     \ /\    |.   |
      \_/\   |.   |
      /)_/   |    |
     // ',__.'.__,'
    //   |   |   |
   //    |   |   |
  (/     |   |   |
         |   |   |
         | _ | _ |
         |   |   |
         |   |   |
         |   |   |
         |___|___|
         /  / \  \
        (__/   \__)
 


-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Parallelus" />
	<meta name="description" content="A brief description of this website or your business." />
	<meta name="keywords" content="keywords, or phrases, associated, with each page, are best" />
	<title><?php echo $page_title; ?> :: TTS - Together is Better</title>
	
	<!-- Favorites icon -->
	<link rel="shortcut icon" href="http://para.llel.us/favicon.ico" />
	
	<!-- Style sheets -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/reset.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/menu.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/fancybox.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/tooltip.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/default.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/skins/skin-3.css" />
	
	<!-- jQuery framework and utilities -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.4.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.easing.1.3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/hoverIntent.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.bgiframe.min.js"></script>
	<!-- Drop down menus -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/superfish.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/supersubs.min.js"></script>
	<!-- Tooltips -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.cluetip.min.js"></script>
	<!-- Input labels -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.overlabel.min.js"></script>
	<!-- Anchor tag scrolling effects -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.scrollTo-min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.localscroll-min.js"></script>
	<!-- Inline popups/modal windows -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.fancybox-1.2.6.pack.js"></script>		
	<!-- Font replacement (cufón) -->
	<script src="<?php echo base_url(); ?>js/cufon-yui.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/LiberationSans.font.js" type="text/javascript"></script>

	<!-- IE only includes (PNG Fix and other things for sucky browsers -->
	
	<!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" href="css/ie-only.css">
		<script type="text/javascript" src="js/pngFix.min.js"></script>
		<script type="text/javascript"> 
			$(document).ready(function(){ 
				$(document.body).supersleight();
			}); 
		</script> 
	<![endif]-->
	<!--[if IE]><link rel="stylesheet" type="text/css" href="css/ie-only-all-versions.css"><![endif]-->
	
	
	<!-- BEGIN: For Demo Only -->
		<!--			
		These entries are only needed for demo features, such as the real-time skin changer.
		They can be deleted for production installs without effecting the theme's design or 
		any of the funcionality.
		-->
		<script type="text/javascript" src="<?php echo base_url(); ?>js/demo.js"></script>	
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/demo.css" />
	<!-- END: For Demo Only -->
	

	<!-- Functions to initialize after page load -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/source/onLoad.js"></script>
	
	<!-- form validation scripts (for contact page) -->
	<script src="<?php echo base_url(); ?>js/jquery.validate.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		// initialize form validation
		$(document).ready(function() {
			$("#CommentForm").validate();
		});
	</script>
	
	
</head>
<body>

<!-- Top reveal (slides open, add class "topReveal" to links for open/close toggle ) -->
<div id="ContentPanel">

</div>

<!-- Site Container -->
<div id="Wrapper">
	<div id="PageWrapper">
		<div class="pageTop"></div>
		<div id="Header">
		
			<!-- Main Menu -->
			<div id="MenuWrapper">
				<div id="MainMenu">
					<div id="MmLeft"></div>
					<div id="MmBody">
						
						<!-- Main Menu Links -->
						<ul class="sf-menu">
							<li class="current"><a href="<?php echo base_url(); ?>">Home</a></li>
							<li>
								<a href="<?php echo base_url(); ?>index.php/tickets">Tickets</a>
							</li>
							<li>

							<li><a href="<?php echo base_url(); ?>index.php/contact">Contact</a></li>	
						</ul>
						
						<div class="mmDivider"></div>				
						
						<!-- Extra Menu Links -->
						<ul id="MmOtherLinks" class="sf-menu">
							<li>
								<a href="#"><span class="mmFeeds">Terms and Services</span></a>
							</li>
							<li><a href="<?php echo base_url(); ?>index.php/accounts" class="login1"><span class="mmLogin">Account</span></a></li>
						</ul>
						
					</div>
					<div id="MmRight"></div>
				</div>
			</div>
			
			<!-- Search -->
			<div id="Search">
				<form action="#" id="SearchForm" method="post">
					<p style="margin:0;"><input type="text" name="SearchInput" id="SearchInput" value="" /></p>
					<p style="margin:0;"><input type="submit" name="SearchSubmit" id="SearchSubmit" class="noStyle" value="" /></p>
				</form>
			</div>
			
			<!-- Logo -->
			<div id="Logo">
				<a href="<?php echo base_url(); ?>">                
                	<img src="<?php echo base_url(); ?>images/skins/skin-3/logos/logo2.png" alt="Ticket Time Saver" />                    
                </a>
			</div>
			
			<!-- End of Content -->
			<div class="clear"></div>
		
		</div>
		
		<div class="pageMain">
			
			<div class="contentArea">
				<!-- Title / Page Headline -->
				<div class="full-page">
					<h1 class="headline"><?php echo $page_title; ?></h1>
				</div>
				
				<div class="hr"></div>

				<!-- Breadcrumbs -->
				<div class="full-page">
					<p class="breadcrumbs">
					</p>
				</div>
				
				<!-- End of Content -->
				<div class="clear"></div>
			</div>
			
			<div class="contentArea">
				<div class="full-page">