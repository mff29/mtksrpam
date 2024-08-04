@extends('layouts.app')
@section('title','Tagihan')
@section('content')
<div class="content-wrapper">
     <!-- Main content -->
     <section class="content">
          <div class="container-fluid">
               <div class="row">
                    <div class="col-12">
                         <div class="card mt-3">
                              <div class="card-header">
                                   <h3 class="card-title">DATA TAGIHAN</h3>
                                   <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                             <i class="fas fa-minus"></i>
                                        </button>
                                   </div>
                              </div>
                              <div class="card-body">
                                   <div class="d-flex justify-content-between mb-3">
                                        <a href="{{route('tagihan.create')}}" class="btn btn-info btn-social">
                                             <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data
                                        </a>
                                        <div>
                                             <a href="/tagihan/export-excel" class="btn btn-success mr-1"><i class="fa fa-file-excel" aria-hidden="true"></i></a>
                                             <a href="/tagihan/export-pdf" class="btn btn-danger"><i class="fa fa-file-pdf" aria-hidden="true"></i></a>
                                        </div>
                                   </div>
                                   <hr>
                                   @include('alert')
        <table class="table table-bordered" id="tagihan-table">
            <thead>
                <tr>
                    {{-- <th width="10">No</th> --}}
                    <th>Pelanggan</th>
                    <th>Pemakaian</th>
                    <th>Abonemen</th>
                    <th>Harga Per Meter</th>
                    <th>Jumlah Pakai</th>
                    <th>Tagihan</th>
                    <th>Jenis Bayar</th>
                    <th>Status</th>
                    {{-- <th width="90">#</th> --}}
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
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#tagihan-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/tagihan',
                columns: [
                    { data: 'pelanggan.nama', name: 'pelanggan.nama' },
                    { data: 'pemakaian', name: 'pemakaian' },
                    { data: 'abonemen.level', name: 'abonemen.level' },
                    { data: 'harga_per_meter', name: 'harga_per_meter' },
                    { data: 'jumlah_pakai', name: 'jumlah_pakai' },
                    { data: 'tagihan', name: 'tagihan' },
                    { data: 'jenis_bayar', name: 'jenis_bayar' },
                    {
                        data: 'status',
                        name: 'status',
                    //     orderable: false,
                    //     searchable: false,
                        render: function (data, type, row) {
                            var badgeClass = data === 'Lunas' ? 'bg-success' : 'bg-danger';
                            return '<span class="badge ' + badgeClass + '" data-id="' + row.id + '">' + data + '</span>';
                        }
                    }
                ],
                drawCallback: function() {
                    $('#tagihan-table .badge').each(function() {
                        var badge = $(this);
                        var text = badge.text();
                        var badgeClass = text === 'Lunas' ? 'bg-success' : 'bg-danger';
                        badge.removeClass('bg-success bg-danger');
                        badge.addClass(badgeClass);
                    });
                }
            });

            $('#tagihan-table').on('click', '.badge', function() {
                var badge = $(this);
                var id = badge.data('id');
                var currentStatus = badge.text();
                var newStatus = currentStatus === 'Lunas' ? 'Belum Lunas' : 'Lunas';

                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin mengubah status tagihan ini menjadi ' + newStatus + '?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, ubah!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ url("/tagihan/update-status/") }}/' + id,
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                status: newStatus
                            },
                            success: function(response) {
                                if (response.success) {
                                    badge.text(newStatus);
                                    badge.removeClass('bg-success bg-danger');
                                    badge.addClass(newStatus === 'Lunas' ? 'bg-success' : 'bg-danger');
                                }
                            }
                        });
                        Swal.fire(
                            'Berhasil!',
                            'Status tagihan telah diubah.',
                            'success'
                        );
                    }
                });
            });
        });
    </script>

<script type="text/javascript">
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
                         url: "/tagihan/" + dataId, // Ganti dengan URL yang sesuai
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
@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush