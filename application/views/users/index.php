<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Zoznam majiteľov</h1>
            <a class="btn btn-success btn-sm" href="<?php echo site_url('users/create'); ?>">Pridať záznam</a>
            <table id="usertable" class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Meno</th>
                    <th>Priezvisko</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($user as $user_item): ?>
                    <tr>
                        <td><?php echo $user_item['idMajiteľ']; ?></td>
                        <td><?php echo $user_item['Meno']; ?></td>
                        <td><?php echo $user_item['Priezvisko']; ?></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-info btn-xs" href="<?php echo site_url('users/view/'.$user_item['idMajiteľ']); ?>">Detail</a>
                                <a class="btn btn-warning btn-xs" href="<?php echo site_url('users/edit/'.$user_item['idMajiteľ']); ?>">Upraviť</a>
                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('users/delete/'.$user_item['idMajiteľ']); ?>"
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