<?php 

	get_header(); 
	get_template_part('core/templates/breadcrumb'); 
	get_sidebar('top');
	get_sidebar('header');

	if ( sheeba_lite_setting('sheeba_lite_search_layout') == 'col-md-4' ) {
				
		get_template_part('layouts/search','masonry'); 

	} else if ( !sheeba_lite_setting('sheeba_lite_search_layout') || strstr(sheeba_lite_setting('sheeba_lite_search_layout'), 'sidebar' )) { 

		get_template_part('layouts/search','sidebar'); 

	} else { 
		
		get_template_part('layouts/search','classic');
			
	}

	get_footer(); 

?>