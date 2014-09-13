<div id="all_contents">
 <div id="content_left"></div>
 <div id="content_right">
	<div id="content_right_left">
	 <div id="content_top"></div>
	 <div id="content">
		<div id="structure">
		 <div id="ar_transaction_source_divId">
			<div id="form_top">
			</div>
			<!--    START OF FORM HEADER-->
			<div class="error"></div><div id="loading"></div>
			<div class="show_loading_small"></div>
			<?php echo (!empty($show_message)) ? $show_message : ""; ?> 
			<!--    End of place for showing error messages-->
			<div id ="form_header">
			 <form action=""  method="post" id="ar_transaction_source"  name="ar_transaction_source"><span class="heading">Transaction Source </span>
				<div class="large_shadow_box tabContainer">
				 <ul class="column four_column"> 
					<li> 
					 <label><img src="<?php echo HOME_URL; ?>themes/images/serach.png" class="ar_transaction_source_id select_popup clickable">
						Transaction Source Id : </label><?php $f->text_field_ds('ar_transaction_source_id') ?>
					 <a name="show" href="form.php?class_name=ar_transaction_source" class="show ar_transaction_source_id">	<img src="<?php echo HOME_URL; ?>themes/images/refresh.png" class="clickable"></a> 
					</li>
					<li><label>Source Name :</label><?php $f->text_field_d('transaction_source'); ?> 					</li>
					<li><label>BU Name : </label>
					 <?php echo $f->select_field_from_object('bu_org_id', org::find_all_business(), 'org_id', 'org', $$class->bu_org_id, 'bu_org_id', '', 1, $readonly1); ?>
					</li>
					<li><label>Ledger Name : </label>
					 <?php echo form::select_field_from_object('legal_org_id', gl_ledger::find_all(), 'gl_ledger_id', 'ledger', $$class->legal_org_id, 'legal_org_id', $readonly1, '', '', 1); ?>
					</li>
					<li><label>Source Type : </label>
					 <?php echo $f->select_field_from_array('source_type', ar_transaction_source::$source_type_a, $$class->source_type, 'source_type', '', 1, $readonly1); ?>
					</li>
					<li><label>Description :</label><?php $f->text_field_d('description'); ?> 					</li>
					<li><label>Status : </label><?php echo form::status_field($$class->status, $readonly); ?></li>
				 </ul>
				</div>
				<div id ="form_line" class="form_line"><span class="heading">Transaction Source Details </span>
				 <div id="tabsLine">
					<ul class="tabMain">
					 <li><a href="#tabsLine-1">Basic Info</a></li>
					 <li><a href="#tabsLine-2">Future</a></li>
					</ul>
					<div class="tabContainer"> 
					 <div id="tabsLine-1" class="tabContent">
						<div> 
						 <ul class="column four_column"> 
							<li><label>Invoice Type :</label>
							 <?php echo $f->select_field_from_object('invoice_type_id', ar_transaction_type::find_all(), 'ar_transaction_type_id', 'ar_transaction_type', $$class->invoice_type_id, 'invoice_type_id'); ?>
							</li>
							<li><label>Credit Memo :</label>
							 <?php echo $f->select_field_from_object('cm_type_id', ar_transaction_type::find_all(), 'ar_transaction_type_id', 'ar_transaction_type', $$class->cm_type_id, 'cm_type_id'); ?>
							</li>
							<li><label>Payment Term :</label>
							 <?php echo $f->select_field_from_object('payment_term_id', payment_term::find_all(), 'payment_term_id', 'payment_term', $$class->payment_term_id, '', 'payment_term_id', 1, $readonly1); ?>
							</li>
							<li><label> Crate Clearing ? :</label> 
							 <?php $f->checkBox_field_d('create_clearing_cb'); ?></li>
						 </ul> 
						</div> 
					 </div> 
					 <div id="tabsLine-2"  class="tabContent">
						<div> 

						</div> 
					 </div>
					</div>
				 </div> 
				</div> 
			 </form>
			</div>
			<!--END OF FORM HEADER-->

		 </div>
		</div>
		<!--   end of structure-->
	 </div>
	 <div id="content_bottom"></div>
	</div>
	<div id="content_right_right"></div>
 </div>

</div>
<div id="js_data">
 <ul id="js_saving_data">
	<li class="headerClassName" data-headerClassName="ar_transaction_source" ></li>
	<li class="savingOnlyHeader" data-savingOnlyHeader="true" ></li>
	<li class="primary_column_id" data-primary_column_id="ar_transaction_source_id" ></li>
	<li class="form_header_id" data-form_header_id="ar_transaction_source" ></li>
 </ul>
 <ul id="js_contextMenu_data">
	<li class="docHedaderId" data-docHedaderId="ar_transaction_source_id" ></li>
	<li class="btn1DivId" data-btn1DivId="ar_transaction_source_id" ></li>
 </ul>
</div>

<?php include_template('footer.inc') ?>