@extends('layouts.master')

{{-- @section('title')
    Kategori
@endsection --}}

@section('breadcrumb')
    @parent
    <li class="active">Kategori</li>
@endsection

@section('content')
@section('content')

<h1 style="margin: 0; font-size: 24px; font-weight: 700; margin-top: -8px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; letter-spacing: 1px; color: #333; text-shadow: 1px 1px 2px rgba(0,0,0,0.1);">
    Kategori
  </h1>
  <div class="row">
    <div class="col-md-12" style="margin-top: 30px;">
      <div class="box"style="border-radius: 8px;">
        <div class="box-header with-border" style="border-radius: 8px;" >
            <button onclick="addForm('{{ route('kategori.store') }}')" 
                    class="btn btn-success btn-flat" 
                    style="font-size: 16px; padding: 10px 20px; border-radius: 3px; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px; margin-top: -29px;">
              <i class="fa fa-plus" style="margin-right: 8px;"></i> Tambah
            </button>
          </div>
          
        <div class="box-body table-responsive"style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px; border-radius: 8px;">
            <table id="kategori-table" class="table table-striped table-bordered" style="font-size: 16px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; letter-spacing: 0.5px;">

            <thead>
              <tr>
                <th width="5%">No</th>
                <th>Kategori</th>
                <th width="15%"><i class="fa fa-cog"></i></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
  @includeIf('kategori.form')
@endsection



@push('scripts')
  <script>
    let table;
    $(function () {
      table = $('#kategori-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: '{{ route('kategori.data') }}',
        },
        columns: [
          { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
          { data: 'nama_kategori', name: 'nama_kategori' },
          { data: 'aksi', name: 'aksi', orderable: false, searchable: false }
        ]
      });

      // Fungsi untuk menambah atau mengedit data kategori
      $('#modal-form form').submit(function (e) {
        e.preventDefault(); // mencegah form untuk reload halaman

        let formData = $(this).serialize(); // serialisasi form menjadi data
        let formAction = $(this).attr('action'); // mengambil URL action (tambah atau edit)
        // let method = $(this).attr('method'); 
        let method = $(this).find('input[name="_method"]').val().toUpperCase(); 

        $.ajax({
  url: formAction,
  type: method, // gunakan method form (POST atau PUT)
  data: formData,
  success: function (response) {
  console.log(response); // Cek apakah nama_kategori ada di dalam respons
  $('#modal-form').modal('hide'); // sembunyikan modal
  table.ajax.reload(); // reload DataTable

  let kategoriNama = response.nama_kategori || 'Kategori tidak diketahui'; // jika tidak ada, tampilkan 'Kategori tidak diketahui'
  let message = (method === 'PUT') ? 'Data berhasil diperbarui!' : 'Data berhasil ditambahkan!';
  let text = (method === 'PUT') ? 'Kategori ' + kategoriNama + ' telah diperbarui.' : 'Kategori ' + kategoriNama + ' telah berhasil ditambahkan.';

  Swal.fire({
    icon: 'success',
    title: message,
    text: text,
    showConfirmButton: true,
    customClass: {
      popup: 'swal-large-popup' // Menambahkan class kustom ke popup SweetAlert
    },
    didOpen: () => {
      // Menambahkan CSS langsung ke popup SweetAlert
      const popup = document.querySelector('.swal2-popup');
      popup.style.fontSize = '15px'; // Memperbesar font
      popup.style.width = '50%'; // Memperbesar lebar popup
      popup.style.maxWidth = '550px'; // Membatasi lebar maksimal
      popup.style.padding = '20px'; // Memperbesar padding
    }
  });
},

});






      });

    });

    function addForm(url) {
    $('#modal-form').modal('show');
    $('#modal-form .modal-title').text('Tambah Kategori');
    $('#kategori-form')[0].reset(); // Reset form
    $('#kategori-form').attr('action', url); // Action untuk POST
    $('#kategori-form [name=_method]').val('POST'); // Method POST untuk tambah
    $('#nama_kategori').focus();
}

function editForm(url) {
    $('#modal-form').modal('show');
    $('#modal-form .modal-title').text('Edit Kategori');
    $('#kategori-form')[0].reset(); // Reset form
    $('#kategori-form').attr('action', url); // Action untuk PUT
    $('#kategori-form [name=_method]').val('PUT'); // Method PUT untuk edit
   
    $.get(url)
      .done((response) => {
        $('#nama_kategori').val(response.nama_kategori); // Isi form dengan data kategori
      })
      .fail((errors) => {
        Swal.fire({
          icon: 'error',
          title: 'Tidak dapat menampilkan data',
          text: 'Data kategori tidak ditemukan.',
          showConfirmButton: true
        });
        $('#modal-form').modal('hide');
      });
}





function deleteData(url, nama_kategori) {
    // Menampilkan konfirmasi sebelum menghapus data
    Swal.fire({
        icon: 'warning',
        title: 'Apakah Anda yakin?',
        text: `Apakah Anda yakin ingin menghapus kategori ${nama_kategori}?`, // Menampilkan nama kategori yang akan dihapus
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal',
        customClass: {
            popup: 'swal-large-popup' // Menambahkan class kustom ke popup SweetAlert
        },
        didOpen: () => {
            // Menambahkan CSS langsung ke popup SweetAlert
            const popup = document.querySelector('.swal2-popup');
            popup.style.fontSize = '15px'; // Memperbesar font
            popup.style.width = '50%'; // Memperbesar lebar popup
            popup.style.maxWidth = '550px'; // Membatasi lebar maksimal
            popup.style.padding = '20px'; // Memperbesar padding
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika user menekan "Ya, hapus!"
            $.post(url, {
                '_token': $('[name=csrf-token]').attr('content'),
                '_method': 'delete'
            })
            .done((response) => {
                table.ajax.reload(); // Reload DataTable setelah data dihapus
                Swal.fire({
                    icon: 'success',
                    title: 'Data berhasil dihapus',
                    text: `Kategori ${nama_kategori} telah berhasil dihapus.`,
                    showConfirmButton: true,
                    customClass: {
                        popup: 'swal-large-popup' // Menambahkan class kustom ke popup SweetAlert
                    },
                    didOpen: () => {
                        // Menambahkan CSS langsung ke popup SweetAlert
                        const popup = document.querySelector('.swal2-popup');
                        popup.style.fontSize = '15px'; // Memperbesar font
                        popup.style.width = '50%'; // Memperbesar lebar popup
                        popup.style.maxWidth = '550px'; // Membatasi lebar maksimal
                        popup.style.padding = '20px'; // Memperbesar padding
                    }
                });
            })
            .fail((errors) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Tidak dapat menghapus data',
                    text: 'Data kategori tidak dapat dihapus.',
                    showConfirmButton: true,
                    customClass: {
                        popup: 'swal-large-popup' // Menambahkan class kustom ke popup SweetAlert
                    },
                    didOpen: () => {
                        // Menambahkan CSS langsung ke popup SweetAlert
                        const popup = document.querySelector('.swal2-popup');
                        popup.style.fontSize = '15px'; // Memperbesar font
                        popup.style.width = '50%'; // Memperbesar lebar popup
                        popup.style.maxWidth = '550px'; // Membatasi lebar maksimal
                        popup.style.padding = '20px'; // Memperbesar padding
                    }
                });
            });
        }
    });
}


  </script>
@endpush



