@extends('layouts.master1')

@section('content')

<div class="row">
    <div class="col-lg-12" style="margin-top: 40px;">
        <div class="box" style="border-radius: 8px;">
            <div class="box-header with-border" style="border-radius: 8px;">
            <div class="btn-group" style="margin-bottom: 10px; top: -9px;">

                <button onclick="addForm('{{ route('pengeluaran.store') }}')" class="btn btn-success btn-xs btn-flat" style="font-size: 17px; padding: 8px 16px; border-radius: 3px; margin: 5px; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;  "><i class="fa fa-plus-circle"></i> Tambah Pengeluaran</button>
            </div>

            <div class="d-flex justify-content-start">
                <h5 class="modal-title text-white bg-primary text-center px-4 py-2" style=" max-width: 250px; width: 100%; font-weight: 600; font-size: 20px;border-radius: 3px;"> <i class="fa-solid fa-book-open me-3"></i> Pengeluaran </h5>
            </div>
            <div class="box-body table-responsive" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px; border-radius: 8px;">
                <form action="" method="post" class="form-member">
                    @csrf
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                
                                <th width="5%" style="background-color: #322fe1; color: white;">No</th>
                                <th style="background-color: #322fe1; color: white;">Tanggal</th>
                                <th style="background-color: #322fe1; color: white;">Deskripsi</th>
                                <th style="background-color: #322fe1; color: white;">Nominal</th>
                              
                                <th width="15%" style="background-color: #322fe1; color: white;"><i class="fa fa-cog"></i></th>
                            </tr>
                        </thead>
                    </table>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@includeIf('pengeluaran.form')
@endsection


@push('scripts')
<script>
    let table;

    $(function () {
        table = $('.table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('pengeluaran.data') }}',
            },
            columns: [
                { data: 'DT_RowIndex', searchable: false, sortable: false },
                { data: 'created_at' },
                { data: 'deskripsi' },
                { data: 'nominal' },
                { data: 'aksi', searchable: false, sortable: false },
            ]
        });

        $('#btn-cancel, #modal-form .close').on('click', function () {
            $('#modal-form').modal('hide');
        });

        $('#modal-form').validator().on('submit', function (e) {
            if (!e.preventDefault()) {
                let formAction = $('#modal-form form').attr('action');
                let method = $('#modal-form [name=_method]').val();
                let nama = $('#modal-form [name=deskripsi]').val();

                $.post(formAction, $('#modal-form form').serialize())
                    .done((response) => {
                        $('#modal-form').modal('hide');
                        table.ajax.reload();

                        let pesan = (method === 'post')
                            ? `Pengeluaran "${nama}" berhasil ditambahkan.`
                            : `Pengeluaran "${nama}" berhasil di edit.`;

                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: pesan,
                            timer: 2000,
                            showConfirmButton: false
                        });
                    })
                    .fail((errors) => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Tidak dapat menyimpan data.'
                        });
                    });
            }
        });
    });

    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Pengeluaran');
        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=deskripsi]').focus();
    }

    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Pengeluaran');
        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=deskripsi]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=deskripsi]').val(response.deskripsi);
                $('#modal-form [name=nominal]').val(response.nominal);
            })
            .fail(() => {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Tidak dapat menampilkan data.'
                });
            });
    }

    function deleteData(url, nama) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: `Pengeluaran "${nama}" akan dihapus?`,
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
                            text: `Pengeluaran "${nama}" berhasil dihapus.`,
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
</script>

@endpush