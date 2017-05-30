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
            echo form_open('energies/insert/',array('class'=>'form-horizontal')); ?>
            <div class="form-group">
                <div class="form-group">
                    <label for="Plyn_idPlyn" class="col-sm-2 control-label">ID Plynu</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="Plyn_idPlyn" name="Plyn_idPlyn">
                            <?php foreach ($gas_item as $key => $value):?>
                                <option value="<?php echo $key+1?>"><?php echo $key+1 ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Elektrina_idElektrina" class="col-sm-2 control-label">ID Elektriny</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="Elektrina_idElektrina" name="Elektrina_idElektrina">
                            <?php foreach ($electro_item as $key => $value):?>
                                <option value="<?php echo $key+1?>"><?php echo $key+1 ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Voda_idVoda" class="col-sm-2 control-label">ID Vody</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="Voda_idVoda" name="Voda_idVoda">
                            <?php foreach ($water_item as $key => $value):?>
                                <option value="<?php echo $key+1?>"><?php echo $key+1 ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Prevázka_idPrevázka" class="col-sm-2 control-label">ID Prevádzky</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="Prevázka_idPrevázka" name="Prevázka_idPrevázka">
                            <?php foreach ($store_item as $key => $value):?>
                                <option value="<?php echo $key+1?>"><?php echo $key+1 ?></option>
                            <?php endforeach; ?>
                        </select>
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
