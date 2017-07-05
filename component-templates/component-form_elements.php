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
				<label for="text">Text</label>
				<input type="text" id="text" placeholder="First Name">
			</li>
			<li>
				<label for="email">Email</label>
				<input type="email" id="email" placeholder="example@mail.com" invalid>
			</li>
			<li>
				<label for="email-invalid">Email - Invalid Input</label>
				<input type="email" id="email-invalid" value="mail">
			</li>
			<li>
				<label for="search">Search</label>
				<input type="search" id="search" value="Search">
			</li>
			<li>
				<h2>Radio Buttons</h2>

				<input type="radio" id="true" value="true" name="radios"><label for="true">True</label>
				<input type="radio" id="false" value="false" name="radios"><label for="false">False</label>
			</li>
			<li>
				<h2>Checkboxes</h2>

				<input type="checkbox" id="pizza" value="pizza"><label for="pizza" name="foods">Pizza</label>
				<input type="checkbox" id="burritos" value="burritos" name="foods"><label for="burritos">Burritos</label>
				<input type="checkbox" id="burgers" value="burgers" name="foods"><label for="burgers">Burgers</label>
			</li>
			<li>
				<label for="select">Select</label>
				<select>
					<option value="" disabled selected>Month</option>
					<option value="January">January</option>
					<option value="February">February</option>
					<option value="March">March</option>
					<option value="April">April</option>
					<option value="May">May</option>
					<option value="June">June</option>
					<option value="July">July</option>
					<option value="August">August</option>
					<option value="September">September</option>
					<option value="October">October</option>
					<option value="November">November</option>
					<option value="December">December</option>
				</select>
			</li>
			<li>
				<label for="textarea">Textarea</label>
				<textarea></textarea>
			</li>
		</ul>
	</form>
</section>
