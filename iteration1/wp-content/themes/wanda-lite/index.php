<?php 

	get_header();
	
	get_sidebar('top');
	get_sidebar('header');
	
	get_template_part('core/templates/featured', 'area'); 
	
	if ( !sheeba_lite_setting('sheeba_lite_home_layout') || sheeba_lite_setting('sheeba_lite_home_layout') == 'col-md-3' ) {
				
		get_template_part('layouts/home', 'masonry'); 

	} else if ( strstr(sheeba_lite_setting('sheeba_lite_home_layout'), 'sidebar' )) { 

		get_template_part('layouts/home', 'sidebar'); 

	} else { 
		
		get_template_part('layouts/home', 'classic');
			
	}

	get_footer(); 
	
?>