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
class aThemes_Pricing_Table extends Widget_Base {

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
		return 'athemes-pricing-table';
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
		return __( 'aThemes: Pricing table', 'atu' );
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
		return 'eicon-price-table';
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
				'label' => __( 'Icon List', 'atu' ),
			]
		);

		$this->add_control(
			'currency',
			[
				'label' 		=> __( 'Currency', 'atu' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> '$',
				'placeholder' 	=> '$',
			]
		);		

		$this->add_control(
			'price',
			[
				'label' 		=> __( 'Price', 'atu' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> '35',
				'placeholder' 	=> __( 'Price', 'atu' ),
			]
		);


		$this->add_control(
			'period',
			[
				'label' 		=> __( 'Period', 'atu' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'month', 'atu' ),
				'placeholder' 	=> __( 'Period', 'atu' ),
			]
		);

		$this->add_control(
			'name',
			[
				'label' 		=> __( 'Name', 'atu' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Agency', 'atu' ),
				'placeholder' 	=> __( 'Plan name', 'atu' ),
			]
		);		

		$this->add_control(
			'features_list',
			[
				'label' => __( 'Features list', 'atu' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'text' => __( 'Just a feature', 'atu' ),
					],
					[
						'text' => __( 'Just a feature', 'atu' ),
					],
					[
						'text' => __( 'Just a feature', 'atu' ),
					],
				],
				'fields' => [
					[
						'name' => 'text',
						'label' => __( 'Feature name', 'atu' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'Just a feature', 'atu' ),
						'default' => __( 'Just a feature', 'atu' ),
					],
				],
			]
		);

		$this->add_control(
			'button_url',
			[
				'label' 		=> __( 'Button URL', 'atu' ),
				'type' 			=> Controls_Manager::URL,
				'default' => [
					'url' => '#',
				],
				'placeholder' 	=> __( 'http://example.org', 'atu' ),
			]
		);			

		$this->add_control(
			'button_text',
			[
				'label' 		=> __( 'Button text', 'atu' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Click me', 'atu' ),
				'placeholder' 	=> __( 'Button text', 'atu' ),
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
			'general_bg_color',
			[
				'label' 	=> __( 'Background color', 'atu' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .plan-item-inner' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();


		//Currency styles
		$this->start_controls_section(
			'section_currency_style',
			[
				'label' => __( 'Currency', 'atu' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'currency_color',
			[
				'label' 	=> __( 'Color', 'atu' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-section .plan-price span:first-of-type' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'currency_size',
			[
				'label' 	=> __( 'Size', 'atu' ),
				'type' 		=> Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pricing-section .plan-price span:first-of-type' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		//End currency styles	
		//Price styles
		$this->start_controls_section(
			'section_price_style',
			[
				'label' => __( 'Price', 'atu' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'price_color',
			[
				'label' 	=> __( 'Color', 'atu' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-section .plan-price' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'price_size',
			[
				'label' 	=> __( 'Size', 'atu' ),
				'type' 		=> Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 80,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pricing-section .plan-price' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		//End price styles
		//Period styles
		$this->start_controls_section(
			'section_period_style',
			[
				'label' => __( 'Period', 'atu' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'period_color',
			[
				'label' 	=> __( 'Color', 'atu' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-section .plan-price span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'period_size',
			[
				'label' 	=> __( 'Size', 'atu' ),
				'type' 		=> Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pricing-section .plan-price span' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		//End period styles	
		

		//Feature styles
		$this->start_controls_section(
			'section_features_style',
			[
				'label' => __( 'Features', 'atu' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'features_color',
			[
				'label' 	=> __( 'Background Color', 'atu' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .plan-feature' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'features_icons',
			[
				'label' 	=> __( 'Show icons?', 'atu' ),
				'default'	=> 1,
				'type' 		=> Controls_Manager::SWITCHER,
			]
		);


		$this->end_controls_section();
		//End header styles	

		//Button styles
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => __( 'Button', 'atu' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button',
			]
		);
	
		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'atu' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' 	=> __( 'Text Color', 'atu' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' 	=> __( 'Background Color', 'atu' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'atu' ),
			]
		);

		$this->add_control(
			'hover_color',
			[
				'label' 	=> __( 'Text Color', 'atu' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.elementor-button:hover, {{WRAPPER}} .elementor-button:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_hover_color',
			[
				'label' => __( 'Background Color', 'atu' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.elementor-button:hover, {{WRAPPER}} .elementor-button:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label' => __( 'Border Color', 'atu' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} a.elementor-button:hover, {{WRAPPER}} .elementor-button:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Hover Animation', 'atu' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .elementor-button',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'atu' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'default' => [	'top' => 0,
						'right' => 0,
						'bottom' => 0,
						'left' => 0,
						'unit' => 'px',
						'isLinked' => false,
					],				
				'selectors' => [
					'{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .elementor-button',
			]
		);

		$this->add_control(
			'text_padding',
			[
				'label' => __( 'Padding', 'atu' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [	'top' => 12,
						'right' => 25,
						'bottom' => 12,
						'left' => 25,
						'unit' => 'px',
						'isLinked' => false,
					],
				'selectors' => [
					'{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();
		//End button styles

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
		$show_icons = $settings['features_icons'];
		?>

		<div class="pricing-section">
			<div class="plan-item-inner">
			<div class="plan-header">
				<div class="plan-header-inner">
					<h4><?php echo $settings['name']; ?></h4>
					<div class="plan-price">
						<span class="currency"><?php echo $settings['currency']; ?></span><?php echo $settings['price']; ?><span>/&nbsp;<?php echo $settings['period']; ?></span>		
					</div>	
				</div>
			</div>

			<div class="plan-text">
				<?php foreach ( $settings['features_list'] as $index => $item ) :
					?>
					<div class="plan-feature" >
						<?php if ( $show_icons ) : ?>
						<i class="fa fa-check"></i>
						<?php endif; ?>
						<?php echo $item['text']; ?>
					</div>
					<?php
				endforeach;
				?>
			</div>

			<?php
				if ( ! empty( $settings['button_url']['url'] ) ) {
					$this->add_render_attribute( 'button', 'href', $settings['button_url']['url'] );
					$this->add_render_attribute( 'button', 'class', 'elementor-button' );

					if ( $settings['button_url']['is_external'] ) {
						$this->add_render_attribute( 'button', 'target', '_blank' );
					}

					if ( $settings['button_url']['nofollow'] ) {
						$this->add_render_attribute( 'button', 'rel', 'nofollow' );
					}
				}
			?>
				<div class="plan-btn">
				<a <?php echo $this->get_render_attribute_string( 'button' ); ?>>
					<?php echo $settings['button_text']; ?>
				</a>	
				</div>
			</div>
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
Plugin::instance()->widgets_manager->register_widget_type( new aThemes_Pricing_Table() );