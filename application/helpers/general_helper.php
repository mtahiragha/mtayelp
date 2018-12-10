<?php

function display_array($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function admin_assets(){
    echo base_url()."assets/theme/assets/";
}

function fixfordb($array){
    foreach($array as $key => $value){
        if(strtolower(trim($value)) == 'null' ){
            $array[$key] = NULL;
        }else{
            $array[$key] = strtolower(trim($value));
        }
    }
    return $array;
}

function emptytonull($array){
    foreach($array as $key => $value){
        if($value == ''){
            unset($array[$key]);
        }
    }
    return $array;
}


function nested2ul($result) {
    $html = "";
    foreach($result as $r){
        if($r['parent_id'] == null){
            $html .="<li  data-id='{$r['id']}' data-category='{$r['category']}' data-parent='{$r['parent_id']}' >".ucwords($r['category']);
                $html.= getChild($r, $result);
            $html .="</li>";
        }
    }
    return "<ul>".$html."</ul>";
}

function getChild($r, $result){
    $html = "";
    foreach($result as $rr){
        if($rr['parent_id'] == $r['id']){
            $html.="<li data-id='{$rr['id']}' data-category='{$rr['category']}' data-parent='{$rr['parent_id']}' >".ucwords($rr['category']);
                $html .= getChild($rr, $result);
            $html .="</li>";
        }
    }
    return "<ul>".$html."</ul>";
}

function checkFields($required_fields, $obj){
    if(!array_diff( $required_fields, array_keys($obj) )){
        $error=0;
        foreach($required_fields as $f){
            if( empty($obj[$f])  ){
                $error++;
            }
        }
        if($error == 0){
            return true;
        }
    }else{
        return false;
    }
    return false;
}

function printCategories($categoriesIdArray, $categories){
    $count =1;
    $pcategories = $categoriesIdArray;
    foreach($pcategories as $pcategory){
        $tcategory = [];
        foreach($categories as $category){
            if($category['id']==$pcategory){$tcategory = $category; break;}
        }
        echo "<a target='_blank' class='text-info' href='".base_url('admin/dashboard/categories')."?edit={$tcategory['id']}&category={$tcategory['category']}&parent={$tcategory['parent_id']}"."'>";
            echo $tcategory['category'];
            if($count < count($pcategories)){echo ", ";}
        echo "</a>";
        $count++;
    }
}