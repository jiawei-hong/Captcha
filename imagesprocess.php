<?php
    include_once('./link.php');
    $sql = $db->prepare('insert into img(category,url) values(:n,:u)');
    $sql->bindValue('n',$_POST['category']);
    $sql->bindValue('u',$_FILES['img']['name']);
    $sql->execute();
    move_uploaded_file($_FILES['img']['tmp_name'],'./images/'.$_FILES['img']['name']);
?>
<script>
    alert('上傳成功');
    location.href = 'index.php';
</script>