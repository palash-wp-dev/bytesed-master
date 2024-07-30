<?php
/**
 * Elementor Widget
 * @package irtech
 * @since 1.0.0
 */

namespace Elementor;
class Irtech_Header_Area_Two_Widget extends Widget_Base {

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
        return 'irtech-header-area-two-widget';
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
        return esc_html__( 'Header Area Two', 'irtech-master' );
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
        return 'eicon-heading';
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
        // heading content area starts here
        $this->start_controls_section(
            'heading_two_content',
            [
                'label' => esc_html__( 'Heading Content', 'irtech-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heading_two',
            [
                'label' => esc_html__( 'Heading', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Bytesed Heading', 'irtech-master' ),
                'placeholder' => esc_html__( 'Type your title here', 'irtech-master' ),
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .section_title.bytesed .title::before',
            ]
        );

        $this->add_responsive_control(
            'heading_two_text_align',
            [
                'label' => esc_html__( 'Alignment', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'irtech-master' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'irtech-master' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'irtech-master' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .section_title.bytesed' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
        // heading content area ends here

        // heading style section starts here
        $this->start_controls_section(
            'heading_two_style',
            [
                'label' => esc_html__( 'Heading', 'irtech-master' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // normal design
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'heading_two_typography',
                'selector' => '{{WRAPPER}} .section_title.bytesed .title',
            ]
        );

        $this->add_control(
            'heading_two_color',
            [
                'label' => esc_html__( 'Color', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bytesed .title::before' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Stroke::get_type(),
            [
                'name' => 'heading_two_text_stroke',
                'selector' => '{{WRAPPER}} .bytesed .title::before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'heading_two_text_shadow',
                'label' => esc_html__( 'Text Shadow', 'irtech-master' ),
                'selector' => '{{WRAPPER}} .bytesed .title::before',
            ]
        );

        $this->add_responsive_control(
            'heading_two_margin',
            [
                'label' => esc_html__( 'Margin', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .bytesed .title::before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_two_padding',
            [
                'label' => esc_html__( 'Padding', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .bytesed .title::before' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        // info box title style section ends here
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
        $settings = $this->get_settings_for_display();
//        $heading_image = $settings['heading_two_image']['url'];
        ?>
        <div class="section_title bytesed">
            <div class="title"><?php echo esc_html( $settings['heading_two'] ); ?></div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Irtech_Header_Area_Two_Widget() );