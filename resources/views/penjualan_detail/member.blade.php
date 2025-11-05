<div class="modal fade" id="modal-member" tabindex="-1" role="dialog" aria-labelledby="modal-member">
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
                        <i class="fa fa-truck me-2"></i> Pilih Member
                    </h5>
                </div>
            </div>
            <div class="box-body table-responsive" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px; border-radius: 8px;">
                <table class="table table-striped table-bordered table-member">
                    <thead>
                        <th width="10%" style="background-color: #322fe1; color: white;">No</th>
                        <th style="background-color: #322fe1; color: white;">Nama</th>
                        <th style="background-color: #322fe1; color: white;">Telepon</th>
                        <th width="35%" style="background-color: #322fe1; color: white;">Alamat</th>
                        <th style="background-color: #322fe1; color: white;"><i class="fa fa-cog"></i></th>
                    </thead>
                    <tbody>
                        @foreach ($member as $key => $item)
                            <tr>
                                <td width="5%">{{ $key+1 }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->telepon }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-xs btn-flat"
                                        onclick="pilihMember('{{ $item->id_member }}', '{{ $item->kode_member }}')">
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