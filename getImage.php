<?php
    include_once('./link.php');
    $sql = $db->query('select * from img');
    $img = [];
    $category = [];
    $num = 1;
    while($row=$sql->fetch(PDO::FETCH_ASSOC)){
        array_push($img,$row['url']);
        array_push($category,$row['category']);
    }
    while($num <= $_GET['count']){
        $rand = mt_rand(0,count($img)-1);
?>
        <img src="./images/<?php echo $img[$rand] ?>" alt="<?php echo $category[$rand] ?>">
<?php
        $num++;
    }
?>