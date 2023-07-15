@section('scripts')
<script src="{{asset('assets/js/pages/crud/forms/widgets/select2.js')}}"></script>
<script>


    $(document).ready(function () {

        $("#form").submit(function (event) {
            event.preventDefault();
            var form = $('#form')[0];
            var data=    new FormData(form);
            // console.log(form.getAll());

            $.ajax({
                    url: '{{route('admin.roles.store')}}',
                    method: 'POST',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 800000,

                success: function (data) {
                        if (data.status === 201) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 3000
                            });

                            window.location.href="{{route('admin.roles.index')}}"

                            // $('.data-table').DataTable().ajax.reload();
                        }



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



        });

    })



</script>
@endsection
