<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-formLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form id="kategori-form" method="POST" class="form-horizontal">
        @csrf
        <input type="hidden" name="_method" value="POST"> {{-- Default POST untuk tambah, akan diubah jadi PUT saat edit --}}
        
        <div class="modal-content" style="box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 8px;">
          <div class="d-flex justify-content-center">
            <h5 class="modal-title text-white bg-primary text-center px-4 py-2"
                style="
                  max-width: 250px;
                  width: 100%;
                  font-weight: 600;
                  font-size: 24px; /* Membesarkan font */
                  border-radius: 0 0 8px 8px;
                  box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
                ">
              <i class="fa fa-box mr-2"></i> Tambah Kategori
            </h5>
          </div>
  
          <div class="modal-body">
            <div class="form-group">
                <label for="nama_kategori" class="control-label" style=" top: -110px; color: #080808;">Kategori</label>
                <input type="text" id="nama_kategori" name="nama_kategori" placeholder="Masukan Nama Kategori....." class="form-control" required autofocus style="border-radius: 8px; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px; transition: box-shadow 0.3s ease;   height: 50px;
                padding: 10px 15px;">
                <span class="help-block text-danger" id="nama_kategori-error"></span>
              </div>
              
          </div>
  
          <div class="modal-footer d-flex justify-content-between">
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
  