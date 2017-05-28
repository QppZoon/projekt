<div id="container">
    <?php echo form_open('Users'); ?>
    <h1>Insert Data Into Database Using CodeIgniter</h1><hr/>
    <?php if (isset($message)) { ?>
        <CENTER><h3 style="color:green;">Data inserted successfully</h3></CENTER><br>
    <?php } ?>
    <?php echo form_label('Meno'); ?> <?php echo form_error('Meno'); ?><br />
    <?php echo form_input(array('id' => 'dname', 'name' => 'Meno')); ?><br />

    <?php echo form_label('Priezvisko'); ?> <?php echo form_error('Priezvisko'); ?><br />
    <?php echo form_input(array('id' => 'demail', 'name' => 'Priezvisko')); ?><br />

    <?php echo form_label('Adresa'); ?> <?php echo form_error('Adresa'); ?><br />
    <?php echo form_input(array('id' => 'dmobile', 'name' => 'Adresa')); ?><br />

    <?php echo form_label('Dátum narodenia'); ?> <?php echo form_error('Dátum_narodenia'); ?><br />
    <?php echo form_input(array('id' => 'daddress', 'name' => 'Dátum_narodenia')); ?><br />

    <?php echo form_submit(array('id' => 'submit', 'value' => 'Uložiť')); ?>
    <?php echo form_close(); ?><br/>
</div>