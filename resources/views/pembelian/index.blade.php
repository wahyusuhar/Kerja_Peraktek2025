@extends('layouts.master1')

@section('content')
<div class="row">
    <div class="col-lg-12" style="margin-top: 40px;">
        <div class="box">
            <div class="box-header with-border">
                <div class="btn-group" style="margin-bottom: 10px; top: -9px;">
                <button onclick="addForm()" class="btn btn-success btn-xs btn-flat" style="font-size: 17px; padding: 8px 16px; border-radius: 3px; margin: 5px; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px; "><i class="fa fa-plus-circle"></i> Transaksi Baru</button>
                @empty(! session('id_pembelian'))
                <a href="{{ route('pembelian_detail.index') }}" class="btn btn-info btn-xs btn-flat" style="font-size: 17px; padding: 8px 16px; border-radius: 3px; margin: 5px; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;  "><i class="fa fa-pencil"></i> Transaksi Aktif</a>
                @endempty
                </div>
            </div>
            <div class="d-flex justify-content-start">
                <h5 class="modal-title text-white bg-primary text-center px-4 py-2" style=" max-width: 250px; width: 100%; font-weight: 600; font-size: 20px;border-radius: 3px;"> <i class="fa-solid fa-book-open me-3"></i> Pembelian </h5>
            </div>
            <div class="box-body table-responsive" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px; border-radius: 8px;">
                <table class="table table-stiped table-bordered table-pembelian">
                    <thead>
                        <th width="5%">No</th>
                        <th>Tanggal</th>
                        <th>Supplier</th>
                        <th>Total Item</th>
                        <th>Total Harga</th>
                        <th>Diskon</th>
                        <th>Total Bayar</th>
                        <th width="15%"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('pembelian.supplier')
@includeIf('pembelian.detail')
@endsection

@push('scripts')
<script>
    let table, table1;

    $(function () {
        table = $('.table-pembelian').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('pembelian.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'tanggal'},
                {data: 'supplier'},
                {data: 'total_item'},
                {data: 'total_harga'},
                {data: 'diskon'},
                {data: 'bayar'},
                {data: 'aksi', searchable: false, sortable: false},
            ]
        });

        $('.table-supplier').DataTable();
        table1 = $('.table-detail').DataTable({
            processing: true,
            bSort: false,
            dom: 'Brt',
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'kode_produk'},
                {data: 'nama_produk'},
                {data: 'harga_beli'},
                {data: 'jumlah'},
                {data: 'subtotal'},
            ]
        });
    });

    $('#btn-cancel, #modal-form .close').on('click', function () {
        $('#modal-form').modal('hide');
    });

    function addForm() {
        $('#modal-supplier').modal('show');
    }

    function showDetail(url) {
        $('#modal-detail').modal('show');
        table1.ajax.url(url);
        table1.ajax.reload();
    }

    function deleteData(url, nama_pembelian) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: ` Akan Menghapus Data Pembelian ${nama_pembelian} ?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                    .done(() => {
                        table.ajax.reload();
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: `Pembelian ${nama_pembelian} berhasil dihapus.`,
                            timer: 2000,
                            showConfirmButton: false
                        });
                    })
                    .fail(() => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Tidak dapat menghapus data.'
                        });
                    });
            }
        });
    }

    // Tambahkan pemanggilan ini ketika data pembelian berhasil ditambah
    function showSuccessTambah(nama_pembelian) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: `Data pembelian (${nama_pembelian}) berhasil ditambahkan`,
            timer: 2500,
            showConfirmButton: false
        });
    }
</script>

@endpush