<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
        <div class="page-header">
            <h1><?php echo $title; ?><br />
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php if (validation_errors()): ?>
                <div class="alert alert-danger alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>Warning!</strong> <?php echo validation_errors(); ?>
                </div>
                <?php
            endif;
            echo form_open('lenergies/insert/',array('class'=>'form-horizontal')); ?>
            <div class="form-group">
                <div class="form-group">
                    <label for="Druh_energie" class="col-sm-2 control-label">Druh energie</label>
                    <div class="col-sm-10">
                        <input type="input" class="form-control" id="Druh_energie" name="Druh_energie">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Jednotka" class="col-sm-2 control-label">Jednotka</label>
                    <div class="col-sm-10">
                        <input type="input" class="form-control" id="Jednotka" name="Jednotka">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Cena_za_jednotku" class="col-sm-2 control-label">Cena za jednotku</label>
                    <div class="col-sm-10">
                        <input type="input" class="form-control" id="Cena_za_jednotku" name="Cena_za_jednotku">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" class="btn btn-default" onclick="javascript:window.history.go(-1);">Späť</button>
                        <input type="submit" class="btn btn-success" name="submit" value="Uložiť" />
                    </div>
                </div>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>
