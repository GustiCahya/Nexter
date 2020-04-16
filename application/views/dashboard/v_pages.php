<div class="main">
    <div class="main__header">
        <h1 class="main__title">Pages</h1>
        <p class="main__desc">There's all pages that you have</p>
        <a href="<?=base_url()?>dashboard/page" class="btn btn-primary"><i class="fas fa-plus"></i> Add Page</a>
    </div>
    <div class="main__box">
        <table class="box__table">
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>content</th>
                <th>Action</th>
            </tr>
            <?php foreach($pages as $page) { ?>
            <tr>
                <td><?= $page['title'] ?></td>
                <td><?php $date = date_create($page['date']); echo date_format($date, 'd F Y'); ?></td>
                <td><?= (strlen($page['content']) > 35) ? substr($page['content'], 0, 35).'...' : $page['content'] ?></td>
                <td>
                    <a href="<?=base_url()?>dashboard/page/edit/<?=$page['id']?>" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                    <a href="<?=base_url()?>dashboard/page/delete/<?=$page['id']?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>