<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Zoznam energií</h1>
            <a class="btn btn-success btn-sm" href="<?php echo site_url('lenergies/insert'); ?>">Pridať záznam</a>
            <table id="usertable" class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Názov</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($lenergie as $lenergie_item): ?>
                    <tr>
                        <td><?php echo $lenergie_item['idEnergie']; ?></td>
                        <td><?php echo $lenergie_item['Druh_energie']; ?></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-info btn-xs" href="<?php echo site_url('lenergies/view/'.$lenergie_item['idEnergie']); ?>">Detail</a>
                                <a class="btn btn-warning btn-xs" href="<?php echo site_url('lenergies/edit/'.$lenergie_item['idEnergie']); ?>">Upraviť</a>
                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('lenergies/delete/'.$lenergie_item['idEnergie']); ?>"
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