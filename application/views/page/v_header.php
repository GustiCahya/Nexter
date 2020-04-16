<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,400i|Nunito:300,300i" rel="stylesheet">
        <link rel="stylesheet" href="<?=base_url('assets-webpage')?>/page/css/style.css">
        <link rel="shortcut icon" type="image/png" href="<?=base_url('assets-webpage')?>/page/img/favicon.png">
        
        <title>nexter &mdash; your home, your freedom</title>
        <script defer src="<?=base_url('assets-webpage')?>/page/main.js"></script>
    </head>
    <body class="container">
        <div class="sidebar">
            <div class="sidebar__toggler">
                &#9776;
            </div>
            <div class="sidebar__menu">
                <div class="sidebar__menu--close">&times;</div>
                <ul class="list">
                    <li class="item"><a class="link" href="<?=base_url()?>">Home</a></li>
                    <?php foreach($pages as $page){ ?>
                        <li class="item"><a href="<?=base_url('page/').$page['slug']?>" class="link"><?=$page['title']?></a></li>
                    <?php } ?>
                    <li class="item"><a class="link" href="<?=base_url('blogs')?>">Blogs</a></li>
                    <li class="item"><a class="link" href="<?=base_url('properties')?>">Properties</a></li>
                </ul>
            </div>
        </div>