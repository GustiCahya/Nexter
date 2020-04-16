<?php if(!$title){ redirect('dashboard/blogs'); }?>
<?php if(!isset($property)){ $property=['title'=>'', 'room'=>'', 'location'=>'', 'area'=>'', 'price'=>'']; } ?>
<div class="main">
    <div class="main__header">
        <h1 class="main__title">Add Property</h1>
        <p class="main__desc">You can do it whatever you want</p>
    </div>
    <div class="main__box">
        <form class="box__single" action="#" method="POST" enctype="multipart/form-data">
            <div class="title">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="Title" value="<?=$property['title']?>" style="width: 100%">
                <?=form_error('title', '<div style="background:crimson;font-size:1.3rem; padding: .5rem">', '</div>')?>
            </div>
            <div class="desc">
                <div class="room">
                    <label for="room">Room</label>
                    <input type="number" name="room" id="room" value="<?=$property['room']?>" placeholder="rooms">
                    <?=form_error('room', '<div style="background:crimson;font-size:1.3rem; padding: .5rem">', '</div>')?>
                </div>
                <div class="location">
                    <label for="location">Location</label>
                    <input type="text" name="location" id="location" value="<?=$property['location']?>" placeholder="location">
                    <?=form_error('location', '<div style="background:crimson;font-size:1.3rem; padding: .5rem">', '</div>')?>
                </div>
                <div class="area">
                    <label for="area">Area ( m<sup>2</sup> )</label>
                    <input type="number" name="area" id="area" value="<?=$property['area']?>" placeholder="area">
                    <?=form_error('area', '<div style="background:crimson;font-size:1.3rem; padding: .5rem">', '</div>')?>
                </div>
                <div class="price">
                    <label for="price">Price ( $ )</label>
                    <input type="number" name="price" id="price" value="<?=$property['price']?>" placeholder="price">
                    <?=form_error('price', '<div style="background:crimson;font-size:1.3rem; padding: .5rem">', '</div>')?>
                </div>
            </div>
            <div class="file">
                <label for="image" style="margin-bottom: 3px">Choose Image (max: 2mb)</label>
                <input type="file" name="image">
                <?=form_error('image', '<div style="background:crimson;font-size:1.3rem; padding: .5rem">', '</div>')?>
            </div>
            <div class="button">
                <button type="submit" name="button" class="btn">Submit</button>
            </div>
        </form>
    </div>
</div>