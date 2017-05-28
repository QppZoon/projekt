<script type="text/javascript">
    $(document).ready(function() {
        $('#usertable').DataTable({
            "ajax": {
                url : "<?php echo site_url("floors/floors_page") ?>",
                type : 'GET'
            },
        });
    });
</script>