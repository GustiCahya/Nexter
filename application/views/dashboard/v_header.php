<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,400i|Nunito:300,300i" rel="stylesheet">
        <link rel="stylesheet" href="<?=base_url('assets-admin')?>/dashboard/css/style.css">
        <link rel="shortcut icon" type="image/png" href="<?=base_url('assets-admin')?>/dashboard/img/favicon.png">
        
        <title>nexter &mdash; your home, your freedom</title>
        <script async src="<?=base_url('assets-admin')?>/dashboard/js/font-awesome.min.js"></script>
        <script defer src="<?=base_url('assets-admin')?>/dashboard/js/main.js"></script>
        <script src="<?=base_url('assets-admin')?>/dashboard/js/tinymce.min.js"></script>
        <script>
            tinymce.init({selector: '#content'})
        </script>
    </head>
    <body class="container">
        <div class="sidebar">
            <a href="<?=base_url()?>dashboard">
                <img class="sidebar__image" src="<?=base_url('assets-admin')?>/dashboard/img/logo.png">
            </a>
            <ul class="sidebar__list">
                <li class="item"><a class="link" href="<?=base_url()?>dashboard"><i class="fas fa-home"></i> <span>Menu</span></a></li>
                <li class="item"><a class="link" href="<?=base_url()?>dashboard/pages"><i class="fab fa-buffer"></i> <span>Pages</span></a></li>
                <li class="item"><a class="link" href="<?=base_url()?>dashboard/blogs"><i class="far fa-copy"></i> <span>Blogs</span></a></li>
                <li class="item"><a class="link" href="<?=base_url()?>dashboard/properties"><i class="far fa-building"></i> <span>Properties</span></a></li>
                <li class="item"><a class="link" href="<?=base_url()?>dashboard/account"><i class="fas fa-user"></i> <span>Account</span></a></li>
            </ul>
            <a href="<?=base_url()?>dashboard/logout" class="btn">Log out</a>
        </div>