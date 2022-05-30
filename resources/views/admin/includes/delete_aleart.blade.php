<script>
    $(document).ready(function () {
        $(document).on("click", "#delete", function () {
            var deleteID = $(this).data('id');
            $(".modal_body #modal_id").val(deleteID);
        });
    });
</script>
