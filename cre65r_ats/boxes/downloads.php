<?php
/*
  $Id: downloads.php,v 1.2 2008/06/23 00:18:17 datazen Exp $

  CRE Loaded, Open Source E-Commerce Solutions
  http://www.creloaded.com

  Copyright (c) 2008 CRE Loaded
  Copyright (c) 2008 AlogoZone, Inc.
  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
?>
<!-- downloads //-->
<?php
// modification of the logic to prevent the queries if there is no customer id
if ( isset($_SESSION['customer_id']) && $_SESSION['customer_id'] != '' ) {
  $download = new box_downloads();
  // Don't display if there is no downloadable product
  if (count($downloads->rows) > 0) {
     require(DIR_WS_LANGUAGES . $language . '/'.FILENAME_DOWNLOADBOX);
     echo '<div class="well">';
     echo '<div class="box-header small-margin-bottom small-margin-left">' . BOX_HEADING_DOWNLOADS . '</div>';
     ?>
     <!-- list of products -->
     <?php
     foreach ($downloads->rows as $downloads_values) {
       list($dt_year, $dt_month, $dt_day) = explode('-', $downloads_values['date_purchased_day']);
       $download_timestamp = mktime(23, 59, 59, $dt_month, $dt_day + $downloads_values['download_maxdays'], $dt_year);
       $download_expiry = date('Y-m-d H:i:s', $download_timestamp);
       // The link will appear only if:
       // - Download remaining count is > 0, AND
       // - The file is present in the DOWNLOAD directory, AND EITHER
       // - No expiry date is enforced (maxdays == 0), OR
       // - The expiry date is not reached
       if (($downloads_values['download_count'] > 0) &&
          (file_exists(DIR_FS_DOWNLOAD . $downloads_values['orders_products_filename'])) &&
          (($downloads_values['download_maxdays'] == 0) ||
          ($download_timestamp > time()))) {
         echo '<li>' . TEXT_HEADING_DOWNLOAD_FILE . '</li><li><a href="' . tep_href_link(FILENAME_DOWNLOAD, 'order=' . $last_order . '&id=' . $downloads_values['orders_products_download_id']) . '">' . $downloads_values['products_name'] . '</a></li>';
       } else {
         echo '<li>' . $downloads_values['products_name'] . '</li>';
       }
       echo '<li>' . TEXT_HEADING_DOWNLOAD_DATE . '<br>' .  tep_date_long($download_expiry) . '</li>';

       echo '<li>' . $downloads_values['download_count'] . '  ' .  TEXT_HEADING_DOWNLOAD_COUNT . '</li>';
                                   
     }
     if (!strstr($PHP_SELF, FILENAME_ACCOUNT_HISTORY_INFO)) {
       echo '<li>' .  TEXT_FOOTER_DOWNLOAD . '<br><a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">' . TEXT_DOWNLOAD_MY_ACCOUNT . '</a></li>';

        
     }
     echo '</ul></div>';
  }
}
?>
<!-- downloads eof//-->