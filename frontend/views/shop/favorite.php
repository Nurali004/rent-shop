<?php

?>


<div class="row">
    <div class="container">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h2>Favorites List</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Equipment Name</th>
                            <th>Equipment Image</th>
                            <th>Owner Name</th>
                            <th>Owner Phone Number</th>
                            <th>Action</th>
                        </tr>

                        <?php foreach ($favorites as $favorite): ?>

                        <tr>
                            <td><?php echo $favorite->id; ?></td>
                            <td><?php echo $favorite->equipment->name; ?></td>
                            <td><img src="/<?php echo $favorite->equipment->img; ?>" width="150" alt=""></td>
                            <td><?php echo $favorite->customer->first_name; ?>
                            </td>
                            <td><a href="tel:<?php echo $favorite->customer->phone; ?>"class="btn btn-primary" >Call Phone</a>
                            </td>
                            <td>
                                <a href="<?= \yii\helpers\Url::to(['shop/detail', 'id' => $favorite->equipment_id]) ?>" class="btn btn-outline-primary" >View More</a>
                            </td>
                        </tr>


                        <?php endforeach; ?>



                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
