<?php
/**
 * Form Elements
 *
 * @since   0.0.0
 * @package WP_Component_Library
 */
?>

<section class="wpcl-component component-form-elements">

	<form method="GET" action="">
		<ul>
			<li>
				<label for="text"><?php esc_html_e( 'Text', 'wp-component-library' ); ?></label>
				<input type="text" id="text" placeholder="First Name">
			</li>
			<li>
				<label for="email"><?php esc_html_e( 'Email', 'wp-component-library' ); ?></label>
				<input type="email" id="email" placeholder="example@mail.com" invalid>
			</li>
			<li>
				<label for="email-invalid"><?php esc_html_e( 'Email - Invalid Input', 'wp-component-library' ); ?></label>
				<input type="email" id="email-invalid" value="mail">
			</li>
			<li>
				<label for="search"><?php esc_html_e( 'Search', 'wp-component-library' ); ?></label>
				<input type="search" id="search" value="Search">
			</li>
			<li>
				<p><?php esc_html_e( 'Radio Buttons', 'wp-component-library' ); ?></p>
				<input type="radio" id="true" value="true" name="radios"><label for="true"><?php esc_html_e( 'True', 'wp-component-library' ); ?></label>
				<input type="radio" id="false" value="false" name="radios"><label for="false"><?php esc_html_e( 'False', 'wp-component-library' ); ?></label>
			</li>
			<li>
				<p><?php esc_html_e( 'Checkboxes', 'wp-component-library' ); ?></p>
				<input type="checkbox" id="pizza" value="pizza"><label for="pizza" name="foods"><?php esc_html_e( 'Pizza', 'wp-component-library' ); ?></label>
				<input type="checkbox" id="burritos" value="burritos" name="foods"><label for="burritos"><?php esc_html_e( 'Burritos', 'wp-component-library' ); ?></label>
				<input type="checkbox" id="burgers" value="burgers" name="foods"><label for="burgers"><?php esc_html_e( 'Burgers', 'wp-component-library' ); ?></label>
			</li>
			<li>
				<label for="select"><?php esc_html_e( 'Select', 'wp-component-library' ); ?></label>
				<select>
					<option value="" disabled selected><?php esc_html_e( 'Month', 'wp-component-library' ); ?></option>
					<option value="January"><?php esc_html_e( 'January', 'wp-component-library' ); ?></option>
					<option value="February"><?php esc_html_e( 'February', 'wp-component-library' ); ?></option>
					<option value="March"><?php esc_html_e( 'March', 'wp-component-library' ); ?></option>
					<option value="April"><?php esc_html_e( 'April', 'wp-component-library' ); ?></option>
					<option value="May"><?php esc_html_e( 'May', 'wp-component-library' ); ?></option>
					<option value="June"><?php esc_html_e( 'June', 'wp-component-library' ); ?></option>
					<option value="July"><?php esc_html_e( 'July', 'wp-component-library' ); ?></option>
					<option value="August"><?php esc_html_e( 'August', 'wp-component-library' ); ?></option>
					<option value="September"><?php esc_html_e( 'September', 'wp-component-library' ); ?></option>
					<option value="October"><?php esc_html_e( 'October', 'wp-component-library' ); ?></option>
					<option value="November"><?php esc_html_e( 'November', 'wp-component-library' ); ?></option>
					<option value="December"><?php esc_html_e( 'December', 'wp-component-library' ); ?></option>
				</select>
			</li>
			<li>
				<label for="textarea"><?php esc_html_e( 'Textarea', 'wp-component-library' ); ?></label>
				<textarea></textarea>
			</li>
		</ul>
	</form>
</section>
