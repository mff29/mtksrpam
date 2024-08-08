@extends('layouts.app')
@section('title','Riwayat Tagihan')
@section('content')
<div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                        <div class="col-12">
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h3 class="card-title">RIWAYAT TAGIHAN</h3>
                                    <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                            {{-- <a href="{{route('tagihan.create')}}" class="btn btn-info btn-social">
                                                <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data
                                            </a> --}}
                                            <div>
                                                <a href="/riwayat-tagihan/export-excel" class="btn btn-success mr-1"><i class="fa fa-file-excel" aria-hidden="true"></i></a>
                                                <a href="/riwayat-tagihan/export-pdf" class="btn btn-danger"><i class="fa fa-file-pdf" aria-hidden="true"></i></a>
                                            </div>
                                    </div>
                                    <hr>
                                    @include('alert')
                                    <table class="table table-bordered table-striped" id="riwayat-tagihan-table">
                                        <thead>
                                            <tr>
                                                {{-- <th width="10">No</th> --}}
                                                <th>Pelanggan</th>
                                                <th>Kode</th>
                                                <th>Pemakaian</th>
                                                <th>Abonemen</th>
                                                <th>Harga</th>
                                                <th>Air</th>
                                                <th>Administrasi</th>
                                                <th>Telat</th>
                                                <th>Denda</th>
                                                <th>Total</th>
                                                <th>Payment</th>
                                                <th>Status</th>
                                                <th>Invoice</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    Footer
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </section>
</div>
@endsection
@push('scripts')
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
{{-- <script>
        $(document).ready(function() {
            var table = $('#tagihan-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/tagihan',
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    { data: 'pelanggan.nama', name: 'pelanggan.nama' },
                    { data: 'pemakaian', name: 'pemakaian' },
                    { data: 'abonemen.level', name: 'abonemen.level' },
                    { data: 'harga_per_meter', name: 'harga_per_meter' },
                    { data: 'jumlah_pakai', name: 'jumlah_pakai'},
                    { data: 'administrasi', name: 'administrasi' },
                    { data: 'denda_keterlambatan', name: 'denda_keterlambatan' },
                    { data: 'tagihan', name: 'tagihan' },
                    { data: 'jenis_bayar', name: 'jenis_bayar' },
                    {
                        data: 'status',
                        name: 'status', render: function(data, type, row) {
                        if (data == 'PENDING') {
                            return '<span class="badge bg-warning status-editable" data-id="' + row.id + '" data-status="PENDING">PENDING</span>';
                        } else if (data === 'LUNAS') {
                            return '<span class="badge bg-success status-editable" data-id="' + row.id + '" data-status="LUNAS">LUNAS</span>';
                        } else {
                            return '<span class="badge bg-danger">' + data + '</span>';
                        }
                    }
                    },
                    { data: 'action', name: 'action' },
                ]
            });

            // Menampilkan modal edit status saat status diklik
        $('#tagihan-table').on('click', '.status-editable', function() {
            var id = $(this).data('id');
            var status = $(this).data('status');
            
            $('#status').val(status);
            $('#edit-status-form').attr('action', '/tagihan/' + id); // Menambahkan ID pada action URL
            $('#editStatusModal').modal('show');
        });

        // Menangani pengiriman form edit status
        $('#edit-status-form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'), // Menggunakan action dari form
                type: 'PUT',
                data: $(this).serialize(), // Mengirim data form
                success: function(response) {
                    $('#editStatusModal').modal('hide');
                    $('#tagihan-table').DataTable().ajax.reload();
                    Swal.fire({
                        title: 'Sukses',
                        text: response.message,
                        icon: 'success'
                    });
                },
                error: function(xhr) {
                    // Tangani kesalahan jika terjadi
                    Swal.fire({
                        title: 'Error',
                        text: 'Terjadi kesalahan saat menyimpan data.',
                        icon: 'error'
                    });
                }
            });
        });

        });
</script> --}}

<script>
    $(document).ready(function() {
        var table = $('#riwayat-tagihan-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/riwayat-tagihan',
            columns: [
                // {data: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'pelanggan.nama', name: 'pelanggan.nama' },
                { data: 'pelanggan.kode', name: 'pelanggan.kode' },
                { data: 'pemakaian', name: 'pemakaian' },
                { data: 'abonemen.level', name: 'abonemen.level' },
                { data: 'harga_per_meter', name: 'harga_per_meter' },
                { data: 'jumlah_pakai', name: 'jumlah_pakai'},
                { data: 'administrasi', name: 'administrasi', orderable: false, searchable: false },
                { data: 'telat', name: 'telat' },
                { data: 'denda_keterlambatan', name: 'denda_keterlambatan' },
                { data: 'tagihan', name: 'tagihan' },
                { data: 'jenis_bayar', name: 'jenis_bayar' },
                {
                    data: 'status',
                    name: 'status', render: function(data, type, row) {
                    if (data == 'PENDING') {
                        return '<span class="badge bg-warning status-editable" data-id="' + row.id + '" data-status="PENDING">PENDING</span>';
                    } else if (data === 'LUNAS') {
                        return '<span class="badge bg-success status-editable" data-id="' + row.id + '" data-status="LUNAS">LUNAS</span>';
                    } else {
                        return '<span class="badge bg-danger">' + data + '</span>';
                    }
                }
                },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>

<script type="text/javascript">
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
                            url: "/riwayat-tagihan/" + dataId,
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
@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush