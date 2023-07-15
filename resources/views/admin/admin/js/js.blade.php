<script src="{{asset('assets/js/pages/crud/forms/widgets/select2.js')}}"></script>


<script>

    $(document).on('click', '.delete', function (e) {
        e.preventDefault();

        $('#confirmModal').modal('show')
        var user_name = $(this).attr('user_name');
        var ids = $(this).attr('id');
        $('#Delete_id').val(ids);
        $('#Name_Delete').val(user_name);

    });

    $(document).on('click', '.submit', function (e) {
        e.preventDefault();

        $('#confirmModal').modal('hide');

        var ids=   $('#Delete_id').val();
        $.ajax({
            url: '{{route('admin.admins.delete')}}',
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
            url: "{{route('admin.admins.getAdmin')}}",
            type: 'get',
            "data": function (d) {
                d.mobile = $('#mobile').val();
                d.email = $('#email').val();
                d.name = $('#name').val();
                d.status=$('#status_id').val();

                d.start_date=$( ".start_at" ).val();
                d.end_date=$( ".end_at" ).val();
            },

        },

        columns: [
            {data: 'image', name: 'image'},

            {data: 'name', name: 'name'},
            {data: 'phone', name: 'phone'},
            {data: 'email', name: 'email'},
            {data: 'role', name: 'role'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        @if(app()->getLocale()== 'ar')

        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Arabic.json"
        }
        @endif
    });

    $(document).on('click','.check_status',function(event) {

        event.preventDefault();

        if (confirm("هل انت متاكد  من تغير حالة مدير النظام ؟")) {
            var status;
            var _this = $(this)
            var ids = _this.attr('data-id');
            if (_this.prop('checked')) {
                status = 1;
            } else {
                status = 0;

            }
            $.ajax({
                url: '{{route('admin.admins.updateStatus')}}',
                method: 'POST',
                data: {
                    "id": ids,
                    "status": status,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    if (data.status == 201) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 3000
                        });

                    } else if (data.status == 422) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2000
                        });

                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                    $('.data-table').DataTable().ajax.reload();

                },





                    error: function (data) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 2000
                    });
                    $('.data-table').DataTable().ajax.reload();

                }


            });


        } else{
            return false;
        }
    });



</script>
