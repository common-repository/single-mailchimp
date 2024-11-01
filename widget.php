<?php



class Single_Mailchimp_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'single_mailchimp_widget', 

		// Widget name will appear in UI
		__('Single Mailchimp', 'Single_Mailchimp'), 

		// Widget description
		array( 'description' => __( 'Show Mailchimp Signup-Form', 'Single_Mailchimp' ), ) 
		);
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {

		$label = apply_filters( 'label', $instance['label'] );
		$placeholder = apply_filters( 'placeholder', $instance['placeholder'] );
		$btn_text = apply_filters( 'btn_text', $instance['btn_text'] );
		$succes_msg = apply_filters( 'succes_msg', $instance['succes_msg'] );
		$error_msg = apply_filters( 'error_msg', $instance['error_msg'] );
		$autocomplete = apply_filters( 'autocomplete', $instance['autocomplete'] );

		if($autocomplete != 'on'){
			$autocomplete = 'off';
		}

		// before 
		echo $args['before_widget'];


		$html = '<form role="form" autocomplete="'.$autocomplete.'" class="single-mailchimp-form" id="single-mailchimp-form" method="post">';
	     	$html .= '<div class="form-group">';
	          $html .= '<label for="exampleInputEmail1">'.$label.'</label>';
	        $html .= '<input type="email" placeholder="'.$placeholder.'" class="form-control" required="required" placeholder="Enter email">';
	      $html .= '</div>';
	      $html .= '<button type="submit" class="btn btn-primary">'.$btn_text.'</button>';
	      $html .= '<div class="alert alert-success" role="alert">'.$succes_msg.'</div>';
	      $html .= '<div class="alert alert-danger" role="alert">'.$error_msg.'</div>';
	    $html .= '</form>';

	    echo $html;


		// after 
		echo $args['after_widget'];
	}
		




	// Widget Backend 
	public function form( $instance ) {

		$label = $instance[ 'label' ];
		$placeholder = $instance[ 'placeholder' ];
		$btn_text = $instance[ 'btn_text' ];
		$succes_msg = $instance[ 'succes_msg' ];
		$error_msg = $instance[ 'error_msg' ];
		$autocomplete = $instance[ 'autocomplete' ];


		?>

		<p>
		<label><?php _e( 'Label:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'label' ); ?>" name="<?php echo $this->get_field_name( 'label' ); ?>" type="text" value="<?php echo esc_attr( $label ); ?>" />
		</p>
		<p>
		<label><?php _e( 'Placeholder:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'placeholder' ); ?>" name="<?php echo $this->get_field_name( 'placeholder' ); ?>" type="text" value="<?php echo esc_attr( $placeholder ); ?>" />
		</p>
		<p>
		<label><?php _e( 'Text of Button:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'btn_text' ); ?>" name="<?php echo $this->get_field_name( 'btn_text' ); ?>" type="text" value="<?php echo esc_attr( $btn_text ); ?>" />
		</p>
		<p>
		<label><?php _e( 'Success Message:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'succes_msg' ); ?>" name="<?php echo $this->get_field_name( 'succes_msg' ); ?>" type="text" value="<?php echo esc_attr( $succes_msg ); ?>" />
		</p>
		<p>
		<label><?php _e( 'Error Message:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'error_msg' ); ?>" name="<?php echo $this->get_field_name( 'error_msg' ); ?>" type="text" value="<?php echo esc_attr( $error_msg ); ?>" />
		</p>
		<p>
		<label><?php _e( 'Autocomplete:' ); ?></label> 
		<input type="checkbox" id="<?php echo $this->get_field_id( 'autocomplete' ); ?>" name="<?php echo $this->get_field_name( 'autocomplete' ); ?>" <?php if (esc_attr( $autocomplete ) == 'on'){ echo 'checked'; } ?> />
		</p>
	<?php 
	}
	
	// Updating widget replacing old instances with new
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['label'] = strip_tags( $new_instance['label'] );
		$instance['placeholder'] = strip_tags( $new_instance['placeholder'] );
		$instance['btn_text'] = strip_tags( $new_instance['btn_text'] );
		$instance['succes_msg'] = strip_tags( $new_instance['succes_msg'] );
		$instance['error_msg'] = strip_tags( $new_instance['error_msg'] );
		$instance['autocomplete'] = strip_tags( $new_instance['autocomplete'] );


		return $instance;
	}
}



// Register and load the widget
function Single_Mailchimp_load_widget() {
	register_widget( 'Single_Mailchimp_Widget' );
}


?>
