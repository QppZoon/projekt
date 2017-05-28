<script type="text/javascript">
    $(document).ready(function() {
        $('#usertable').DataTable({
            "ajax": {
                url : "<?php echo site_url("water/water_page") ?>",
                type : 'GET'
            },
        });
    });
</script>