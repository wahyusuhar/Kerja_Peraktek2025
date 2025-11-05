@extends('layouts.master1')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <button onclick="updatePeriode()" class="btn btn-info btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Ubah Periode</button>
                <a href="{{ route('laporan.export_pdf', [$tanggalAwal, $tanggalAkhir]) }}" target="_blank" 
                class="btn btn-danger btn-xs btn-flat">
                <i class="fa fa-file-pdf-o"></i> Export PDF
             </a>
             
            </div>
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%"  style="background-color: #322fe1; color: white;">No</th>
                        <th style="background-color: #322fe1; color: white;">Tanggal</th>
                        <th style="background-color: #322fe1; color: white;">Penjualan</th>
                        <th style="background-color: #322fe1; color: white;">Pembelian</th>
                        <th style="background-color: #322fe1; color: white;">Pengeluaran</th>
                        <th style="background-color: #322fe1; color: white;">Pendapatan</th>
                        {{-- <th style="background-color: #322fe1; color: white;">Action</th>  --}}
                    </thead>
                    
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('laporan.form')
@endsection

@push('scripts')
<!-- Flatpickr JS & Locale -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>
{{-- <script src="{{ asset('/AdminLTE-2/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script> --}}
<script>
    let table;

    $(function () {
        table = $('.table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('laporan.data', [$tanggalAwal, $tanggalAkhir]) }}',
            },


            columns: [
    {data: 'DT_RowIndex', searchable: false, sortable: false},
    {data: 'tanggal'},
    {
        data: 'penjualan',
        render: function(data, type, row) {
            return `${data} <a href="{{ route('penjualan.index') }}" class="btn btn-xs btn-link text-primary" title="Lihat Penjualan">
                        <i class="fa fa-eye"></i>
                    </a>`;
        }
    },
    {
        data: 'pembelian',
        render: function(data, type, row) {
            return `${data} <a href="{{ route('pembelian.index') }}" class="btn btn-xs btn-link text-success" title="Lihat Pembelian">
                        <i class="fa fa-eye"></i>
                    </a>`;
        }
    },
    {
    data: 'pengeluaran',
    render: function(data, type, row) {
        // jika data adalah "Total Pendapatan", tampilkan polos tanpa icon
        if (typeof data === 'string' && data.toLowerCase().includes('total pendapatan')) {
            return data;
        }
        return `${data} <a href="{{ route('pengeluaran.index') }}" 
                    class="btn btn-xs btn-link text-danger" 
                    title="Lihat Pengeluaran">
                    <i class="fa fa-eye"></i>
                </a>`;
    }
},

    {data: 'pendapatan'} // polos, tanpa ikon
],


            dom: 'Brt',
            bSort: false,
            bPaginate: false,
        });

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });

    function updatePeriode() {
        $('#modal-form').modal('show');
    }
</script>
@endpush