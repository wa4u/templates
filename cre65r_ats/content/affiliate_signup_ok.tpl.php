<?php
// RCI code start
echo $cre_RCI->get('global', 'top');
echo $cre_RCI->get('affiliatesignupok', 'top');
// RCI code eof
?>
<div class="row">
		 <div class="col-sm-12 col-lg-12">
			 <div class="well">
				 <div align="center" class="pageHeading"><h1><?php echo HEADING_TITLE; ?></h1></div>
					<br><?php echo TEXT_INFORMATION; ?>
			 </div>
			 <div class="btn-set small-margin-top clearfix">
			 <div class="pull-right"><?php echo '<a href="' . tep_href_link(FILENAME_AFFILIATE_CENTRAL, '', 'SSL') . '">' . tep_template_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>'; ?></div>
         </div>
   </div>
</div>

<?php
// RCI code start
echo $cre_RCI->get('affiliatesignupok', 'bottom');
echo $cre_RCI->get('global', 'bottom');
// RCI code eof
?>