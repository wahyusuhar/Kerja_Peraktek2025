@extends('layouts.master1')

@section('content')
<div class="row">
    <div class="col-lg-12" style="margin-top: 60px;">
        <div class="box" style="border-radius: 8px;">
            <div class="box-header with-border" style="border-radius: 8px;">
                <div class="btn-group" style="margin-bottom: 20px;">
                <button onclick="addForm('{{ route('supplier.store') }}')" class="btn btn-success btn-xs btn-flat" style="font-size: 16px; padding: 10px 20px; border-radius: 3px; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px; margin-right: 10px; margin-top: -29px;"><i class="fa fa-plus-circle"></i> Tambah Supllier</button>
            </div>
            </div>

            <div class="d-flex justify-content-start">
                <h5 class="modal-title text-white bg-primary text-center px-4 py-2" style=" max-width: 250px; width: 100%; font-weight: 600; font-size: 20px;border-radius: 3px;"> <i class="fa-solid fa-book-open me-3"></i> Daftar Supplier </h5>
            </div>
            <div class="box-body table-responsive"  style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px; border-radius: 8px;">
                <form action="" method="post" class="form-member">
                    @csrf
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                             
                                <th width="5%" style="background-color: #322fe1; color: white;">No</th>
                                <th style="background-color: #322fe1; color: white;">Nama</th>
                                <th style="background-color: #322fe1; color: white;">Telepon</th>
                                <th style="background-color: #322fe1; color: white;">Alamat</th>
                                <th width="15%" style="background-color: #322fe1; color: white;"><i class="fa fa-cog"></i></th>
                            </tr>
                        </thead>
                    </table>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@includeIf('supplier.form')
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
                url: '{{ route('supplier.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'nama'},
                {data: 'telepon'},
                {data: 'alamat'},
                {data: 'aksi', searchable: false, sortable: false},
            ]
        });

        // Submit form dengan validator
// Submit form dengan validator
$('#modal-form').validator().on('submit', function (e) {
    if (!e.preventDefault()) {
        const form = $('#modal-form form');
        const isEdit = form.find('[name=_method]').val() === 'put';
        const nama = form.find('[name=nama]').val();

        $.post(form.attr('action'), form.serialize())
            .done((response) => {
                $('#modal-form').modal('hide');
                table.ajax.reload();

                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: isEdit 
                        ? `Data supplier ${nama} berhasil di edit.` 
                        : `Data supplier ${nama} berhasil ditambahkan.`,
                    timer: 2000,
                    showConfirmButton: false
                });
            })
            .fail(() => {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Data gagal disimpan.'
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
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Supplier');
        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama]').focus();
    }

    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Supplier');
        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=nama]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=nama]').val(response.nama);
                $('#modal-form [name=telepon]').val(response.telepon);
                $('#modal-form [name=alamat]').val(response.alamat);
            })
            .fail((errors) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Tidak dapat menampilkan data.'
                });
            });
    }

    function deleteData(url, nama) {
        // Menampilkan konfirmasi sebelum menghapus data
        Swal.fire({
            icon: 'warning',
            title: 'Apakah Anda yakin?',
            text: `Apakah Anda yakin ingin menghapus Data Supplier ${nama}?`,
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            customClass: {
                popup: 'swal-large-popup'
            },
            didOpen: () => {
                const popup = document.querySelector('.swal2-popup');
                popup.style.fontSize = '15px';
                popup.style.width = '50%';
                popup.style.maxWidth = '550px';
                popup.style.padding = '20px';
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    table.ajax.reload();
                    Swal.fire({
                        icon: 'success',
                        title: ' Berhasil dihapus',
                        text: `Data Supplier ${nama} telah berhasil dihapus.`,
                        showConfirmButton: true,
                        customClass: {
                            popup: 'swal-large-popup'
                        },
                        didOpen: () => {
                            const popup = document.querySelector('.swal2-popup');
                            popup.style.fontSize = '15px';
                            popup.style.width = '50%';
                            popup.style.maxWidth = '550px';
                            popup.style.padding = '20px';
                        }
                    });
                })
                .fail((errors) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Tidak dapat menghapus data',
                        text: 'Data produk tidak dapat dihapus.',
                        showConfirmButton: true,
                        customClass: {
                            popup: 'swal-large-popup'
                        },
                        didOpen: () => {
                            const popup = document.querySelector('.swal2-popup');
                            popup.style.fontSize = '15px';
                            popup.style.width = '50%';
                            popup.style.maxWidth = '550px';
                            popup.style.padding = '20px';
                        }
                    });
                });
            }
        });
    }


</script>

@endpush