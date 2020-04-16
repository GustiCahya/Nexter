<?php 
    if(!isset($slug)){
        redirect();
    }
?>

<header class="header">
    <h1><?=$title?></h1>
</header>
<div class="content">
    <?php if(isset($blog)){ ?>
    <div class="box">
        <div class="image" style="background: url('<?=base_url('images')?>/blogs/<?=$blog['image']?>');"></div>
        <h1><?=$blog['title']?></h1>
        <div><?=$blog['content']?></div>
    </div>
    <?php } ?>
    <?php if(isset($page)){ ?>
    <div class="box">
        <h1 style="padding-top: 4rem;"><?=$page['title']?></h1>
        <div><?=$page['content']?></div>
    </div>
    <?php } ?>
</div>