

const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal.fire({
        title: flashData,
        text: 'Your data was succesfully ' + flashData,
        icon: 'success'
    });
}


// tombol-hapus, this jquery when the delete button is clicked , we're using sweet alert 2 to do this
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Are you sure ?',
        text: "This data will be deleted!",
        icon: 'warning',
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
    Swal.fire({
        title: flashProfile,
        text: 'Your profile has been updated!',
        icon: 'success'
    });
}


//Button change password
const flashPassword = $('.flash-password').data('flashdata');

if (flashPassword) {
    Swal.fire({
        title: flashPassword,
        text: 'Your password has been updated!',
        icon: 'success'
    });
}


//button comment








