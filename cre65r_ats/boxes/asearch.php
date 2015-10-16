<?php
/*
  $Id: asearch.php,v 1.2 2008/06/23 00:18:17 datazen Exp $

  CRE Loaded, Open Source E-Commerce Solutions
  http://www.creloaded.com

  Copyright (c) 2008 CRE Loaded
  Copyright (c) 2008 AlogoZone, Inc.
  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
?>
<!-- asearch //-->
       <div class="well">
        <div class="box-header small-margin-bottom small-margin-left"><?php echo  BOX_HEADING_ASEARCH ; ?></div>
    <?php
    $param = '';
    new $infobox_template_heading($info_box_contents, '', ((isset($column_location) && $column_location !='') ? $column_location : '') ); 
    $hide = tep_hide_session_id();
    echo '<form name="quick_find_article" method="get" action="' . tep_href_link(FILENAME_ARTICLE_SEARCH, '', 'NONSSL', false) . '">';
    echo '<ul class="box-information_pages-ul list-unstyled list-indent-large"><li>';
    echo $hide . $param . '<input type="text" name="akeywords" size="10" maxlength="30" value="' . htmlspecialchars(StripSlashes(@$_GET["akeywords"])) . '">' . tep_template_image_submit('button_quick_find.gif', BOX_HEADING_SEARCH) . '<br><input type="checkbox" name="description">' . BOX_ASEARCH_TEXT . '<br>';
    echo '</form>';
    ?>
</div>
<!-- asearch eof//-->