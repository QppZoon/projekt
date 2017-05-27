<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Zoznam majiteľov</h1>

            <table id="usertable" class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Meno</th>
                    <th>Priezvisko</th>
                    <th>Adresa</th>
                    <th>Dátum narodenia</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($user as $user_item): ?>
                    <tr style="color: #0b0b0b; background: white;">
                        <td><?php echo $user_item['idMajiteľ']; ?></td>
                        <td><?php echo $user_item['Meno']; ?></td>
                        <td><?php echo $user_item['Priezvisko']; ?></td>
                        <td><?php echo $user_item['Adresa']; ?></td>
                        <td><?php echo $user_item['Dátum_narodenia']; ?> </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div> <!-- /row -->
</div> <!-- /container -->