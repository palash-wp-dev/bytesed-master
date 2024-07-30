<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Irtech_Testimonial_Two_Widget extends Widget_Base {

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
        return 'irtech-testimonial-two-widget';
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
        return esc_html__( 'Testimonial Two', 'irtech-master' );
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
        return 'eicon-slider-push';
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

        // testimonial two content section starts here
        $this->start_controls_section(
            'testimonial_two_content',
            [
                'label' => esc_html__( 'Testimonial Content', 'irtech-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control( 'testimonial_two_items', [
            'label'       => esc_html__( 'Testimonial Items', 'irtech-master' ),
            'type'        => Controls_Manager::REPEATER,
            'fields'      => [
                [
                    'name'        => 'image',
                    'label'       => esc_html__( 'Image', 'irtech-master' ),
                    'type'        => Controls_Manager::MEDIA,
                    'description' => esc_html__( 'enter title.', 'irtech-master' ),
                    'default'     => array(
                        'url' => Utils::get_placeholder_image_src()
                    )
                ],
                [
                    'name'        => 'name',
                    'label'       => esc_html__( 'Name', 'irtech-master' ),
                    'type'        => Controls_Manager::TEXT,
                    'description' => esc_html__( 'enter name', 'irtech-master' ),
                    'default'     => esc_html__( 'Lara Croft', 'irtech-master' )
                ],
                [
                    'name'        => 'designation',
                    'label'       => esc_html__( 'Designation', 'irtech-master' ),
                    'type'        => Controls_Manager::TEXT,
                    'description' => esc_html__( 'enter designation', 'irtech-master' ),
                    'default'     => esc_html__( 'CEO, Appside', 'irtech-master' )
                ],
                [
                    'name'        => 'description',
                    'label'       => esc_html__( 'Description', 'irtech-master' ),
                    'type'        => Controls_Manager::TEXTAREA,
                    'description' => esc_html__( 'enter description', 'irtech-master' ),
                    'default'     => esc_html__( 'The dropbox HQ in san Francisco is one of the best designed & most comfortable offices I have ever witnessed.' )
                ],
                [
                    'name'        => 'testimonial_rating',
                    'label'       => esc_html__( 'Rating', 'irtech-master' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        '1' => esc_html__( '1', 'enteraddons' ),
                        '2' => esc_html__( '2', 'enteraddons' ),
                        '3' => esc_html__( '3', 'enteraddons' ),
                        '4' => esc_html__( '4', 'enteraddons' ),
                        '5' => esc_html__( '5', 'enteraddons' ),
                        'none' => esc_html__( 'None', 'enteraddons' )
                    ],
                    'default' => 5
                ],
                [
                    'name'        => 'total_ratings',
                    'label'       => esc_html__( 'Total Ratings', 'irtech-master' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 5,
                    'max' => 10000,
                    'step' => 5,
                    'default' => 167,
                ],
            ],
            'title_field' => '{{name}}'
        ] );
        $this->end_controls_section();
        // testimonial two content section ends here

        $this->start_controls_section(
            'slider_settings_section',
            [
                'label' => esc_html__( 'Slider Settings', 'irtech-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'items',
            [
                'label'       => esc_html__( 'Items', 'irtech-master' ),
                'type'        => Controls_Manager::TEXT,
                'description' => esc_html__( 'you can set how many item show in slider', 'irtech-master' ),
                'default'     => '1'
            ]
        );

        $this->add_control(
            'loop',
            [
                'label'       => esc_html__( 'Loop', 'irtech-master' ),
                'type'        => Controls_Manager::SWITCHER,
                'description' => esc_html__( 'you can set yes/no to enable/disable', 'irtech-master' ),
                'default'     => 'yes'
            ]
        );
        $this->add_control(
            'autoplay',
            [
                'label'       => esc_html__( 'Autoplay', 'irtech-master' ),
                'type'        => Controls_Manager::SWITCHER,
                'description' => esc_html__( 'you can set yes/no to enable/disable', 'irtech-master' ),
                'default'     => 'yes'
            ]
        );
        $this->add_control(
            'dots',
            [
                'label'       => esc_html__( 'Dots', 'irtech-master' ),
                'type'        => Controls_Manager::SWITCHER,
                'description' => esc_html__( 'you can set yes/no to enable/disable', 'irtech-master' ),
                'default'     => 'yes'
            ]
        );
        $this->add_control(
            'auto_play_timeout',
            [
                'label' => esc_html__( 'Autoplay Timeout', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 500,
                'max' => 10000,
                'step' => 100,
                'default' => 3000,
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Render Elementor widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $settings              = $this->get_settings_for_display();
        $all_testimonial_items = $settings['testimonial_two_items'];
        $rand_numb             = rand( 333, 999999999 );

        //slider settings
        $loop            = $settings['loop'] ? 'true' : 'false';
        $dots            = $settings['dots'] ? 'true' : 'false';
        $items           = $settings['items'] ? $settings['items'] : 4;
        $autoplay        = $settings['autoplay'] ? 'true' : 'false';
        $autoplay_timeout = $settings['auto_play_timeout'] ? $settings['auto_play_timeout'] : 3000;
        ?>
        <div class="testimonial_area pat-50 pab-50">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="global-slick-init dot-style-one slider-inner-margin" data-infinite="<?php echo esc_attr( $loop ); ?>" data-slidesToShow="<?php echo esc_attr( $items ); ?>" data-dots="<?php echo esc_attr( $dots ); ?>" data-autoplaySpeed="<?php echo esc_attr( $autoplay_timeout ); ?>" data-autoplay="<?php echo esc_attr( $autoplay ); ?>" data-responsive='[{"breakpoint": 1800,"settings": {"slidesToShow": 3}},{"breakpoint": 1400,"settings": {"slidesToShow": 3}},{"breakpoint": 1200,"settings": {"slidesToShow": 2}},{"breakpoint": 992,"settings": {"slidesToShow": 2,"arrows": false,"dots": true}},{"breakpoint": 768, "settings": {"slidesToShow": 1} },{"breakpoint": 576, "settings": {"slidesToShow": 1} }]'>
                        <?php foreach ( $all_testimonial_items as $tesimonial_single_item ) : ?>
                        <div class="testimonial_slider_item wow fadeInUp" data-wow-delay=".1s">
                            <div class="testimonial_single testimonial_single__border testimonial_single__padding radius-10">
                                <div class="testimonial_single__contents">
                                    <div class="testimonial_single__flex">
                                        <div class="testimonial_single__author">
                                            <div class="testimonial_single__author__flex">
                                                <div class="testimonial_single__author__thumb">
                                                    <a href="javascript:void(0)"><img src="<?php echo esc_url( $tesimonial_single_item['image']['url'] ); ?>" alt="authorImg"></a>
                                                </div>
                                                <div class="testimonial_single__author__details">
                                                    <h5 class="testimonial_single__author__name"><a href="javascript:void(0)"><?php echo esc_html( $tesimonial_single_item['name'] ); ?></a></h5>
                                                    <p class="testimonial_single__author__subtitle"><?php echo esc_html( $tesimonial_single_item['designation'] ); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rating-wrap">
                                            <div class="ratings">
                                                <span class="hide-rating"></span>
                                                <span class="show-rating"></span>
                                            </div>
                                            <p> <span class="total-ratings">(<?php echo esc_html( $tesimonial_single_item['total_ratings'] ); ?>)</span></p>
                                        </div>
                                    </div>
                                    <p class="testimonial_single__para mt-3 mt-3"><?php echo esc_html( $tesimonial_single_item['description'] ); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php

    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Irtech_Testimonial_Two_Widget() );