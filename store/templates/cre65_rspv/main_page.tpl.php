<?php
/*
  $Id: main_page.tpl.php,v 1.0 2008/06/23 00:18:17 datazen Exp $

  CRE Loaded, Open Source E-Commerce Solutions
  http://www.creloaded.com

  Copyright (c) 2008 CRE Loaded
  Copyright (c) 2008 AlogoZone, Inc.
  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
include(DIR_FS_CATALOG.'templates/'.TEMPLATE_NAME.'/includes/functions/general.php');
include(DIR_FS_CATALOG.'templates/'.TEMPLATE_NAME.'/includes/classes/split_page_results.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html <?php echo HTML_PARAMS; ?>>
<head>
<base href="<?php echo (($request_type == 'SSL' || (isset($_SERVER["HTTP_X_FORWARDED_PROTO"]) && $_SERVER["HTTP_X_FORWARDED_PROTO"] == 'https')) ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG . 'index.php'; ?>">
<?php
if ( file_exists(DIR_WS_INCLUDES . FILENAME_HEADER_TAGS) ) {
  require(DIR_WS_INCLUDES . FILENAME_HEADER_TAGS);
} else {
  ?>
  <title><?php echo TITLE ?></title>
  <?php
}
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="templates/cre65_rspv/favicon.ico">
<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_STYLE;?>">
<?php
// RCI code start
echo $cre_RCI->get('stylesheet', 'cre65ats');
echo $cre_RCI->get('global', 'head');
// RCI code eof
if (isset($javascript) && file_exists(DIR_WS_JAVASCRIPT . basename($javascript))) { require(DIR_WS_JAVASCRIPT . basename($javascript)); }
if (defined('PRODUCT_INFO_TAB_ENABLE') && PRODUCT_INFO_TAB_ENABLE == 'True' && basename($PHP_SELF) == FILENAME_PRODUCT_INFO) {
  ?>
  <script type="text/javascript" src="<?php echo DIR_WS_JAVASCRIPT;?>tabs/webfxlayout.js"></script>
  <link type="text/css" rel="stylesheet" href="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/tabs/tabpane.css">
  <script type="text/javascript" src="<?php echo DIR_WS_JAVASCRIPT;?>tabs/tabpane.js"></script>

  <?php
}
if(defined('TEMPLATE_BUTTONS_USE_CSS') && TEMPLATE_BUTTONS_USE_CSS == 'true'){
?>
<!--[if IE]>
<style type="text/css">
.template-button-left, .template-button-middle, .template-button-right {
  height: 28px;
}
</style>
<![endif]-->
<?php
}
?>
  	<!-- New Responsive section start CSS -->
		 <link rel="stylesheet" href="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME . '/'?>css/bootstrap/css/bootstrap.css">
		 <link rel="stylesheet" href="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME . '/'?>css/css/template.css?v=<?php echo rand();?>">
		 <link href="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME . '/'?>css/font-awesome.css" rel="stylesheet">
	<!--Googlefont-->
	     <script src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME . '/'?>jquery/jquery-2.1.1.min.js"></script>
         <script src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME . '/'?>css/bootstrap/js/bootstrap.min.js"></script>
         <script src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME . '/'?>jquery/respond.min.js"></script>
	     <script src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME . '/'?>css/bootstrap/bootstrap-datepicker.js"></script>
	     <script src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME . '/'?>css/bootstrap/js/bootstrap-fileinput.js"></script>
	     <script src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME . '/'?>jquery/jquery.loadmask.js"></script>
	     <link rel="stylesheet" href="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME . '/'?>css/bootstrap/css/bootstrap-datepicker.css">
         	<!-- New Responsive section end CSS -->


		<link href="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME . '/'?>css/stylesheet.css" rel="stylesheet" />

        <?php // below line is producing 404 and unsecure page error @Kiran ?>
		<!-- link rel="stylesheet" type="text/css" href="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME . '/'?>css/lightbox.css" / -->

		<link rel="stylesheet" type="text/css" href="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME . '/'?>css/carousel.css" />


		<!-- Megnor www.templatemela.com - Start -->
		<script type="text/javascript" src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME . '/'?>jquery/custom.js"></script>

		<script type="text/javascript" src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME . '/'?>jquery/carousel.min.js"></script>
		<script type="text/javascript" src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME . '/'?>jquery/megnor.min.js"></script>
		<script type="text/javascript" src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME . '/'?>jquery/jquery.custom.min.js"></script>
        <?php
        /*
		<script type="text/javascript" src="fancyBox/source/jquery.fancybox.js?v=2.1.5"></script>
		<link rel="stylesheet" type="text/css" href="fancyBox/source/jquery.fancybox.css?v=2.1.5" media="screen" />

        <script type="text/javascript">

        $(document).ready(function() {
			$(".fancybox").fancybox({
				openEffect	: 'none',
				closeEffect	: 'none'
			});
		});
        </script>
          */?>
