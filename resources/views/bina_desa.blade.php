<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Fasilitas Desa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 20px;
            margin-bottom: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        
        .header h1 {
            color: #2d3748;
            font-size: 2.5em;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .header p {
            color: #666;
            font-size: 1.1em;
        }
        
        .nav-tabs {
            display: flex;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 5px;
            margin-bottom: 20px;
            overflow-x: auto;
        }
        
        .nav-tab {
            flex: 1;
            padding: 15px 20px;
            text-align: center;
            background: transparent;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            color: #666;
            white-space: nowrap;
        }
        
        .nav-tab.active {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        
        .tab-content {
            display: none;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .tab-content.active {
            display: block;
            animation: fadeInUp 0.5s ease;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .table-container {
            overflow-x: auto;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        
        th {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 20px 15px;
            text-align: left;
            font-weight: 600;
            font-size: 0.95em;
            letter-spacing: 0.5px;
        }
        
        th:first-child {
            border-top-left-radius: 15px;
        }
        
        th:last-child {
            border-top-right-radius: 15px;
        }
        
        td {
            padding: 15px;
            border-bottom: 1px solid #e2e8f0;
            color: #4a5568;
        }
        
        tr:hover {
            background: #f7fafc;
            transform: scale(1.01);
            transition: all 0.2s ease;
        }
        
        .status {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .status.tersedia {
            background: #c6f6d5;
            color: #22543d;
        }
        
        .status.dipinjam {
            background: #fed7d7;
            color: #742a2a;
        }
        
        .status.maintenance {
            background: #fef5e7;
            color: #744210;
        }
        
        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.85em;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }
        
        .btn-success {
            background: linear-gradient(135deg, #48bb78, #38a169);
            color: white;
        }
        
        .btn-warning {
            background: linear-gradient(135deg, #ed8936, #dd6b20);
            color: white;
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #f56565, #e53e3e);
            color: white;
        }
        
        .action-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        
        .search-bar {
            margin-bottom: 20px;
            position: relative;
        }
        
        .search-bar input {
            width: 100%;
            padding: 15px 50px 15px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 25px;
            font-size: 1em;
            transition: all 0.3s ease;
        }
        
        .search-bar input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 20px rgba(102, 126, 234, 0.2);
        }
        
        .search-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.9);
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-number {
            font-size: 2.5em;
            font-weight: bold;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }
        
        .stat-label {
            color: #666;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9em;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            .header h1 {
                font-size: 2em;
            }
            
            .nav-tabs {
                overflow-x: auto;
            }
            
            .action-buttons {
                justify-content: center;
            }
            
            th, td {
                padding: 10px 8px;
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📋 Dashboard Fasilitas Desa</h1>
            <p>Sistem Manajemen Fasilitas & Peminjaman Ruang</p>
        </div>
        
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">8</div>
                <div class="stat-label">Total Fasilitas</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">5</div>
                <div class="stat-label">Tersedia</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">2</div>
                <div class="stat-label">Sedang Dipinjam</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">1</div>
                <div class="stat-label">Maintenance</div>
            </div>
        </div>
        
        <div class="nav-tabs">
            <button class="nav-tab active" onclick="showTab(event, 'fasilitas')">🏢 Fasilitas Umum</button>
            <button class="nav-tab" onclick="showTab(event, 'peminjaman')">📅 Peminjaman</button>
            <button class="nav-tab" onclick="showTab(event, 'pembayaran')">💰 Pembayaran</button>
            <button class="nav-tab" onclick="showTab(event, 'syarat')">📄 Syarat Fasilitas</button>
            <button class="nav-tab" onclick="showTab(event, 'petugas')">👥 Petugas</button>
        </div>
        
        <!-- Tab Fasilitas Umum -->
        <div id="fasilitas" class="tab-content active">
            <div class="search-bar">
                <input type="text" placeholder="Cari fasilitas..." onkeyup="searchTable(this, 'fasilitasTable')">
                <span class="search-icon">🔍</span>
            </div>
            
            <div class="table-container">
                <table id="fasilitasTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Fasilitas</th>
                            <th>Jenis</th>
                            <th>Alamat</th>
                            <th>Kapasitas</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>F001</td>
                            <td>Balai Desa Sukamaju</td>
                            <td>Aula</td>
                            <td>Jl. Raya Sukamaju No. 45</td>
                            <td>150 orang</td>
                            <td><span class="status tersedia">Tersedia</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-success">Pinjam</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>F002</td>
                            <td>Lapangan Sepak Bola</td>
                            <td>Lapangan</td>
                            <td>Jl. Stadion No. 12</td>
                            <td>300 orang</td>
                            <td><span class="status dipinjam">Dipinjam</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-warning">Lihat Detail</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>F003</td>
                            <td>Aula Pernikahan</td>
                            <td>Aula</td>
                            <td>Jl. Melati No. 8</td>
                            <td>200 orang</td>
                            <td><span class="status tersedia">Tersedia</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-success">Pinjam</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>F004</td>
                            <td>Gedung Serbaguna</td>
                            <td>Gedung</td>
                            <td>Jl. Proklamasi No. 17</td>
                            <td>500 orang</td>
                            <td><span class="status maintenance">Maintenance</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-danger">Maintenance</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>F005</td>
                            <td>Pos Kamling RT 05</td>
                            <td>Pos</td>
                            <td>Jl. Gotong Royong No. 3</td>
                            <td>20 orang</td>
                            <td><span class="status tersedia">Tersedia</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-success">Pinjam</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Tab Peminjaman -->
        <div id="peminjaman" class="tab-content">
            <div class="search-bar">
                <input type="text" placeholder="Cari peminjaman..." onkeyup="searchTable(this, 'peminjamanTable')">
                <span class="search-icon">🔍</span>
            </div>
            
            <div class="table-container">
                <table id="peminjamanTable">
                    <thead>
                        <tr>
                            <th>ID Peminjaman</th>
                            <th>Fasilitas</th>
                            <th>Peminjam</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Tujuan</th>
                            <th>Status</th>
                            <th>Total Biaya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>P001</td>
                            <td>Balai Desa Sukamaju</td>
                            <td>Ahmad Suryanto</td>
                            <td>2025-10-01</td>
                            <td>2025-10-02</td>
                            <td>Acara Pernikahan</td>
                            <td><span class="status tersedia">Disetujui</span></td>
                            <td>Rp 500.000</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-primary">Detail</button>
                                    <button class="btn btn-warning">Ubah</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>P002</td>
                            <td>Lapangan Sepak Bola</td>
                            <td>Tim Garuda FC</td>
                            <td>2025-09-28</td>
                            <td>2025-09-28</td>
                            <td>Turnamen Sepak Bola</td>
                            <td><span class="status dipinjam">Sedang Digunakan</span></td>
                            <td>Rp 300.000</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-primary">Detail</button>
                                    <button class="btn btn-success">Selesai</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>P003</td>
                            <td>Aula Pernikahan</td>
                            <td>Siti Rahmawati</td>
                            <td>2025-10-15</td>
                            <td>2025-10-15</td>
                            <td>Resepsi Pernikahan</td>
                            <td><span class="status maintenance">Menunggu</span></td>
                            <td>Rp 750.000</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-success">Setujui</button>
                                    <button class="btn btn-danger">Tolak</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Tab Pembayaran -->
        <div id="pembayaran" class="tab-content">
            <div class="search-bar">
                <input type="text" placeholder="Cari pembayaran..." onkeyup="searchTable(this, 'pembayaranTable')">
                <span class="search-icon">🔍</span>
            </div>
            
            <div class="table-container">
                <table id="pembayaranTable">
                    <thead>
                        <tr>
                            <th>ID Bayar</th>
                            <th>ID Peminjaman</th>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            <th>Metode</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>B001</td>
                            <td>P001</td>
                            <td>2025-09-25</td>
                            <td>Rp 500.000</td>
                            <td>Transfer Bank</td>
                            <td>Lunas</td>
                            <td><span class="status tersedia">Lunas</span></td>
                            <td>
                                <button class="btn btn-primary">Cetak Kwitansi</button>
                            </td>
                        </tr>
                        <tr>
                            <td>B002</td>
                            <td>P002</td>
                            <td>2025-09-27</td>
                            <td>Rp 300.000</td>
                            <td>Cash</td>
                            <td>Lunas</td>
                            <td><span class="status tersedia">Lunas</span></td>
                            <td>
                                <button class="btn btn-primary">Cetak Kwitansi</button>
                            </td>
                        </tr>
                        <tr>
                            <td>B003</td>
                            <td>P003</td>
                            <td>-</td>
                            <td>Rp 750.000</td>
                            <td>-</td>
                            <td>Menunggu persetujuan</td>
                            <td><span class="status maintenance">Belum Bayar</span></td>
                            <td>
                                <button class="btn btn-warning">Konfirmasi</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Tab Syarat Fasilitas -->
        <div id="syarat" class="tab-content">
            <div class="search-bar">
                <input type="text" placeholder="Cari syarat..." onkeyup="searchTable(this, 'syaratTable')">
                <span class="search-icon">🔍</span>
            </div>
            
            <div class="table-container">
                <table id="syaratTable">
                    <thead>
                        <tr>
                            <th>ID Syarat</th>
                            <th>Fasilitas</th>
                            <th>Nama Syarat</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>S001</td>
                            <td>Balai Desa Sukamaju</td>
                            <td>KTP Peminjam</td>
                            <td>Fotokopi KTP peminjam yang masih berlaku</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-danger">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>S002</td>
                            <td>Balai Desa Sukamaju</td>
                            <td>Surat Permohonan</td>
                            <td>Surat permohonan resmi dari RT/RW</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-danger">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>S003</td>
                            <td>Lapangan Sepak Bola</td>
                            <td>Deposit Keamanan</td>
                            <td>Deposit sebesar Rp 100.000 untuk keamanan fasilitas</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-danger">Hapus</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Tab Petugas -->
        <div id="petugas" class="tab-content">
            <div class="search-bar">
                <input type="text" placeholder="Cari petugas..." onkeyup="searchTable(this, 'petugasTable')">
                <span class="search-icon">🔍</span>
            </div>
            
            <div class="table-container">
                <table id="petugasTable">
                    <thead>
                        <tr>
                            <th>ID Petugas</th>
                            <th>Fasilitas</th>
                            <th>Nama Petugas</th>
                            <th>Jabatan</th>
                            <th>Kontak</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>PT001</td>
                            <td>Balai Desa Sukamaju</td>
                            <td>Budi Santoso</td>
                            <td>Kepala Urusan</td>
                            <td>081234567890</td>
                            <td><span class="status tersedia">Aktif</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-warning">Kontak</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>PT002</td>
                            <td>Lapangan Sepak Bola</td>
                            <td>Andi Wijaya</td>
                            <td>Penjaga Lapangan</td>
                            <td>081298765432</td>
                            <td><span class="status tersedia">Aktif</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-warning">Kontak</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>PT003</td>
                            <td>Gedung Serbaguna</td>
                            <td>Sri Mulyani</td>
                            <td>Koordinator</td>
                            <td>081356789012</td>
                            <td><span class="status maintenance">Cuti</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-danger">Non-aktif</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script>
        function showTab(evt, tabName) {
            // Hide all tab contents
            const tabContents = document.getElementsByClassName('tab-content');
            for (let i = 0; i < tabContents.length; i++) {
                tabContents[i].classList.remove('active');
            }
            
            // Remove active class from all tabs
            const tabs = document.getElementsByClassName('nav-tab');
            for (let i = 0; i < tabs.length; i++) {
                tabs[i].classList.remove('active');
            }
            
            // Show selected tab and mark as active
            document.getElementById(tabName).classList.add('active');
            evt.currentTarget.classList.add('active');
        }
        
        function searchTable(input, tableId) {
            const filter = input.value.toUpperCase();
            const table = document.getElementById(tableId);
            const rows = table.getElementsByTagName('tr');
            
            for (let i = 1; i < rows.length; i++) {
                let row = rows[i];
                let cells = row.getElementsByTagName('td');
                let found = false;
                
                for (let j = 0; j < cells.length; j++) {
                    if (cells[j].textContent.toUpperCase().indexOf(filter) > -1) {
                        found = true;
                        break;
                    }
                }
                
                row.style.display = found ? '' : 'none';
            }
        }
        
        // Add some interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            // Add click animation to buttons
            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    ripple.classList.add('ripple');
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
        });
    </script>
</body>
</html>