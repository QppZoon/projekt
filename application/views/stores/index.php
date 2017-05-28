<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Zoznam prevádzok</h1>
            <a class="btn btn-success btn-sm" href="<?php echo site_url('stores/insert'); ?>">Pridať záznam</a>
            <table id="usertable" class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Názov</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($store as $store_item): ?>
                    <tr>
                        <td><?php echo $store_item['idPrevádzka']; ?></td>
                        <td><?php echo $store_item['Názov']; ?></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-info btn-xs" href="<?php echo site_url('stores/view/'.$store_item['idPrevádzka']); ?>">Detail</a>
                                <a class="btn btn-warning btn-xs" href="<?php echo site_url('stores/edit/'.$store_item['idPrevádzka']); ?>">Upraviť</a>
                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('stores/delete/'.$store_item['idPrevádzka']); ?>"
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