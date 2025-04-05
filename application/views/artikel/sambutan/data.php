<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Sambutan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Website</a></li>
        <li><a href="#"> Data</a></li>
      </ol>
    </section>

    <section class="content">
       <div class="row">
       <?= $this->load->view('artikel/menu'); ?>
        <div class="col-md-9">
          <div class="box box-info">
        <div class="box-body">
        <div class="table-responsive">
        <table id="datatables-sistem" class="table table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
            <thead class="bg-gray disabled color-palette">
            <tr>
                <th>No</th>
        		<th style="min-width:100px; text-align: center;">Aksi</th>
                <th style="min-width:100px; text-align: center;">Lihat</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($data_sambutan as $data) { ?>
            <tr>
    			<td width="10px"><?= $no++ ?></td>
    			<td style="text-align:center" width="170px">
                     <a href="<?=site_url('sambutan/edit/'.$data->id)?>" class="btn bg-orange btn-sm" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
    			</td>
    			<td>
                  <a target="_blank" href="<?= base_url('web'); ?>"><?= base_url('web'); ?></a>
                </td>
		   </tr>
            <?php } ?>
        </tbody>
        </table>
        </div>
        <div class="row">
           <div class="col-md-6">   
	       </div>
           <div class="col-md-6 text-right">
                <?php echo $pagination ?>
           </div>
        </div>
        </div>
        </div>
      </div>
    </div>
</section>
</div>