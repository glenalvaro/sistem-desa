// Sweet Alert Tambah Data
const flashData = $('.flash-data').data('flashdata');

// if (flashData) {
//     Swal({
//         title: 'Sukses',
//         text: flashData,
//         type: 'success',
//         showConfirmButton: false,
//         timer: 3000,
//         didOpen: (Swal) => {
//          Swal.onmouseenter = Swal.stopTimer;
//          Swal.onmouseleave = Swal.resumeTimer;
//        }
//     });
// }

//Loading with success
if (flashData) {
    swal({
    title: 'Sedang Memproses...',
    allowEscapeKey: false,
    allowOutsideClick: false,
    timer: 2000,
    onOpen: () => {
      swal.showLoading();
    }
  }).then((result) => {
    swal({ 
        title: 'Sukses',
        text: flashData,
        type: 'success',
        timer: 2000,
        showConfirmButton: false
    });
  })
};

// Sweet Alert Error
const flashGagal = $('.flash-data-gagal').data('flashdata');

if (flashGagal) {
    Swal({
        title: 'Gagal',
        text:  flashGagal,
        type: 'error'
    });
}

// Hapus Data
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

$('.hapus-pilihan').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Hapus Data Yang Diceklis ?',
        text: "Data yang dipilih akan dihapus?",
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
             $("#delete_all").submit();
        }
    })

});

$('.pdf-preview').on('click', function(e) {
    e.preventDefault();
    const attr = $(this).attr('href');
        Swal({
            customClass: 'swal-lg',
            title: 'Lihat',
            html: `<object data="${attr}" style="width: 100%; min-height: 400px;" ></object>`,
            showCancelButton: true,
            cancelButtonText: 'Tutup',
            showConfirmButton: false,
    })
});


