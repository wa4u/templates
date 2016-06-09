<!-- header-lang-curr -->
<?php 
$include_name = true;
$include_image = true;
$include_symbol = true;
     
      
      $languages_query = tep_db_query("select languages_id, name, code, image, directory from " . TABLE_LANGUAGES . " where languages_id = " . $languages_id);
      while ($languages = tep_db_fetch_array($languages_query)) {
        $catalog_languages_id = $languages['languages_id'];
        $catalog_languages_name = $languages['name'];
        $catalog_languages_image = $languages['image'];
        $catalog_languages_directory = $languages['directory'];
      }
       

?>
      <ul class="locale-menu nav-item pull-right no-margin-bottom">
        <li class="dropdown">
          <?php 
            echo '<a class="dropdown-toggle" data-toggle="dropdown" href="#">' . 
                    tep_image(DIR_WS_LANGUAGES .  $catalog_languages_directory . '/images/' . $catalog_languages_image, $catalog_languages_name, '18', '12', 'class="locale-header-icon"') . 
                 '  &nbsp; <span class="locale-header-currency">' . 
                      $_SESSION['currency'] . 
                 '  </span>' .  
                 '  <b class="caret"></b>' . 
                 '</a>'; 
          ?>
          <ul class="dropdown-menu locale-header-dropdown">
            <?php 
                if (!isset($lng) || (isset($lng) && !is_object($lng))) {
                  include(DIR_WS_CLASSES . FILENAME_LANGUAGE);
                  $lng = new language;
                }

                $languages_string = '';
                reset($lng->catalog_languages);
                while (list($key, $value) = each($lng->catalog_languages)) {
                  if ($include_name === true && $include_image === true) {
                    $text = '<span class="locale-dropdown-lang-image">' . tep_image(DIR_WS_LANGUAGES .  $value['directory'] . '/images/' . $value['image'], $value['name']) . '</span> <span class="locale-dropdown-lang-title">' . $value['name'] . '</span>';
                  } else if ($include_name === true && $include_image === false) {
                    $text = $value['name'];
                  } else {
                    $text = tep_image(DIR_WS_LANGUAGES .  $value['directory'] . '/images/' . $value['image'], $value['name']);
                  }
                  echo '<li><a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('language', 'currency')) . 'language=' . $key, $request_type) . '">' . $text . '</a></li>' . "\n";
                }
             ?>
            <li role="presentation" class="divider"></li>
            <?php 
              $header_currencies_array = array();
              while (list($key, $value) = each($currencies->currencies)) {
                $header_currencies_array[] = array('id' => $key, 'name' => $value['title'], 'rsymbol' => $value['symbol_right'], 'lsymbol' => $value['symbol_left']);
              }
            foreach ($header_currencies_array as $header_currency) {
              if ($include_name === true && $include_symbol === true) {
                $text = '<span class="locale-dropdown-cur-title">' . $header_currency['name'] . '</span> <span class="locale-dropdown-cur-symbol">(' . $header_currency['id'] . ')</span>';
              } else if ($include_name === true && $include_symbol === false) {
                $text = '<span class="locale-dropdown-cur-title">' . $header_currency['name'] . '</span>';
              } else {
                $text = '<span class="locale-dropdown-cur-symbol">' . $header_currency['id'] . '</span>';
              }
              echo '<li><a href="' . tep_href_link(basename($_SERVER['SCRIPT_FILENAME']), tep_get_all_get_params(array('language', 'currency')) . 'currency=' . $header_currency['id'], 'NONSSL') . '">' . $text . '</a></li>' . "\n";
            }
            ?>
          </ul>
        </li>
      </ul>
      <!-- header-lang-curr eof -->