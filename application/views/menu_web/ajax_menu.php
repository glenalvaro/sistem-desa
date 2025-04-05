<script>
    function ganti_link()
    {
        var link_id = $("#jenis_link").val();
        //alert(link_id);
        $.ajax({
            url:"<?= base_url('menu_web/jenis_link'); ?>", 
            type:"POST",
            data:"link_id="+link_id,
            success:function(data){
              $('#link_web').prop('hidden', false);
              $('#link_external').prop('hidden', true);
              $('#link_ext').removeClass('required');
              $("#link").html(data);
            }
        });
    }
</script>