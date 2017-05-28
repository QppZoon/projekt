<script type="text/javascript">
    $(document).ready(function() {
        $('#usertable').DataTable({
            "ajax": {
                url : "<?php echo site_url("rents/rents_page") ?>",
                type : 'GET'
            },
        });
    });
</script>