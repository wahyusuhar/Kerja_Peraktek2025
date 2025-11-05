@extends('layouts.master1')

@section('content')
<div class="row" >
    <div class="col-lg-12">
        <div class="box box-custom">
            <div class="box-body table-responsive" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px; border-radius: 8px;">
                <table class="table table-stiped table-bordered table-penjualan">
                    <thead>
                        <th width="5%" style="background-color: #322fe1; color: white;">No</th>
                        <th style="background-color: #322fe1; color: white;">Tanggal</th>
                        <th style="background-color: #322fe1; color: white;">Kode Member</th>
                        <th style="background-color: #322fe1; color: white;">Total Item</th>
                        <th style="background-color: #322fe1; color: white;">Total Harga</th>
                        <th style="background-color: #322fe1; color: white;">Diskon</th>
                        <th style="background-color: #322fe1; color: white;">Total Bayar</th>
                        <th style="background-color: #322fe1; color: white;">Kasir</th>
                        <th width="15%" style="background-color: #322fe1; color: white;"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('penjualan.detail')
@endsection

@push('scripts')

<script>
    function cetakNota(url) {
        window.open(url, '_blank');
    }
</script>

<script>
    let table, table1;

    $(function () {
        table = $('.table-penjualan').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('penjualan.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'tanggal'},
                {data: 'kode_member'},
                {data: 'total_item'},
                {data: 'total_harga'},
                {data: 'diskon'},
                {data: 'bayar'},
                {data: 'kasir'},
                {data: 'aksi', searchable: false, sortable: false},
            ]
        });

        table1 = $('.table-detail').DataTable({
            processing: true,
            bSort: false,
            dom: 'Brt',
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'kode_produk'},
                {data: 'nama_produk'},
                {data: 'harga_jual'},
                {data: 'jumlah'},
                {data: 'subtotal'},
            ]
        })
    });

    function showDetail(url) {
        $('#modal-detail').modal('show');

        table1.ajax.url(url);
        table1.ajax.reload();
    }

    function deleteData(url, nama) {
    Swal.fire({
        title: 'Apakah kamu yakin?',
        html: `Akan menghapus data penjualan <br/><strong>(${nama})</strong>?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post(url, {
                '_token': $('[name=csrf-token]').attr('content'),
                '_method': 'delete'
            })
            .done((response) => {
                table.ajax.reload();

                Swal.fire({
                    title: 'Berhasil!',
                    html: `Data penjualan <br/><strong>(${nama})</strong> telah dihapus.`,
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                });
            })
            .fail((errors) => {
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Data tidak dapat dihapus.',
                    icon: 'error'
                });
            });
        }
    });
}


</script>
@endpush