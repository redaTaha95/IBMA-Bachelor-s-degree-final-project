$('.delete-employee').on('click', function (event) {
    event.preventDefault();
    var url = $(this).attr('href');
    csrf_token = $('meta[name="csrf-token"]').attr('content');

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success btn-rounded',
            cancelButton: 'btn btn-danger btn-rounded mr-3'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: delete_confirmation,
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
                success:function(response) {
                    if(response.errors) {
                        swalWithBootstrapButtons.fire(
                            warning,
                            forbidden,
                            'error'
                        )
                    }else
                        {
                            swalWithBootstrapButtons.fire(
                                deleted,
                                data_deleted,
                                'success'
                            )
                        }
                    window.setTimeout(function(){location.reload()},2000)

                }
            })
            /*swalWithBootstrapButtons.fire(
                deleted,
                data_deleted,
                'success'
            )*/
            //window.setTimeout(function(){location.reload()},1000)
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

