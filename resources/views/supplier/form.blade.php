<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document"style="max-width: 600px;">
        <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post')

            <div class="modal-content" style="border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                <div class="d-flex justify-content-center">
                    <h5 class="modal-title text-white bg-primary text-center px-4 py-2"
                        style="
                          max-width: 230px;
                          width: 100%;
                          font-weight: 600;
                          font-size: 20px; /* Membesarkan font */
                          border-radius: 0 0 8px 8px;
                          box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
                        ">
                      <i class="fa fa-box mr-2"></i> 
                    </h5>
                  </div>

                <div class="modal-body" style="padding: 25px;">
                    <div class="form-group row mb-4">
                        <label for="nama" class="col-lg-3 col-form-label text-end">Nama</label>
                        <div class="col-lg-7">
                            <input type="text" name="nama" id="nama" class="form-control rounded shadow-sm" required autofocus placeholder="Masukkan nama">
                            <span class="help-block with-errors text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="telepon" class="col-lg-3 col-form-label text-end">Telepon</label>
                        <div class="col-lg-7">
                            <input type="text" name="telepon" id="telepon" class="form-control rounded shadow-sm" required placeholder="Masukkan nomor telepon">
                            <span class="help-block with-errors text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="alamat" class="col-lg-3 col-form-label text-end">Alamat</label>
                        <div class="col-lg-7">
                            <textarea name="alamat" id="alamat" rows="3" class="form-control rounded shadow-sm" placeholder="Masukkan alamat lengkap"></textarea>
                            <span class="help-block with-errors text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between px-4">
                    <button type="submit" class="btn" style="background-color: #079805; color: #ffffff; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px; transition: box-shadow 0.3s ease;">
                        <i class="fa fa-floppy-o" aria-hidden="true" style="margin-right: 8px;"></i>Simpan
                      </button>
            
                    <button type="button" class="btn btn-danger" id="btn-cancel" style="background-color: #f30505; color: #ffffff; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px; transition: box-shadow 0.3s ease;">
                        <i class="fa fa-ban" aria-hidden="true" style="margin-right: 8px;"></i>Batal
                      </button>
                </div>
            </div>
        </form>
    </div>
</div>
