<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Energie</h1>
            <a class="btn btn-success btn-sm" href="<?php echo site_url('energies/insert'); ?>">Pridať záznam</a>
            <table id="usertable" class="table table-striped">
                <thead>
                <tr>
                    <th>ID Prevádzky</th>
                    <th>ID Elektriny</th>
                    <th>ID Plynu</th>
                    <th>ID Vody</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($energies as $energies_item): ?>
                    <tr>
                        <td><?php echo $energies_item['Prevázka_idPrevázka']; ?></td>
                        <td><?php echo $energies_item['Elektrina_idElektrina']; ?></td>
                        <td><?php echo $energies_item['Plyn_idPlyn']; ?></td>
                        <td><?php echo $energies_item['Voda_idVoda']; ?></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-info btn-xs" href="<?php echo site_url('energies/view/'.$energies_item['Prevázka_idPrevázka']); ?>">Detail</a>
                                <a class="btn btn-warning btn-xs" href="<?php echo site_url('energies/edit/'.$energies_item['Prevázka_idPrevázka']); ?>">Upraviť</a>
                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('energies/delete/'.$energies_item['Prevázka_idPrevázka']); ?>"
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