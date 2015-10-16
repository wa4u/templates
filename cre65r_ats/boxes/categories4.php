<?php
/*
  $Id: categories4.php,v 1.2 2008/06/23 00:18:17 datazen Exp $

  CRE Loaded, Open Source E-Commerce Solutions
  http://www.creloaded.com

  Copyright (c) 2008 CRE Loaded
  Copyright (c) 2008 AlogoZone, Inc.
  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/ 
if ((defined('USE_CACHE') && USE_CACHE == 'true') && !defined('SID')) {
  echo tep_cache_categories_box4();
} else {
  $categories4 = new box_categories4();  
  ?>
  <!-- categories4 //-->
  <div class="well">
      <div class="box-header small-margin-bottom small-margin-left"><?php echo BOX_HEADING_CATEGORIES4; ?></div>
      <ul class="box-categories3-ul list-unstyled list-indent-large">
      <?php
      echo '<li>' . $categories4->categories_string . '</li>';
      // added for CDS CDpath support
      $params = (isset($_SESSION['CDpath'])) ? 'CDpath=' . $_SESSION['CDpath'] : ''; 
      //coment out the below lines if you do not want to have an all products list
      echo '<li><a href="' . tep_href_link(FILENAME_ALL_PRODS, $params) . '"><b>' . BOX_INFORMATION_ALLPRODS . "</b></a></li>\n";
      echo '<li><a href="' . tep_href_link(FILENAME_ALL_PRODCATS, $params) . '"><b>' . ALL_PRODUCTS_LINK . "</b></a></li>\n";
      echo '<li><a href="' . tep_href_link(FILENAME_ALL_PRODMANF, $params) . '"><b>' . ALL_PRODUCTS_MANF . "</b></a></li>\n";
      
      ?>
     </ul>
   </div>
  <!-- categories4_eof //-->
  <?php
}
?>