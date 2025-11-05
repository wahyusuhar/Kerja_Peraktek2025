@extends('layouts.master1')


@section('content')
<div class="row">
    <div class="col-lg-12" style="margin-top: 60px;">
        <div class="box" style="border-radius: 8px;">
            <div class="box-header with-border" style="border-radius: 8px;">
                <div class="btn-group" style="margin-bottom: 20px;">
                <button onclick="addForm('{{ route('user.store') }}')" class="btn btn-success btn-xs btn-flat" style="font-size: 16px; padding: 10px 20px; border-radius: 3px; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px; margin-right: 10px; margin-top: -29px;"><i class="fa fa-plus-circle"></i> Tambah Kasir</button>
            </div>
            </div>

            <div class="d-flex justify-content-start">
                <h5 class="modal-title text-white bg-primary text-center px-4 py-2" style=" max-width: 250px; width: 100%; font-weight: 600; font-size: 20px;border-radius: 3px;"> <i class="fa-solid fa-book-open me-3"></i> Daftar Kasir </h5>
            </div>
            <div class="box-body table-responsive"  style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px; border-radius: 8px;">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%" style="background-color: #322fe1; color: white;">No</th>
                        <th style="background-color: #322fe1; color: white;">Nama</th>
                        <th style="background-color: #322fe1; color: white;">Email</th>
                        <th width="15%" style="background-color: #322fe1; color: white;"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('user.form')
@endsection



@push('scripts')
<script>
    let table;
    let isEdit = false;
    let currentName = ''; // nama user yang sedang diproses (untuk notifikasi)
    
    $(function () {
        table = $('.table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('user.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'name'},
                {data: 'email'},
                {data: 'aksi', searchable: false, sortable: false},
            ]
        });
    
        $('#modal-form').validator().on('submit', function (e) {
            if (!e.preventDefault()) {
                currentName = $('#modal-form [name=name]').val();
                $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
                    .done((response) => {
                        $('#modal-form').modal('hide');
                        table.ajax.reload();
    
                        Swal.fire({
                            icon: 'success',
                            title: isEdit ? 'User berhasil diperbarui' : 'User berhasil ditambahkan',
                            text: `Data user "${currentName}" telah berhasil ${isEdit ? 'diperbarui' : 'ditambahkan'}.`,
                            showConfirmButton: false,
                            timer: 2500
                        });
                    })
                    .fail((errors) => {
                        let message = 'Pastikan semua input valid atau email belum terdaftar.';
                        if (errors.responseJSON && errors.responseJSON.errors) {
                            message = Object.values(errors.responseJSON.errors).join('<br>');
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal menyimpan data',
                            html: message,
                            showConfirmButton: true
                        });
                    });

            }
        });
    
        // Tombol batal & close modal
        $('#btn-cancel, #modal-form .close').on('click', function () {
            $('#modal-form').modal('hide');
        });
    });
    
    function addForm(url) {
        isEdit = false;
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah User');
        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=name]').focus();
        $('#password, #password_confirmation').attr('required', true);
    }
    
    function editForm(url) {
        isEdit = true;
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit User');
        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=name]').focus();
        $('#password, #password_confirmation').attr('required', false);
    
        $.get(url)
            .done((response) => {
                currentName = response.name;
                $('#modal-form [name=name]').val(response.name);
                $('#modal-form [name=email]').val(response.email);
            })
            .fail(() => {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal menampilkan data',
                    text: 'Data user tidak ditemukan.',
                    showConfirmButton: true
                });
            });
    }
    
    function deleteData(url, name) {
        Swal.fire({
            title: `Yakin ingin menghapus data user "${name}"?`,
            text: "Data yang dihapus tidak bisa dikembalikan!",
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
                .done(() => {
                    table.ajax.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: `User "${name}" berhasil dihapus.`,
                        showConfirmButton: false,
                        timer: 2000
                    });
                })
                .fail(() => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal menghapus',
                        text: 'Terjadi kesalahan saat menghapus data.',
                        showConfirmButton: true
                    });
                });
            }
        });
    }
    </script>
    
@endpush