</head>
<?php
// RCO start
if ($cre_RCO->get('mainpage', 'body') !== true) {
  echo '<body>' . "\n";
}
// RCO end
//include languages if avaible for template

if(file_exists(TEMPLATE_FS_CUSTOM_INCLUDES . 'languages/' . $language . '/menu.php')){
require(TEMPLATE_FS_CUSTOM_INCLUDES . 'languages/' . $language . '/menu.php');
}
?>
<!-- warnings //-->
<?php
if(file_exists(TEMPLATE_FS_CUSTOM_INCLUDES . FILENAME_WARNINGS)){
    require(TEMPLATE_FS_CUSTOM_INCLUDES . FILENAME_WARNINGS);
} else {
    require(DIR_WS_INCLUDES . FILENAME_WARNINGS);
}
?>
<!-- warning_eof //-->
<div id="loaded7" class="loadedcommerce-main-wrapper">

<?php
// RCI top
echo $cre_RCI->get('mainpage', 'top');
?>
<!-- header //-->
<?php require(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/' . FILENAME_HEADER); ?>
<!-- header_eof //-->
<!-- body //-->
  <div class="container" id="content-container">
   <div id="content-center-container" class="col-sm-12 col-lg-12  main_c">
    <!-- content //-->
      <?php //echo (DIR_WS_TEMPLATES . TEMPLATE_NAME.'/content/'. $content . '.tpl.php');
      if (isset($content_template) && file_exists(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/content/'.  basename($content_template))) {
        require(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/content/' . $content . '.tpl.php');
      } else if (file_exists(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/content/' . $content . '.tpl.php')) {
        require(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/content/'. $content . '.tpl.php');
      } else if (isset($content_template) && file_exists(DIR_WS_CONTENT . basename($content_template)) ){
        require(DIR_WS_CONTENT . basename($content_template));
      } else {
        require(DIR_WS_CONTENT . $content . '.tpl.php');
      }
      ?>
   </div>
   <?php /*
       <div class="col-sm-3 col-lg-3 left_c" id="content-left-container">
         <?php
         if (DISPLAY_COLUMN_LEFT == 'yes' && (DOWN_FOR_MAINTENANCE =='false' || DOWN_FOR_MAINTENANCE_COLUMN_LEFT_OFF =='false'))  {
             $column_location = 'Left_';
         ?>
             <!-- left_navigation //-->
             <?php require(DIR_WS_INCLUDES . FILENAME_COLUMN_LEFT); ?>
             <!-- left_navigation_eof //-->

           <?php
           $column_location = '';
         }
         ?>
        </div>
           */ ?>
   </div>

    <!-- content_eof //-->
    <?php/*
    if (DISPLAY_COLUMN_RIGHT == 'yes' && (DOWN_FOR_MAINTENANCE =='false' || DOWN_FOR_MAINTENANCE_COLUMN_LEFT_OFF =='false'))  {
        $column_location = 'Right_';
      ?>
      <td width="<?php echo BOX_WIDTH_RIGHT; ?>" valign="top" class="maincont_right_td">
        <table border="0" width="<?php echo BOX_WIDTH_RIGHT; ?>" cellspacing="0" cellpadding="<?php echo CELLPADDING_RIGHT; ?>" class="rightbar_tb">
        <!-- right_navigation //-->
        <?php require(DIR_WS_INCLUDES . FILENAME_COLUMN_RIGHT); ?>
        <!-- right_navigation_eof //-->
      </table></td>
      <?php
      $column_location = '';
    }
   */ ?>

</div>
<!-- body_eof //-->
<!-- footer //-->
<?php require(DIR_WS_TEMPLATES . TEMPLATE_NAME .'/'.FILENAME_FOOTER); ?>
<!-- footer_eof //-->
<br>
<?php
// RCI global footer
echo $cre_RCI->get('global', 'footer');
?>
</div>
<?php
$arr_contents = array('index_products');
if(in_array($content, $arr_contents))
{
?>
<script language="javascript">
/*
  Thanks to CSS Tricks for pointing out this bit of jQuery
  http://css-tricks.com/equal-height-blocks-in-rows/
  It's been modified into a function called at page load and then each time the page is resized.
  One large modification was to remove the set height before each new calculation.
 */
equalheight = function(container) {
  var currentTallest = 0,
      currentRowStart = 0,
      rowDivs = new Array(),
      $el,
      topPosition = 0;
  $(container).each(function() {
    $el = $(this);
    //$($el).height('auto')
    topPostion = $el.position().top;
    if (currentRowStart != topPostion) {
      for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
        rowDivs[currentDiv].height(currentTallest);
      }
      rowDivs.length = 0; // empty the array
      currentRowStart = topPostion;
      currentTallest = $el.height();
      rowDivs.push($el);
    } else {
      rowDivs.push($el);
      currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
    }
    for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
      rowDivs[currentDiv].height(currentTallest);
    }
  });
}

$(window).load(function() {
  equalheight('.product-listing-module-container .itembox');
});

$(window).resize(function(){
  equalheight('.product-listing-module-container .itembox');
});
</script>
<?php
}
?>
</body>
</html>