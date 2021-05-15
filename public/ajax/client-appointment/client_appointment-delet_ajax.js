$('.delete-client-appointment').on('click', function (event) {
    event.preventDefault();
    var url = $(this).attr('url');
    csrf_token = $('meta[name="csrf-token"]').attr('content');

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success btn-rounded',
            cancelButton: 'btn btn-danger btn-rounded mr-3'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: client_appointment_delete_confirmation,
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: _delete,
        cancelButtonText: cancel,
        reverseButtons: true,
        padding: '2em'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    '_method': 'DELETE',
                    '_token': csrf_token
                },
            })
            swalWithBootstrapButtons.fire(
                deleted,
                data_deleted,
                'success'
            )
            window.setTimeout(function(){location.reload()},1000)
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                canceled,
                data_is_safe,
                'error'
            )
        }
    })
})
