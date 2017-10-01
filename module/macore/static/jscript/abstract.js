/*
bootstrapped by
 __  __
|  \/  | __ _  ___ __ _  __ _  ___  _ __ __ _  __ _  __ _ 
| |\/| |/ _` |/ __/ _` |/ _` |/ _ \| '__/ _` |/ _` |/ _` |
| |  | | (_| | (_| (_| | (_| | (_) | | | (_| | (_| | (_| |
|_|  |_|\__,_|\___\__,_|\__, |\___/|_|  \__,_|\__, |\__,_|
                        |___/                 |___/  

macAbstractSupport()
*/
$Core.macAbstractSupport = 
{

	init:function()
	{

		var bootstrapFormControl = "textarea, #abstractcart_form_container select, #abstractcart_form_container input[type='text'],.abstractstore_search_form_cat_select, .abstractbusiness_search_form_cat_select, .abstractbusiness_search_form_sub_select, .abstractbusiness_search_form_country_select, .abstractauction_search_form_cat_select, .abstractauction_search_form_sub_select, .abstractauction_search_form_country_select, #abstractauction_search_formauc_order, #abstractauction_form_container select, #abstractauction_submit_bio, #quantity_field, #auc_days_container input, #js_block_border_abstractbusiness_search_form input[type='text'], #abstractbusiness_form_container select, #abstractbusiness-checkin-search";

		// fix input
		$(bootstrapFormControl).addClass('form-control');


		// fix panel footer
		$('#js_block_border_abstractbusiness_main_newbusiness .panel-body').find('div:last').appendTo($('#js_block_border_abstractbusiness_main_newbusiness')).attr('style', '').addClass('panel-footer');

		$('#js_block_border_abstractbusiness_main_newdocuments .panel-body').find('div:last').appendTo($('#js_block_border_abstractbusiness_main_newdocuments')).attr('style', '').addClass('panel-footer');
		// end


		// fix input type file
		$("input[type='file']").removeClass('form-control');

		$('#flat_rate_shipping').addClass('btn btn-primary btn-block');
		// end
	}

}; // end 

$Behavior.macAbstractSupportInit = function()
{
    $Core.macAbstractSupport.init();
} // end 

