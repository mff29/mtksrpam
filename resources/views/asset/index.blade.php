@extends('layouts.app')
@section('title','Asset')
@section('content')
<div class="content-wrapper">
     <!-- Main content -->
     <section class="content">
          <div class="container-fluid">
               <div class="row">
                    <div class="col-12">
                         <div class="card mt-3">
                              <div class="card-header">
                                   <h3 class="card-title">DATA ASSET</h3>
                                   <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                             <i class="fas fa-minus"></i>
                                        </button>
                                   </div>
                              </div>
                              <div class="card-body">
                                   <a href="{{route('asset.create')}}" class="btn btn-info btn-social btn-flat"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>
                                   <hr>
                                   @include('alert')
                                   <table class="table table-bordered table-striped" id="asset-table">
                                        <thead>
                                             <tr>
                                                  <th width="10">No</th>
                                                  <th>Nama Asset</th>
                                                  <th>Kategori</th>
                                                  <th>Harga</th>
                                                  <th>Qty</th>
                                                  <th>Satuan</th>
                                                  <th>Jumlah</th>
                                                  <th>Tgl</th>
                                                  <th>Keterangan</th>
                                                  <th width="90">#</th>
                                             </tr>
                                        </thead>
                                   </table>
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer">
                              Footer
                              </div>
                              <!-- /.card-footer-->
                         </div>
                    <!-- /.card -->
                    </div>
               </div>
          </div>
     </section>
     <!-- /.content -->
</div>
@endsection
@push('scripts')
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
     $(function() {
        $('#asset-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/asset',
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'nama', name: 'nama' },
                { data: 'kategori', name: 'kategori' },
                { data: 'harga', name: 'harga' },
                { data: 'satuan', name: 'satuan' },
                { data: 'qty', name: 'qty' },
                { data: 'jumlah', name: 'jumlah' },
                { data: 'tgl_beli', name: 'tgl_beli' },
                { data: 'keterangan', name: 'keterangan' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });

    function alert_delete(id){
          var dataId = id;
          swal({
               title: "Konfirmasi",
               text: "Apakah Anda yakin ingin menghapus data ini?",
               icon: "warning",
               showCancelButton: true,
               confirmButtonColor: "#d33",
               cancelButtonColor: "#3085d6",
               confirmButtonText: "Hapus",
               customClass: 'sweet-alert',
               cancelButtonText: "Batal"
          }).then((result) => {
               if (result == true) {
                    $.ajax({
                         type: "DELETE",
                         data:{ _token: '{{csrf_token()}}'},
                         url: "/asset/" + dataId, // Ganti dengan URL yang sesuai
                         success: function(response) {
                              swal({
                                   title: "Sukses",
                                   text: response.message,
                                   icon: "success",
                              }).then((result) => {
                                   if(result==true){
                                        location.reload();
                                   }
                              });
                         },
                         error: function(error) {
                              swal({
                                   title: "Error",
                                   text: "Terjadi kesalahan saat menghapus data.",
                                   icon: "error",
                              });
                         // Handle error
                         },
                    });
               }
        });
    }
</script>
@endpush