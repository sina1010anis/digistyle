<?php
foreach ($Orders as $i) {
    $NameProdcuts = $i->Orders;
    $arr = json_decode($NameProdcuts, true);
    foreach ($arr as $ii) {
        echo $ii['Product_id'].'<br>';
    }
}
