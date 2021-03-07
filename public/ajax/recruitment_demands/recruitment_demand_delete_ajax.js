$('.delete-recruitment_demands').on('click', function (event) {
    event.preventDefault();
    var url = $(this).attr('href');
    csrf_token = $('meta[name="csrf-token"]').attr('content');
    const swalWithBootstrapButtons = swal.mixin({
        confirmButtonClass: 'btn btn-success btn-rounded',
        cancelButtonClass: 'btn btn-danger btn-rounded mr-3',
        buttonsStyling: false,
    })
    swalWithBootstrapButtons({
        title: 'Souhaitez-vous vraiment supprimer cette demande de recrutement ?',
        text: "",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Supprimer',
        cancelButtonText: 'Annuler',
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
                'Supprimé!',
                'Vos données ont été supprimées.',
                'success'
            )
            window.setTimeout(function(){location.reload()},1000)
        } else if (
            result.dismiss === swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons(
                'Annulé',
                'Vos données sont en sécurité',
                'error'
            )
        }
    })
})
