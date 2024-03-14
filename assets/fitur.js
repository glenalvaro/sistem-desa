var scripts = document.getElementsByTagName('script');
var last_script = scripts[scripts.length - 1];
var file_ini = last_script.src;
// Harus mengetahui lokasi & nama file script ini
var base_url = file_ini.replace('assets/fitur.js','');

//Fungsi Preview Gambar Saat Upload
function previewGmb() {
    var sampul = document.querySelector("#image");
    var sampulLabel = document.querySelector(".custom-file-input");
    var imgPreview = document.querySelector(".img-preview");

    sampulLabel.textContent = sampul.files[0].name;

    var fileSampul = new FileReader();
    fileSampul.readAsDataURL(sampul.files[0]);

    fileSampul.onload = function (e) {
        imgPreview.src = e.target.result;
    };
}

// Input / Browse file

$('.custom-file-input').on('change', function () {
    var fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});

//jam server
window.onload = function() { jam(); }
    function jam() {
        var e = document.getElementById('jam_server'),
            d = new Date(), h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());
       
            e.innerHTML = h +':'+ m +':'+ s;
       
            setTimeout('jam()', 1000);
        }
       
    function set(e) {
            e = e < 10 ? '0'+ e : e;
            return e;
    }

//select 2
$(document).ready(function() {
      $(".select2_single").select2({
        placeholder: "Select a state",
      });
      $(".select2_group").select2({});
      $(".select2_multiple").select2({
        maximumSelectionLength: 4,
        placeholder: "With Max Selection limit 4",
        allowClear: true
      });
});

// Datatables
$(document).ready(function() {
  let table = $('#datatables').DataTable({
    "columnDefs": [
      { "orderable": false, "targets": 0 }
    ], // jangan lupa tambahkan koma terlebih dahulu
    "order": [], // tambahkan baris ini
  });

  table.on( 'order.dt search.dt', function () {
    table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
    } );
  } ).draw();
});

 $(function () {
    $('#datatables-sistem').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true
    })
});

//Date picker
 $(document).ready(function() {
    $('.datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
    });

    $('#tgl_lahir').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy',
    });
});


//show hidden form di data penduduk
$("#status_warganegara").change(function() {
        console.log($("#status_warganegara option:selected").val());
        if ($("#status_warganegara option:selected").val() == 'WNA') {
                $('.form-status-warganegara').prop('hidden', false);
        } else {
                $('.form-status-warganegara').prop('hidden', true);
    }
});

$("#asuransi_kesehatan").change(function() {
        console.log($("#asuransi_kesehatan option:selected").val());
        if ($("#asuransi_kesehatan option:selected").val() == 'TIDAK/BELUM PUNYA') {
                $('#no_asuransi').prop('disabled', true);
        } else {
         $('#no_asuransi').prop('disabled', false);
    }
});


// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName('validation-form');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
    form.classList.add('was-validated');
  }, false);
});


function formAction(idForm, action, target = '')
{
    if (target != '')
    {
        $('#'+idForm).attr('target', target);
    }
    $('#'+idForm).attr('action', action);
    $('#'+idForm).submit();
}