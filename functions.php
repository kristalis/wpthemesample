<?php
/* ----- Add Child Code ----- */
// Enqueue Custom CSS
function theme_enqueue_styles() {
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'fusion-dynamic-css' ) );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
// Enqueue Custom JS
function theme_enqueue_scripts() {
	wp_enqueue_script( 'child-scripts', get_stylesheet_directory_uri() . '/main-min.js', array( 'jquery' ), '', true  );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );

/* ----- Calculator stuff ----- */
// Calculator Shortcode
function calculator_shortcode() {
	ob_start();
	?>
	<div class="aggregateCalculator">
		<div class="item">
		<br>
		<p>If you are unsure how much aggregate you need, use our calculator below. Select your aggregate type, then enter your measurements below.</p>
		<label for="ac_aggregate">Aggregate Type:</label>
			<div class="aggType" style="width: 200px;">
				<select id="ac_aggregate" name="ac_aggregate" class="aggType">
					<option value="1.78">Gravel - stone</option>
					<option value="1.81">Gravel - sand</option>
					<option value="1.91">Gravel - ballast</option>
					<option value="1.64">Limetone - stone</option>
					<option value="1.9">Limetone - sand</option>
					<option value="1.86">Limetone - ballast</option>
					<option value="1.55">Granite - stone</option>
					<option value="1.71">Granite - sand</option>
					<option value="1.75">Granite - ballast</option>
					<option value="1.51">Gritstone - stone</option>
					<option value="1.76">Gritstone - sand</option>
					<option value="1.8">Gritstone - ballast</option>
					<option value="1.68">Building Sand</option>
					<option value="1.25">Brown Rock (de-icing) Salt</option>
					<option value="1.25">White Marine (de-icing) Salt</option>
					<option value="1.45">Red Chippings</option>
					<option value="1.45">Green Chippings</option>
					<option value="1.6">20 - 30mm Beach Pebbles</option>
					<option value="1.6">20mm Plum slate</option>
					<option value="1.6">20mm Blue slate</option>
					<option value="1.6">20mm Green slate</option>
				</select>
			</div>
		</div>
		<div class="item">
			<label for="ac_length">Length:</label>
			<input id="ac_length" name="ac_length" type="text" value="14">
			<div class="fancySelect" style="width: 110px;">
				<select id="ac_length_units" name="ac_length_units">
					<option value="1">Millimeters</option>
					<option value="2" selected="selected">Meters</option>
					<option value="3">Inches</option>
					<option value="4">Feet</option>
					<option value="5">Yards</option>
				</select>
			</div>
		</div>
		<div class="item">
			<label for="ac_width">Width:</label>
			<input id="ac_width" name="ac_width" type="text" value="10">
			<div style="width: 110px;">
				<select id="ac_width_units" name="ac_width_units">
					<option value="1">Millimeters</option>
					<option value="2" selected="selected">Meters</option>
					<option value="3">Inches</option>
					<option value="4">Feet</option>
					<option value="5">Yards</option>
				</select>
			</div>
		</div>
		<div class="item">
			<label for="ac_depth">Depth:</label>
			<input id="ac_depth" name="ac_depth" type="text" value="75">
			<div class="fancySelect" style="width: 110px;">
				<select id="ac_depth_units" name="ac_depth_units">
					<option value="1" selected="selected">Millimeters</option>
					<option value="2">Meters</option>
					<option value="3">Inches</option>
					<option value="4">Feet</option>
					<option value="5">Yards</option>
				</select>
			</div>
		</div>
		<input type="button" id="ac_calculate" value="Calculate Area" class="button radius5">
		<div class="results">
			<div class="background"></div>
			<p>
				You will need: <b id="agg_required" class="val">18.7</b> tonnes of this aggregate type.
			</p>
			<p>
				You will need: <b id="agg_required_bulk" class="val">24.93</b> bulk bags of this aggregate type.
			</p>
			<p>
				You will need: <b id="agg_required_bags" class="val">935.00</b> mini bags of this aggregate type.
			</p>
		</div>
		<p class="note">The exact conversion depends on a number of factors beyond our control, for example moisture, method &amp; degree of compaction, type of sub-base etc.</p>
		<p class="note">We cannot be held contractually responsible for any surplus or shortfall found on site.</p>
	</div>
<?php
	return ob_get_clean();
}
add_shortcode( 'calculator', 'calculator_shortcode' );
// Enqueue Calculator to Woocommerce
function calculatorEnqueue() {
	?>
	<button type="button" class="fusion-button button-flat fusion-button-square button-medium button-custom button-2" data-toggle="modal" data-target="#calculatorModal"><span class="fusion-button-text"><i class="fa fa-calculator"></i> Quantity Calculator</span></button>
	<div class="modal fade" id="calculatorModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Quantity Calculator</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo do_shortcode( '[calculator]' );?>
				</div>
			</div>
		</div>
	</div>
	<?php
}
add_action( 'woocommerce_after_add_to_cart_form', 'calculatorEnqueue', 5 );

?>