<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Zoznam majiteľov</h1>

            <table id="majiteľ" class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Meno</th>
                    <th>Priezvisko</th>
                    <th>Adresa</th>
                    <th>Dátum narodenia</th>
                    <th>Akcie</th>
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
                        <td><div class="btn-group"><a class="btn btn-warning btn-xs" href="#" role="button">Upraviť</a>
                                <a class="btn btn-danger btn-xs" href="#" role="button">Zmazať</a></div></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>




            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
            <script src="../../dist/js/bootstrap.min.js"></script>
            <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
            <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>



            <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>

            <script type="text/javascript">$(document).ready(function () { $('#usertable').DataTable({
                    "ajax": {url : "<?php echo site_url("users/users_page")?>",type : 'GET'},
                });
                });</script>
        </div>
    </div> <!-- /row -->
    <div class="row">

    </div>
</div> <!-- /container -->