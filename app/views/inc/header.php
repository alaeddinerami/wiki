<?php 
// if($data['title']==''){
//     $data['title']= SITENAME;
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?=$data['title']?></title>
   <link rel="stylesheet" href="<?=URLROOT?>/css/style.css">
</head>

<body>
    <?php if (!isset($noNavbar)){
        require_once APPROOT . '/views/inc/navbar.php';
    } ?>