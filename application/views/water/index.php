<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Plyn</h1>
            <a class="btn btn-success btn-sm" href="<?php echo site_url('water/insert'); ?>">Pridať záznam</a>
            <table id="usertable" class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Cena za jednotku</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($water as $water_item): ?>
                    <tr>
                        <td><?php echo $water_item['idVoda']; ?></td>
                        <td><?php echo $water_item['Cena_za_jednotku']; ?></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-info btn-xs" href="<?php echo site_url('water/view/'.$water_item['idVoda']); ?>">Detail</a>
                                <a class="btn btn-warning btn-xs" href="<?php echo site_url('water/edit/'.$water_item['idVoda']); ?>">Upraviť</a>
                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('water/delete/'.$water_item['idVoda']); ?>"
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