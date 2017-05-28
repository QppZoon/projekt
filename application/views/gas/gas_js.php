<script type="text/javascript">
    $(document).ready(function() {
        $('#usertable').DataTable({
            "ajax": {
                url : "<?php echo site_url("gas/gas_page") ?>",
                type : 'GET'
            },
        });
    });
</script>