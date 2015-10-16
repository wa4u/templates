<?php
/*
  $Id: affililate.php,v 1.2 2008/06/23 00:18:17 datazen Exp $

  CRE Loaded, Open Source E-Commerce Solutions
  http://www.creloaded.com

  Copyright (c) 2008 CRE Loaded
  Copyright (c) 2008 AlogoZone, Inc.
  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
?>
<!-- affiliate //-->
       <div class="well">
        <div class="box-header small-margin-bottom small-margin-left"><?php echo  BOX_HEADING_AFFILIATE ; ?></div>
    <?php       
    if (isset($_SESSION['affiliate_id'])) {
      $affiliate_box_contents = '<li><b>' . BOX_AFFILIATE_SUMMARY . '</b></li>' .
                                             '<li><a href="' . tep_href_link(FILENAME_AFFILIATE_CENTRAL, '', 'SSL') . '">' . BOX_AFFILIATE_CENTRE . '</a></li>' .
                                             '<li><a href="' . tep_href_link(FILENAME_AFFILIATE_ACCOUNT, '', 'SSL') . '">' . BOX_AFFILIATE_ACCOUNT . '</a></li>' .
                                             '<li><a href="' . tep_href_link(FILENAME_AFFILIATE_PASSWORD, '', 'SSL') . '">' . BOX_AFFILIATE_PASSWORD . '</a></li>' .
                                             '<li><a href="' . tep_href_link(FILENAME_AFFILIATE_NEWSLETTER, '', 'SSL') . '">' . BOX_AFFILIATE_NEWSLETTER . '</a></li>' .
                                             '<li><a href="' . tep_href_link(FILENAME_AFFILIATE_NEWS, '', 'SSL') . '">' . BOX_AFFILIATE_NEWS . '</a></li>' .
                                             '<li><b>' . BOX_AFFILIATE_BANNERS . '</b></li>' .
                                             '<li><a href="' . tep_href_link(FILENAME_AFFILIATE_BANNERS, '', 'SSL') . '">' . BOX_AFFILIATE_BANNERS . '</a></li>' .
                                             '<li><a href="' . tep_href_link(FILENAME_AFFILIATE_BANNERS_BANNERS, '', 'SSL') . '">' . BOX_AFFILIATE_BANNERS_BANNERS . '</a></li>' .
                                             '<li><a href="' . tep_href_link(FILENAME_AFFILIATE_BANNERS_BUILD, '', 'SSL') . '">' . BOX_AFFILIATE_BANNERS_BUILD . '</a></li>' .
                                             '<li><a href="' . tep_href_link(FILENAME_AFFILIATE_BANNERS_BUILD_CAT, '', 'SSL') . '">' . BOX_AFFILIATE_BANNERS_BUILD_CAT . '</a></li>' .
                                             '<li><a href="' . tep_href_link(FILENAME_AFFILIATE_BANNERS_CATEGORY, '', 'SSL') . '">' . BOX_AFFILIATE_BANNERS_CATEGORY . '</a></li>' .
                                             '<li><a href="' . tep_href_link(FILENAME_AFFILIATE_BANNERS_PRODUCT, '', 'SSL') . '">' . BOX_AFFILIATE_BANNERS_PRODUCT . '</a></li>' .
                                             '<li><a href="' . tep_href_link(FILENAME_AFFILIATE_BANNERS_TEXT, '', 'SSL') . '">' . BOX_AFFILIATE_BANNERS_TEXT . '</a></li>' .
                                             '<b>' . BOX_AFFILIATE_REPORTS . '</b></li>' .
                                             '<li><a href="' . tep_href_link(FILENAME_AFFILIATE_CLICKS, '', 'SSL'). '">' . BOX_AFFILIATE_CLICKRATE . '</a></li>' .
                                             '<li><a href="' . tep_href_link(FILENAME_AFFILIATE_SALES, '', 'SSL'). '">' . BOX_AFFILIATE_SALES . '</a></li>' .
                                             '<li><a href="' . tep_href_link(FILENAME_AFFILIATE_PAYMENT, '', 'SSL'). '">' . BOX_AFFILIATE_PAYMENT . '</a></li>' .
                                             '<li><a href="' . tep_href_link(FILENAME_AFFILIATE_CONTACT, '', 'SSL') . '">' . BOX_AFFILIATE_CONTACT . '</a></li>' .
                                             '<li><a href="' . tep_href_link(FILENAME_AFFILIATE_INFO). '">' . BOX_AFFILIATE_INFO . '</a></li>' .
                                             '<li><a href="' . tep_href_link(FILENAME_AFFILIATE_FAQ, '', 'SSL') . '">' . BOX_AFFILIATE_FAQ . '</a></li>' .
                                             '<li><a href="' . tep_href_link(FILENAME_AFFILIATE_LOGOUT). '">' . BOX_AFFILIATE_LOGOUT . '</a></li>';
    } else {
      $affiliate_box_contents = '<li><a href="' . tep_href_link(FILENAME_AFFILIATE_FAQ, '', 'NONSSL') . '">' . BOX_AFFILIATE_FAQ . '</a></li>' .
                                             ',li><a href="' . tep_href_link(FILENAME_AFFILIATE, '', 'SSL') . '">' . BOX_AFFILIATE_LOGIN . '</a></li>';
    }
    echo '<ul class="box-information_pages-ul list-unstyled list-indent-large"><li>' . $affiliate_box_contents . '</select><li></ul>';
    ?>
</div>>
<!-- affiliate eof//-->