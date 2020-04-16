<div class="main">
    <div class="main__header">
        <h1 class="main__title">Blogs</h1>
        <p class="main__desc">There's all blogs that you have</p>
        <a href="<?=base_url()?>dashboard/blog" class="btn btn-primary"><i class="fas fa-plus"></i> Add Blog</a>
    </div>
    <div class="main__box">
        <table class="box__table">
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Image</th>
                <th>Content</th>
                <th>Action</th>
            </tr>
            <?php foreach($blogs as $blog){ ?>
            <tr>
                <td><?=$blog['title']?></td>
                <td><?php $date = date_create($blog['date']); echo date_format($date, 'd F Y'); ?></td>
                <td><img src="<?=base_url()?>images/blogs/<?=$blog['image']?>"></td>
                <td><?= (strlen($blog['content']) > 35) ? substr($blog['content'], 0, 35).'...' : $blog['content'] ?></td>
                <td>
                <a href="<?=base_url()?>dashboard/blog/edit/<?=$blog['id']?>" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                <a href="<?=base_url()?>dashboard/blog/delete/<?=$blog['id']?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>