<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor image box widget.
 *
 * Elementor widget that displays an image, a headline and a text.
 *
 * @since 1.0.0
 */
class aThemes_Category_Grid extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve image box widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'athemes-categories-grid';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve image box widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'aThemes: Shop category grid', 'atu' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve image box widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-gallery-grid';
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
	 * Register image box widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {


		//Box 1
		$this->start_controls_section(
			'section_box_1',
			[
				'label' => __( 'Box 1', 'atu' ),
			]
		);

		$this->add_control(
			'image1',
			[
				'label' => __( 'Choose Image', 'atu' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'title1',
			[
				'label' => __( 'Label title', 'atu' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Shoes', 'atu' ),
				'placeholder' => __( 'Enter your label', 'atu' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'link1',
			[
				'label' => __( 'Link to', 'atu' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => '#',
				],
				'placeholder' => __( 'https://your-link.com', 'atu' ),
				'separator' => 'before',
				'show_external' => false
			]
		);

		$this->end_controls_section();


		//Box 2
		$this->start_controls_section(
			'section_box_2',
			[
				'label' => __( 'Box 2', 'atu' ),
			]
		);

		$this->add_control(
			'image2',
			[
				'label' => __( 'Choose Image', 'atu' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'title2',
			[
				'label' => __( 'Label title', 'atu' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Bags', 'atu' ),
				'placeholder' => __( 'Enter your label', 'atu' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'link2',
			[
				'label' => __( 'Link to', 'atu' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => '#',
				],				
				'placeholder' => __( 'https://your-link.com', 'atu' ),
				'separator' => 'before',
				'show_external' => false				
			]
		);

		$this->end_controls_section();


		//Box 3
		$this->start_controls_section(
			'section_box_3',
			[
				'label' => __( 'Box 3', 'atu' ),
			]
		);

		$this->add_control(
			'image3',
			[
				'label' => __( 'Choose Image', 'atu' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'title3',
			[
				'label' => __( 'Label title', 'atu' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Pants', 'atu' ),
				'placeholder' => __( 'Enter your label', 'atu' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'link3',
			[
				'label' => __( 'Link to', 'atu' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => '#',
				],				
				'placeholder' => __( 'https://your-link.com', 'atu' ),
				'separator' => 'before',
				'show_external' => false
			]
		);

		$this->end_controls_section();

		//Box 4
		$this->start_controls_section(
			'section_box_4',
			[
				'label' => __( 'Box 4', 'atu' ),
			]
		);

		$this->add_control(
			'title4',
			[
				'label' => __( 'Label title', 'atu' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Bags', 'atu' ),
				'placeholder' => __( 'Enter your label', 'atu' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'link4',
			[
				'label' => __( 'Link to', 'atu' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => '#',
				],				
				'placeholder' => __( 'https://your-link.com', 'atu' ),
				'separator' => 'before',
				'show_external' => false
			]
		);

		$this->end_controls_section();	

		//Box 5
		$this->start_controls_section(
			'section_box_5',
			[
				'label' => __( 'Box 5', 'atu' ),
			]
		);

		$this->add_control(
			'image5',
			[
				'label' => __( 'Choose Image', 'atu' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'title5',
			[
				'label' => __( 'Label title', 'atu' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Dresses', 'atu' ),
				'placeholder' => __( 'Enter your label', 'atu' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'link5',
			[
				'label' => __( 'Link to', 'atu' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => '#',
				],				
				'placeholder' => __( 'https://your-link.com', 'atu' ),
				'separator' => 'before',
				'show_external' => false
			]
		);

		$this->end_controls_section();




		$this->start_controls_section(
			'section_style_image',
			[
				'label' => __( 'Image', 'atu' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'image_space',
			[
				'label' => __( 'Image Spacing', 'atu' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 15,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-position-right .elementor-image-box-img' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.elementor-position-left .elementor-image-box-img' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.elementor-position-top .elementor-image-box-img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .elementor-image-box-img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'image_opacity',
			[
				'label' => __( 'Opacity (%)', 'atu' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-image-box-wrapper .elementor-image-box-img img' => 'opacity: {{SIZE}};',
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

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Content', 'atu' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'text_align',
			[
				'label' => __( 'Alignment', 'atu' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'atu' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'atu' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'atu' ),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'atu' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-image-box-wrapper' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'content_vertical_alignment',
			[
				'label' => __( 'Vertical Alignment', 'atu' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'top' => __( 'Top', 'atu' ),
					'middle' => __( 'Middle', 'atu' ),
					'bottom' => __( 'Bottom', 'atu' ),
				],
				'default' => 'top',
				'prefix_class' => 'elementor-vertical-align-',
			]
		);

		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Title', 'atu' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'title_bottom_space',
			[
				'label' => __( 'Spacing', 'atu' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-image-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'atu' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#0e304e',
				'selectors' => [
					'{{WRAPPER}} .elementor-image-box-content .elementor-image-box-title' => 'color: {{VALUE}};',
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
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .elementor-image-box-content .elementor-image-box-title',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'heading_description',
			[
				'label' => __( 'Description', 'atu' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => __( 'Color', 'atu' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#707070',
				'selectors' => [
					'{{WRAPPER}} .elementor-image-box-content .elementor-image-box-description' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .elementor-image-box-content .elementor-image-box-description',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render image box widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		
		<div class="shop-cats-grid">
			<div class="cats-grid-item item1" style="background-image:url(<?php echo esc_url( $settings['image1']['url'] ); ?>)">
				<a class="grid-item-label" href="<?php echo esc_url( $settings['link1']['url'] ); ?>"><?php echo esc_html( $settings['title1']); ?></a>
			</div>	
			<div class="cats-grid-item item2" style="background-image:url(<?php echo esc_url( $settings['image2']['url'] ); ?>)">
				<a class="grid-item-label" href="<?php echo esc_url( $settings['link2']['url'] ); ?>"><?php echo esc_html( $settings['title2']); ?></a>
			</div>	
			<div class="cats-grid-item item3" style="background-image:url(<?php echo esc_url( $settings['image3']['url'] ); ?>)">
				<a class="grid-item-label" href="<?php echo esc_url( $settings['link3']['url'] ); ?>"><?php echo esc_html( $settings['title3']); ?></a>
			</div>	
			<div class="cats-grid-item item4">
				<div class="grid-item-inner">
					<h5>Spring collection</h5>
					<h4>New arrivals</h4>
					<a href="#" class="elementor-button-link elementor-button elementor-size-sm">Shop now</a>	
				</div>			
			</div>	
			<div class="cats-grid-item item5" style="background-image:url(<?php echo esc_url( $settings['image5']['url'] ); ?>)">
				<a class="grid-item-label" href="<?php echo esc_url( $settings['link5']['url'] ); ?>"><?php echo esc_html( $settings['title5']); ?></a>
			</div>		
		</div>

		<?php
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new aThemes_Category_Grid() );