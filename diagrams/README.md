# UML Diagrams - Sistem Peminjaman Buku Perpustakaan

Folder ini berisi diagram UML untuk Sistem Peminjaman Buku Perpustakaan dalam format PlantUML (.puml).

## Daftar Diagram

### 1. Use Case Diagram (`use_case_diagram.puml`)
Diagram ini menunjukkan interaksi antara tiga aktor (Admin, Petugas, dan Anggota) dengan sistem perpustakaan. Menggambarkan use case untuk:
- Autentikasi (Login/Logout)
- Manajemen Data Buku (CRUD)
- Manajemen Data Anggota (CRUD)
- Manajemen Peminjaman (Catat peminjaman, Proses pengembalian, Lihat riwayat)
- Melihat Katalog Buku (untuk Anggota)

### 2. Activity Diagram - Peminjaman (`activity_diagram_peminjaman.puml`)
Diagram ini menggambarkan alur proses peminjaman buku, termasuk:
- Login Petugas/Admin
- Memilih anggota dan buku
- Validasi stok buku
- Penyimpanan data peminjaman
- Pengurangan stok buku

### 3. Activity Diagram - Pengembalian (`activity_diagram_pengembalian.puml`)
Diagram ini menggambarkan alur proses pengembalian buku, termasuk:
- Melihat daftar peminjaman aktif
- Memilih peminjaman yang akan dikembalikan
- Update status peminjaman
- Penambahan stok buku

### 4. Sequence Diagram - Peminjaman (`sequence_diagram_peminjaman.puml`)
Diagram ini menunjukkan interaksi detail antara komponen sistem saat proses peminjaman:
- Petugas → Web Browser
- Browser → PeminjamanController
- Controller → Models (Peminjaman, Buku)
- Models → Database

### 5. Sequence Diagram - Pengembalian (`sequence_diagram_pengembalian.puml`)
Diagram ini menunjukkan interaksi detail antara komponen sistem saat proses pengembalian:
- Petugas → Web Browser
- Browser → PeminjamanController
- Controller → Models (Peminjaman, Buku)
- Models → Database

## Cara Menggunakan

### Online (Tanpa Install)
1. Buka website PlantUML: http://www.plantuml.com/plantuml/uml/
2. Copy isi file .puml
3. Paste ke editor online
4. Klik "Submit" untuk melihat diagram

### Local (Dengan Install PlantUML)
1. Install PlantUML: https://plantuml.com/download
2. Jalankan command:
   ```bash
   plantuml use_case_diagram.puml
   ```
3. File PNG akan di-generate otomatis

### VS Code Extension
1. Install extension "PlantUML"
2. Buka file .puml
3. Tekan `Alt+D` untuk preview diagram

## Teknologi
- PlantUML: Language untuk membuat diagram UML dengan syntax text-based
- Format: `.puml` (PlantUML source code)

## Catatan
Diagram ini merupakan bagian dari dokumentasi Sistem Peminjaman Buku Perpustakaan yang dibangun dengan Laravel Framework.
