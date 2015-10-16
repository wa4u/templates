<?php
// RCI code start
echo $cre_RCI->get('global', 'top');
echo $cre_RCI->get('affiliateaffiliate', 'top');
// RCI code eof
?>
   <div class="row">
<?php
// BOF: Lango Added for template MOD
if (SHOW_HEADING_TITLE_ORIGINAL == 'yes') {
$header_text = '&nbsp;'
//EOF: Lango Added for template MOD
?>
      <div class="col-sm-12 col-lg-12">
         <h1><?php echo HEADING_TITLE; ?></h1>
		  <?php/*  <div class="pageHeading">
			 <?php echo tep_image(DIR_WS_IMAGES . 'table_background_login.gif', HEADING_TITLE, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT); ?>
			 </div>*/?>
      </div>
<?php
  if (isset($info_message)) {
?>
      <tr>
        <td class="smallText"><?php echo $info_message; ?></td>
      </tr>
<?php
  }
// BOF: Lango Added for template MOD
}else{
$header_text = HEADING_TITLE;
}
// EOF: Lango Added for template MOD

  if (isset($_GET['login']) && ($_GET['login'] == 'fail')) {
    $info_message = TEXT_LOGIN_ERROR;
  }
 echo tep_draw_form('login', tep_href_link(FILENAME_AFFILIATE, 'action=process', 'SSL')); ?>
<?php
// BOF: Lango Added for template MOD
// EOF: Lango Added for template MOD
?>
  <div class="col-sm-6 col-lg-6 ">
		<div class="well">
			<div class="main"><b><?php echo HEADING_NEW_AFFILIATE; ?></b></div>
			<div class="main"><?php echo TEXT_NEW_AFFILIATE . '<br><br>' . TEXT_NEW_AFFILIATE_INTRODUCTION; ?></div>
			<div class="smallText"><?php echo '<a  href="' . tep_href_link(FILENAME_AFFILIATE_TERMS, '', 'SSL') . '">' . TEXT_NEW_AFFILIATE_TERMS . '</a>'; ?></div>
		    <div class="button-set clearfix small-padding-top">
				<div class="main pull-right"><?php echo '<a href="' . tep_href_link(FILENAME_AFFILIATE_SIGNUP, '', 'SSL') . '">' . tep_template_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>'; ?></div>
		    </div>
       </div>
  </div>
  <div class="col-sm-6 col-lg-6 ">
	  <div class="well">
		 <div><b><?php echo HEADING_RETURNING_AFFILIATE; ?></b></div>
		 <div class="main"><?php echo TEXT_RETURNING_AFFILIATE; ?></div>
		 <div>
			<div class="main"><b><?php echo TEXT_AFFILIATE_ID; ?></b></div>
			<div class="main"><?php echo tep_draw_input_field('affiliate_username'); ?></div>
		 </div>
		 <div>
			<div class="main"><b><?php echo TEXT_AFFILIATE_PASSWORD; ?></b></div>
			<div class="main"><?php echo tep_draw_password_field('affiliate_password'); ?></div>
		 </div>
		 <div>
			<div class="smallText"><?php echo '<a href="' . tep_href_link(FILENAME_AFFILIATE_PASSWORD_FORGOTTEN, '', 'SSL') . '">' . TEXT_AFFILIATE_PASSWORD_FORGOTTEN . '</a>'; ?></div>
		 </div>
		 <div class="button-set clearfix small-padding-top">
			 <div>
				<div class="pull-right" ><?php echo tep_template_image_submit('button_login.gif', IMAGE_BUTTON_LOGIN); ?></div>
			 </div>
	     </div>
	</div>
</div>
<?php
// RCI code start
echo $cre_RCI->get('affiliateaffiliate', 'menu');
// RCI code eof
// BOF: Lango Added for template MOD
// EOF: Lango Added for template MOD
?>
  </form>
</div>

<?php
// RCI code start
echo $cre_RCI->get('affiliateaffiliate', 'bottom');
echo $cre_RCI->get('global', 'bottom');
// RCI code eof
?>