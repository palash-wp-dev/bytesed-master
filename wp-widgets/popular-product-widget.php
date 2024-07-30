<?php
/**
 *  irtech popular product
 * @package Irtech
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit(); //exit if access directly
}



// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	CSF::createWidget( 'irtech_edd_popular_product', array(
		'title'       => esc_html__( 'Irtech: Popular Products' ),
		'classname'   => 'irtech-popular-product',
		'description' => esc_html__('widget to show popular products'),
		'fields'      => array(

			array(
				'id'    => 'title',
				'type'  => 'text',
				'title' => esc_html__( 'Title', 'irtech-master' ),
			),

			array(
				'id'         => 'post__in',
				'type'       => 'text',
				'title'  => esc_html__( 'Select Products' ),
				'desc' => __('separate products id by comma (,)','irtech-master')
			),
			array(
				'id'         => 'total',
				'type'       => 'text',
				'title'  => esc_html__( 'Total' ),
				'default' => '3'

			),

			array(
				'id'      => 'order',
				'type'    => 'select',
				'title'   => esc_html__( 'Order', 'irtech-master' ),
				'options' => array(
					'ASC'  => esc_html__( 'Ascending', 'irtech-master' ),
					'DESC' => esc_html__( 'Descending', 'irtech-master' ),
				),
				'default' => 'ASC',
			),
			array(
				'id'      => 'orderby',
				'type'    => 'select',
				'title'   => esc_html__( 'OrderBy', 'irtech-master' ),
				'options' => array(
					'ID'            => esc_html__( 'ID', 'irtech-master' ),
					'title'         => esc_html__( 'Title', 'irtech-master' ),
					'date'          => esc_html__( 'Date', 'irtech-master' ),
					'rand'          => esc_html__( 'Random', 'irtech-master' ),
					'comment_count' => esc_html__( 'Most Comments', 'irtech-master' ),
				),
				'default' => 'ID',
			),

		)
	) );


	if ( ! function_exists( 'irtech_edd_popular_product' ) ) {
		function irtech_edd_popular_product( $args, $instance ) {

			echo $args['before_widget'];

			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			}
			$post__in = !empty($instance['post__in']) ? explode(',',$instance['post__in']) : '';
			$post_args = array(
				'post_type' => 'download',
				'posts_per_page' => !empty($instance['total']) ? $instance['total'] : -1,
				'order' => !empty($instance['order']) ? $instance['order'] : 'asc',
				'orderby' => !empty($instance['orderby']) ? $instance['orderby'] : 'ID',
				'post_status' => 'publish',
				'ignore_sticky_posts' => 1,
			);

			if (!empty($post__in)) {
				$post_args['post__in'] = $post__in;
				unset($post_args['posts_per_page']);
				unset($post_args['order']);
				unset($post_args['orderby']);
			}
			$post_data = new WP_Query($post_args);

			?>
			<ul class="popular_edd-product">
				<?php while($post_data->have_posts()): $post_data->the_post();
					$sales = get_post_meta(get_the_ID(),'_edd_download_sales', true);
				?>
				<li>
					<div class="single-product-wrap">
						<div class="thumb">
							<?php echo get_the_post_thumbnail(get_the_ID(),'thumbnail');?>
						</div>
						<div class="content">
							<a href="<?php the_permalink();?>"><h4 class="title"><?php the_title();?></h4></a>
							<span class="sales"><?php echo $sales.' '.esc_html__('Sales','irtech-master');?></span>
						</div>
					</div>
				</li>
				<?php endwhile; wp_reset_query();?>
			</ul>
			<?php

			echo $args['after_widget'];

		}
	}

}
