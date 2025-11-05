<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post')

            <div class="modal-content shadow" style="width: 650px;">
                <!-- Header Modal -->
                <div class="d-flex justify-content-center">
                    <h5 class="modal-title text-white bg-primary text-center px-4 py-2"
                        style="
                            max-width: 330px;
                            width: 100%;
                            font-weight: 600;
                            font-size: 20px;
                            border-radius: 0 0 8px 8px;
                            box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
                        ">
                        <i class="fa fa-box mr-2"></i> 
                    </h5>
                </div>

              <!-- Body Modal -->
                    <div class="modal-body">
                        <div class="form-group row mb-3">
                            <label for="deskripsi" class="col-lg-3 col-form-label">Deskripsi</label>
                            <div class="col-lg-7">
                                <textarea name="deskripsi" id="deskripsi" class="form-control rounded shadow-sm" rows="4" required autofocus></textarea>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="nominal" class="col-lg-3 col-form-label">Nominal</label>
                            <div class="col-lg-7">
                                <input type="number" name="nominal" id="nominal" class="form-control rounded shadow-sm" required>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                    </div>

                <!-- Footer Modal -->
                <div class="modal-footer justify-content-between px-4 pb-3">
                    <button type="submit" class="btn"
                        style="background-color: #079805; color: #ffffff; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <i class="fa fa-floppy-o me-2" aria-hidden="true"></i> Simpan
                    </button>

                    <button type="button" class="btn btn-danger" id="btn-cancel"
                        style="background-color: #f30505; color: #ffffff; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <i class="fa fa-ban me-2" aria-hidden="true"></i> Batal
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
