<?php
/*
  $Id: customer_gv.php,v 1.2 2008/06/23 00:18:17 datazen Exp $

  CRE Loaded, Open Source E-Commerce Solutions
  http://www.creloaded.com

  Copyright (c) 2008 CRE Loaded
  Copyright (c) 2008 AlogoZone, Inc.
  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
?>
<!-- customer_gv -->
<?php
$customer_gv = new box_customer_gv();

if ($customer_gv->amount > 0) {
?>
  <div class="well">
      <div class="box-header small-margin-bottom small-margin-left"><?php echo BOX_HEADING_GIFT_VOUCHER;?></div>
      <ul class="box-customer_gv-ul list-unstyled list-indent-large">
      <?php
      echo '<li>'.GIFT_VOUCHER_ACCOUNT_BALANCE_1.$currencies->format($customer_gv->amount).GIFT_VOUCHER_ACCOUNT_BALANCE_2.'</li>';
      echo '<li><a href="'.tep_href_link(FILENAME_GV_SEND).'">'.GIFT_VOUCHER_ACCOUNT_BALANCE_3.'</a></li>';
      ?>
      </ul>
      </div>
<?php
}
?>
<!-- customer_gv eof//-->