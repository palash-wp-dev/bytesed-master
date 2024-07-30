<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Irtech_Counterup_One_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Elementor widget name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_name() {
		return 'irtech-counterup-one-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Elementor widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title() {
		return esc_html__( 'Counterup One', 'irtech-master' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Elementor widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_icon() {
		return 'eicon-counter';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Elementor widget belongs to.
	 *
	 * @return array Widget categories.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_categories() {
		return [ 'irtech_widgets' ];
	}

	/**
	 * Register Elementor widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'General Settings', 'irtech-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control( 'theme', [
			'label'       => esc_html__( 'Theme', 'irtech-master' ),
			'type'        => Controls_Manager::SELECT,
			'options' => [
				'' => esc_html__('Black','irtech-master'),
				'white' => esc_html__('White','irtech-master'),
			],
			'default' => ''
		] );
		$this->add_control( 'title', [
			'label'       => esc_html__( 'Title', 'irtech-master' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( 'Positive Reviews', 'irtech-master' ),
			'description' => esc_html__( 'enter title', 'irtech-master' )
		] );
		$this->add_control( 'number', [
			'label'       => esc_html__( 'Number', 'irtech-master' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( '14,567', 'irtech-master' ),
			'description' => esc_html__( 'enter counterup number', 'irtech-master' )
		] );
		$this->add_control( 'sign', [
			'label'       => esc_html__( 'sign', 'irtech-master' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( '+', 'irtech-master' ),
			'description' => esc_html__( 'enter counterup sign', 'irtech-master' )
		] );
		$this->add_control( 'icon', [
			'label'       => esc_html__( 'Icon', 'irtech-master' ),
			'type'        => Controls_Manager::ICONS,
			'description' => esc_html__( 'select icon', 'irtech-master' )
		] );

		$this->end_controls_section();
	}

	/**
	 * Render Elementor widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings  = $this->get_settings_for_display();
        $icon = $settings['icon'];
        $title = $settings['title'];
        $number = $settings['number'];
		?>
        <div class="single-counterup-01 <?php echo esc_attr($settings['theme']);?>">
            <div class="icon">
                <?php Icons_Manager::render_icon($icon)?>
            </div>
            <div class="content">
                <div class="count-wrap"><span class="count-num"><?php echo esc_html($number);?></span><?php echo esc_html($settings['sign'])?></div>
                <h4 class="title"><?php echo esc_html($title);?></h4>
            </div>
        </div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Irtech_Counterup_One_Widget() );