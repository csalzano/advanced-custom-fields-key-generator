<?php
defined( 'ABSPATH' ) or exit;

if( class_exists( 'ACF_Admin_Tool' ) )
{
	class ACF_Admin_Tool_Key_Generator extends ACF_Admin_Tool
	{
		/**
		 *  initialize
		 *
		 *  This function will initialize the admin tool
		 *
		 *  @return  void
		 */
		function initialize() {

			// vars
			$this->name  = 'key-generator';
			$this->title = __( 'Key Generator', 'acf-key-gen' );
		}

		/**
		 *  html
		 *
		 *  This function will output the metabox HTML
		 *
		 *  @return  void
		 */
		function html() {
			
			?><p><?php  

				printf(
					'<p>%s</p>',
					esc_html__( 'Field and group keys are needed when coding ACF objects.', 'acf-key-gen' )
				);		
			
			?></p><div class="acf-fields"><?php

			acf_render_field_wrap(
				array(
					'label'        => __( 'Type', 'acf-key-gen' ),
					'type'         => 'radio',
					'name'         => 'key_type',
					'layout'       => 'horizontal',
					'choices'      => array(
						'field' => __( 'Field', 'acf-key-gen' ),
						'group' => __( 'Group', 'acf-key-gen' ),
					),
				)
			);

			acf_render_field_wrap(
				array(
					'label'   => __( 'Key', 'acf-key-gen' ),
					'type'    => 'text',
					'name'    => 'generated_key',
					'prefix'  => false,
				)
			);
			
			?></div>
			<script type="text/javascript">
				function generate_key()
				{
					var radios = document.getElementsByName('key_type');
					for(i = 0; i < radios.length; i++) {
						if(radios[i].checked) {
							document.getElementById('generated_key').value = acf.uniqid(radios[i].value + '_');
						}
					}					
				}
			</script>
			<p class="acf-submit">
				<button type="button" name="action" class="button button-primary" value="generate" onclick="generate_key()"><?php _e( 'Generate Key', 'acf-key-gen' ); ?></button>
			</p><?php

		}
	}
}
