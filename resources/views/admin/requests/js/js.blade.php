<script src="{{asset('assets/js/pages/crud/forms/widgets/select2.js')}}"></script>


<script>


    $(document).on('click', '.submit', function (e) {
        e.preventDefault();

        $('#confirmModal').modal('hide');

        var ids=   $('#Delete_id').val();
        $.ajax({
            url: '{{route('admin.users.delete')}}',
            method: 'POST',
            data: {
                "id": ids,
                "_token": "{{ csrf_token() }}",
            },
            success: function (data) {
                if (data.status === 201) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 3000
                    });

                    $('.data-table').DataTable().ajax.reload();
                }
                else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 2000
                    });
                }



            },
            error: function (data) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: data,
                    showConfirmButton: false,
                    timer: 2000
                });
                $('.data-table').DataTable().ajax.reload();

            }


        });




    });

    $('.start_at').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        autoclose: true,
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
        orientation: 'bottom'
    });
    $('.end_at').datepicker({
        dateFormat: 'yy-mm-dd',
        showOtherMonths: true,
        selectOtherMonths: true,
        autoclose: true,
        changeMonth: true,
        changeYear: true,
        orientation: 'bottom'

    });

    $('#btnFiterSubmitSearch').click(function (e) {
        e.preventDefault();
        $('.data-table').DataTable().draw(true);
    });
    table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,

        searching: true,
        ajax: {
            url: "{{route('admin.requests.getAllRequest')}}",
            type: 'get',
            "data": function (d) {
                d.userName = $('#userName').val();
                d.driverName = $('#driverName').val();
                d.status=$('#status_id').val();
                d.start_date=$( ".start_at" ).val();
                d.end_date=$( ".end_at" ).val();
                d.userId=$('#userId').val();
                d.driverId=$('#driverId').val();

            },

        },

        columns: [
            {data: 'id', name: 'id'},
            {data: 'userName', name: 'userName'},
            {data: 'driverName', name: 'driverName'},

            {data: 'rate', name: 'rate'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],

        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Arabic.json"
        }
    });




</script>
