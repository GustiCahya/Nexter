<?php if(!$title){ redirect('dashboard/pages'); }?>
<?php if(!isset($page)){ $page=['title'=>'', 'content'=>'']; } ?>
<div class="main">
    <div class="main__header">
        <h1 class="main__title"><?=$title?> Page</h1>
        <p class="main__desc">You can do it whatever you want</p>
    </div>
    <div class="main__box">
        <form class="box__single" action="<?=$action?>" method="POST">
            <div class="titlePage">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="Title" value="<?=$page['title']?>">
                <?=form_error('title', '<div style="background:crimson;font-size:1.3rem; padding: .5rem">', '</div>')?>
            </div>
            <div class="contentPage">
                <label for="content">Content</label>
                <textarea id="content" name="content" placeholder="Content">
                    <?=$page['content']?>
                </textarea>
                <?=form_error('title', '<div style="background:crimson;font-size:1.3rem; padding: .5rem">', '</div>')?>
            </div>
            <div class="buttonPage">
                <button type="submit" name="button" class="btn">Submit</button>
            </div>
        </form>
    </div>
</div>