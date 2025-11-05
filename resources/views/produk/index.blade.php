@extends('layouts.master1')
@section('content')
<div class="row">
    <div class="col-lg-12" style="margin-top: 60px;">
        <div class="box" style="border-radius: 8px;">
            <div class="box-header with-border" style="border-radius: 8px;">
                <div class="btn-group" style="margin-bottom: 20px; top: -29px;">

            <button onclick="addForm('{{ route('produk.store') }}')" class="btn btn-success btn-xs btn-flat" style="font-size: 17px; padding: 8px 16px; border-radius: 3px; margin: 5px; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;  "><i class="fa fa-plus-circle"></i> Tambah Produk</button>
  
            <button onclick="deleteSelected('{{ route('produk.delete_selected') }}')" class="btn btn-danger btn-xs btn-flat" style="font-size: 17px; padding: 8px 16px; border-radius: 3px; margin: 5px; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;"><i class="fa fa-trash"></i> Hapus</button>
  
            <button onclick="cetakBarcode('{{ route('produk.cetak_barcode') }}')" class="btn btn-info btn-xs btn-flat" style="font-size: 17px; padding: 8px 16px; border-radius: 3px; margin: 5px; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;"><i class="fa fa-barcode"></i> Cetak Barcode</button>
          </div>
        </div>
  
        <div class="d-flex justify-content-start" style="margin-top: 1px; padding-bottom: 10px;">
          <h5 class="modal-title text-white bg-primary text-center px-4 py-2" style="max-width: 250px; width: 100%; font-weight: 600; font-size: 20px; border-radius: 3px;"> 
            <i class="fa-solid fa-book-open me-3"></i> Daftar Produk 
          </h5>
        </div>
  
        <div class="box-body table-responsive" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px; border-radius: 8px;">
          <form action="" method="post" class="form-produk">
            @csrf
            <table class="table table-striped table-bordered" style="font-size: 14px; width: 100%; table-layout: fixed; word-wrap: break-word;">
              <thead>
                <tr style="background-color: #322fe1; color: #ffffff;">
                  <th style="width: 3%;"><input type="checkbox" name="select_all" id="select_all"></th>
                  <th style="width: 4%;">No</th>
                  <th style="width: 8%;">Kode</th>
                  <th style="width: 15%;">Nama</th>
                  <th style="width: 10%;">Kategori</th>
                  <th style="width: 10%;">Merk</th>
                  <th style="width: 10%;">Harga Beli</th>
                  <th style="width: 10%;">Harga Jual</th>
                  <th style="width: 8%;">Diskon</th>
                  <th style="width: 6%;">Stok</th>
                  <th style="width: 16%;"><i class="fa fa-cog"></i> Aksi</th>
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
let isEdit = false; // Tambahkan ini untuk membedakan tambah/edit

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
            { data: 'select_all', searchable: false, sortable: false },
            { data: 'DT_RowIndex', searchable: false, sortable: false },
            { data: 'kode_produk' },
            { data: 'nama_produk' },
            { data: 'nama_kategori' },
            { data: 'merk' },
            { data: 'harga_beli' },
            { data: 'harga_jual' },
            { data: 'diskon' },
            { data: 'stok' },
            { data: 'aksi', searchable: false, sortable: false },
        ]
    });

    $('#btn-cancel').on('click', function () {
        $('#modal-form').modal('hide');
    });

    $('#modal-form .close').on('click', function () {
        $('#modal-form').modal('hide');
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
                            title: isEdit ? 'Produk berhasil diperbarui' : 'Produk berhasil ditambahkan',
                            text: `Produk ${response.produk_nama} telah berhasil ${isEdit ? 'diperbarui' : 'ditambahkan'}.`,
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
                    if (errors.responseJSON && errors.responseJSON.error === 'duplicate_entry') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Produk sudah ada',
                            text: `Produk dengan nama ${$('#modal-form [name=nama_produk]').val()} sudah ada di database.`,
                            showConfirmButton: true,
                        });
                    } else {
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
                });
        }
    });

    $('[name=select_all]').on('click', function () {
        $(':checkbox').prop('checked', this.checked);
    });
});

function addForm(url) {
    isEdit = false; // Mode Tambah
    $('#modal-form').modal('show');
    $('#modal-form .modal-title').text('Tambah Produk');

    $('#modal-form form')[0].reset();
    $('#modal-form form').attr('action', url);
    $('#modal-form [name=_method]').val('post');
    $('#modal-form [name=nama_produk]').focus();
}

function editForm(url) {
    isEdit = true; // Mode Edit
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
                text: 'Pilih Minimal 2 Produk yang ingin dihapus.',
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