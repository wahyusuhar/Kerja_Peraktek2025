@extends('layouts.master1')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="box box-custom">
            <div class="box-header-custom">
                <table class="info-table">
                    <tr><td>Supplier</td><td>: {{ $supplier->nama }}</td></tr>
                    <tr><td>Telepon</td><td>: {{ $supplier->telepon }}</td></tr>
                    <tr><td>Alamat</td><td>: {{ $supplier->alamat }}</td></tr>
                </table>
            </div>

            <div class="box-body form-section">
                <form class="form-produk mb-4">
                    @csrf
                    <div class="form-group row align-items-center">
                        <label for="kode_produk" class="col-lg-2 col-form-label" style="background: linear-gradient(90deg, #0a33c5, #030364); border: none; width: 130px; height: 48px; border-radius: 5px ; color: #fff; font-weight: bold; margin-left: 18px;">Kode Produk</label>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <input type="hidden" name="id_pembelian" id="id_pembelian" value="{{ $id_pembelian }}" >
                                <input type="hidden" name="id_produk" id="id_produk">
                                <input type="text" class="form-control rounded shadow-sm" name="kode_produk" id="kode_produk"placeholder="Masukkan kode produk">
                                <div class="input-group-append">
                                    <button onclick="tampilProduk()" class="btnbtn-flat" type="button" style="background: linear-gradient(90deg, #0a33c5, #030364); border: none; width: 50px; height: 48px; border-radius: 0 5px 5px 0; color: #fff;">
                                        <i class="fa fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <table class="table table-striped table-bordered table-pembelian">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th width="15%">Jumlah</th>
                            <th>Subtotal</th>
                            <th width="15%"><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                </table>

                <div class="row mt-4">
                    <div class="col-lg-8">
                        <div class="tampil-bayar">Bayar Rp. 0</div>
                        <div class="tampil-terbilang">Nol Rupiah</div>
                    </div>

                    <div class="col-lg-4" style="box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;">
                        <form action="{{ route('pembelian.store') }}" class="form-pembelian" method="post">
                            @csrf
                            <input type="hidden" name="id_pembelian" value="{{ $id_pembelian }}">
                            <input type="hidden" name="total" id="total">
                            <input type="hidden" name="total_item" id="total_item">
                            <input type="hidden" name="bayar" id="bayar">

                            <div class="form-group row">
                                <label for="totalrp" class="col-lg-3 col-form-label">Total</label>
                                <div class="col-lg-9">
                                    <input type="text" id="totalrp" class="form-control rounded shadow-sm" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="diskon" class="col-lg-3 col-form-label">Diskon</label>
                                <div class="col-lg-9">
                                    <input type="number" name="diskon" id="diskon" class="form-control rounded shadow-sm" value="{{ $diskon }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bayar" class="col-lg-3 col-form-label">Bayar</label>
                                <div class="col-lg-9">
                                    <input type="text" id="bayarrp" class="form-control rounded shadow-sm">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="box-footer text-end mt-3">
                <button type="submit" class="btn btn-simpan">
                    <i class="fa fa-floppy-o"></i> Simpan Transaksi
                </button>
            </div>
        </div>
    </div>
</div>

@includeIf('pembelian_detail.produk')
@endsection

@push('scripts')
<script>
    let table, table2;

    $(function () {
        $('body').addClass('sidebar-collapse');

        table = $('.table-pembelian').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('pembelian_detail.data', $id_pembelian) }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'kode_produk'},
                {data: 'nama_produk'},
                {data: 'harga_beli'},
                {data: 'jumlah'},
                {data: 'subtotal'},
                {data: 'aksi', searchable: false, sortable: false},
            ],
            dom: 'Brt',
            bSort: false,
            paginate: false
        })
        .on('draw.dt', function () {
            loadForm($('#diskon').val());
        });
        table2 = $('.table-produk').DataTable();

        $(document).on('input', '.quantity', function () {
            let id = $(this).data('id');
            let jumlah = parseInt($(this).val());

            if (jumlah < 1) {
                $(this).val(1);
                alert('Jumlah tidak boleh kurang dari 1');
                return;
            }
            if (jumlah > 10000) {
                $(this).val(10000);
                alert('Jumlah tidak boleh lebih dari 10000');
                return;
            }

            $.post(`{{ url('/pembelian_detail') }}/${id}`, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'put',
                    'jumlah': jumlah
                })
                .done(response => {
                    $(this).on('mouseout', function () {
                        table.ajax.reload(() => loadForm($('#diskon').val()));
                    });
                })
                .fail(errors => {
                    alert('Tidak dapat menyimpan data');
                    return;
                });
        });

        $(document).on('input', '#diskon', function () {
            if ($(this).val() == "") {
                $(this).val(0).select();
            }

            loadForm($(this).val());
        });

        $('.btn-simpan').on('click', function () {
            $('.form-pembelian').submit();
        });
    });

    function tampilProduk() {
        $('#modal-produk').modal('show');
    }

    function hideProduk() {
        $('#modal-produk').modal('hide');
    }

    function pilihProduk(id, kode) {
        $('#id_produk').val(id);
        $('#kode_produk').val(kode);
        hideProduk();
        tambahProduk();
    }

    function tambahProduk() {
        $.post('{{ route('pembelian_detail.store') }}', $('.form-produk').serialize())
            .done(response => {
                $('#kode_produk').focus();
                table.ajax.reload(() => loadForm($('#diskon').val()));
            })
            .fail(errors => {
                alert('Tidak dapat menyimpan data');
                return;
            });
    }

    function deleteData(url) {
    Swal.fire({
        title: 'Yakin ingin menghapus data?',
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post(url, {
                '_token': $('[name=csrf-token]').attr('content'),
                '_method': 'delete'
            })
            .done((response) => {
                table.ajax.reload(() => {
                    if (typeof loadForm === "function") {
                        loadForm($('#diskon').val());
                    }
                });

                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data berhasil dihapus.',
                    timer: 2000,
                    showConfirmButton: false
                });
            })
            .fail((errors) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Tidak dapat menghapus data!',
                    showConfirmButton: true
                });
            });
        }
    });
}


    function loadForm(diskon = 0) {
        $('#total').val($('.total').text());
        $('#total_item').val($('.total_item').text());

        $.get(`{{ url('/pembelian_detail/loadform') }}/${diskon}/${$('.total').text()}`)
            .done(response => {
                $('#totalrp').val('Rp. '+ response.totalrp);
                $('#bayarrp').val('Rp. '+ response.bayarrp);
                $('#bayar').val(response.bayar);
                $('.tampil-bayar').text('Rp. '+ response.bayarrp);
                $('.tampil-terbilang').text(response.terbilang);
            })
            .fail(errors => {
                alert('Tidak dapat menampilkan data');
                return;
            })
    }
</script>
@endpush