const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal({
        title: flashData,
        text: 'Your data was succesfully ' + flashData,
        type: 'success'
    });
}


// tombol-hapus, this jquery when the delete button is clicked , we're using sweet alert 2 to do this
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Are you sure ?',
        text: "This data will be deleted!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});


//Button edit profile

const flashProfile = $('.flash-profile').data('flashdata');

if (flashProfile) {
    Swal({
        title: flashProfile,
        text: 'Your profile has been updated!',
        type: 'success'
    });
}


//Button change password
const flashPassword = $('.flash-password').data('flashdata');

if (flashPassword) {
    Swal({
        title: flashPassword,
        text: 'Your password has been updated!',
        type: 'success'
    });
}


//button comment