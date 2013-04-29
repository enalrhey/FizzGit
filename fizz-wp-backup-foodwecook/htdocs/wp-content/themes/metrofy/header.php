<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	
	<!-- Jena added typekit - two lines below -->
	<script type="text/javascript" src="//use.typekit.net/sum4wcx.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	
	
	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title><?php bloginfo('name');?> | <?php bloginfo('title');?></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<?php		
		$tmg_data = get_option(OPTIONS); 
		//default values
		$skin = "light";
		$color = "blue";		
		$skin = $tmg_data['skin'];
		$color = $tmg_data['themeColor'];
		$show_home = true;
		if(strtolower($tmg_data['slider_layout']) == "from_page")
			$show_home = false;

		$is_home = is_home();

		$top_link = "#top";
		
	?>
	<!-- CSS
  ================================================== -->	 
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>	
	<div id="top"></div>
	<div class="band header" id="topheader">
		<header class="main container">	
			<?php
				if ($is_home){
					$top_link = "#top";
					$top_link_class = "internal";
				}
				else{
					$top_link = home_url();
					$top_link_class = "";
				}
			?>

			<h1 class="logo">
				<a href="<?php echo $top_link; ?>" class="<?php echo $top_link_class;?>">
					<?php					
						$logoimg = $tmg_data['logo'];					
					?>
					<img src="<?php echo $logoimg;?>" alt="logo"/>			
				</a>
			</h1>			
			<div class="social_menu"> 
				<ul>
					<li>
						<a href="<?php echo $tmg_data['social_icon_1_link']; ?>" target="_blank" class="socialicon" 
						data-roll="<?php echo get_template_directory_uri(). '/images/'.$color.'/'.strtolower($tmg_data['social_icon_1']).'_roll.png'?>" 
						data-tooltip="<?php echo get_template_directory_uri(). '/images/'.$color.'/'.strtolower($tmg_data['social_icon_1']).'_tool.png'?>" 
						data-normal="<?php echo get_template_directory_uri(). '/images/'.strtolower($tmg_data['social_icon_1']).'.png'?>"
						style="">
							<img src="<?php echo get_template_directory_uri(). '/images/'.strtolower($tmg_data['social_icon_1']).'.png'?>" 
							alt="<?php echo $tmg_data['social_icon_1']; ?>">
						</a>
					</li>
					<li>
						<a href="<?php echo $tmg_data['social_icon_2_link']; ?>" target="_blank" class="socialicon" 
						data-roll="<?php echo get_template_directory_uri(). '/images/'.$color.'/'.strtolower($tmg_data['social_icon_2']).'_roll.png'?>" 
						data-tooltip="<?php echo get_template_directory_uri(). '/images/'.$color.'/'.strtolower($tmg_data['social_icon_2']).'_tool.png'?>" 
						data-normal="<?php echo get_template_directory_uri(). '/images/'.strtolower($tmg_data['social_icon_2']).'.png'?>"
						style="">
							<img src="<?php echo get_template_directory_uri(). '/images/'.strtolower($tmg_data['social_icon_2']).'.png'?>" 
							alt="<?php echo $tmg_data['social_icon_2']; ?>">
						</a>
					</li>
					<li>
						<a href="<?php echo $tmg_data['social_icon_3_link']; ?>" target="_blank" class="socialicon" 
						data-roll="<?php echo get_template_directory_uri(). '/images/'.$color.'/'.strtolower($tmg_data['social_icon_3']).'_roll.png'?>" 
						data-tooltip="<?php echo get_template_directory_uri(). '/images/'.$color.'/'.strtolower($tmg_data['social_icon_3']).'_tool.png'?>" 
						data-normal="<?php echo get_template_directory_uri(). '/images/'.strtolower($tmg_data['social_icon_3']).'.png'?>"
						style="">
							<img src="<?php echo get_template_directory_uri(). '/images/'.strtolower($tmg_data['social_icon_3']).'.png'?>" 
							alt="<?php echo $tmg_data['social_icon_3']; ?>">
						</a>
					</li>
				</ul>
			</div>
		</header>	
	</div>	
	<div id="tray">
		<div id="nav" class="band navigation">
			<div>
				<nav class="primary container" id="navbar">	
				<?php
					if($is_home)
					{
						$defaults = array(
							'theme_location'  => 'main-menu',							
							'container'       => false,														
							'menu_class'      => 'home-menu sf-menu',
							'fallback_cb'     => 'metrofy_nav_fallback',																			
						);

						wp_nav_menu( $defaults );
					}
					else
					{
						$defaults = array(
							'theme_location'  => 'main-menu',							
							'container'       => false,														
							'menu_class'      => 'menu sf-menu',
							'fallback_cb'     => 'metrofy_nav_fallback',
							'walker' 		  => new custom_menu_walker()																			
						);

						wp_nav_menu( $defaults );
					}
				?>		
				</nav>
			</div>
		</div>
	</div><!--end band-->	