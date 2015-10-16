<?php
/*
  $Id: we_accept.php,v 1.2 2008/06/23 00:18:17 datazen Exp $

  CRE Loaded, Open Source E-Commerce Solutions
  http://www.creloaded.com

  Copyright (c) 2008 CRE Loaded
  Copyright (c) 2008 AlogoZone, Inc.
  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
require(DIR_WS_LANGUAGES . $language . '/card1.php');
?>
<!-- we_accept //-->
<div class="well" style="text-transform:uppercase color:#333333">
<div class="box-header small-margin-bottom small-margin-left"><?php echo BOX_HEADING_WE_ACCEPT; ?></div>
    <?php
    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'center',
                                 'text'  => tep_image(DIR_WS_IMAGES . 'cards/cards2.gif', (defined('BOX_WE_ACCEPT') ? BOX_WE_ACCEPT : 'Cards We Accept')) );
    new $infobox_template($info_box_contents, true, true, ((isset($column_location) && $column_location !='') ? $column_location : '') );
    ?>
</div>
<!-- we_accept eof//-->