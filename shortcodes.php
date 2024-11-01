<?php


function single_mailchimp_add_shortcodes() {
	add_shortcode('single-mailchimp', 'single_mailchimp');
}


function single_mailchimp($attr) {

    extract(shortcode_atts(array(
      'btn_text' => 'Sign up for Newsletter',
      'label' => 'Label',
      'show_label' => 'true',
      'placeholder' => 'Placeholder',
      'error_msg' => 'Error',
      'success_msg' => 'Success',
      'autocomplete' => 'off', 
    ), $attr));



    $html = '<form role="form" autocomplete="'.$autocomplete.'" class="single-mailchimp-form" id="single-mailchimp-form" method="post">';
      $html .= '<div class="form-group">';
        if ($show_label == 'true'){
          $html .= '<label for="exampleInputEmail1">'.$label.'</label>';
        };
        $html .= '<input type="email" placeholder="'.$placeholder.'" class="form-control" required="required" placeholder="Enter email">';
      $html .= '</div>';
      $html .= '<button type="submit" class="btn btn-primary">'.$btn_text.'</button>';
      $html .= '<div class="alert alert-success" role="alert">'.$success_msg.'</div>';
      $html .= '<div class="alert alert-danger" role="alert">'.$error_msg.'</div>';
    $html .= '</form>';

    return $html;

}

?>