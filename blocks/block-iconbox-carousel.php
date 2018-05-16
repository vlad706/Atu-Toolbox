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
class aThemes_Iconbox_Carousel extends Widget_Base {

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
		return 'athemes-iconbox-carousel';
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
		return __( 'aThemes: Carousel Icon Box', 'atu' );
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
				'label' => __( 'Icon boxes', 'atu' ),
			]
		);

		$this->add_control(
			'iconbox_carousel',
			[
				'label' => '',
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'text' 		=> __( 'Icon box #1', 'atu' ),
						'icon' 		=> 'fa fa-check',
						'textarea' 	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consectetur leo ac euismod commodo. Vivamus suscipit odio eget felis lacinia hendrerit sit amet non tortor'
					],
					[
						'text' 		=> __( 'Icon box #2', 'atu' ),
						'icon' 		=> 'fa fa-times',
						'textarea' 	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consectetur leo ac euismod commodo. Vivamus suscipit odio eget felis lacinia hendrerit sit amet non tortor'
					],
					[
						'text' 		=> __( 'Icon box #3', 'atu' ),
						'icon' 		=> 'fa fa-dot-circle-o',
						'textarea' 	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consectetur leo ac euismod commodo. Vivamus suscipit odio eget felis lacinia hendrerit sit amet non tortor'
					],
				],
				'fields' => [
					[
						'name' => 'text',
						'label' => __( 'Text', 'atu' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'Icon box', 'atu' ),
						'default' => __( 'Icon box', 'atu' ),
					],
					[
						'name' => 'icon',
						'label' => __( 'Icon', 'atu' ),
						'type' => Controls_Manager::ICON,
						'label_block' => true,
						'default' => 'fa fa-check',
					],
					[
						'name' => 'textarea',
						'label' => __( 'Text', 'atu' ),
						'type' => Controls_Manager::TEXTAREA,
						'label_block' => true,
						'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consectetur leo ac euismod commodo. Vivamus suscipit odio eget felis lacinia hendrerit sit amet non tortor',
					],
					[
						'name' => 'linktext',
						'label' => __( 'Link text', 'atu' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'Read more', 'atu' ),
					],										
					[
						'name' => 'link',
						'label' => __( 'Link', 'atu' ),
						'type' => Controls_Manager::URL,
						'label_block' => true,
						'placeholder' => __( 'https://example.com', 'atu' ),
					],
				],
				'title_field' => '<i class="{{ icon }}" aria-hidden="true"></i> {{{ text }}}',
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
			'section_icon_style',
			[
				'label' => __( 'Icon', 'atu' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'atu' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#333',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-icon i' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Size', 'atu' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 48,
				],
				'range' => [
					'px' => [
						'min' => 6,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-icon' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-icon-list-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_text_style',
			[
				'label' => __( 'Text', 'atu' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_indent',
			[
				'label' => __( 'Text Indent', 'atu' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-text' => is_rtl() ? 'padding-right: {{SIZE}}{{UNIT}};' : 'padding-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => __( 'Text Color', 'atu' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-text' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'icon_typography',
				'selector' => '{{WRAPPER}} li h4',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_textarea_style',
			[
				'label' => __( 'Textarea', 'atu' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'textarea_indent',
			[
				'label' => __( 'Text Indent', 'atu' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} li p' => is_rtl() ? 'padding-right: {{SIZE}}{{UNIT}};' : 'padding-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'textarea_color',
			[
				'label' => __( 'Text Color', 'atu' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} li p' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'textarea_typography',
				'selector' => '{{WRAPPER}} li p',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();




		$this->start_controls_section(
			'section_readmore_style',
			[
				'label' => __( 'Read more link', 'atu' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'readmore_color',
			[
				'label' => __( 'Text Color', 'atu' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#191919',
				'selectors' => [
					'{{WRAPPER}} li a' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'readmore_typography',
				'selector' => '{{WRAPPER}} li a',
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
		<ul class="elementor-slick-slider athemes-slick-slider athemes-iconbox-carousel">
			<?php foreach ( $settings['iconbox_carousel'] as $index => $item ) :
				$repeater_setting_key = $this->get_repeater_setting_key( 'text', 'iconbox_carousel', $index );

				$this->add_render_attribute( $repeater_setting_key, 'class', 'elementor-icon-list-text' );

				$this->add_inline_editing_attributes( $repeater_setting_key );
				?>
				<li>
					<?php if ( $item['icon'] ) : ?>
						<span class="elementor-icon-list-icon">
							<i class="<?php echo esc_attr( $item['icon'] ); ?>" aria-hidden="true"></i>
						</span>
					<?php endif; ?>
					<h4 <?php echo $this->get_render_attribute_string( $repeater_setting_key ); ?>><?php echo $item['text']; ?></h4>
					<p><?php echo esc_attr( $item['textarea'] ); ?></p>


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
					}
					echo esc_html( $item['linktext'] );
					if ( ! empty( $item['link']['url'] ) ) {
						echo '</a>';
					}
					?>
				</li>
				<?php
			endforeach;
			?>
		</ul>
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


Plugin::instance()->widgets_manager->register_widget_type( new aThemes_Iconbox_Carousel() );