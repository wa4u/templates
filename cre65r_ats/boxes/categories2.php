<?php
/*
  $Id: categories2.php,v 1.2 2008/06/23 00:18:17 datazen Exp $

  CRE Loaded, Open Source E-Commerce Solutions
  http://www.creloaded.com

  Copyright (c) 2008 CRE Loaded
  Copyright (c) 2008 AlogoZone, Inc.
  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
if ((defined('USE_CACHE') && USE_CACHE == 'true') && !defined('SID')) {
  echo tep_cache_categories_box2();
} else {  
  ?>
  <!-- categories2 //-->
  <div class="well">
      <div class="box-header small-margin-bottom small-margin-left"><?php echo BOX_HEADING_CATEGORIES2; ?></div>
      <ul class="box-categories2-ul list-unstyled list-indent-large">
      <li>
      <?php
      echo '<form action="' . tep_href_link(FILENAME_DEFAULT, $params) . '" method="get">' . tep_hide_session_id();
      echo tep_draw_pull_down_menu('cPath', tep_get_categories(array(array('id' => '', 'text' => PULL_DOWN_DEFAULT))), $cPath, 'onchange="this.form.submit();"');
      echo '</form>';
      ?>  
      </li>
</ul>
</div>
  <!-- categories2_eof //-->
  <?php
}
?>