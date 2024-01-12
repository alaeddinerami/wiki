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
   <script src="https://cdn.tailwindcss.com"></script>

   <link rel="stylesheet" href="<?=URLROOT?>/css/style.css">
</head>

<body class="bg-gray-100 p-3">
    <?php if (!isset($nosidebar)){
        require_once APPROOT . '/views/inc/sidebar.php';
    } ?>
    <?php if (!isset($nonavbar)){
        require_once APPROOT . '/views/inc/navbar.php';
    } ?>