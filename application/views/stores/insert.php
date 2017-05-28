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
            echo form_open('stores/insert/',array('class'=>'form-horizontal')); ?>
            <div class="form-group">
                <div class="form-group">
                    <label for="Názov" class="col-sm-2 control-label">Názov</label>
                    <div class="col-sm-10">
                        <input type="input" class="form-control" id="Názov" name="Názov">
                    </div>
                </div>
                <div class="form-group">
                    <label for="m2" class="col-sm-2 control-label">Plocha v m<sup>2</sup></label>
                    <div class="col-sm-10">
                        <input type="input" class="form-control" id="m2" name="m2">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Elektrina" class="col-sm-2 control-label">Spotreba elektriny</label>
                    <div class="col-sm-10">
                        <input type="input" class="form-control" id="Elektrina" name="Elektrina">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Plyn" class="col-sm-2 control-label">Spotreba plynu</label>
                    <div class="col-sm-10">
                        <input type="input" class="form-control" id="Plyn" name="Plyn">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Voda" class="col-sm-2 control-label">Spotreba vody</label>
                    <div class="col-sm-10">
                        <input type="input" class="form-control" id="Voda" name="Voda">
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
