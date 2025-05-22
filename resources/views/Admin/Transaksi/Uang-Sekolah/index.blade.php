@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <h3 class="fw-bold mb-3">Transaksi Uang Sekolah</h3>
        </div>
          <div class="row">
            <div class="col-sm-6 col-md-6">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Total Keuangan</p>
                                    <h4 class="card-title">RP {{ number_format($totalKeuangan, 0, ',', '.') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="fas fa-user-check"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Uang Sekolah</p>
                                    <h4 class="card-title">RP {{ number_format($uangSekolah, 0, ',', '.') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTransaksi">
                                Tambah Transaksi Sekolah
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive table-hover table-sales">
                                    <table class="table table-bordered table-striped"id="example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Transaksi</th>
                                                <th>Nama Pembayaran</th>
                                                <th>Tanggal</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Jumlah</th>
                                                <th>Staff</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       @foreach($data as $key => $item)
                                       <tr>
                                        <td>{{$key + 1 }}</td>
                                        <td>{{$item->kode_transaksi}}</td>
                                        <td>{{$item->nama_pembayaran}}</td>
                                        <td>{{$item->tanggal_bayar}}</td>
                                        <td>{{$item->siswa->nama_siswa}}</td>
                                        <td>{{$item->siswa->kelas}}</td>
                                        <td>
                                            RP {{ number_format($item->jumlah_bayar, 0, ',', '.') }}
                                        </td>
                                        <td>{{$item->user->name}}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-sm btn-info" onclick="showDetail({{ $item->id }})">
                                                <i class="bi bi-eye"></i>Detail
                                                </button>
                                                <button type="button"
                                                        class="btn btn-warning btn-sm"
                                                        onclick="editTransaksi({{ $item->id }})">
                                                        Edit
                                                </button>
                                                    @method('DELETE')
                                                <a href="{{route('admin.uangsekolah.destroy', $item->id)}}" class="btn btn-sm btn-danger" data-confirm-delete="true">Hapus</a>
                                            </div>
                                        </td>
                                       </tr>
                                       @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@include('Admin.Transaksi.Uang-Sekolah.add')
@include('Admin.Transaksi.Uang-Sekolah.edit')
@include('Admin.Transaksi.Uang-Sekolah.detail')

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('#example').DataTable({
            responsive: true,
            lengthMenu: [5, 10, 25, 50, 100],
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                paginate: {
                    previous: "Sebelumnya",
                    next: "Selanjutnya"
                },
                zeroRecords: "Data tidak ditemukan",
                infoEmpty: "Tidak ada data yang ditampilkan",
                infoFiltered: "(difilter dari _MAX_ total data)"
            }
        });
    });
    $('#kelasSelect').on('change', function () {
        var kelas = $(this).val();
        $.ajax({
            url: '/get-kelas/siswa/' + encodeURIComponent(kelas),
            type: 'GET',
            success: function (data) {
                $('#siswaSelect').empty().append('<option selected disabled>Pilih Siswa</option>');
                $.each(data, function (key, value) {
                    $('#siswaSelect').append('<option value="' + value.id + '">' + value.nama_siswa + '</option>');
                });
            }
        });
    });
    function editTransaksi(id) {
        $.ajax({
            url: `/Transaksi/uang-sekolah/data/${id}`,
            type: 'GET',
            success: function (data) {
                $('#editForm')
                    .attr('action', `/Transaksi/uang-sekolah/update/${data.id}`)
                    .attr('method', 'POST');
                    $('#edit_kategori').val(data.id_kategori);
                    $('#edit_kelasSelect').val(data.siswa.kelas);
                    $.ajax({
                        url: '/get-kelas/siswa/' + encodeURIComponent(data.siswa.kelas),
                        type: 'GET',
                        success: function (siswaData) {
                            $('#edit_siswaSelect').empty().append('<option selected disabled>Pilih Siswa</option>');
                            $.each(siswaData, function (key, value) {
                                let selected = value.id === data.siswa.id ? 'selected' : '';
                                $('#edit_siswaSelect').append(`<option value="${value.id}" ${selected}>${value.nama_siswa}</option>`);
                            });
                        }
                    });
                    $('#edit_nama_transaksi').val(data.nama_pembayaran);
                    $('#edit_jumlah_bayar').val(data.jumlah_bayar);
                    $('#edit_tanggal_bayar').val(data.tanggal_bayar);
                    $('#edit_keterangan').val(data.keterangan);

                $('#editTransaksi').modal('show');
            },
            error: function () {
                alert('Gagal mengambil data.');
            }
        });
    }

</script>


<script>
function showDetail(id) {
    $.ajax({
        url: `/Transaksi/uang-sekolah/data/${id}`,
        type: 'GET',
        success: function(data) {
            // Format date
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const formattedDate = new Date(data.tanggal_bayar).toLocaleDateString('id-ID', options);

            // Populate data
            $('#detail_kodetransaksi').text(data.kode_transaksi);
            $('#detail_kategori_pembayaran').text(data.kategori.nama_kategori);
            $('#detail_nama_siswa').text(data.siswa.nama_siswa);
            $('#detail_kelas').text(data.siswa.kelas);
            $('#detail_nama_pembayaran').text(data.nama_pembayaran);
            $('#detail_jumlah_bayar').text('Rp ' + parseInt(data.jumlah_bayar).toLocaleString('id-ID'));
            $('#detail_tanggal_bayar').text(formattedDate);
            $('#detail_petugas').text(data.user.name);
            $('#detail_orang_tua_nama').text(data.siswa.orangtua.nama_ortu);
            $('#detail_orang_tua_hp').text(formatPhoneNumber(data.siswa.orangtua.nomor_telp));

            // Handle keterangan
            if(data.keterangan && data.keterangan.trim() !== '' && data.keterangan !== '-') {
                $('#detail_keterangan').text(data.keterangan).show();
                $('#no-keterangan').hide();
            } else {
                $('#detail_keterangan').hide();
                $('#no-keterangan').show();
            }

            $('#detailTransaksiModal').modal('show');
        },
        error: function() {
            alert('Gagal memuat detail pembayaran.');
        }
    });
}

function formatPhoneNumber(phone) {
    if (!phone) return '-';
    return phone.replace(/(\d{4})(\d{4})(\d{4})/, '$1-$2-$3');
}
</script>
@endpush


@push('styles')
<style>
    /* School-themed colors */
    .bg-light-blue-gradient {
        background: linear-gradient(135deg, #1a73e8 0%, #4285f4 100%);
    }
    .bg-green-gradient {
        background: linear-gradient(135deg, #0b8043 0%, #34a853 100%);
    }
    .bg-purple-gradient {
        background: linear-gradient(135deg, #8e24aa 0%, #ab47bc 100%);
    }

    /* Modern card styling */
    .card {
        border-radius: 0.5rem;
        border: none;
        transition: all 0.3s ease;
    }

    .card-header {
        border-radius: 0.5rem 0.5rem 0 0 !important;
    }

    .info-item {
        padding: 0.75rem;
        background-color: #f8f9fa;
        border-radius: 0.35rem;
        margin-bottom: 0.75rem;
    }

    .info-item label {
        font-size: 0.8rem;
        color: #6c757d;
    }

    .info-item p {
        font-size: 1rem;
    }

    .transaction-summary {
        background-color: #f8f9fa;
        padding: 1rem;
        border-radius: 0.5rem;
        border-left: 4px solid #1a73e8;
    }

    .school-brand {
        border-left: 3px solid rgba(255,255,255,0.3);
        padding-left: 1rem;
    }

    .modal-header .close {
        opacity: 0.8;
        transition: all 0.2s;
    }

    .modal-header .close:hover {
        opacity: 1;
    }
</style>

@endpush

