<?php
/*
Plugin Name: Orderformwidget
Plugin URI: http://kgnic.ru
Description: it will be here later
Version: 1.0
Author: Radiofisik
Author URI: http://radiofisik.ru
License: none
*/



class Orderformwidget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		// widget actual processes
		parent::__construct(
			'orderform_widget', // Base ID
			__('Widget of orderform', 'text_domain'), // Name
			array( 'description' => __( 'Just a test widget for now', 'text_domain' ), ) // Args
			);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		echo __( 'Hello, World!', 'text_domain' );
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		<input class="widefat" id="<?php echo $this->get_field_id( 'my' ); ?>" name="<?php echo $this->get_field_name( 'my' ); ?>" type="text" value="<?php echo esc_attr( $my ); ?>">
		</p>
		<?php 
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['my'] = ( ! empty( $new_instance['my'] ) ) ? strip_tags( $new_instance['my'] ) : '';
		return $instance;
	}
}


add_action( 'widgets_init', function(){
     register_widget( 'Orderformwidget' );
});

?>