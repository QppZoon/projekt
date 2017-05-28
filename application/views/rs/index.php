<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Nájom prevádzok</h1>
            <a class="btn btn-success btn-sm" href="<?php echo site_url('rs/insert'); ?>">Pridať záznam</a>
            <table id="usertable" class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Prevádzky</th>
                    <th>ID Nájmu</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($rs as $rs_item): ?>
                    <tr>
                        <td><?php echo $rs_item['idPrevádzka_has_Nájom']; ?></td>
                        <td><?php echo $rs_item['Prevádzka_idPrevádzka']; ?></td>
                        <td><?php echo $rs_item['Nájom_idNájom']; ?></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-info btn-xs" href="<?php echo site_url('rs/view/'.$rs_item['idPrevádzka_has_Nájom']); ?>">Detail</a>
                                <a class="btn btn-warning btn-xs" href="<?php echo site_url('rs/edit/'.$rs_item['idPrevádzka_has_Nájom']); ?>">Upraviť</a>
                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('rs/delete/'.$rs_item['idPrevádzka_has_Nájom']); ?>"
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