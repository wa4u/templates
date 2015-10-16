<?php
/*
  $Id: boxad.php,v 1.2 2008/06/23 00:18:17 datazen Exp $

  CRE Loaded, Open Source E-Commerce Solutions
  http://www.creloaded.com

  Copyright (c) 2008 CRE Loaded
  Copyright (c) 2008 AlogoZone, Inc.
  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
?>
<!-- affiliate_branding //-->
<?php
if(isset($_SESSION['affiliate_ref'])) {
  ?>
       <div class="well">
        <div class="box-header small-margin-bottom small-margin-left"><?php echo  BOX_HEADING_AFFILIATE_BRANDING ; ?></div>
      <?php
      $aff_table = '';
      
      if($affiliate_branding['affiliate_cobrand_name'] !=''){
      $aff_table = $affiliate_branding['affiliate_cobrand_name'] ;
      }
      if($affiliate_branding['affiliate_cobrand_support_phone'] !=''){
      $aff_table = $affiliate_branding['affiliate_cobrand_support_phone'];
      }
      if($affiliate_branding['affiliate_cobrand_support_email'] !=''){
      $aff_table =   $affiliate_branding['affiliate_cobrand_support_email'] ;
      }
      if($affiliate_branding['affiliate_cobrand_url'] !=''){
      $aff_table = '<a href="' . $affiliate_branding['affiliate_cobrand_url'] . '" target="blank">' . $affiliate_branding['affiliate_cobrand_url'] . '</a>';
      }
      ?>
      <ul class="box-affiliate-branding-ul list-unstyled list-indent-large"><li><?php echo $aff_table;?></li></ul> 
   </div>
  <?php
}
?>
<!-- affiliate_branding eof//-->