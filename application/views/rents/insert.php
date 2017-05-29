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
            echo form_open('rents/insert/',array('class'=>'form-horizontal')); ?>
            <div class="form-group">
                <div class="form-group">
                    <label for="Cena_za_m2" class="col-sm-2 control-label">Cena za m<sup>2</sup> v €</label>
                    <div class="col-sm-10">
                        <input type="input" class="form-control" id="Cena_za_m2" name="Cena_za_m2">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Poschodie_idPoschodie" class="col-sm-2 control-label">ID Poschodia</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="Poschodie_idPoschodie" name="Poschodie_idPoschodie">
                            <?php foreach ($floor_item as $key => $value):?>
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
