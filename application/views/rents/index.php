<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Zoznam nájmov</h1>
            <a class="btn btn-success btn-sm" href="<?php echo site_url('rents/insert'); ?>">Pridať záznam</a>
            <table id="usertable" class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Cena za m<sup>2</sup> v €</th>
                    <th>ID poschodia</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($rent as $rent_item): ?>
                    <tr>
                        <td><?php echo $rent_item['idNájom']; ?></td>
                        <td><?php echo $rent_item['Cena_za_m2']; ?></td>
                        <td><?php echo $rent_item['Poschodie_idPoschodie']; ?></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-info btn-xs" href="<?php echo site_url('rents/view/'.$rent_item['idNájom']); ?>">Detail</a>
                                <a class="btn btn-warning btn-xs" href="<?php echo site_url('rents/edit/'.$rent_item['idNájom']); ?>">Upraviť</a>
                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('rents/delete/'.$rent_item['idNájom']); ?>"
                                   onClick="return confirm('Ste si istý, že chcete zmazať tento záznam?')">Zmazať</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div> <!-- /row -->
</div> <!-- /container -->