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
                                   @include('alert')
                                   <div class="d-flex justify-between">
                                        <div class="info-box col-3 mr-3">
                                             <span class="info-box-icon bg-success elevation-1"><i class="bi bi-cash-stack"></i></span>
                                             <div class="info-box-content">
                                                  <span class="info-box-text">TOTAL UANG KAS</span>
                                                  <h5 class="info-box-number">RP {{ number_format($total_uang_kas) }}</h5>
                                             </div>
                                        </div>
                                        <div class="info-box col-3 mr-3">
                                             <span class="info-box-icon bg-info elevation-1"><i class="bi bi-droplet"></i></span>
                                             <div class="info-box-content">
                                                  <span class="info-box-text">TOTAL PENDAPATAN AIR</span>
                                                  <span class="info-box-number">RP {{ number_format($pendapatan_air) }}</span>
                                             </div>
                                        </div>
                                        <div class="info-box col-3">
                                             <span class="info-box-icon bg-warning elevation-1"><i class="bi bi-clipboard2"></i></span>
                                             <div class="info-box-content">
                                                  <span class="info-box-text">JUMLAH KAS</span>
                                                  <span class="info-box-number">RP {{ number_format($jumlah_kas) }}</span>
                                             </div>
                                        </div>
                                   </div>
                                   <hr>
                                   <div class="d-flex justify-content-between mb-3">
                                        <a href="{{route('kas.create')}}" class="btn btn-info btn-social">
                                             <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Kas
                                        </a>
                                        <div>
                                             <a href="/kas/export-excel" class="btn btn-success mr-1"><i class="fa fa-file-excel" aria-hidden="true"></i></a>
                                             <a href="/kas/export-pdf" class="btn btn-danger"><i class="fa fa-file-pdf" aria-hidden="true"></i></a>
                                        </div>
                                   </div>
                                   <hr>
                                   
                                   <table class="table table-bordered table-striped" id="kas-table">
                                        <thead>
                                             <tr>
                                                  <th width="10">No</th>
                                                  <th>Tipe</th>
                                                  <th>Deskripsi</th>
                                                  <th>Nominal Pendapatan</th>
                                                  <th>Nominal Pengeluaran</th>
                                                  <th>#</th>
                                             </tr>
                                        </thead>
                                        <tfoot>
                                             <tr>
                                                 <th colspan="3">Total</th>
                                                 <th>RP {{ number_format($total_pendapatan) }}</th>
                                                 <th>RP {{ number_format($total_pengeluaran) }}</th>
                                                 <th>RP {{ number_format($jumlah_kas) }}</th>
                                             </tr>
                                         </tfoot>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<script type="text/javascript">
     $(function() {
          $('#kas-table').DataTable({
               processing: true,
               serverSide: true,
               ajax: '/kas',
               columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    { data: 'tipe', name: 'tipe' },
                    { data: 'deskripsi', name: 'deskripsi' },
                    { data: 'nominal_pendapatan', name: 'nominal_pendapatan' },
                    { data: 'nominal_pengeluaran', name: 'nominal_pengeluaran' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
               ]
          });
     });

     function alert_delete(id) {
          var dataId = id;
          Swal.fire({
               title: 'Konfirmasi',
               text: "Apakah Anda yakin ingin menghapus data ini?",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#d33',
               cancelButtonColor: '#3085d6',
               confirmButtonText: 'Hapus',
               cancelButtonText: 'Batal'
          }).then((result) => {
               if (result.isConfirmed) {
                    $.ajax({
                         type: "DELETE",
                         data:{ _token: '{{ csrf_token() }}' },
                         url: "/kas/" + dataId,
                         success: function(response) {
                         Swal.fire({
                              title: 'Sukses',
                              text: response.message,
                              icon: 'success'
                         }).then((result) => {
                              if(result.isConfirmed){
                                   location.reload();
                              }
                         });
                         },
                         error: function(error) {
                         Swal.fire({
                              title: 'Error',
                              text: "Terjadi kesalahan saat menghapus data.",
                              icon: 'error'
                         });
                         }
                    });
               }
          });
     }
</script>
@endpush