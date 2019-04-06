<?php
    $db = new PDO('mysql:host=localhost;dbname=captcha','root','');
    $db->exec('set names utf8');