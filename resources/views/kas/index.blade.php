@extends('layouts.app')
@section('title','Buku Kas')
@section('content')
<div class="content-wrapper">
     <!-- Main content -->
     <section class="content">
          <div class="container-fluid">
               <div class="row">
                    <div class="col-12">
                         <div class="card mt-3">
                              <div class="card-header">
                                   <h3 class="card-title">DATA BUKU KAS</h3>
                                   <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                             <i class="fas fa-minus"></i>
                                        </button>
                                   </div>
                              </div>
                              <div class="card-body">
                                   <div class="d-flex justify-content-between mb-3">
                                        <a href="{{route('kas.create')}}" class="btn btn-info btn-social">
                                             <i class="fa fa-plus" aria-hidden="true"></i> Tambah Pengeluaran
                                        </a>
                                        <div>
                                             <a href="/kas/export-excel" class="btn btn-success mr-1"><i class="fa fa-file-excel" aria-hidden="true"></i></a>
                                             <a href="/kas/export-pdf" class="btn btn-danger"><i class="fa fa-file-pdf" aria-hidden="true"></i></a>
                                        </div>
                                   </div>
                                   <hr>
                                   @include('alert')
                                   <div class="col-12 col-sm-6 col-md-3">
                                        <div class="info-box">
                                          <span class="info-box-icon bg-info elevation-1"><i class="fa fa-rupiah"></i></span>
                            
                                          <div class="info-box-content">
                                            <span class="info-box-text">Total Kas</span>
                                            <span class="info-box-number">{{ $totalkas }}</span>
                                          </div>
                                          <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                      </div>
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
        $('#kas-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/kas',
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'jenis_kas', name: 'jenis_kas' },
                { data: 'kode_kas', name: 'kode_kas' },
                { data: 'nomor_rekening', name: 'nomor_rekening' },
                { data: 'nama_rekening', name: 'nama_rekening' },
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
                         url: "/bank/" + dataId, // Ganti dengan URL yang sesuai
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