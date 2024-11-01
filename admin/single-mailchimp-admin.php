
<div class="sm-wrap">
	<div class="page-header">
		<h2>Single Mailchimp</h2>
		<p>Below you find all neccessary settings to integrate this plugin. Also there some assistance for the integration but also generally.<br />
		If you got any question or need support, please use the <a href="" title="Support for Single Mailchimp Plugin">Support Tab</a> on the Plugin Page.</p>
	</div>

	<div class="box">
		<header class="active">
			<h3>Setup<small>Basic Settings for Mailchimp</small></h3>
		</header>
		<div class="content">
			<form method="post" action="options.php">

				<?php settings_fields( 'super-settings-group' ); ?>


				<table class="form-table">

					<tr valign="top">

						<td>
							<label>API Key</label>
							<input type="text" name="sm_api_key" placeholder="********************************-***" value="<?php echo get_option('sm_api_key'); ?>" />
						</td>

					</tr>

					<tr valign="top">

						<td>
							<label>List ID</label>
							<input type="text" name="sm_list_id" placeholder="**********"  value="<?php echo get_option('sm_list_id'); ?>" />
						</td>

					</tr>

					<tr valign="top">

						<td>
							<label>Use Single Opt-Int</label>
							<input name="sm_single_opt_in" type="checkbox" value="1" <?php checked( '1', get_option( 'sm_single_opt_in' ) ); ?> />
						</td>

					</tr>

				</table>

				<?php submit_button(); ?>
			</form>
		</div>
	</div>


	<div class="box" style="height: 73px;">
		<header>
			<h3>Integration<small>How to integrate in website</small></h3>
		</header>
		<div class="content">

			<h4>Shortcode</h4>
			<p>Show the Newsletter SignUp Field via shortcode - use parameter to override default values(if needed).</p>
			<code id="code_shortcode"><span>[<red>single-mailchimp</red> <green>btn_text</green>=<yellow>""</yellow> <green>label</green>=<yellow>""</yellow> <green>show_label</green>=<yellow>""</yellow> <green>placeholder</green>=<yellow>""</yellow> <green>error_msg</green>=<yellow>""</yellow> <green>success_msg</green>=<yellow>""</yellow>]</span></code>
			
			<hr />

			<h4>Widget</h4>
			<p>Use the the Widget that this plugin provides to add the Signup field to a widget area.</p>
			<a href="widgets.php">Go to Widgets</a>

		</div>
		
	</div>

	<div class="box" style="height: 73px;">
		<header>
			<h3>Help<small>General questions</small></h3>
		</header>
		<div class="content">
			<h4>Where do I find my API Key?</h4>
			<p>To get an API Key you need an account by Mailchimp. Then you find the Key(or need to generate it) at:</p>
			<p><kbd>Username > Account Settings > Extras > API Keys</kbd></p>
			
			<hr />

			<h4>Where do I find my List ID?</h4>
			<p>Create a new list and go to:</p>
			<p><kbd>Lists > List Name > Settings > List name & defaults</kbd></p>
			
			<hr />

			<h4>What classes uses Single-Mailchimp ?</h4>
			<p>We are using the Bootstrap 3 classes only, so this form will fit perfect in a BT3-Theme.</p>
			<code >
				<space class="border">&lt;<red>form</red> <green>class</green>=<yellow>"single-mailchimp-form"</yellow>&gt;<br />
  					<space class="border">&lt;<red>div</red> <green>class</green>=<yellow>"form-group"</yellow>&gt;<br />
    					<space>&lt;<red>label</red>&gt;...&lt;/<red>label</red>&gt;<br />
    					&lt;<red>input</red> <green>class</green>=<yellow>"form-control"</yellow>&gt;</space>
  					&lt;/<red>div</red>&gt;</space>
 	 				<space>&lt;<red>button</red> <green>class</green>=<yellow>"btn btn-primary"</yellow>&gt;...&lt;/<red>button</red>&gt;<br />
  					&lt;<red>div</red> <green>class</green>=<yellow>"alert alert-success"</yellow>&gt;...&lt;/<red>div</red>&gt;<br />
 		 			&lt;<red>div</red> <green>class</green>=<yellow>"alert alert-danger"</yellow>&gt;...&lt;/<red>div</red>&gt;</space>
				&lt;/<red>form</red>&gt;</space>
			</code>

			
		</div>
	</div>

</div>
