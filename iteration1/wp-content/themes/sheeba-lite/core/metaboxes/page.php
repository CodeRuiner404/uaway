<?php

/**
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

new sheeba_lite_metaboxes (

	'page', 
	
	array(

		array(
		
			'name' => 'Navigation',  
			'type' => 'navigation',  
			'item' => array( 
				
				'general' => esc_html__( 'Setting', 'sheeba-lite') , 
					
			),   
				
			'start' => '<ul>', 
			'end' => '</ul>'),  
		
		array(
			
			'type' => 'begintab',
			'tab' => 'general',
			'element' =>
				
				array(
					'name' => esc_html__( 'Page settings','sheeba-lite'),
					'type' => 'title',
				),
		
				array(
					'name' => esc_html__( 'Template','sheeba-lite'),
					'desc' => esc_html__( 'Select a template for this page','sheeba-lite'),
					'id' => 'sheeba_lite_template',
					'type' => 'select',
					'options' => array(
						'full' => esc_html__( 'Full Width','sheeba-lite'),
						'left-sidebar' =>  esc_html__( 'Left Sidebar','sheeba-lite'),
						'right-sidebar' => esc_html__( 'Right Sidebar','sheeba-lite'),
					),
					'std' => 'right-sidebar',
				),
		
		),
		
		array(
			'type' => 'endtab'
		),
		
	array( 'type' => 'endsection' )
	
	)
	
);

?>