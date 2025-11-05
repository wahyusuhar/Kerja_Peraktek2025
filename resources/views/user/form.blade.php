<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
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
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="name" class="col-lg-3 col-lg-offset-1 control-label">Nama</label>
                        <div class="col-lg-6">
                            <input type="text" name="name" id="name" class="form-control rounded shadow-sm " required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-lg-3 col-lg-offset-1 control-label">Email</label>
                        <div class="col-lg-6">
                            <input type="email" name="email" id="email" class="form-control rounded shadow-sm" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-lg-3 col-lg-offset-1 control-label">Password</label>
                        <div class="col-lg-6">
                            <input type="password" name="password" id="password" class="form-control rounded shadow-sm" 
                            required
                            minlength="6">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password_confirmation" class="col-lg-3 col-lg-offset-1 control-label">Konfirmasi Password</label>
                        <div class="col-lg-6">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control rounded shadow-sm" 
                                required
                                data-match="#password">
                            <span class="help-block with-errors"></span>
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