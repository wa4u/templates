<?php
/*
  $Id: pages.php,v 2.0 2008/07/08 13:41:11 datazen Exp $

  CRE Loaded, Open Source E-Commerce Solutions
  http://www.creloaded.com

  Copyright (c) 2008 CRE Loaded
  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License

*/
?>
<?php/*<!-- pages_eof //-->
<div class="well">
<div class="box-header small-margin-bottom small-margin-left">Information Pages</div>
<ul class="box-information_pages-ul list-unstyled list-indent-large">
<li>
<a access="1;2" href="pages.php?CDpath=1">Information Page</a>
</li>
<li>
<a access="1;2" href="pages.php?CDpath=1">Contact </a>
</li>
</ul>
</div>
<tr>
 <td>
    <?php
    require_once(DIR_WS_FUNCTIONS . FILENAME_CDS_FUNCTIONS);
    if(isset($infobox_template_heading) && $infobox_template_heading =='') $infobox_template_heading = $infobox_template . 'Heading';
    if(isset($infobox_template_footer) && $infobox_template_footer == '') $infobox_template_footer = $infobox_template . 'Footer';
    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'left',
                                 'text'  => '<font color="' . $font_color . '">' . BOX_HEADING_PAGES . '</font>'
                                );
    new $infobox_template_heading($info_box_contents, false, $column_location);
    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'left',
                                 'text'  => cre_get_box_string()
                                );
    new $infobox_template($info_box_contents, true, true);
    if (TEMPLATE_INCLUDE_FOOTER == 'true'){
      $info_box_contents = array();
      $info_box_contents[] = array('align' => 'left',
                                   'text'  => tep_draw_separator('pixel_trans.gif', '100%', '1')
                                  );
      new $infobox_template_footer($info_box_contents, $column_location );
    }
    ?>
    </td>
   </tr>*/?>
<!-- pages_eof //-->
<div class="well" style="text-transform:uppercase">
<div class="box-header small-margin-bottom small-margin-left"><?php echo BOX_HEADING_PAGES; ?></div>
    <?php echo '<ul class="box-information_pages-ul list-unstyled list-indent-large">' .cre_get_box_string(). '</ul>';?>
</div>

