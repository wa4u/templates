<?php
// RCI code start
echo $cre_RCI->get('global', 'top');
echo $cre_RCI->get('affiliatepasswordforgotten', 'top');
// RCI code eof
 echo tep_draw_form('password_forgotten', tep_href_link(FILENAME_AFFILIATE_PASSWORD_FORGOTTEN, 'action=process', 'SSL')); ?>

<div class="row">
  <div class="col-sm-12 col-lg-12">
          <h2><?php echo HEADING_TITLE; ?></h2>
        </div>
  <?php

  if ($messageStack->size('password_forgotten') > 0) {
?>
  <div>
    <div class="message-stack-container alert alert-danger small-margin-bottom small-margin-left"><?php echo $messageStack->output('password_forgotten'); ?></div>
  </div>
  <?php
  }
?>
 <div class="well">
                <div class="main" colspan="2"><?php echo TEXT_MAIN; ?></div>
                <div class="main"><?php echo '<b>' . ENTRY_EMAIL_ADDRESS . '</b> ' . tep_draw_input_field('email_address'); ?></div>

              <!-- VISUAL VERIFY CODE start -->
					<!-- VISUAL VERIFY CODE start -->
						<?php
						if (defined('VVC_SITE_ON_OFF') && VVC_SITE_ON_OFF == 'On') {
							if (defined('VVC_LINK_SUBMITT_ON_OFF') && VVC_LINK_SUBMITT_ON_OFF == 'On'){
						?>
						<h3><?php echo VISUAL_VERIFY_CODE_CATEGORY; ?></h3>
						<?php echo VISUAL_VERIFY_CODE_TEXT_INSTRUCTIONS; ?>
		    			<div class="form-group full-width margin-bottom"><label class="sr-only"></label><?php echo tep_draw_input_field('visual_verify_code', '' , 'class="form-control" placeholder="' . VISUAL_VERIFY_CODE_BOX_IDENTIFIER . '"'); ?></div>

						  <?php
							  //can replace the following loop with $visual_verify_code = substr(str_shuffle (VISUAL_VERIFY_CODE_CHARACTER_POOL), 0, rand(3,6)); if you have PHP 4.3
							$visual_verify_code = "";
							for ($i = 1; $i <= rand(3,6); $i++){
								  $visual_verify_code = $visual_verify_code . substr(VISUAL_VERIFY_CODE_CHARACTER_POOL, rand(0, strlen(VISUAL_VERIFY_CODE_CHARACTER_POOL)-1), 1);
							 }
							 $vvcode_oscsid = tep_session_id();
							 tep_db_query("DELETE FROM " . TABLE_VISUAL_VERIFY_CODE . " WHERE oscsid='" . $vvcode_oscsid . "'");
							 $sql_data_array = array('oscsid' => $vvcode_oscsid, 'code' => $visual_verify_code);
							 tep_db_perform(TABLE_VISUAL_VERIFY_CODE, $sql_data_array);
							 $visual_verify_code = "";
							 echo('<img class="img-responsive" src="' . FILENAME_VISUAL_VERIFY_CODE_DISPLAY . '?vvc=' . $vvcode_oscsid . '" alt="' . VISUAL_VERIFY_CODE_CATEGORY . '">');
						  ;?>
						<!-- VISUAL VERIFY CODE end -->
						<?php } } ?>
  </div>
	    <div class="btn-set small-margin-top clearfix">
			<?php echo '<a href="' . tep_href_link(FILENAME_AFFILIATE, '', 'SSL') . '">' . tep_template_image_button('button_back.gif', IMAGE_BUTTON_BACK) . '</a>'; ?>
			<div class="pull-right"> <?php echo tep_template_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE); ?></div>
       </div>

              <!--  VISUAL VERIFY CODE stop   -->
  <?php
// RCI code start
echo $cre_RCI->get('affiliatepasswordforgotten', 'menu');
// RCI code eof
?>
</div>
</form>
<?php
// RCI code start
echo $cre_RCI->get('affiliatepasswordforgotten', 'bottom');
echo $cre_RCI->get('global', 'bottom');
// RCI code eof
?>