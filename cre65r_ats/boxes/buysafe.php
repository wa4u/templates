<?php
/*
  $Id: buysafe.php,v 1.0.0.0 2007/08/16 13:41:11 datazen Exp $

  CRE Loaded, Open Source E-Commerce Solutions
  http://www.creloaded.com

  Copyright (c) 2007 CRE Loaded
  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License

*/
if (defined('MODULE_ADDONS_BUYSAFE_STATUS') &&  MODULE_ADDONS_BUYSAFE_STATUS == true) {  
  ?>
  <!-- buySAFE InfoBox //-->
  <div class="well">
      <div class="box-header small-margin-bottom small-margin-left">&nbsp;</div>
      <?php
      $bS_box_string = "";
      $bS_box_string .= "<!-- buySAFE //--><center>\n";
      $bS_box_string .= "<script type=\"text/javascript\" language=\"javascript\" charset=\"utf-8\" src=\"" . MODULE_ADDONS_BUYSAFE_ROLLOVER_URL . "\"></script>\n";
      $bS_box_string .= "<span id=\"BuySafeSealSpan\" align=\"center\" style=\"text-align:center;\"><script type=\"text/javascript\">WriteBuySafeSeal('BuySafeSealSpan', '" . MODULE_ADDONS_BUYSAFE_SEAL_TYPE . "', 'HASH=" . urlencode(MODULE_ADDONS_BUYSAFE_SEAL_AUTHENTICATION_DATA) . "');</script></span>\n";
      $bS_box_string .= "</center><!-- buySAFE_eof //-->\n";
      echo '<ul class="box-buysafe-ul list-unstyled list-indent-large"><li>' . $bS_box_string . '</li></ul>';
      ?>
</div>
  <!-- buySAFE InfoBox //eof-->
  <?php
}
?>