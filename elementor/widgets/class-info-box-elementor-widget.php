<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class Irtech_Info_Box extends Widget_Base {

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
        return 'irtech-info-box-widget';
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
        return esc_html__( 'Info Box', 'irtech-master' );
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
        return 'eicon-info-box';
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
            'info_box_content',
            [
                'label' => esc_html__( 'Info Box Content', 'irtech-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'info_box_title',
            [
                'label' => esc_html__( 'Title', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Grow Your Business', 'irtech-master' ),
                'placeholder' => esc_html__( 'Type your title here', 'irtech-master' ),
            ]
        );

        $this->add_control(
            'info_box_link',
            [
                'label' => esc_html__( 'Link', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( '#', 'irtech-master' ),
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'info_box_description',
            [
                'label' => esc_html__( 'Description', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'we always to help your company to grow with us. We will provide the best service for business.', 'irtech-master' ),
                'placeholder' => esc_html__( 'Type your description here', 'irtech-master' ),
            ]
        );

        $this->add_control(
            'info_box_image',
            [
                'label' => esc_html__( 'Choose Image', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [ 'image', 'svg' ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        // info box style section starts here
        $this->start_controls_section(
            'info_box_style',
            [
                'label' => esc_html__( 'Info Box Style', 'irtech-master' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'info_box_background',
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .single_work',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'info_box_border',
                'selector' => '{{WRAPPER}} .single_work:hover',
            ]
        );

        $this->end_controls_section();
        // info box style section ends here

        // info box title style section starts here
        $this->start_controls_section(
            'info_box_title_style',
            [
                'label' => esc_html__( 'Info Box Title Style', 'irtech-master' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // normal design
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'info_box_title_typography',
                'selector' => '{{WRAPPER}} .single_work__contents__title',
            ]
        );

        $this->add_control(
            'info_box_title_color',
            [
                'label' => esc_html__( 'Color', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single_work__contents__title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'info_box_title_text_align',
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
                    '{{WRAPPER}} .single_work__contents__title' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Stroke::get_type(),
            [
                'name' => 'info_box_title_text_stroke',
                'selector' => '{{WRAPPER}} .single_work__contents__title',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'info_box_title_text_shadow',
                'label' => esc_html__( 'Text Shadow', 'irtech-master' ),
                'selector' => '{{WRAPPER}} .single_work__contents__title',
            ]
        );

        $this->add_responsive_control(
            'info_box_title_margin',
            [
                'label' => esc_html__( 'Margin', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .single_work__contents__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'info_box_title_padding',
            [
                'label' => esc_html__( 'Padding', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .single_work__contents__title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // hover design
        $this->add_control(
            'info_box_title_hover_color',
            [
                'label' => esc_html__( 'Title Hover Color', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .single_work__contents__title:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
        // info box title style section ends here

        // info box description style section starts here
        $this->start_controls_section(
            'info_box_description_style',
            [
                'label' => esc_html__( 'Info Box Description Style', 'irtech-master' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // normal design
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'info_box_description_typography',
                'selector' => '{{WRAPPER}} .single_work__contents__para',
            ]
        );

        $this->add_control(
            'info_box_description_color',
            [
                'label' => esc_html__( 'Color', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single_work__contents__para' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'info_box_description_text_align',
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
                    '{{WRAPPER}} .single_work__contents__para' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Stroke::get_type(),
            [
                'name' => 'info_box_description_text_stroke',
                'selector' => '{{WRAPPER}} .single_work__contents__para',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'info_box_description_text_shadow',
                'label' => esc_html__( 'Text Shadow', 'irtech-master' ),
                'selector' => '{{WRAPPER}} .single_work__contents__para',
            ]
        );

        $this->add_responsive_control(
            'info_box_description_margin',
            [
                'label' => esc_html__( 'Margin', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .single_work__contents__para' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'info_box_description_padding',
            [
                'label' => esc_html__( 'Padding', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .single_work__contents__para' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        // info box description style section ends here

        // info box image style section starts here
        $this->start_controls_section(
            'info_box_image_style',
            [
                'label' => esc_html__( 'Info Box Image Style', 'irtech-master' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'info_box_image_background',
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .single_work__icon',
            ]
        );

        $this->add_control(
            'info_box_image_border_radius',
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
                    'unit' => '%',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .single_work__icon' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'info_box_image_height',
            [
                'label' => esc_html__( 'Height', 'irtech-master' ),
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
                    'size' => 70,
                ],
                'selectors' => [
                    '{{WRAPPER}} .single_work__icon' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'info_box_image_width',
            [
                'label' => esc_html__( 'Width', 'irtech-master' ),
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
                    'size' => 70,
                ],
                'selectors' => [
                    '{{WRAPPER}} .single_work__icon' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        // info box image style section ends here

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
        <!-- info box contents starts -->
        <div class="single_work single_work__border radius-10">
            <div class="single_work__icon">
                <img src="<?php echo esc_url( $settings['info_box_image']['url'] ); ?>" alt="">
            </div>
            <div class="single_work__contents mt-4">
                <h4 class="single_work__contents__title"> <a href="<?php esc_url( $settings['info_box_link']['url'] ); ?>"> <?php echo esc_html( $settings['info_box_title'] ); ?> </a> </h4>
                <p class="single_work__contents__para mt-3"> <?php echo esc_html( $settings['info_box_description'] ); ?> </p>
            </div>
        </div>
        <!-- info box contents end -->
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Irtech_Info_Box() );