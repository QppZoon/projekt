<script type="text/javascript">
    $(document).ready(function() {
        $('#usertable').DataTable({
            "ajax": {
                url : "<?php echo site_url("rs/rs_page") ?>",
                type : 'GET'
            },
        });
    });
</script>
</body>
</html>