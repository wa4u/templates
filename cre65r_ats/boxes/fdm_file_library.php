<?php
/*
  $Id: fdm_file_library.php,v 1.0.0.0 2006/10/12 13:41:11 datazen Exp $

  CRE Loaded, Open Source E-Commerce Solutions
  http://www.creloaded.com

  Copyright (c) 2006 CRE Loaded
  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require_once(DIR_WS_FUNCTIONS . FILENAME_FDM_FUNCTIONS);
?>
<!-- fdm_file_library.php -->
<div class="well">
  <div class="box-header small-margin-bottom small-margin-left"><?php echo BOX_HEADING_FILE_LIBRARY;?></div>
  <ul class="box-example-ul list-unstyled list-indent-large">
  <li>
    <?php
    $file_directory = '';
    $level = array();
    tep_file_directory(0, '', $file_directory, $level, 0);
    echo $file_directory;
    ?>
  </li>
</ul>
</div>
<!-- fdm_file_library.php-eof //-->