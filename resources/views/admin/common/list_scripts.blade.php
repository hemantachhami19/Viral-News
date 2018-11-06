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


<script type="text/javascript">

    $(document).ready(function () {

        $("#parent_checkbox").click(function(){
            $('#row-body input:checkbox').not(this).prop('checked', this.checked);
        });

        $('#filter_btn').click(function () {

            var url = '{{ route($_base_route) }}';
            var flag = false;
            $.each(filter_fields, function (key, field) {

                if ($('#'+field).val() !== '') {

                    if (!flag) {
                        url = url + '?' + field + '=' + $('#'+field).val();
                    } else {
                        url = url + '&' + field + '=' + $('#'+field).val();
                    }

                    if (!flag) {
                        flag = true;
                    }


                }

            });


            location.href = url;


            return false;

            var filter_id = $('#filter_id').val();
            var filter_name = $('#filter_name').val();
            var flag = false;


            if (filter_id !== '') {

                url = url + '?filter_id=' + filter_id;
                flag = true;

            }



            if (filter_name !== '') {

                if (flag) {
                    url = url + '&filter_name=' + filter_name;
                } else {
                    url = url + '?filter_name=' + filter_name;
                    flag = true;
                }

            }
            console.log(url);

        });

        $('#filter_reset_btn').click(function () {

            $.each(filter_fields, function (key, field) {

                $('#'+ field).val('');

            });

        });
    });

</script>



