<script type="text/javascript">
    $(document).ready(function() {
        $('#usertable').DataTable({
            "ajax": {
                url : "<?php echo site_url("owners/owners_page") ?>",
                type : 'GET'
            },
        });
    });
</script>
</body>
</html>