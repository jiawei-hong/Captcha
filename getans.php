<?php
    include_once('./link.php');
    $sql = $db->query('select * from img');
    $category = [];
    while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        array_push($category,$row['category']);
    }
    
    $category = array_unique($category);
    
    echo $category[mt_rand(0,count($category)-1)];