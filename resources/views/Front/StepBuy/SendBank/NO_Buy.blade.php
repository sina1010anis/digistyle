<?php
foreach ($Orders as $i) {
    $NameProdcuts = $i->Orders;
    $arr = json_decode($NameProdcuts, true);
    foreach ($arr as $ii) {
        //echo $ii['Product_id'].'<br>';
        foreach ($products as $iii){
            if ($ii['Product_id'] == $iii->id){
                echo $iii->Name.'<br>';
            }
        }
    }
}
