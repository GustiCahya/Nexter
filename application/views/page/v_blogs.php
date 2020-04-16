<header class="header">
    <h1>Blogs</h1>
</header>
<div class="content">
    <div class="cards">
        <?php foreach($blogs as $blog){ ?>
        <div class="card">
            <img src="<?=base_url('images')?>/blogs/<?=$blog['image']?>" alt="House 1" class="card__img">
            <h5 class="card__name"><?=$blog['title']?></h5>
            <div class="card__desc">
                <p>
                    <?=substr($blog['content'], 0, 200)?>...
                </p>
            </div>
            <a href="<?=base_url()?>blog/<?=$blog['slug']?>" class="btn card__btn">Read More</a>
        </div>
        <?php } ?>
    </div>
</div>