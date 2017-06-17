<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Zoznam mesiacov</h1>
            <a class="btn btn-success btn-sm" href="<?php echo site_url('months/insert'); ?>">Pridať záznam</a>
            <table id="usertable" class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Názov</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($month as $month_item): ?>
                    <tr>
                        <td><?php echo $month_item['idMesiac']; ?></td>
                        <td><?php echo $month_item['Názov']; ?></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-info btn-xs" href="<?php echo site_url('months/view/'.$month_item['idMesiac']); ?>">Detail</a>
                                <a class="btn btn-warning btn-xs" href="<?php echo site_url('months/edit/'.$month_item['idMesiac']); ?>">Upraviť</a>
                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('months/delete/'.$month_item['idMesiac']); ?>"
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