<?php
/*
  $Id: best_sellers_scroll.php,v 1.0.0 2008/05/28 13:41:11 datazen Exp $

  CRE Loaded, Open Source E-Commerce Solutions
  http://www.creloaded.com

  Copyright (c) 2008 CRE Loaded
  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
$best = new box_best_sellers_scroll();

if (count($best->rows) >= MIN_DISPLAY_BESTSELLERS) {
  ?>
  <!-- best_sellers_scroll //-->
    <div class="well" >
        <div class="box-header small-margin-bottom small-margin-left"><?php echo BOX_HEADING_BESTSELLERS; ?></div>

      <?php
      $rows = 0;
      $bestsellers_list = '<table border="0" width="100%" cellspacing="0" cellpadding="0">';
      foreach ($best->rows as $best_sellers) {
        $rows++;
        $bestsellers_list .= '<tr><td align="center"><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $best_sellers['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $best_sellers['products_image'], $best_sellers['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '<br>' . tep_row_number_format($rows). ' . <a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $best_sellers['products_id']) . '">' . $best_sellers['products_name'] . '</a><br><br></td></tr>' . "\n\n";
      }
      $bestsellers_list .= '</table>';
      
      echo '<ul class="box-information_pages-ul list-unstyled list-indent-large"><li><MARQUEE behavior= "scroll" align="center" direction="up" height="100" scrollamount="2" scrolldelay="70" onmouseover=\'this.stop()\' onmouseout=\'this.start()\'>' . $bestsellers_list . '</MARQUEE></li></ul>';

      ?>
</div>
<!-- best_sellers_scroll_eof //-->
  <?php
}
?>