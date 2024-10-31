<?php
class pqp_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'pqp_widget', // Base ID
			__('Positive Quote of the day', '_pqp_'), // Name
			array( 'description' => __( 'Display Positive Quote of the day', '_pqp_' ), ) // Args
		);
	}
	public function widget( $args, $instance ) {
	
     	echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			//echo $args['before_title'] . "<h2>".__('Positive Quote of the day','_pqp_')."</h2>". $args['after_title'];
		}
		$color=$instance['title'];
		echo do_shortcode("[pqp-quote color='".$color."']");
		echo $args['after_widget'];
	}
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'AA4839', '_pqp_' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Select Color:' ); ?></label> 
            <select class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>">
<option value="red" <?php if(esc_attr( $title )=="red"){ echo "selected"; }?>>Red</option>
<option value="green" <?php if(esc_attr( $title )=="green"){ echo "selected"; }?>>Green</option>
<option value="blue" <?php if(esc_attr( $title )=="blue"){ echo "selected"; }?>>Blue</option>
<option value="yellow" <?php if(esc_attr( $title )=="yellow"){ echo "selected"; }?>>Yellow</option>
</select>
            
		</p>
		<?php 
	}
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class pqp_widget

add_action( 'widgets_init', function(){
     register_widget( 'pqp_widget' );
});
?>