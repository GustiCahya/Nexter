<div class="main">
    <div class="main__header">
        <h1 class="main__title">Properties</h1>
        <p class="main__desc">There's all blogs that you have</p>
        <a href="<?=base_url()?>dashboard/property" class="btn btn-primary"><i class="fas fa-plus"></i> Add Property</a>
    </div>
    <div class="main__box">
        <table class="box__table">
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Image</th>
                <th>Room</th>
                <th>Location</th>
                <th>Area</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php foreach($properties as $property){ ?>
            <tr>
                <td><?=$property['title']?></td>
                <td><?php $date = date_create($property['date']); echo date_format($date, 'd F Y') ?></td>
                <td><img src="<?=base_url()?>images/properties/<?=$property['image']?>"></td>
                <td><?=$property['room']?> rooms</td>
                <td><?=$property['location']?></td>
                <td><?=number_format($property['area'])?>m<sup>2</sup></td>
                <td>$<?=number_format($property['price'])?></td>
                <td>
                    <a href="<?=base_url()?>dashboard/property/edit/<?=$property['id']?>" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                    <a href="<?=base_url()?>dashboard/property/delete/<?=$property['id']?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>