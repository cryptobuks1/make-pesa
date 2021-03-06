      <div class="visible-top"></div>

      <div class="container-fluid">
      <div class="row">
      <div class="col-sm-15 col-md-15 col-md-offset-0">
      <!-- Most out panel -->
	  <?php $this->load->view($this->themename.'/layout/business/summary/tabs/most-cover'); ?>
	  <!-- End -->

        <div class="col-sm-4 col-md-4">
		<?php $this->load->view($this->themename.'/layout/personal/summary/sidebar'); ?>
		
        </div><!--/span-->

        <div class="col-sm-8 col-md-8">
		<div class="well">
		<h5>
		<?php echo $this->lang->line('fund_deposit_card_well_header_h5'); ?>
		</h5>
		<?php

        if (validation_errors()) {

          echo '<div class="alert alert-danger alert-dismissible" role="alert">
				<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                  '.validation_errors().'
                </div>';
                  
        }

		// Fund add failed alert.
      	if ($this->session->payment_card_status) {
      		echo '<div class="alert alert-danger alert-dismissible" role="alert">
      			  	<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>
					<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
      				  '.$this->session->payment_card_status.'
      			  </div>';
      	}

		 // Fund add success alert.
      	if ($this->session->payment_send_card_success) {
      		echo '<div class="alert alert-success alert-dismissible" role="alert">
      			  	<i class="fa fa-check fa-2x" aria-hidden="true"></i>
      			  	<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
      				  '.$this->lang->line('fund_deposit_card_ajax_success').'
      			  </div>';
      	}
		
  	    ?>
		
		<!-- Form Card -->
		<div class="fund-payment-card">
		<?php if ($list_card):?>
		 <!-- Form of payment -->
		
		<form method="post">
		  <label><?php echo $this->lang->line('fund_add_card_form_label_need'); ?></label>
		<div class="form-group">
		<div class="input-group">
		<span class="input-group-addon" id="text-amount"><?php echo $this->user->curr_word; ?></span>
		<input type="text" name="amount" class="form-control sendMoney" value="" placeholder="amount">
		</div>
		
		</div>
		
		<div class="fund-payment-padding">
		  <div class="form-group">
		  <h5>
		  <i class="fa fa-caret-down" aria-hidden="true"></i>
		  <?php echo $this->lang->line('fund_add_card_form_label_add_fund'); ?>
		  </h5>
		  <?php foreach($list_card as $card){?>
		  <div class="fund-payment-select">
		  <div class="fund-payment-select-primary">
            <input type="radio" name="card" id="card-<?php echo $card->id;?>" value="<?php echo $card->id;?>">
            <label for="card-<?php echo $card->id;?>">
		  <?php echo $this->helper->card_type_name(''.$card->card_type.'');?>			
		  <?php echo str_pad(substr($card->number, -6), strlen($card->number), '-*', STR_PAD_LEFT);?></label>
		  </div>
		  </div>
		  <?php }?>
		  </div>
		  
		  </div>
          
          <div class="form-group">
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <button type="submit" class="load fund-payment-button-submit">
			<?php echo $this->lang->line('fund_add_card_form_submit_button'); ?>
			</button>
			
          </div>
        </form>
		  <!-- End Form -->
		  
		  <?php else:?>
		 <div class="text-center">
		 <i class="fa fa-exclamation-triangle fa-red fa-4x" aria-hidden="true"></i>
		 <p><?php echo $this->lang->line('fund_deposit_card_ajax_no_card'); ?></p>
		 </div>
		  <?php endif;?>
		
		</div>
		<!-- End form -->
		</div>
		</div>
		  </div><!--/span-->
        </div><!--/span-->
      </div><!--/row-->

    </div><!--/.container-->