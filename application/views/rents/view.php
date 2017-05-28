<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
        <div class="page-header">
            <h1><?php echo $title; ?><br />
                <small>Nájom č. <?php echo $najom;?></small>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php foreach ($rent_item as $key => $value):?>
                    <div>
                        <dl class="dl-vertical">
                            <dt><?php echo $key;?></dt>
                            <dt><?php echo $value;?></dt>
                        </dl>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-default" onclick="javascript:window.history.go(-1);">Späť</button>
        </div>
    </div> <!-- /row -->
    <div class="row">

    </div>
</div> <!-- /container -->