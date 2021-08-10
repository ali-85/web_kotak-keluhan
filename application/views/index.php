<div class="container">
    <?php if($this->session->flashdata('success')) { ?>
        <div class="row justify-content-center mt-3 mb-2">
            <div class="col-lg-6">
                <div class="alert alert-success" role="alert">
                    <?= $this->session->flashdata('success') ?>
                    <button class="close" data-dismiss="alert" aria-label="Close">
                        &times;
                    </button>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="row justify-content-center my-5">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h5 class="card-title">
                            Sistem Keluhan dan Saran
                        </h5>
                    </div>
                    <form action="<?= base_url();?>main/aksi" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="keluhan">Keluhan dan Saran</label>
                            <textarea id="keluhan" name="keluhan" class="form-control" rows="3" placeholder="Keluhan dan Saran"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="number" name="nis" id="nis" class="form-control" placeholder="NIS">
                        </div>
                        <div class="form-group">
                            <select name="kelas" class="custom-select">
                                <option disabled selected>-- Pilih Kelas --</option>
                                <?php foreach($kelas as $k) {?>
                                <option value="<?= $k->kelas ?>"><?= $k->kelas ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image"
                                    aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Pilih Gambar sebagai bukti</label>
                            </div>
                        </div>
                </div>
                <div class="card-footer text-muted">
                    <button type="submit" class="btn btn-success float-right">Kirim <i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url()?>assets/js/jquery.min.js"></script>
<script>
      $('.custom-file-input').on('change',function(){
        let filename = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html
        (filename);
      });
</script>