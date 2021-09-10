<?php echo form_open('config/save_exchange_rate/', array('id' => 'exchage_rate_form', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
	<div id="config_wrapper">
		<fieldset id="config_info">
			<div id="required_fields_message"><?php echo $this->lang->line('common_fields_required_message'); ?></div>
			<ul id="exchange_rate_error_message_box" class="error_message_box"></ul>


			<div class="form-group form-group-sm">
				<?php echo form_label($this->lang->line('config_gold_price_21'), 'gold_price_21', array('class' => 'control-label col-xs-2 required')); ?>
				<div class='col-xs-2'>
					<?php echo form_input(array(
						'name' => 'gold_price_21',
						'id' => 'gold_price_21',
						'class' => 'form-control input-sm required',
						'type' => 'number',
						'value' => '')); ?>
				</div>
			</div>

			<div class="form-group form-group-sm">
				<?php echo form_label($this->lang->line('config_dolar_price'), 'dolar_price', array('class' => 'control-label col-xs-2 required')); ?>
				<div class='col-xs-2'>
					<?php echo form_input(array(
						'name' => 'dolar_price',
						'id' => 'dolar_price',
						'class' => 'form-control input-sm required',
						'type' => 'number',
						'value' => '')); ?>
				</div>
			</div>

			<?php echo form_submit(array(
				'name' => 'submit_general',
				'id' => 'submit_general',
				'value' => $this->lang->line('common_submit'),
				'class' => 'btn btn-primary btn-sm pull-right')); ?>
		</fieldset>
	</div>
<?php echo form_close(); ?>

<script type="text/javascript">
//validation and submit handling
$(document).ready(function()
{
	$('#exchage_rate_form').validate($.extend(form_support.handler, {

		errorLabelContainer: "#exchange_rate_error_message_box",

		rules:
		{
			gold_price_21:
			{
				required: true,
				// remote: "<?php echo site_url($controller_name . '/check_numeric')?>"
			},
			dolar_price:
			{
				required: true,
				// remote: "<?php echo site_url($controller_name . '/check_numeric')?>"
			}
		},

		messages:
		{
			gold_price_21:
			{
				required: "<?php echo $this->lang->line('config_gold_price_21_required'); ?>"
			},
			dolar_price:
			{
				required: "<?php echo $this->lang->line('config_dolar_price_required'); ?>"
			}
		},

		submitHandler: function(form) {
			$(form).ajaxSubmit({
				success: function(response) {
					$.notify( { message: response.message }, { type: response.success ? 'success' : 'danger'} )
				},
				dataType: 'json'
			});
		}
	}));
});
</script>
