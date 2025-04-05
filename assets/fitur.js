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
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      "language": {
          "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json"
      }
    })
});

//Date picker
 $(document).ready(function() {
    //tgl
    $('#tgl_lapor').datepicker({
      autoclose: true,
      todayHighlight:true,
      format: 'yyyy-mm-dd',
      language: 'id',
    });

    $('#tgl_lahir').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy',
    });

    //tgl di form program bantuan
    $('#tgl_1').datepicker({
      autoclose: true,
      todayHighlight:true,
      format: 'yyyy-mm-dd',
      language: 'id',
    });
    $('#tgl_2').datepicker({
      autoclose: true,
      todayHighlight:true,
      format: 'yyyy-mm-dd',
      language: 'id',
    });
    $('#tgl_surat').datepicker({
      autoclose: true,
      todayHighlight:true,
      format: 'yyyy-mm-dd',
      language: 'id',
    });
    // tgl berlaku surat
    $('#tgl-dari').datepicker({
      autoclose: true,
      todayHighlight:true,
      format: 'dd-mm-yyyy',
      language: 'id',
    });
    $('#tgl-sampai').datepicker({
      autoclose: true,
      todayHighlight:true,
      format: 'dd-mm-yyyy',
      language: 'id',
    });
    $('#tgl-agenda').datepicker({
      autoclose: true,
      todayHighlight:true,
      format: 'yyyy-mm-dd',
      language: 'id',
    });
    $('#jam-agenda').timepicker({
      showInputs: false,
       showMeridian: false 
    });
     $('#jam').timepicker({
      showInputs: false,
       showMeridian: false 
    })
});

//show hidden tidak terdata di form perangkat desa
$(document).ready(function(){
$("input[type=radio]").on("change", function(evt) {
var reset1 = document.querySelectorAll(".form_perangkat");
var data1 = $('input[id=group2]:checked');
if(data1.val() == 2){
  $(".pilih_penduduk").prop("hidden", true);
  $(".form_perangkat").prop("readOnly", false);
  
  for (var i = 0; i < reset1.length; i++) {
    reset1[i].value = "";
  }

    }else{
      $(".pilih_penduduk").prop("hidden", false);
      $(".form_perangkat").prop("readOnly", true);
    }
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
                $('#no_asuransi').prop('readOnly', true);
        } else {
         $('#no_asuransi').prop('readOnly', false);
    }
});

//show hidden form token di aplikasi
$("#jenis_peta").change(function() {
        console.log($("#jenis_peta option:selected").val());
        if ($("#jenis_peta option:selected").val() == 'mapbox') {
                $('#token_peta').prop('readOnly', false);
        } else {
                $('#token_peta').prop('readOnly', true);
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

// Hapus Data Ceklis di table data keluarga
$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
  $("#check_kk").click(function(){ // Ketika user men-cek checkbox all
      if($(this).is(":checked")) // Jika checkbox all diceklis
        $(".checklist-kk").prop("checked", true); // ceklis semua checkbox dengan class "check-item"
      else // Jika checkbox all tidak diceklis
        $(".checklist-kk").prop("checked", false); // un-ceklis semua checkbox dengan class "check-item"
    });

//fungsi disabled & enabled tombol
$("input[type=checkbox]").on("change", function(evt) {
var data1 = $('input[id=data_kk]:checked');
if(data1.length == 0){
  $("button[name=delete_checklist]").prop("disabled", true);
    }else{
      $("button[name=delete_checklist]").prop("disabled", false);
    }
  });
});

// Hapus Data Ceklis di table data penduduk
$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
  $("#check_pend").click(function(){ // Ketika user men-cek checkbox all
      if($(this).is(":checked")) // Jika checkbox all diceklis
        $(".checklist-pend").prop("checked", true); // ceklis semua checkbox dengan class "check-item"
      else // Jika checkbox all tidak diceklis
        $(".checklist-pend").prop("checked", false); // un-ceklis semua checkbox dengan class "check-item"
    });

//fungsi disabled & enabled tombol
$("input[type=checkbox]").on("change", function(evt) {
var data1 = $('input[id=data_pend]:checked');
if(data1.length == 0){
  $("button[name=delete_checklistPend]").prop("disabled", true);
    }else{
      $("button[name=delete_checklistPend]").prop("disabled", false);
    }
  });
});

