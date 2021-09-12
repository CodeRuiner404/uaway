<?php 

	get_header();
	get_template_part('core/templates/breadcrumb'); 
	get_sidebar('top');
	get_sidebar('header');

	if ( !sheeba_lite_setting('sheeba_lite_category_layout') || sheeba_lite_setting('sheeba_lite_category_layout') == 'col-md-3' ) {
				
		get_template_part('layouts/archive','masonry'); 

	} else if ( strstr(sheeba_lite_setting('sheeba_lite_category_layout'), 'sidebar' )) { 

		get_template_part('layouts/archive','sidebar'); 

	} else { 
		
		get_template_part('layouts/archive','classic');
			
	}

	get_footer(); 

?>