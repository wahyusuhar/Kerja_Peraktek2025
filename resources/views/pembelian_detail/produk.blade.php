<div class="modal fade" id="modal-produk" tabindex="-1" role="dialog" aria-labelledby="modal-produk">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-white position-relative" style="padding: 0;">
                <!-- Tombol close di kiri -->
                <button type="button" class="btn text-white bg-danger px-3 py-2 border-0 rounded-0"
                        data-bs-dismiss="modal" aria-label="Close"
                        style="position: absolute; left: 0; top: 0; z-index: 2;">
                    <i class="fa fa-times"></i>
                </button>
            
                <!-- Judul di tengah -->
                <div class="w-100 d-flex justify-content-center align-items-center py-3">
                    <h5 class="modal-title text-white  text-center px-4 py-2 mb-0"
                        style="
                            font-weight: 600; 
                            font-size: 20px;
                            border-radius: 8px;
                            box-shadow: rgb(38, 57, 77) 0px 10px 20px -10px;
                            background-color: #163696FF;
                        ">
                        <i class="fa fa-truck me-2"></i> Pilih Produk
                    </h5>
                </div>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered table-produk">
                    <thead>
                        <th width="5%" style="background-color: #322fe1; color: white;">No</th>
                        <th style="background-color: #322fe1; color: white;">Kode</th>
                        <th style="background-color: #322fe1; color: white;">Nama</th>
                        <th style="background-color: #322fe1; color: white;">Harga Beli</th>
                        <th style="background-color: #322fe1; color: white;"><i class="fa fa-cog"></i></th>
                    </thead>
                    <tbody>
                        @foreach ($produk as $key => $item)
                            <tr>
                                <td width="5%">{{ $key+1 }}</td>
                                <td><span class="label label-success">{{ $item->kode_produk }}</span></td>
                                <td>{{ $item->nama_produk }}</td>
                                <td>{{ $item->harga_beli }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-xs btn-flat"
                                        onclick="pilihProduk('{{ $item->id_produk }}', '{{ $item->kode_produk }}')">
                                        <i class="fa fa-check-circle"></i>
                                        Pilih
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>