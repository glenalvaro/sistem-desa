// Sweet Alert
const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal({
        title: 'Sukses',
        text: flashData,
        type: 'success'
    });
}

// Sweet Alert
const flashGagal = $('.flash-data-gagal').data('flashdata');

if (flashGagal) {
    Swal({
        title: 'Gagal',
        text:  flashGagal,
        type: 'error'
    });
}

// tombol-hapus
$('.aksi-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Apakah anda yakin ?',
        text: "Data ini akan dihapus!",
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#e74c3c',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

// aksi download database
$('.aksi-download').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Apakah anda yakin',
        text: "Unduh database sistem informasi desa!",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#e74c3c',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Download'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});

// tombol-hapus terpilih di data anggota
$('#hapus-terpilih').on('click', function (e) {

    e.preventDefault();

    Swal({
        title: 'Hapus data yang diceklis ?',
        text: "Data ini akan dihapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e74c3c',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Hapus'
    }).then((result) => {
        if (result.value) {
             $("#form-delete").submit();
        }
    })

});




