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
class aThemes_Testimonials_Carousel extends Widget_Base {

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
		return 'athemes-testimonials-carousel';
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
		return __( 'aThemes: Testimonials', 'atu' );
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
		return 'eicon-slider-push';
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
			'section_icon',
			[
				'label' => __( 'Testimonials', 'atu' ),
			]
		);

		$this->add_control(
			'section_title',
			[
				'label' 	=> __( 'Section title', 'atu' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> __( 'Our Testimonials', 'atu' ),
			]
		);

		$this->add_control(
			'testimonials_carousel',
			[
				'label' => '',
				'type' => Controls_Manager::REPEATER,
				'fields' => [				
					[
						'name' => 'text',
						'label' => __( 'Name', 'atu' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'Person\'s name', 'atu' ),
						'default' => __( 'John Doe', 'atu' ),
					],
					[
						'name' => 'position',
						'label' => __( 'Position', 'atu' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'Person\'s position', 'atu' ),
					],
					[
						'name' => 'image',
						'label' => __( 'Photo', 'atu' ),
						'type' => Controls_Manager::MEDIA,
						'label_block' => true,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					],
					[
						'name' => 'textarea',
						'label' => __( 'Text', 'atu' ),
						'type' => Controls_Manager::TEXTAREA,
						'label_block' => true,
						'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consectetur leo ac euismod commodo. Vivamus suscipit odio eget felis lacinia hendrerit sit amet non tortor',
					],
					[
						'name' => 'link',
						'label' => __( 'Link', 'atu' ),
						'type' => Controls_Manager::URL,
						'label_block' => true,
						'placeholder' => __( 'https://example.com', 'atu' ),
					],
				],
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


		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Section title', 'atu' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_title_color',
			[
				'label' => __( 'Color', 'atu' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#191919',
				'selectors' => [
					'{{WRAPPER}} h3' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'section_title_typography',
				'selector' => '{{WRAPPER}} h3',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'name_style',
			[
				'label' => __( 'Name', 'atu' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'name_color',
			[
				'label' => __( 'Color', 'atu' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#191919',
				'selectors' => [
					'{{WRAPPER}} h4' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'selector' => '{{WRAPPER}} h4',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'position_style',
			[
				'label' => __( 'Position', 'atu' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'position_color',
			[
				'label' => __( 'Color', 'atu' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#bfbfbf',
				'selectors' => [
					'{{WRAPPER}} .testimonial-position' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'position_typography',
				'selector' => '{{WRAPPER}} .testimonial-position',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_style',
			[
				'label' => __( 'Content', 'atu' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => __( 'Color', 'atu' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#595959',
				'selectors' => [
					'{{WRAPPER}} p' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} p',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();

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
		$settings = $this->get_settings();
		?>

		<div class="testimonials-section">
			<?php if ( $settings['section_title'] ) : ?>
			<div class="title-wrapper">
				<h3><?php echo $settings['section_title']; ?></h3>
				<span><i class="fa fa-quote-right"></i></span>
			</div>
			<?php endif; ?>

			<ul class="elementor-slick-slider athemes-slick-slider athemes-testimonials-carousel">
				<?php foreach ( $settings['testimonials_carousel'] as $index => $item ) :
					$repeater_setting_key = $this->get_repeater_setting_key( 'text', 'testimonials_carousel', $index );

					$this->add_render_attribute( $repeater_setting_key, 'class', 'elementor-icon-list-text' );

					$this->add_inline_editing_attributes( $repeater_setting_key );
					?>
					<li>

						<p><?php echo esc_textarea( $item['textarea'] ); ?></p>

						<div class="testimonial-info">
							<div class="testimonial-image-wrapper">
							<?php echo wp_get_attachment_image( absint( $item['image']['id'] ), 'thumbnail' ); ?>
							</div>
							<div class="testimonial-name-wrapper">
							<?php
							if ( ! empty( $item['link']['url'] ) ) {
								$link_key = 'link_' . $index;

								$this->add_render_attribute( $link_key, 'href', $item['link']['url'] );

								if ( $item['link']['is_external'] ) {
									$this->add_render_attribute( $link_key, 'target', '_blank' );
								}

								if ( $item['link']['nofollow'] ) {
									$this->add_render_attribute( $link_key, 'rel', 'nofollow' );
								}

								echo '<a class="readmore" ' . $this->get_render_attribute_string( $link_key ) . '>';
							} ?>

							<h4 <?php echo $this->get_render_attribute_string( $repeater_setting_key ); ?>><?php echo $item['text']; ?></h4>
							<div class="testimonial-position"><?php echo esc_html( $item['position'] ); ?></div>

							<?php
							if ( ! empty( $item['link']['url'] ) ) {
								echo '</a>';
							}
							?>
							</div>
						</div>
					</li>
					<?php
				endforeach;
				?>
			</ul>
			<div class="testimonials-arrows">
				<div class="prev"><i class="fa fa-angle-left"></i></div>
				<div class="next"><i class="fa fa-angle-right"></i></div>
			</div>
		</div><!-- .testimonials-section -->

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


Plugin::instance()->widgets_manager->register_widget_type( new aThemes_Testimonials_Carousel() );