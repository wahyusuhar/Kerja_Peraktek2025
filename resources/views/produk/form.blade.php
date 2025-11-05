<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post">
            @csrf
            @method('post')

            <div class="modal-content shadow-lg border-0">
                <div class="d-flex justify-content-center">
                    <h5 class="modal-title text-white bg-primary text-center px-4 py-2"
                        style="
                          max-width: 400px;
                          width: 100%;
                          font-weight: 600;
                          font-size: 24px; /* Membesarkan font */
                          border-radius: 0 0 8px 8px;
                          box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
                        ">
                      <i class="fa fa-box mr-2"></i> Tambah Produk
                    </h5>
                  </div>

                <div class="modal-body py-4">
                    <div class="form-group row">
                        <label for="nama_produk" class="col-md-3 col-form-label text-md-right">Nama Produk</label>
                        <div class="col-md-7">
                            <input type="text" name="nama_produk" id="nama_produk" class="form-control rounded shadow-sm" placeholder="Masukkan nama produk" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_kategori" class="col-md-3 col-form-label text-md-right">Kategori</label>
                        <div class="col-md-7">
                            <select name="id_kategori" id="id_kategori" class="form-control rounded shadow-sm" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="merk" class="col-md-3 col-form-label text-md-right">Merk</label>
                        <div class="col-md-7">
                            <input type="text" name="merk" id="merk" class="form-control rounded shadow-sm" placeholder="Masukkan merk produk">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga_beli" class="col-md-3 col-form-label text-md-right">Harga Beli</label>
                        <div class="col-md-7">
                            <input type="number" name="harga_beli" id="harga_beli" class="form-control rounded shadow-sm" placeholder="0" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga_jual" class="col-md-3 col-form-label text-md-right">Harga Jual</label>
                        <div class="col-md-7">
                            <input type="number" name="harga_jual" id="harga_jual" class="form-control rounded shadow-sm" placeholder="0" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="diskon" class="col-md-3 col-form-label text-md-right">Diskon (%)</label>
                        <div class="col-md-7">
                            <input type="number" name="diskon" id="diskon" class="form-control rounded shadow-sm" value="0">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stok" class="col-md-3 col-form-label text-md-right">Stok</label>
                        <div class="col-md-7">
                            <input type="number" name="stok" id="stok" class="form-control rounded shadow-sm" value="0" required>
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
