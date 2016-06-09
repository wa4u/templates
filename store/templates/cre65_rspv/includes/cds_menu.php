<?php


    //Recursive function for generating the child categories and pages menu
    //Language id is set to 1 -> English Language
    function fetch_children($parent) {
        global $languages_id;
        //Query for fetching the categories id, categories name, childcategories, childpages  
        //$result = mysql_query('SELECT distinct pc.categories_id, pcd.categories_name,(select count(subpc.categories_id) from pages_categories subpc where subpc.categories_parent_id=pc.categories_id ) as childelement, (select count(ptc.pages_id) from pages_to_categories ptc where ptc.categories_id=pc.categories_id) as childpages FROM pages_categories pc, pages_categories_description pcd WHERE pcd.categories_id = pc.categories_id and pc.categories_parent_id = "'.(int)$parent.'"  and pcd.language_id=1');
        $result = tep_db_query("SELECT DISTINCT pc.categories_id, pcd.categories_name, (

            SELECT count( subpc.categories_id )
            FROM pages_categories subpc
            WHERE subpc.categories_parent_id = pc.categories_id
            ) AS childelement, (

            SELECT count( ptc.pages_id )
            FROM pages_to_categories ptc
            WHERE ptc.categories_id = pc.categories_id
            ) AS childpages

            FROM pages_categories pc, pages_categories_description pcd
            WHERE pcd.categories_id = pc.categories_id
            AND pc.categories_status = '1' 
            AND pc.categories_parent_id = '".(int)$parent. "'
            AND pcd.language_id = '" . (int)$languages_id . "' ORDER BY pc.categories_sort_order");


        //Generating Menus/Submenus  
        if(tep_db_num_rows($result) > 0){
            while($row = tep_db_fetch_array($result)) {
                //Subcategories.   
                if($row[2] > 0){
                    echo '<li><a href="" class="dropdown-toggle" data-toggle="dropdown">'.$row['categories_name'] .'<b class="caret"></b></a>';
                    echo '<ul class="dropdown-menu">';           

                    //Pages    
                }elseif($row[3] > 0){
                    echo '<li><a href="" class="dropdown-toggle" data-toggle="dropdown">'.$row['categories_name'] .'<b class="caret"></b></a>';
                    echo '<ul class="dropdown-menu">';
                    fetch_pages($row[0]);
                    echo '</ul>'."\n";
                }else {
                    //echo '<li><a href="?CDpath='.$row['categories_id'] .'">'.$row['categories_name'] .'</a>';
                    echo '<li>' . generate_category_link($row['categories_id']);
                }

                //Recursive call for generating categories/pages sub menu   
                fetch_children($row['categories_id']);
                //In case if we have both pages and categories at same level   
                if($row[2] > 0 && $row[3] > 0){
                    fetch_pages($row[0]);
                }

                //Closing Menu Structure
                if($row[2] > 0){
                    echo '</li></ul>'."\n";
                }else{
                    echo '</li>'."\n";
                }
            }
        }
    }

    //Function for fetching the pages
    function fetch_pages($catid){
        global $languages_id;
        $result = tep_db_query("SELECT ptc.pages_id, pd.pages_title
            FROM pages_to_categories ptc, pages_description pd
            WHERE pd.pages_id = ptc.pages_id
            AND pd.language_id = '" . (int)$languages_id . "'
            AND ptc.categories_id = '" . $catid . "'");
        $list = array();

        while($row = tep_db_fetch_array($result)) {
            echo '<li><a href="' . tep_href_link(FILENAME_PAGES, 'pID=' . $row['pages_id'] . '&amp;CDpath=' . cre_get_cds_page_path($row['pages_id'])) .'">'.$row['pages_title'] .'</a></li>';
        }
    }

    //function cre_get_cds_category_path($id){}
    //function cre_get_cds_page_path($id){}

    // Build link
    function generate_category_link($id) {
        global $languages_id;
        // build the SQL
        $category_info_query = tep_db_query("SELECT ic.categories_id as 'ID', ic.categories_parent_id as 'parentID', ic.categories_sort_order as 'sort', icd.categories_name as 'name', ic.categories_url_override as 'url', ic.categories_url_override_target as 'target', ic.category_append_cdpath as 'append', 'c' as 'type' 
            FROM pages_categories ic 
            LEFT JOIN pages_categories_description icd 
            ON (ic.categories_id = icd.categories_id) 
            WHERE icd.language_id = '" . (int)$languages_id . "'
            AND ic.categories_id = '" . $id . "'");
        $val = tep_db_fetch_array($category_info_query);

        $this_box_link = '';
        $this_box_string = '';

        if ($val['type'] == 'c') {
            if ($val['url'] != '') {
                $separator = (strpos($val['url'], '?')) ? '&amp;' : '?';
                $this_box_link = ($val['append'] == true) ? $val['url'] . $separator . 'CDpath=' . cre_get_cds_category_path($val['ID']) : $val['url'];       
                $this_box_target = ($val['target'] != '') ? ' target="' . $val['target'] . '"' : '';
            } else {
                $this_box_link = tep_href_link(FILENAME_PAGES,'CDpath=' . cre_get_cds_category_path($val['ID']));
                $this_box_target = '';
            }
        } else {
            $this_box_link = tep_href_link(FILENAME_PAGES, 'pID=' . $val['ID'] . '&amp;CDpath=' . cre_get_cds_page_path($val['ID']));
            $this_box_target = '';
        }
        $this_box_string .= '<a href="' . $this_box_link . '"' . $this_box_target . '>';
        $this_box_string .= $val['name'];
        $this_box_string .= '</a>';


        return $this_box_string;
    }



    function generate_cds_menu($id){
        global $languages_id;         
        //Fetch all the parent items
        $result = tep_db_query("SELECT DISTINCT pc.categories_id, pcd.categories_name, (

            SELECT count( subpc.categories_id )
            FROM pages_categories subpc
            WHERE subpc.categories_parent_id = pc.categories_id
            ) AS childelement, (

            SELECT count( ptc.pages_id )
            FROM pages_to_categories ptc
            WHERE ptc.categories_id = pc.categories_id
            ) AS childpages

            FROM pages_categories pc, pages_categories_description pcd
            WHERE pcd.categories_id = pc.categories_id
            AND pc.categories_status = '1' 
            AND pc.categories_parent_id = '" . $id . "'
            AND pcd.language_id = '" . (int)$languages_id . "' ORDER BY pc.categories_sort_order"
        );
        //Parent Navigation menu
        while($row =  mysqli_fetch_row($result)){        
            //Generate Categories sub menu
            if($row[2] > 0){
                echo '<li><a href="" class="dropdown-toggle" data-toggle="dropdown">'.$row['1'] .'<b class="caret"></b></a>'."\n";
                echo '<ul class="dropdown-menu">';   
                //Generate Pages sub menu    
            }elseif($row[3] > 0){
                echo '<li><a href="" class="dropdown-toggle" data-toggle="dropdown">'.$row['1'] .'<b class="caret"></b></a>';
                echo '<ul class="dropdown-menu">';
                fetch_pages($row[0]);
                echo '</ul>'."\n";
                //Generate Categories menu       
            }else{           
                echo '<li>' . generate_category_link($row[0]);  
            }
            //Function to generate internal menus
            fetch_children($row[0]);

            //Closing menu
            if($row[2] > 0){
                echo '</ul>' . "\n";
            }else{
                echo '</li>'."\n";
            }
        }            
    }// function generate_cds_menu

?>