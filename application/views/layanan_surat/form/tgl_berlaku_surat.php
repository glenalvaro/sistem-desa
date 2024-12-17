 <div class="form-group">
      <label class="col-sm-3" for="berlaku_mulai">Berlaku Dari - Sampai</label>
         <div class="col-sm-2">
            <div class="input-group input-group-sm date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input class="form-control input-sm pull-right" id="tgl-dari" value="<?= date('d-m-Y') ?>" name="berlaku_mulai" type="text">
            </div>
          </div>
        <div class="col-sm-2">
            <div class="input-group input-group-sm date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input class="form-control input-sm pull-right required" id="tgl-sampai" name="berlaku_sampai" type="text">
          </div>
      </div>
</div>