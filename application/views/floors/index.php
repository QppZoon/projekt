<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Zoznam poschodí</h1>
            <a class="btn btn-success btn-sm" href="<?php echo site_url('floors/insert'); ?>">Pridať záznam</a>
            <table id="usertable" class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Číslo poschodia</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($floor as $floor_item): ?>
                    <tr>
                        <td><?php echo $floor_item['idPoschodie']; ?></td>
                        <td><?php echo $floor_item['Č_poschodia']; ?></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-info btn-xs" href="<?php echo site_url('floors/view/'.$floor_item['idPoschodie']); ?>">Detail</a>
                                <a class="btn btn-warning btn-xs" href="<?php echo site_url('floors/edit/'.$floor_item['idPoschodie']); ?>">Upraviť</a>
                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('floors/delete/'.$floor_item['idPoschodie']); ?>"
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