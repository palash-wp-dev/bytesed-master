<?php
/**
 * Elementor Widget
 * @package irtech
 * @since 1.0.0
 */

namespace Elementor;
class Irtech_Newsletter_Widget extends Widget_Base {

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
        return 'irtech-newsletter-widget';
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
        return esc_html__( 'Newsletter', 'irtech-master' );
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
        return 'eicon-mailchimp';
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

        // newsletter content section starts here
        $this->start_controls_section(
            'newsletter_content',
            [
                'label' => esc_html__( 'Newsletter Contents', 'irtech-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'news_letter_heading',
            [
                'label' => esc_html__( 'Heading', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Subscribe Our Newsletter', 'irtech-master' ),
                'placeholder' => esc_html__( 'Type your heading here', 'irtech-master' ),
            ]
        );

        $this->add_control(
            'shortcode',
            [
                'label' => esc_html__( 'Shortcode Text', 'irtech-master' ),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__( 'Shortcode Here', 'irtech-master' ),
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();
        // newsletter content section ends here

        // newsletter title style section starts here
        $this->start_controls_section(
            'newsletter_title_style',
            [
                'label' => esc_html__( 'Newsletter Title', 'irtech-master' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // normal design
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'newsletter_title_typography',
                'selector' => '{{WRAPPER}} .newsletter-contents-title',
            ]
        );

        $this->add_control(
            'newsletter_title_color',
            [
                'label' => esc_html__( 'Color', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .newsletter-contents-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'newsletter_text_align',
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
                    '{{WRAPPER}} .newsletter-contents-title' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Stroke::get_type(),
            [
                'name' => 'newsletter_text_stroke',
                'selector' => '{{WRAPPER}} .newsletter-contents-title',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'newsletter_text_shadow',
                'label' => esc_html__( 'Text Shadow', 'irtech-master' ),
                'selector' => '{{WRAPPER}} .newsletter-contents-title',
            ]
        );

        $this->add_responsive_control(
            'newsletter_margin',
            [
                'label' => esc_html__( 'Margin', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .newsletter-contents-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'newsletter_padding',
            [
                'label' => esc_html__( 'Padding', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .newsletter-contents-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        // newsletter title style section ends here

        // newsletter button style section starts here
        $this->start_controls_section(
            'newsletter_button_style',
            [
                'label' => esc_html__( 'Button', 'irtech-master' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 7,
                ],
                'selectors' => [
                    '{{WRAPPER}} .newsletter-contents-form .single-input button' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        // newsletter button style section ends here
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
        ?>
        <div class="newsletter-contents center-text">
            <h3 class="newsletter-contents-title"> <?php $arr = array( 'span' => array(), 'br' => array(), 'p' => array(), 'strong' => array() ); echo wp_kses( $settings['news_letter_heading'], $arr ); ?> </h3>
            <div class="newsletter-contents-form custom-form mt-4">
               <?php echo do_shortcode($settings['shortcode']); ?>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Irtech_Newsletter_Widget() );