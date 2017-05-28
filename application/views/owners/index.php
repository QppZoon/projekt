<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Majitelia prevádzok</h1>
            <a class="btn btn-success btn-sm" href="<?php echo site_url('owners/insert'); ?>">Pridať záznam</a>
            <table id="usertable" class="table table-striped">
                <thead>
                <tr>
                    <th>ID Prevádzky</th>
                    <th>ID Majiteľa</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($owners as $owners_item): ?>
                    <tr>
                        <td><?php echo $owners_item['Prevádzka_idPrevádzka']; ?></td>
                        <td><?php echo $owners_item['Majiteľ_idMajiteľ']; ?></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-info btn-xs" href="<?php echo site_url('owners/view/'.$owners_item['Prevádzka_idPrevádzka']); ?>">Detail</a>
                                <a class="btn btn-warning btn-xs" href="<?php echo site_url('owners/edit/'.$owners_item['Prevádzka_idPrevádzka']); ?>">Upraviť</a>
                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('owners/delete/'.$owners_item['Prevádzka_idPrevádzka']); ?>"
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