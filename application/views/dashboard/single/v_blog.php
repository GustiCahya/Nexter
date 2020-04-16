<?php if(!$title){ redirect('dashboard/blogs'); }?>
<?php if(!isset($blog)){ $blog=['title'=>'', 'content'=>'']; } ?>
<div class="main">
    <div class="main__header">
        <h1 class="main__title"><?=$title?> Blog</h1>
        <p class="main__desc">You can do it whatever you want</p>
    </div>
    <div class="main__box">
        <form class="box__single" action="<?=$action?>" method="POST" enctype="multipart/form-data">
            <div class="title">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="<?=$blog['title']?>" placeholder="Title">
                <?=form_error('title', '<div style="background:crimson;font-size:1.3rem; padding: .5rem">', '</div>')?>
            </div>
            <div class="content">
                <label for="content">Content</label>
                <textarea id="content" name="content" placeholder="Content"> <?=$blog['content']?> </textarea>
                <?=form_error('content', '<div style="background:crimson;font-size:1.3rem; padding: .5rem">', '</div>')?>
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