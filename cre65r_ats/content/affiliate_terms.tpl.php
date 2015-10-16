<?php
// RCI code start
echo $cre_RCI->get('global', 'top');
echo $cre_RCI->get('affiliateterms', 'top');
// RCI code eof
?>
  		<div class="well">

<div class="row">
  <div class="col-sm-12 col-lg-12 ">

            <h1><?php echo HEADING_TITLE; ?></h1>
          <?php/*   <div class="pageHeading"> <?php echo tep_image(DIR_WS_IMAGES . 'table_background_login.gif', HEADING_TITLE, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT); ?></div>*/?>
  </div>

<?php
// BOF: Lango Added for template MOD
// EOF: Lango Added for template MOD
?>
     <div class="col-sm-12 col-lg-12 ">
                <div>
                     <div class="infoBoxHeading"><?php echo HEADING_AFFILIATE_PROGRAM_TITLE; ?></div>
                </div>
                <div>
                     <div class="smallText"><?php echo TEXT_INFORMATION; ?></div>
                </div>
     </div>
<?php
// RCI code start
echo $cre_RCI->get('affiliateterms', 'menu');
// RCI code eof
// BOF: Lango Added for template MOD
?>
   <div class="col-sm-12 col-lg-12 large-padding-top">
	   <div class="button-set clearfix">
			<div>
			    <?php echo '<a href="' . tep_href_link(FILENAME_AFFILIATE_SIGNUP, '', 'SSL') . '">' . tep_template_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>'; ?>
			   <div class="main pull-right"style="padding-bottom:20px;"><?php echo '<a href="' . tep_href_link(FILENAME_AFFILIATE, '', 'SSL') . '">' . tep_template_image_button('button_login.gif', IMAGE_BUTTON_LOGIN) . '</a>'; ?></div>
			</div>
	   </div>
   </div>
</div>
</div>
<?php
// RCI code start
echo $cre_RCI->get('global', 'bottom');
echo $cre_RCI->get('affiliateterms', 'bottom');
// RCI code eof
?>