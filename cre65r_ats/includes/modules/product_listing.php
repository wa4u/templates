<?php
/*
  $Id: product_listing.php,v 1.1.1.1 2004/03/04 23:41:11 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
  // added for CDS CDpath support
  $params = (isset($_SESSION['CDpath'])) ? '&CDpath=' . $_SESSION['CDpath'] : '';

 $listing_split = new splitPageResults($listing_sql, MAX_DISPLAY_SEARCH_RESULTS, 'p.products_id');

 if ( ($listing_split->number_of_rows > 0) && ( (PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3') ) ) {
?>
<?php
  }
if (isset($_GET['sort'])) {
$sort = $_GET['sort'];
} else{
$sort = 'PRODUCT_LIST_NAME';
}
  $list_box_contents = array();


  for ($col=0, $n=sizeof($column_list); $col<$n; $col++) {
  if (isset($page_set) && $page_set == 'upcoming_products'){
    switch ($column_list[$col]) {
      case 'PRODUCT_LIST_MODEL':
        $lc_text = TABLE_HEADING_MODEL;
        $lc_align = '';
        break;
      case 'PRODUCT_LIST_NAME':
        $lc_text = TABLE_HEADING_PRODUCTS;
        $lc_align = '';
        break;
      case 'PRODUCT_LIST_MANUFACTURER':
        $lc_text = TABLE_HEADING_MANUFACTURER;
        $lc_align = '';
        break;
      case 'PRODUCT_LIST_PRICE':
        $lc_text = TABLE_HEADING_PRICE;
        $lc_align = 'right';
        break;
      case 'PRODUCT_LIST_QUANTITY':
        $lc_text = TABLE_HEADING_QUANTITY;
        $lc_align = 'right';
        break;
      case 'PRODUCT_LIST_WEIGHT':
        $lc_text = TABLE_HEADING_WEIGHT;
        $lc_align = 'right';
        break;
      case 'PRODUCT_LIST_IMAGE':
        $lc_text = TABLE_HEADING_IMAGE;
        $lc_align = 'center';
        break;
      case 'PRODUCT_LIST_BUY_NOW':
        $lc_text = TABLE_HEADING_BUY_NOW;
        $lc_align = 'center';
        break;
        case 'PRODUCT_LIST_DATE_EXPECTED':
          $lc_text = TABLE_HEADING_DATE_EXPECTED;
          $lc_align = 'center';
        break;
      } //end case
    } else {
      switch ($column_list[$col]) {
        case 'PRODUCT_LIST_MODEL':
          $lc_text = TABLE_HEADING_MODEL;
          $lc_align = '';
          break;
        case 'PRODUCT_LIST_NAME':
          $lc_text = TABLE_HEADING_PRODUCTS;
          $lc_align = '';
          break;
        case 'PRODUCT_LIST_MANUFACTURER':
          $lc_text = TABLE_HEADING_MANUFACTURER;
          $lc_align = '';
          break;
        case 'PRODUCT_LIST_PRICE':
          $lc_text = TABLE_HEADING_PRICE;
          $lc_align = 'right';
          break;
        case 'PRODUCT_LIST_QUANTITY':
          $lc_text = TABLE_HEADING_QUANTITY;
          $lc_align = 'right';
          break;
        case 'PRODUCT_LIST_WEIGHT':
          $lc_text = TABLE_HEADING_WEIGHT;
          $lc_align = 'right';
          break;
        case 'PRODUCT_LIST_IMAGE':
          $lc_text = TABLE_HEADING_IMAGE;
          $lc_align = 'center';
          break;
        case 'PRODUCT_LIST_BUY_NOW':
          $lc_text = TABLE_HEADING_BUY_NOW;
          $lc_align = 'center';
          break;
      } //end case
    } //end if
    if ( ($column_list[$col] != 'PRODUCT_LIST_BUY_NOW') && ($column_list[$col] != 'PRODUCT_LIST_IMAGE') ) {
      $lc_text = tep_create_sort_heading($sort, $col+1, $lc_text);
    }

    $list_box_contents[0][] = array('align' => $lc_align,
                                    'params' => 'class="productListing-heading"',
                                    'text' => '&nbsp;' . $lc_text . '&nbsp;');
  }

  if ($listing_split->number_of_rows > 0) {
    $listing_query = tep_db_query($listing_split->sql_query);

    $row = 0;
    $column = 0;
    $no_of_listings = tep_db_num_rows($listing_query);

    while ($_listing = tep_db_fetch_array($listing_query)) {
      $listing[] = $_listing;
    }

	echo '<div class="product-listing-module-container">';
    for ($x = 0; $x < $no_of_listings; $x++) {
      $product_contents = array();
      for ($col=0, $n=sizeof($column_list); $col<$n; $col++) {
        $lc_align = '';
        $lc_text = '';
        switch ($column_list[$col]) {
          case 'PRODUCT_LIST_MODEL':
            $lc_align = '';
            $lc_text = '&nbsp;' . $listing[$x]['products_model'] . '&nbsp;';
            break;
          case 'PRODUCT_LIST_NAME':
            $lc_align = '';
            if (isset($_GET['manufacturers_id'])) {
              $lc_text = '<div class="product-listing-module-name"><h3 style="line-height:1.1;"><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'manufacturers_id=' . (int)$_GET['manufacturers_id'] . '&amp;products_id=' . $listing[$x]['products_id'] . $params) . '">' . $listing[$x]['products_name'] . '</a></h3></div>';
            } else {
              $lc_text = '<div class="product-listing-module-name"><h3 style="line-height:1.1;"><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, ($cPath ? 'cPath=' . $cPath . '&amp;' : '') . 'products_id=' . $listing[$x]['products_id'] . $params) . '">' . $listing[$x]['products_name'] . '</a></h3></div>';
            }
			if(INSTALLED_VERSION_TYPE == 'B2B') {
				if (tep_not_null(cre_products_blurb($listing[$x]['products_id']))) {
				  $lc_text .= '<div class="caption"><p class="">' . cre_products_blurb($listing[$x]['products_id']) . '</p>';
				} else {
				}
			 }
            break;
          case 'PRODUCT_LIST_MANUFACTURER':
            $lc_align = '';
            $lc_text = '<div class="product-listing-module-manufacturer><a href="' . tep_href_link(FILENAME_DEFAULT, 'manufacturers_id=' . $listing[$x]['manufacturers_id'] . $params) . '">' . $listing[$x]['manufacturers_name'] . '</a></div>;';
            break;
          case 'PRODUCT_LIST_PRICE':
            $pf->loadProduct($listing[$x]['products_id'],$languages_id);
            $lc_text ='<div class="row pricing-row"><div class="col-sm-6 col-lg-6"><p class="lead small-margin-bottom">'. $pf->getPriceStringShort() .'</p></div>';
            break;
          case 'PRODUCT_LIST_QUANTITY':
            $lc_align = 'right';
            $lc_text = '&nbsp;' . $listing[$x]['products_quantity'] . '&nbsp;';
            break;
          case 'PRODUCT_LIST_WEIGHT':
            $lc_align = 'right';
            $lc_text = '&nbsp;' . $listing[$x]['products_weight'] . '&nbsp;';
            break;
          case 'PRODUCT_LIST_IMAGE':
            $lc_align = 'center';
            if (isset($_GET['manufacturers_id'])) {
              $lc_text = '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'manufacturers_id=' . (int)$_GET['manufacturers_id'] . '&amp;products_id=' . $listing[$x]['products_id'] . $params) . '">' . tep_image(DIR_WS_IMAGES . $listing[$x]['products_image'], $listing[$x]['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'style="height:'.SMALL_IMAGE_HEIGHT.'px"') . '</a>';
            } else {
              $lc_text = '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, ($cPath ? 'cPath=' . $cPath . '&amp;' : '') . 'products_id=' . $listing[$x]['products_id'] . $params) . '">' . tep_image(DIR_WS_IMAGES . $listing[$x]['products_image'], $listing[$x]['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'style="height:'.SMALL_IMAGE_HEIGHT.'px"') . '</a>';
            }
            break;
          case 'PRODUCT_LIST_DATE_EXPECTED':
              $duedate= str_replace("00:00:00", "" , $listing[$x]['products_date_available']);
                  $lc_align = 'center';
                  $lc_text = '&nbsp;' .  $duedate . '&nbsp;';
            break;
          case 'PRODUCT_LIST_BUY_NOW':
              $valid_to_checkout= true;
              if (STOCK_CHECK == 'true') {
                $stock_check = tep_check_stock((int)$listing[$x]['products_id'], 1);
                if (tep_not_null($stock_check) && (STOCK_ALLOW_CHECKOUT == 'false')) {
                  $valid_to_checkout = false;
                }
              }

              if ($valid_to_checkout == true) {

                $hide_add_to_cart = hide_add_to_cart();
                $lc_text = '';
                if ($hide_add_to_cart == 'false' && group_hide_show_prices() == 'true') {
                  $lc_text = '<div class="col-sm-6 col-lg-6 no-margin-left product-listing-module-buy-now buy-btn-div"><a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action','cPath','products_id')) . 'action=buy_now&amp;products_id=' . $listing[$x]['products_id'] . '&amp;cPath=' . tep_get_product_path($listing[$x]['products_id']) . $params) . '"><button class="product-listing-module-buy-now-button btn btn-success btn-block">' . IMAGE_BUTTON_BUY_NOW . '</button></a></div>';
                }
              }
              $lc_text .= '</div>';
              break;
        }
        $product_contents[] = $lc_text;
      }

      $lc_text = implode( $product_contents);

                  echo '<div class="col-sm-4 col-lg-4 with-padding"><div class="thumbnail align-center" style="padding-top:10px;height: 430px;">' . $lc_text . '</div></div>';

      $column ++;
      if ($column >= COLUMN_COUNT) {
        $row ++;
        $column = 0;
      }
    }
    echo '</div>';

    //new productListingBox($list_box_contents);
  } else {
    $list_box_contents = array();

                             echo      '<div class="well"><div class="product-listing-module-no-products"><p>'. TEXT_NO_PRODUCTS. '</p></div></div>';

    //new productListingBox($list_box_contents);
  }

  if ( ($listing_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3')) ) {
?>
      <div class="product-listing-module-pagination margin-bottom">
        <div class="pull-left large-margin-bottom page-results"><?php echo $listing_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS); ?></div>
        <div class="pull-right large-margin-bottom no-margin-top">
          <ul class="pagination no-margin-top no-margin-bottom">
           <?php echo  $listing_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?>

          </ul>
        </div>
      </div><div class="clear-both"></div>

<?php
  }
?>