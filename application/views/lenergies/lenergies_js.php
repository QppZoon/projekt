<script type="text/javascript">
    $(document).ready(function() {
        $('#usertable').DataTable({
            "ajax": {
                url : "<?php echo site_url("lenergies/lenergies_page") ?>",
                type : 'GET'
            },
        });
    });
</script>
</body>
</html>