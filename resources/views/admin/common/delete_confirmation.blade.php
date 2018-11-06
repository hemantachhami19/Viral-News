<script src="{{ asset('panel/assets/js/bootbox.min.js') }}"></script>
<script>
    $(".bootbox-confirm").on('click', function() {

        var $this = $(this);

        bootbox.confirm("Are you sure?", function(result) {
            if(result) {
                location.href = $this.attr('href');
            }
        });

        return false;
    });

</script>