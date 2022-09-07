<?php
use Elementor\Controls_Manager;

class TS_Elementor_Widget_Language_Switcher extends TS_Elementor_Widget_Base{
	public function get_name(){
        return 'ts-language-switcher';
    }
	
	public function get_title(){
        return esc_html__( 'TS Language Switcher', 'themesky' );
    }
	
	public function get_categories(){
        return array( 'ts-elements', 'general' );
    }
	
	public function get_icon(){
		return 'fas fa-language';
	}
	
	protected function register_controls(){
		$this->start_controls_section(
            'section_general'
            ,array(
                'label' 	=> esc_html__( 'General', 'themesky' )
                ,'tab'   	=> Controls_Manager::TAB_CONTENT
            )
        );
		
		$this->add_control(
            'heading'
            ,array(
                'label' 		=> esc_html__( 'Note: This element is used for the WPML plugin', 'themesky' )
                ,'type' 		=> Controls_Manager::HEADING	
                ,'separator' 	=> 'after'
            )
        );
		
		$this->add_control(
            'dropdown_position'
            ,array(
                'label' 		=> esc_html__( 'Dropdown position', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> 'default'
				,'options'		=> array(
									'default'	=> esc_html__( 'Default', 'themesky' )
									,'up'		=> esc_html__( 'Up', 'themesky' )
								)			
                ,'description' 	=> ''
            )
        );
		
		$this->end_controls_section();
	}
	
	protected function render(){
		if( !function_exists('agrofood_wpml_language_selector') ){
			return;
		}
		
		$settings = $this->get_settings_for_display();
		
		$default = array(
			'dropdown_position'	=> 'default'
		);
		
		$settings = wp_parse_args( $settings, $default );
		
		extract( $settings );
		?>
		<div class="ts-language-switcher dropdown-<?php echo esc_attr($dropdown_position); ?>">
			<?php agrofood_wpml_language_selector(); ?>
		</div>
		<?php
	}
}

$widgets_manager->register_widget_type( new TS_Elementor_Widget_Language_Switcher() );