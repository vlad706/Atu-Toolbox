<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor icon list widget.
 *
 * Elementor widget that displays a bullet list with any chosen icons and texts.
 *
 * @since 1.0.0
 */
class aThemes_Employee extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve icon list widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'athemes-employee';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve icon list widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'aThemes: Employee', 'atu' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve icon list widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-person';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the icon list widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'atu-elements' ];
	}

	/**
	 * Register icon list widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_timeline',
			[
				'label' => __( 'Employee', 'atu' ),
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'atu' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->add_control(
			'name',
			[
				'label' => __( 'Employee name', 'atu' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'John Doe', 'atu' ),
				'placeholder' => __( 'Enter the name', 'atu' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'position',
			[
				'label' => __( 'Position', 'atu' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'General Manager', 'atu' ),
				'placeholder' => __( 'Enter the position', 'atu' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'facebook',
			[
				'label' => __( 'Facebook link', 'atu' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'atu' ),
				'separator' => 'before',
			]
		);
		$this->add_control(
			'twitter',
			[
				'label' => __( 'Twitter link', 'atu' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'atu' ),
				'separator' => 'before',
			]
		);
		$this->add_control(
			'linkedin',
			[
				'label' => __( 'Linkedin link', 'atu' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'atu' ),
				'separator' => 'before',
			]
		);


		$this->add_control(
			'link',
			[
				'label' => __( 'Link (for person\'s name)', 'atu' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'atu' ),
				'separator' => 'before',
			]
		);




		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'atu' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->end_controls_section();


		//General styles
		$this->start_controls_section(
			'section_general_style',
			[
				'label' => __( 'General', 'atu' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'overlay_bg_color',
			[
				'label' 	=> __( 'Overlay background', 'atu' ),
				'type' 		=> Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .employee .avatar::after' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'overlay_opacity',
			[
				'label' 	=> __( 'Overlay opacity', 'atu' ),
				'type' 		=> Controls_Manager::NUMBER,
				'default'	=> '0.9',
				'min'     => 0,
				'max'     => 1,
				'step'    => 0.05,
				'selectors' => [
					'{{WRAPPER}} .employee .team-item:hover .avatar::after' => 'opacity: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
		//End general styles	

		//Social styles
		$this->start_controls_section(
			'section_icons_style',
			[
				'label' => __( 'Social icons', 'atu' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		//Icons default state
		$this->start_controls_tabs( 'tabs_icons' );

		$this->start_controls_tab(
			'tab_icons_normal',
			[
				'label' => __( 'Normal', 'atu' ),
			]
		);		
		$this->add_control(
			'icons_color',
			[
				'label' 	=> __( 'Color', 'atu' ),
				'type' 		=> Controls_Manager::COLOR,
				'default'	=> '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .employee .team-item .team-social li a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icons_bg_color',
			[
				'label' 	=> __( 'Background Color', 'atu' ),
				'type' 		=> Controls_Manager::COLOR,
				'default'	=> 'rgba(255, 255, 255, 0.2)',
				'selectors' => [
					'{{WRAPPER}} .employee .team-item .team-social li a' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		//Icons hover
		$this->start_controls_tab(
			'tab_icons_hover',
			[
				'label' => __( 'Hover', 'atu' ),
			]
		);
		$this->add_control(
			'icons_hover_color',
			[
				'label' 	=> __( 'Color', 'atu' ),
				'type' 		=> Controls_Manager::COLOR,
				'default'	=> '#62e8be',
				'selectors' => [
					'{{WRAPPER}} .employee .team-item .team-social li:hover a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icons_bg_hover_color',
			[
				'label' 	=> __( 'Background Color', 'atu' ),
				'type' 		=> Controls_Manager::COLOR,
				'default'	=> '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .employee .team-item .team-social li:hover a' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();


		$this->end_controls_section();
		//End icons styles	

		//Employee name styles
		$this->start_controls_section(
			'section_employee_name_style',
			[
				'label' => __( 'Employee name', 'atu' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'employee_name_color',
			[
				'label' 	=> __( 'Color', 'atu' ),
				'type' 		=> Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .employee .team-content .name, {{WRAPPER}} .employee .team-content .name a' => 'color: {{VALUE}};',				
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'employee_name_typography',
				'selector' 	=> '{{WRAPPER}} .employee .team-content .name',
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();
		//End event date styles	

		//Employee position styles
		$this->start_controls_section(
			'section_employee_position_style',
			[
				'label' => __( 'Employee position', 'atu' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'employee_position_color',
			[
				'label' 	=> __( 'Color', 'atu' ),
				'type' 		=> Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .employee .team-content .pos' => 'color: {{VALUE}};',				
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'employee_position_typography',
				'selector' 	=> '{{WRAPPER}} .employee .team-content .pos',
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();
		//End employee position styles
	}

	/**
	 * Render icon list widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings 	= $this->get_settings();
		?>

		<div class="employee">
			<div class="team-item">
			    <div class="team-inner">
					<?php
					if ( ! empty( $settings['image']['url'] ) ) {
						$this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
						$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
						$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
					?>
					<div class="avatar">
						<img <?php echo $this->get_render_attribute_string( 'image' ); ?>/>
					</div>
					<?php
					}
					?>
					<ul class="team-social">
						<li><a class="facebook" href="<?php echo esc_url( $settings['facebook']['url'] ); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li><a class="twitter" href="<?php echo esc_url( $settings['twitter']['url'] ); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<li><a class="linkedin" href="<?php echo esc_url( $settings['linkedin']['url'] ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
					</ul>
			    </div>
			    <div class="team-content">
			        <div class="name">
						<?php if ( ! empty( $settings['link']['url'] ) ) {
							$this->add_render_attribute( 'link', 'href', $settings['link']['url'] );

							if ( $settings['link']['is_external'] ) {
								$this->add_render_attribute( 'link', 'target', '_blank' );
							}

							if ( ! empty( $settings['link']['nofollow'] ) ) {
								$this->add_render_attribute( 'link', 'rel', 'nofollow' );
							}
							?>
							<a <?php echo $this->get_render_attribute_string( 'link' ); ?>><?php echo esc_html( $settings['name'] ); ?></a>
							<?php
						} else {
							echo esc_html( $settings['name'] );
						}
						?>
			        </div>
			        <div class="pos"><?php echo esc_html( $settings['position'] ); ?></div>			
			    </div>
			</div><!-- /.team-item -->
		</div>		

		<?php
	}

	/**
	 * Render icon list widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _content_template() {
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new aThemes_Employee() );