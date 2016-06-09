<?php
// RCI code start
echo $cre_RCI->get('global', 'top');
echo $cre_RCI->get('productreviewswrite', 'top');
// RCI code eof
echo tep_draw_form('product_reviews_write', tep_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, 'action=process&amp;products_id=' . $product_info['products_id']), 'post', 'onSubmit="return checkForm();"'); ?>
<div class="row">
<div class="col-sm-12 col-lg-12 no-padding-left no-padding-right">
            <div class="col-sm-10 col-lg-10 headertext no-padding-left no-padding-right"><?php echo $products_name; ?></div>
            <div class="col-sm-2 col-lg-2 text-right headertext no-padding-left no-padding-right"><?php echo $products_price; ?></div>
			<div class="clearfix"></div>
			<?php
			  if ($messageStack->size('review') > 0) {
			?>
			<div class="col-sm-12 col-lg-12">
			  <div class="message-stack-container alert alert-danger"><?php echo $messageStack->output('review'); ?></div>
			</div>
			<div class="clearfix"></div>
			<?php
			  }
			?>
			<div class="col-sm-8 col-lg-8 no-padding-left no-padding-right">
			<?php echo '<b>' . SUB_TITLE_FROM . '</b> ' . tep_output_string_protected($customer['customers_firstname'] . ' ' . $customer['customers_lastname']); ?>
			<br><b><?php echo SUB_TITLE_REVIEW; ?></b>
			<?php echo tep_draw_textarea_field('review_text', 'soft', 60, 15,'','class="form-control"'); ?>
			<br><?php echo TEXT_NO_HTML; ?>
			<br><?php echo '<b>' . SUB_TITLE_RATING . '</b> ' . TEXT_BAD . ' ' . tep_draw_radio_field('rating', '1') . ' ' . tep_draw_radio_field('rating', '2') . ' ' . tep_draw_radio_field('rating', '3') . ' ' . tep_draw_radio_field('rating', '4') . ' ' . tep_draw_radio_field('rating', '5') . ' ' . TEXT_GOOD; ?>
			</div>
			<div class="col-sm-4 col-lg-4 no-padding-left no-padding-right text-center">
			<?php
			  if (tep_not_null($product_info['products_image'])) {

								echo '<a data-toggle="modal" href="#popup-image-modal" class="">' . tep_image(DIR_WS_IMAGES . $product_info['products_image'], $product_info['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'class="img-responsive"') . '</a><br><p class="text-center no-margin-top no-margin-bottom"><a data-toggle="modal" href="#popup-image-modal" class="btn normal">Click To Enlarge</a></p>    <div class="modal fade" id="popup-image-modal">
										  <div class="modal-dialog">
											<div class="modal-content">
											  <div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title">'.$product_info['products_name'] .'</h4>
											  </div>
											  <div class="modal-body pop_im">'.tep_image(DIR_WS_IMAGES . $product_info['products_image'], $product_info['products_name'], LARGE_IMAGE_WIDTH, LARGE_IMAGE_HEIGHT, 'class="img-responsive" style="border:1px solid red"').'
											  </div>
											  <div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
											  </div>
											</div>
										  </div>
										</div>
									';


			}

			  echo '<p><a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action','cPath','products_id')) . 'action=buy_now&products_id=' . $product_info['products_id'] . '&cPath=' . tep_get_product_path($product_info['products_id'])) . '">' . tep_template_image_button('button_in_cart.gif', IMAGE_BUTTON_IN_CART) . '</a></p>';
			?>
			</div>
			<div class="clearfix"></div>

			  <!--  VISUAL VERIFY CODE start -->
		  <?php
			  if (defined('VVC_SITE_ON_OFF') && VVC_SITE_ON_OFF == 'On') {
				if (defined('VVC_PRODUCT_REVIEWS_ON_OFF') && VVC_PRODUCT_REVIEWS_ON_OFF == 'On') {
			?>
		<div class="col-sm-12 col-lg-12 no-padding-left no-padding-right">
				<b><?php echo VISUAL_VERIFY_CODE_CATEGORY; ?></b>
				<?php echo VISUAL_VERIFY_CODE_TEXT_INSTRUCTIONS; ?>
					 <table border="0" cellspacing="2" cellpadding="2">
					  <tr>
						<td class="main"></td>
						<td class="main"><?php echo tep_draw_input_field('visual_verify_code') . '&nbsp;' . '<span class="inputRequirement">' . VISUAL_VERIFY_CODE_ENTRY_TEXT . '</span>'; ?></td>

						<td class="main">
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
							 echo('<img src="' . FILENAME_VISUAL_VERIFY_CODE_DISPLAY . '?vvc=' . $vvcode_oscsid . '" alt="' . VISUAL_VERIFY_CODE_CATEGORY . '">');
						  ?>
						</td>
						<td class="main"><?php echo VISUAL_VERIFY_CODE_BOX_IDENTIFIER; ?></td>
					  </tr>
					</table>
			  </div>

		  <?php
				}
			  }
		?>
		<!-- VISUAL VERIFY CODE stop   -->
		<div class="clearfix"></div>
		<?php
		// RCI code start
		echo $cre_RCI->get('productreviewswrite', 'menu');
		// RCI code eof
		// EOF: Lango Added for template MOD
		?>
		<div class="col-sm-6 col-lg-6">
			<?php echo '<a class="btn btn-sm cursor-pointer small-margin-right btn-success" href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS, tep_get_all_get_params(array('reviews_id', 'action'))) . '">' .  IMAGE_BUTTON_BACK . '</a>'; ?>
		</div>
		<div class="col-sm-6 col-lg-6">
		<?php echo tep_template_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE); ?>
		</div>
		<div class="clearfix"></div>
  </div>
 </div>
</form>
<?php
// RCI code start
echo $cre_RCI->get('productreviewswrite', 'bottom');
echo $cre_RCI->get('global', 'bottom');
// RCI code eof
?>