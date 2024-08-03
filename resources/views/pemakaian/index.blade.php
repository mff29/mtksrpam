@extends('layouts.app')
@section('title','Pemakaian')
@section('content')
<div class="content-wrapper">
     <!-- Main content -->
     <section class="content">
          <div class="container-fluid">
               <div class="row">
                    <div class="col-12">
                         <div class="card mt-3">
                              <div class="card-header">
                                   <h3 class="card-title">DATA PEMAKAIAN</h3>
                                   <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                             <i class="fas fa-minus"></i>
                                        </button>
                                   </div>
                              </div>
                              <div class="card-body">
                                   <div class="d-flex justify-content-between mb-3">
                                        <a href="{{route('pemakaian.create')}}" class="btn btn-info btn-social">
                                             <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data
                                        </a>
                                        <div>
                                             <a href="/pemakaian/export-excel" class="btn btn-success mr-1"><i class="fa fa-file-excel" aria-hidden="true"></i></a>
                                             <a href="/pemakaian/export-pdf" class="btn btn-danger"><i class="fa fa-file-pdf" aria-hidden="true"></i></a>
                                        </div>
                                   </div>
                                   <hr>
                                   @include('alert')
                                   <table class="table table-bordered table-striped" id="pemakaian-table">
                                        <thead>
                                             <tr>
                                                  <th width="10">No</th>
                                                  <th>Nama Pelanggan</th>
                                                  <th>Bulan</th>
                                                  <th>Tahun</th>
                                                  <th>Meter Awal</th>
                                                  <th>Meter Akhir</th>
                                                  <th>Jumlah Pakai</th>
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
        $('#pemakaian-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/pemakaian',
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'pelanggan.nama', name: 'pelanggan.nama' },
                { data: 'bulan', name: 'bulan' },
                { data: 'tahun', name: 'tahun' },
                { data: 'meter_awal', name: 'meter_awal' },
                { data: 'meter_akhir', name: 'meter_akhir' },
                { data: 'pakai', name: 'pakai' },
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
                         url: "/pemakaian/" + dataId, // Ganti dengan URL yang sesuai
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