// Editor Surat
 $(function () {
    tinymce.init({
    selector: 'textarea#isian_surat',
    license_key: 'gpl',
    height: 500,
    visualblocks_default_state: false,
    image_title: true,
    automatic_uploads: true,
    file_picker_types: 'image',
    file_picker_callback: (cb, value, meta) => {
    const input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');

    input.addEventListener('change', (e) => {
      const file = e.target.files[0];

      const reader = new FileReader();
      reader.addEventListener('load', () => {
        /*
          Note: Now we need to register the blob in TinyMCEs image blob
          registry. In the next release this part hopefully won't be
          necessary, as we are looking to handle it internally.
        */
        const id = 'blobid' + (new Date()).getTime();
        const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        const base64 = reader.result.split(',')[1];
        const blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        /* call the callback and populate the Title field with the file name */
        cb(blobInfo.blobUri(), { title: file.name });
      });
      reader.readAsDataURL(file);
    });
      input.click();
    },
    plugins: [
      'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
      'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
      'insertdatetime', 'media', 'table', 'help'
    ],
    toolbar: 'undo redo | link image | blocks | ' +
    'bold italic backcolor | alignleft aligncenter ' +
    'alignright alignjustify | bullist numlist outdent indent | ' +
    'removeformat | help',
    content_style: 
    'body { background-color: #fff;box-shadow: 0 0 4px rgb(0 0 0 / 15%);box-sizing: border-box;margin: 1rem auto 0;max-width: 820px;min-height: calc(100vh - 1rem);padding: 4rem; }'
    });
});


// Fungsi Checkbox
$(document).ready(function(){ 
  $("#cek_box").click(function(){ 
      if($(this).is(":checked")) 
        $(".checklist-data").prop("checked", true);
      else // Jika checkbox all tidak diceklis
        $(".checklist-data").prop("checked", false); 
    });
//disabled & enabled tombol
$("input[type=checkbox]").on("change", function(evt) {
var data1 = $('input[id=data-ceklis]:checked');
if(data1.length == 0){
  $("button[name=hapus-ceklis]").prop("disabled", true);
    }else{
      $("button[name=hapus-ceklis]").prop("disabled", false);
    }
  });
});

//Show tipe di view teks berjalan
$(document).ready(function(){
$("#pilih_tipe").change(function() {
      console.log($("#pilih_tipe option:selected").val());
      if ($("#pilih_tipe option:selected").val() == 'external') {
        $('.external_tipe').prop('hidden', false);
      } else {
        $('.external_tipe').prop('hidden', true);
      }
    });
});

// https://stackoverflow.com/questions/26018756/bootstrap-button-drop-down-inside-responsive-table-not-visible-because-of-scroll
$("document").ready(function() {
    $(".table-responsive").on("show.bs.dropdown", function(e) {
        var table = $(this),
            menu = $(e.target).find(".dropdown-menu"),
            tableOffsetHeight = table.offset().top + table.height(),
            menuOffsetHeight =
            $(e.target).offset().top +
            $(e.target).outerHeight(true) +
            menu.outerHeight(true);

        if (menuOffsetHeight > tableOffsetHeight) {
            table.css("padding-bottom", menuOffsetHeight - tableOffsetHeight);
            $(".table-responsive")[0].scrollIntoView(false);
        }
    });

    $(".table-responsive").on("hide.bs.dropdown", function() {
        $(this).css("padding-bottom", 0);
    });
});


//validasi di modal
$(function() {
  var formModal = $(".modal form");
  $(document).on("keydown", ":input:not(textarea):not(:submit)", function(event) {
          if (event.key === "Enter") {
            if ((formModal.is(":visible") && !formModal.valid()) || !$("#validasi").valid()) {
                event.preventDefault();
                return false;
          }
        }
    });
});


/* Fungsi Format Uang*/
function formatRupiah(angka, prefix){
  var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split    = number_string.split(','),
      sisa     = split[0].length % 3,
      rupiah   = split[0].substr(0, sisa),
      ribuan   = split[0].substr(sisa).match(/\d{3}/gi);
            
      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
        
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}