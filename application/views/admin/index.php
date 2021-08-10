<div class="container">
    <div class="row mt-3">
      <div class="col-lg">
        <?= $this->session->flashdata('message')?>
      </div>
    </div>
    <div class="row my-5">
            <div class="table-responsive table-bordered">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Keluhan dan Saran</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                        $i=1;
                        foreach($keluhan as $row) {
                      ?>
                      <tr>
                          <th scope="row"><?= $i++ ?></th>
                            <td><?= $row->nis ?></td>
                            <td><?= $row->nama ?></td>
                            <td><?= $row->kelas ?></td>
                            <td><?= $row->keluhan ?></td>
                            <td>
                              <img src="<?= base_url('assets/img/'.$row->dokumen )?>" alt="Gambar" width="128" height="128">
                            </td>
                            <td>
                              <a href="<?= base_url()?>admin/getubah/<?= $row->id ?>" class="ubahModal" data-toggle="modal" data-target="#UbahModal" 
                              data-id="<?= $row->id?>"
                              >
                              Edit
                              </a> |
                              <a href="<?= base_url()?>admin/getHapus/<?= $row->id ?>" onclick="return confirm('Anda ingin menghapus keluhan ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="UbahModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Ubah Keluhan dan Saran</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="created_at" id="created_at">
        <div class="form-group">
          <label for="keluhan">Keluhan dan Saran</label>
          <textarea name="keluhan" id="keluhan" rows="3" class="form-control"></textarea>
        </div>

        <div class="form-group">
          <label for="nis">NIS</label>
          <input type="number" id="nis" name="nis" class="form-control">
        </div>

        <div class="form-group">
          <label for="nama">nama</label>
          <input type="text" id="nama" name="nama" class="form-control">
        </div>

        <div class="form-group">
          <select name="kelas" id="kelas" class="custom-select">
              <option disabled selected>-- Pilih Kelas --</option>
              <?php foreach($kelas as $row) { ?>
              <option value="<?= $row->kelas ?>"><?= $row->kelas ?></option>
              <?php } ?>
          </select>
        </div>
                            
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="image" id="image"
            aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01">Pilih Dokumen</label>
        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ubah</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script src="<?= base_url()?>/assets/js/jquery.min.js"></script>
<script>
    $(function() {
      $('.ubahModal').on('click',function (){
        
        const id = $(this).data('id');
        $('.modal-body form').attr('action','<?php echo site_url('admin/ubahKeluhan/') ?>'+id);
        
        $.ajax({
            url: '<?php echo site_url('admin/getubah') ?>',
            data: {'id' : id},
            type: 'post',
            dataType: 'json',
            success: function(data){
                $('#created_at').val(data.created_at);
                $('#nama').val(data.nama);
                $('#nis').val(data.nis);
                $('#keluhan').val(data.keluhan);
                $('#kelas').val(data.kelas);
                $('#image').val(data.dokumen);
              }  
          });
        });
    });
</script>
<script>
      $('.custom-file-input').on('change',function(){
        let filename = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html
        (filename);
      });
</script>