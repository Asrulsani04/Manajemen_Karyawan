@extends('layouts.karyawan')

@section('styles')
<style>
    .karyawan-container {
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        background-color: #fff;
        margin-top: 20px;
        margin-bottom: 40px;
    }
    
    .page-title {
        color: #3c4858;
        font-weight: 600;
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
    }
    
    .page-title:after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -2px;
        width: 60px;
        height: 2px;
        background: #4e73df;
    }
    
    .data-table {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0,0,0,0.05);
    }
    
    .data-table thead {
        background-color: #4e73df;
        color: white;
    }
    
    .data-table th {
        font-weight: 500;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        padding: 15px !important;
        vertical-align: middle;
        border: none !important;
    }
    
    .data-table tbody tr {
        transition: all 0.3s ease;
    }
    
    .data-table tbody tr:hover {
        background-color: #f8f9fc;
        transform: translateY(-2px);
    }
    
    .data-table td {
        padding: 15px !important;
        vertical-align: middle;
        border-color: #f0f0f0 !important;
    }
    
    .btn-add {
        padding: 10px 20px;
        border-radius: 50px;
        box-shadow: 0 5px 15px rgba(78, 115, 223, 0.18);
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-add:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(78, 115, 223, 0.25);
    }
    
    .btn-add i {
        margin-right: 8px;
    }
    
    .alert-custom {
        border-radius: 8px;
        border-left: 4px solid #1cc88a;
        background-color: #f8f9fc;
        padding: 15px;
        margin-bottom: 25px;
    }
    
    .action-buttons .btn {
        border-radius: 50px;
        padding: 6px 15px;
        margin-right: 5px;
        font-size: 0.8rem;
        font-weight: 500;
    }
    
    .badge-divisi {
        background-color: #e0f3ff;
        color: #36b9cc;
        padding: 5px 10px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 500;
    }
    
    .badge-jabatan {
        background-color: #ffecd9;
        color: #f6c23e;
        padding: 5px 10px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 500;
    }
    
    .empty-state {
        text-align: center;
        padding: 40px 0;
    }
    
    .empty-state img {
        max-width: 200px;
        margin-bottom: 20px;
    }
</style>
@endsection

@section('content')
<div class="container karyawan-container animate__animated animate__fadeIn">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="page-title">Daftar Karyawan</h3>
    </div>
    
    @if(session('success'))
        <div class="alert alert-custom animate__animated animate__fadeInDown">
            <i class="fas fa-check-circle mr-2 text-success"></i>
            {{ session('success') }}
        </div>
    @endif
    
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table data-table mb-0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>NIK</th>
                            <th>Divisi</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($karyawans) > 0)
                            @foreach($karyawans as $karyawan)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar mr-3 bg-primary rounded-circle text-white" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                            {{ strtoupper(substr($karyawan->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ $karyawan->name }}</h6>
                                            <small class="text-muted">ID: K-{{ str_pad($karyawan->id, 4, '0', STR_PAD_LEFT) }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $karyawan->address}}
                                <td>{{ $karyawan->nik }}</td>
                                <td><span class="badge-divisi">{{ $karyawan->divisi }}</span></td>
                                <td><span class="badge-jabatan">{{ $karyawan->jabatan }}</span></td>
                                <td class="action-buttons">
                                    <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>
                                    <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fas fa-trash mr-1"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <img src="https://via.placeholder.com/200" alt="No Data">
                                        <h5>Belum ada data karyawan</h5>
                                        <p class="text-muted">Silakan tambahkan karyawan baru dengan klik tombol "Tambah Karyawan"</p>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="d-flex justify-content-between align-items-center mt-4">
        <div>
            <p class="text-muted mb-0">Menampilkan {{ count($karyawans) }} karyawan</p>
        </div>
        @if(method_exists($karyawans, 'links'))
            <div class="pagination-container">
                {{ $karyawans->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Animasi untuk baris tabel saat halaman dimuat
        $('tbody tr').each(function(index) {
            $(this).css('opacity', '0');
            $(this).css('transform', 'translateY(20px)');
            
            setTimeout(() => {
                $(this).css('transition', 'all 0.3s ease');
                $(this).css('opacity', '1');
                $(this).css('transform', 'translateY(0)');
            }, 100 * index);
        });
        
        // Efek ripple pada tombol
        $('.btn').on('click', function(e) {
            let x = e.clientX - e.target.getBoundingClientRect().left;
            let y = e.clientY - e.target.getBoundingClientRect().top;
            
            let ripple = document.createElement('span');
            ripple.style.left = `${x}px`;
            ripple.style.top = `${y}px`;
            ripple.classList.add('ripple');
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
</script>
@endsection