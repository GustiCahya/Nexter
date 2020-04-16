<header class="header">
    <h1>Properties</h1>
</header>
<div class="content">
    <div class="cards">
        <?php foreach($properties as $property){ ?>
        <div class="card">
            <img src="<?=base_url('images/properties/').$property['image']?>" alt="House 1" class="card__img">
            <svg class="card__like">
                <use xlink:href="<?=base_url('assets-webpage')?>/img/sprite.svg#icon-heart-full"></use>
            </svg>
            <h5 class="card__name"><?=$property['title']?></h5>
            <div class="card__location">
                <svg>
                    <use xlink:href="<?=base_url('assets-webpage')?>/img/sprite.svg#icon-map-pin"></use>
                </svg>
                <p><?=$property['location']?></p>
            </div>
            <div class="card__rooms">
                <svg>
                    <use xlink:href="<?=base_url('assets-webpage')?>/img/sprite.svg#icon-profile-male"></use>
                </svg>
                <p><?=$property['room']?> rooms</p>
            </div>
            <div class="card__area">
                <svg>
                    <use xlink:href="<?=base_url('assets-webpage')?>/img/sprite.svg#icon-expand"></use>
                </svg>
                <p><?=number_format($property['area'])?> m<sup>2</sup></p>
            </div>
            <div class="card__price">
                <svg>
                    <use xlink:href="<?=base_url('assets-webpage')?>/img/sprite.svg#icon-key"></use>
                </svg>
                <p>$<?=number_format($property['price'])?></p>
            </div>
            <a href="https://api.whatsapp.com" class="btn card__btn">Contact realtor</a>
        </div>
        <?php } ?>
    </div>
</div>