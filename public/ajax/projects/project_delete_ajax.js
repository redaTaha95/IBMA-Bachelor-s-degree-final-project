$('.delete-project').on('click', function (event) {
    event.preventDefault();
    var url = $(this).attr('href');
    const warning_message = document.querySelector('div[id=warning_message]').textContent;
    const secure = document.querySelector('div[id=secure]').textContent;
    const delete_btn = document.querySelector('div[id=delete_btn]').textContent;
    const deleted_data = document.querySelector('div[id=deleted_data]').textContent;
    const cancel = document.querySelector('div[id=cancel]').textContent;
    const canceled = document.querySelector('div[id=canceled]').textContent;
    const deleted = document.querySelector('div[id=deleted]').textContent;

    csrf_token = $('meta[name="csrf-token"]').attr('content');
    const swalWithBootstrapButtons = swal.mixin({
        confirmButtonClass: 'btn btn-success btn-rounded',
        cancelButtonClass: 'btn btn-danger btn-rounded mr-3',
        buttonsStyling: false,
    })
    swalWithBootstrapButtons({
        title: warning_message,
        text: "",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: delete_btn,
        cancelButtonText: cancel,
        reverseButtons: true,
        padding: '2em'
    }).then(function(result) {
        if (result.value) {
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
            swalWithBootstrapButtons(
                deleted + '!',
                deleted_data,
                'success'
            )
            window.setTimeout(function(){location.reload()},1000)
        } else if (
            result.dismiss === swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons(
                canceled,
                secure,
                'error'
            )
        }
    })
})
