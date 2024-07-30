<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class Irtech_Product_Features extends Widget_Base {

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
        return 'irtech-product-features-list-widget';
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
        return esc_html__( 'Product Features', 'irtech-master' );
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
        return 'eicon-editor-list-ul';
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

        // product features content section starts here
        $this->start_controls_section(
            'product_features_content',
            [
                'label' => esc_html__( 'Product Features Content', 'irtech-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'product_features_title',
            [
                'label' => esc_html__( 'Title', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Build your Awesome Service Based Website', 'irtech-master' ),
                'placeholder' => esc_html__( 'Type your title here', 'irtech-master' ),
            ]
        );

        $this->add_control(
            'product_features_description',
            [
                'label' => esc_html__( 'Description', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'Qixer is a Service Based HTML Template. It’s the best choice for and any others.', 'irtech-master' ),
                'placeholder' => esc_html__( 'Type your description here', 'irtech-master' ),
            ]
        );

        $this->add_control(
            'product_features_price',
            [
                'label' => esc_html__( 'Price', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '$39', 'irtech-master' ),
                'placeholder' => esc_html__( 'Type your price here', 'irtech-master' ),
            ]
        );

        $this->add_control(
            'product_features_button1_text',
            [
                'label' => esc_html__( 'Button One Text', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Buy Now', 'irtech-master' ),
                'placeholder' => esc_html__( 'Type your title here', 'irtech-master' ),
            ]
        );

        $this->add_control(
            'product_features_button1_link',
            [
                'label' => esc_html__( 'Button One Link', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'irtech-master' ),
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'product_features_button2_link',
            [
                'label' => esc_html__( 'Button Two Link', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'irtech-master' ),
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'product_features_button2_text',
            [
                'label' => esc_html__( 'Button Two Text', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Our Product', 'irtech-master' ),
                'placeholder' => esc_html__( 'Type your title here', 'irtech-master' ),
            ]
        );

        $this->add_control(
            'features_list',
            [
                'label' => esc_html__( 'Features List', 'irtech-master' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'features_title',
                        'label' => esc_html__( 'Title', 'irtech-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Features List Title.' , 'irtech-master' ),
                        'label_block' => true,
                    ],
                ],
                'default' => [
                    [
                        'list_title' => esc_html__( 'Unique 4 Home Pages.', 'irtech-master' ),
                    ],
                    [
                        'list_title' => esc_html__( 'Fully responsive.', 'irtech-master' ),
                    ],
                    [
                        'list_title' => esc_html__( 'Total 35 Pages.', 'irtech-master' ),
                    ],
                    [
                        'list_title' => esc_html__( 'Seo Optimized.', 'irtech-master' ),
                    ],
                ],
                'title_field' => '{{{ features_title }}}',
            ]
        );

        $this->end_controls_section();
        // product features content section ends here

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
        <div class="single_feature">
            <h3 class="single_feature__title"><?php echo esc_html( $settings['product_features_title'] ); ?></h3>
            <p class="single_feature__para mt-4"><?php echo esc_html( $settings['product_features_description'] ); ?></p>
            <div class="single_feature__inner mt-4">
                <ul class="single_feature__list">
                    <?php if ( ! empty( $settings['features_list'] ) ) : foreach( $settings['features_list'] as $features_list_item ) : ?>
                        <li class="single_feature__list__item"><?php echo esc_html( $features_list_item['features_title'] ); ?>.</li>
                    <?php endforeach; endif; ?>
                </ul>
                <h4 class="single_feature__price mt-4"><?php echo esc_html( $settings['product_features_price'] ); ?></h4>
            </div>
            <div class="btn-wrapper flex-btn gap-2 mt-4">
                <a href="<?php echo esc_url( $settings['product_features_button1_link']['url'] ); ?>" class="cmn-btn btn-gradient-1 radius-10"><?php echo esc_html( $settings['product_features_button1_text'] );?></a>
                <a href="<?php echo esc_url( $settings['product_features_button2_link']['url'] ); ?>" class="cmn-btn btn-outline-1 color-one radius-10"><?php echo esc_html( $settings['product_features_button2_text'] );?></a>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Irtech_Product_Features() );