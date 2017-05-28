<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Plyn</h1>
            <a class="btn btn-success btn-sm" href="<?php echo site_url('gas/insert'); ?>">Pridať záznam</a>
            <table id="usertable" class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Cena za jednotku</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($gas as $gas_item): ?>
                    <tr>
                        <td><?php echo $gas_item['idPlyn']; ?></td>
                        <td><?php echo $gas_item['Cena_za_jednotku']; ?></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-info btn-xs" href="<?php echo site_url('gas/view/'.$gas_item['idPlyn']); ?>">Detail</a>
                                <a class="btn btn-warning btn-xs" href="<?php echo site_url('gas/edit/'.$gas_item['idPlyn']); ?>">Upraviť</a>
                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('gas/delete/'.$gas_item['idPlyn']); ?>"
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