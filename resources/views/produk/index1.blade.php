@extends('layouts.master')

{{-- @section('title')
    Daftar Produk
@endsection --}}

@section('breadcrumb')
    @parent
    <li class="active">Daftar Produk</li>
@endsection


@section('content')
<h1 style="margin: 0; font-size: 24px; font-weight: 700; margin-top: -8px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; letter-spacing: 1px; color: #333; text-shadow: 1px 1px 2px rgba(0,0,0,0.1);">
    Daftar Produk
</h1>
<div class="row">
    <div class="col-md-12" style="margin-top: 30px;">
        <div class="box" style="border-radius: 8px;">
            <div class="box-header with-border" style="border-radius: 8px;">
                <div class="btn-group" style="margin-bottom: 20px;">
                    <button onclick="addForm('{{ route('produk.store') }}')" class="btn btn-success btn-xs btn-flat" style="font-size: 16px; padding: 10px 20px; border-radius: 3px; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px; margin-right: 10px; margin-top: -29px;"><i class="fa fa-plus-circle"></i> Tambah</button>

                    <button onclick="deleteSelected('{{ route('produk.delete_selected') }}')" class="btn btn-danger btn-xs btn-flat" style="font-size: 16px; padding: 10px 20px; border-radius: 3px; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px; margin-right: 10px; margin-top: -29px;"><i class="fa fa-trash"></i> Hapus</button>

                    <button onclick="cetakBarcode('{{ route('produk.cetak_barcode') }}')" class="btn btn-info btn-xs btn-flat" style="font-size: 16px; padding: 10px 20px; border-radius: 3px; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px; margin-top: -29px;"><i class="fa fa-barcode"></i> Cetak Barcode</button>
                </div>
            </div>
            <div class="box-body table-responsive">
                <form action="" method="post" class="form-produk">
                    @csrf
                    <table class="table table-striped table-bordered" style="font-size: 16px;">
                        <thead>
                            <tr>
                                <th width="5%">
                                    <input type="checkbox" name="select_all" id="select_all">
                                </th>
                                <th width="5%">No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Merk</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Diskon</th>
                                <th>Stok</th>
                                <th width="15%"><i class="fa fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data tabel produk akan muncul di sini -->
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>



@includeIf('produk.form')
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
                url: '{{ route('produk.data') }}',
            },
            columns: [
                {data: 'select_all', searchable: false, sortable: false},
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'kode_produk'},
                {data: 'nama_produk'},
                {data: 'nama_kategori'},
                {data: 'merk'},
                {data: 'harga_beli'},
                {data: 'harga_jual'},
                {data: 'diskon'},
                {data: 'stok'},
                {data: 'aksi', searchable: false, sortable: false},
            ]
        });

        $('#modal-form').validator().on('submit', function (e) {
            if (!e.preventDefault()) {
                $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
                .done((response) => {
    if (response && response.produk_nama) {
        $('#modal-form').modal('hide');
        table.ajax.reload();

        Swal.fire({
            icon: 'success',
            title: 'Produk berhasil disimpan',
            text: `Produk ${response.produk_nama} telah berhasil disimpan.`,
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
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Terjadi Kesalahan',
            text: 'Nama produk tidak ditemukan di respons.',
            showConfirmButton: true,
        });
    }
})



                    .fail((errors) => {
                        // Cek jika error terkait duplikasi nama produk
                        if (errors.responseJSON && errors.responseJSON.error === 'duplicate_entry') {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Produk sudah ada',
                                text: `Produk dengan nama ${$('#modal-form [name=nama_produk]').val()} sudah ada di database.`,
                                showConfirmButton: true,
                            });
                        } else {
                            // Menampilkan SweetAlert jika gagal menyimpan data
                            Swal.fire({
                                icon: 'error',
                                title: 'Tidak dapat menyimpan data',
                                text: 'Terjadi masalah saat menyimpan produk.',
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
                        }
                        return;
                    });
            }
        });

        $('[name=select_all]').on('click', function () {
            $(':checkbox').prop('checked', this.checked);
        });
    });

    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Produk');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama_produk]').focus();
    }

    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Produk');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=nama_produk]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=nama_produk]').val(response.nama_produk);
                $('#modal-form [name=id_kategori]').val(response.id_kategori);
                $('#modal-form [name=merk]').val(response.merk);
                $('#modal-form [name=harga_beli]').val(response.harga_beli);
                $('#modal-form [name=harga_jual]').val(response.harga_jual);
                $('#modal-form [name=diskon]').val(response.diskon);
                $('#modal-form [name=stok]').val(response.stok);
            })
            .fail((errors) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Tidak dapat menampilkan data',
                    text: 'Data produk tidak ditemukan.',
                    showConfirmButton: true
                });
                return;
            });
    }

    function deleteData(url, nama_produk) {
        // Menampilkan konfirmasi sebelum menghapus data
        Swal.fire({
            icon: 'warning',
            title: 'Apakah Anda yakin?',
            text: `Apakah Anda yakin ingin menghapus produk ${nama_produk}?`,
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
                        title: 'Produk berhasil dihapus',
                        text: `Produk ${nama_produk} telah berhasil dihapus.`,
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

    function deleteSelected(url) {
        if ($('input:checked').length > 1) {
            Swal.fire({
                icon: 'warning',
                title: 'Apakah Anda yakin?',
                text: 'Apakah Anda yakin ingin menghapus produk terpilih?',
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
                    $.post(url, $('.form-produk').serialize())
                        .done((response) => {
                            table.ajax.reload();
                            Swal.fire({
                                icon: 'success',
                                title: 'Produk berhasil dihapus',
                                text: 'Produk terpilih telah berhasil dihapus.',
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
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Pilih produk yang ingin dihapus.',
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
        }
    }
    function cetakBarcode(url) {
        if ($('input:checked').length < 1) {
            Swal.fire({
                icon: 'warning',
                title: 'Pilih data yang akan dicetak',
                text: 'Pilih produk yang akan dicetak terlebih dahulu.',
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
            return;
        } else if ($('input:checked').length < 3) {
            Swal.fire({
                icon: 'warning',
                title: 'Pilih minimal 3 data untuk dicetak',
                text: 'Pilih minimal 3 produk untuk dicetak barcode-nya.',
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
            return;
        }
        $('.form-produk').attr('action', url);
        $('.form-produk').submit();
    }

</script>


@endpush