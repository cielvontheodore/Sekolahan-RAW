<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sekolahan - Edit Pendaftar</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-slate-100 text-slate-800 antialiased flex min-h-screen">

  <!-- ================= SIDEBAR ================= -->
  <aside class="w-64 bg-slate-200/60 border-r border-slate-300/60 flex flex-col justify-between shrink-0 h-screen sticky top-0">
    <div>
      <!-- Brand Logo -->
      <div class="p-6">
        <h1 class="text-xl font-bold text-sky-500 tracking-tight">Sekolahan</h1>
        <p class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">Admin Portal</p>
      </div>

      <!-- Navigation Menu -->
      <nav class="px-3 space-y-1 text-xs font-semibold">
        <a href="{{ route('ppdb-admin.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-300/50 hover:text-slate-900 transition">
          <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
          Dashboard
        </a>
        <a href="{{ route('news-admin.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-300/50 hover:text-slate-900 transition">
          <i data-lucide="newspaper" class="w-4 h-4"></i>
          News Manager
        </a>
        <!-- Active Link -->
        <a href="{{ route('ppdb-admin.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-sky-500/10 text-sky-600 border-r-4 border-sky-500 transition">
          <i data-lucide="user-plus" class="w-4 h-4"></i>
          PPDB Admissions
        </a>
        <a href="{{ route('galleries-admin.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-300/50 hover:text-slate-900 transition">
          <i data-lucide="image" class="w-4 h-4"></i>
          Gallery Manager
        </a>
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-300/50 hover:text-slate-900 transition">
          <i data-lucide="file-text" class="w-4 h-4"></i>
          Page Content
        </a>

        <!-- Divider label -->
        <div class="pt-6 pb-2 px-3 text-[10px] font-bold text-slate-400 uppercase tracking-wider">
          System
        </div>

        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-300/50 hover:text-slate-900 transition">
          <i data-lucide="settings" class="w-4 h-4"></i>
          Settings
        </a>
      </nav>
    </div>

    <!-- User Profile Footer -->
    <div class="p-4 border-t border-slate-300/60 flex items-center justify-between">
      <div class="flex items-center gap-3">
        <div class="w-9 h-9 rounded-full bg-slate-300 text-slate-700 font-bold text-xs flex items-center justify-center border border-slate-400/40">
          {{ strtoupper(substr(Auth::user()->name ?? 'JD', 0, 2)) }}
        </div>
        <div>
          <h4 class="text-xs font-bold text-slate-800 leading-tight">{{ Auth::user()->name ?? 'John Doe' }}</h4>
          <p class="text-[10px] text-slate-500">Super Admin</p>
        </div>
      </div>
      <form action="" method="POST">
        @csrf
        <button type="submit" class="text-slate-500 hover:text-slate-800 transition">
          <i data-lucide="log-out" class="w-4 h-4"></i>
        </button>
      </form>
    </div>
  </aside>

  <!-- ================= MAIN CONTENT AREA ================= -->
  <div class="flex-1 flex flex-col min-w-0">

    <!-- Top Header Bar -->
    <header class="bg-white border-b border-slate-200/80 px-8 py-4 flex items-center justify-between sticky top-0 z-40">
      <div>
        <h2 class="text-lg font-bold text-slate-800">Edit Pendaftar: {{ $ppdb->nama }}</h2>
        <div class="flex items-center gap-1.5 text-[11px] text-slate-400">
          <span>Admin</span>
          <i data-lucide="chevron-right" class="w-3 h-3"></i>
          <a href="{{ route('ppdb-admin.index') }}" class="hover:text-slate-600 transition">PPDB Admissions</a>
          <i data-lucide="chevron-right" class="w-3 h-3"></i>
          <span class="text-sky-500 font-medium">Edit</span>
        </div>
      </div>

      <div class="flex items-center gap-4">
        <!-- Back Button -->
        <a href="{{ route('ppdb-admin.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold px-4 py-2 rounded-lg text-xs flex items-center gap-2 transition border border-slate-200">
          <i data-lucide="arrow-left" class="w-4 h-4"></i>
          Kembali
        </a>
      </div>
    </header>

    <!-- Main Content Padding -->
    <main class="p-8 flex-1">
      <form action="{{ route('ppdb-admin.update', $ppdb->id) }}" method="POST" class="max-w-5xl space-y-8">
        @csrf
        @method('PUT')

        <!-- ================= CARD 1: DATA SISWA ================= -->
        <div class="bg-white p-8 rounded-2xl border border-slate-200/70 shadow-sm space-y-6">
          <h3 class="text-base font-bold text-slate-800 pb-2 border-b border-slate-100">Data Siswa</h3>

          <!-- Grid Row 1: NISN & NIK -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-xs font-semibold text-slate-700 mb-2">NISN</label>
              <input 
                type="text" 
                name="nisn" 
                value="{{ old('nisn', $ppdb->nisn) }}" 
                class="w-full px-4 py-2.5 bg-white border @error('nisn') border-rose-400 @else border-slate-200 @enderror rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
              >
              @error('nisn')
                <p class="text-[11px] font-medium text-rose-500 mt-1 flex items-center gap-1">
                  <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}
                </p>
              @enderror
            </div>

            <div>
              <label class="block text-xs font-semibold text-slate-700 mb-2">NIK</label>
              <input 
                type="text" 
                name="nik" 
                value="{{ old('nik', $ppdb->nik) }}" 
                class="w-full px-4 py-2.5 bg-white border @error('nik') border-rose-400 @else border-slate-200 @enderror rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
              >
              @error('nik')
                <p class="text-[11px] font-medium text-rose-500 mt-1 flex items-center gap-1">
                  <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}
                </p>
              @enderror
            </div>
          </div>

          <!-- Grid Row 2: Nama Lengkap -->
          <div>
            <label class="block text-xs font-semibold text-slate-700 mb-2">Nama Lengkap</label>
            <input 
              type="text" 
              name="nama" 
              value="{{ old('nama', $ppdb->nama) }}" 
              class="w-full px-4 py-2.5 bg-white border @error('nama') border-rose-400 @else border-slate-200 @enderror rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
            >
            @error('nama')
              <p class="text-[11px] font-medium text-rose-500 mt-1 flex items-center gap-1">
                <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}
              </p>
            @enderror
          </div>

          <!-- Grid Row 3: Jenis Kelamin & Tempat Lahir -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-xs font-semibold text-slate-700 mb-2">Jenis Kelamin</label>
              <select name="kelamin" class="w-full px-4 py-2.5 bg-white border @error('kelamin') border-rose-400 @else border-slate-200 @enderror rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-sky-500 transition cursor-pointer">
                <option value="L" {{ old('kelamin', $ppdb->kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('kelamin', $ppdb->kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
              </select>
              @error('kelamin')
                <p class="text-[11px] font-medium text-rose-500 mt-1 flex items-center gap-1">
                  <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}
                </p>
              @enderror
            </div>

            <div>
              <label class="block text-xs font-semibold text-slate-700 mb-2">Tempat Lahir</label>
              <input 
                type="text" 
                name="tempat_lahir" 
                value="{{ old('tempat_lahir', $ppdb->tempat_lahir) }}" 
                class="w-full px-4 py-2.5 bg-white border @error('tempat_lahir') border-rose-400 @else border-slate-200 @enderror rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
              >
              @error('tempat_lahir')
                <p class="text-[11px] font-medium text-rose-500 mt-1 flex items-center gap-1">
                  <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}
                </p>
              @enderror
            </div>
          </div>

          <!-- Grid Row 4: Tanggal Lahir & No. HP Siswa -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-xs font-semibold text-slate-700 mb-2">Tanggal Lahir</label>
              <input 
                type="date" 
                name="tanggal_lahir" 
                value="{{ old('tanggal_lahir', $ppdb->tanggal_lahir) }}" 
                class="w-full px-4 py-2.5 bg-white border @error('tanggal_lahir') border-rose-400 @else border-slate-200 @enderror rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
              >
              @error('tanggal_lahir')
                <p class="text-[11px] font-medium text-rose-500 mt-1 flex items-center gap-1">
                  <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}
                </p>
              @enderror
            </div>

            <div>
              <label class="block text-xs font-semibold text-slate-700 mb-2">No. HP Siswa</label>
              <input 
                type="text" 
                name="nomor_hp_siswa" 
                value="{{ old('nomor_hp_siswa', $ppdb->nomor_hp_siswa) }}" 
                class="w-full px-4 py-2.5 bg-white border @error('nomor_hp_siswa') border-rose-400 @else border-slate-200 @enderror rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
              >
              @error('nomor_hp_siswa')
                <p class="text-[11px] font-medium text-rose-500 mt-1 flex items-center gap-1">
                  <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}
                </p>
              @enderror
            </div>
          </div>

          <!-- Grid Row 5: Alamat Lengkap -->
          <div>
            <label class="block text-xs font-semibold text-slate-700 mb-2">Alamat Lengkap</label>
            <textarea 
              name="alamat" 
              rows="3" 
              class="w-full px-4 py-2.5 bg-white border @error('alamat') border-rose-400 @else border-slate-200 @enderror rounded-xl text-xs text-slate-800 leading-relaxed focus:outline-none focus:ring-2 focus:ring-sky-500 transition resize-none"
            >{{ old('alamat', $ppdb->alamat) }}</textarea>
            @error('alamat')
              <p class="text-[11px] font-medium text-rose-500 mt-1 flex items-center gap-1">
                <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}
              </p>
            @enderror
          </div>
        </div>

        <!-- ================= CARD 2: DATA ORANG TUA ================= -->
        <div class="bg-white p-8 rounded-2xl border border-slate-200/70 shadow-sm space-y-6">
          <h3 class="text-base font-bold text-slate-800 pb-2 border-b border-slate-100">Data Orang Tua</h3>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-xs font-semibold text-slate-700 mb-2">Nama Orang Tua/Wali</label>
              <input 
                type="text" 
                name="nama_ortu" 
                value="{{ old('nama_ortu', $ppdb->nama_ortu) }}" 
                class="w-full px-4 py-2.5 bg-white border @error('nama_ortu') border-rose-400 @else border-slate-200 @enderror rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
              >
              @error('nama_ortu')
                <p class="text-[11px] font-medium text-rose-500 mt-1 flex items-center gap-1">
                  <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}
                </p>
              @enderror
            </div>

            <div>
              <label class="block text-xs font-semibold text-slate-700 mb-2">No. HP Orang Tua</label>
              <input 
                type="text" 
                name="nomor_hp_ortu" 
                value="{{ old('nomor_hp_ortu', $ppdb->nomor_hp_ortu) }}" 
                class="w-full px-4 py-2.5 bg-white border @error('nomor_hp_ortu') border-rose-400 @else border-slate-200 @enderror rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
              >
              @error('nomor_hp_ortu')
                <p class="text-[11px] font-medium text-rose-500 mt-1 flex items-center gap-1">
                  <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}
                </p>
              @enderror
            </div>
          </div>
        </div>

        <!-- ================= CARD 3: SEKOLAH & STATUS ================= -->
        <div class="bg-white p-8 rounded-2xl border border-slate-200/70 shadow-sm space-y-6">
          <h3 class="text-base font-bold text-slate-800 pb-2 border-b border-slate-100">Sekolah & Status</h3>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
              <label class="block text-xs font-semibold text-slate-700 mb-2">Asal Sekolah</label>
              <input 
                type="text" 
                name="asal_sekolah" 
                value="{{ old('asal_sekolah', $ppdb->asal_sekolah) }}" 
                class="w-full px-4 py-2.5 bg-white border @error('asal_sekolah') border-rose-400 @else border-slate-200 @enderror rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
              >
              @error('asal_sekolah')
                <p class="text-[11px] font-medium text-rose-500 mt-1 flex items-center gap-1">
                  <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}
                </p>
              @enderror
            </div>

            <div>
              <label class="block text-xs font-semibold text-slate-700 mb-2">Jurusan Pilihan</label>
              <input 
                type="text" 
                name="jurusan" 
                value="{{ old('jurusan', $ppdb->jurusan) }}" 
                class="w-full px-4 py-2.5 bg-white border @error('jurusan') border-rose-400 @else border-slate-200 @enderror rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
              >
              @error('jurusan')
                <p class="text-[11px] font-medium text-rose-500 mt-1 flex items-center gap-1">
                  <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}
                </p>
              @enderror
            </div>

            <div>
              <label class="block text-xs font-semibold text-slate-700 mb-2">Status Verifikasi</label>
              <select name="status" class="w-full px-4 py-2.5 bg-white border @error('status') border-rose-400 @else border-slate-200 @enderror rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-sky-500 transition cursor-pointer">
                <option value="belumverif" {{ old('status', $ppdb->status) == 'belumverif' ? 'selected' : '' }}>Belum Verifikasi</option>
                <option value="terverifikasi" {{ old('status', $ppdb->status) == 'terverifikasi' ? 'selected' : '' }}>Terverifikasi</option>
              </select>
              @error('status')
                <p class="text-[11px] font-medium text-rose-500 mt-1 flex items-center gap-1">
                  <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}
                </p>
              @enderror
            </div>
          </div>
        </div>

        <!-- ================= BOTTOM ACTION BUTTONS ================= -->
        <div class="flex items-center justify-end gap-4 pt-2">
          <a href="{{ route('ppdb-admin.index') }}" class="px-6 py-2.5 text-xs font-semibold text-slate-600 hover:text-slate-800 transition">
            Batal
          </a>
          <button type="submit" class="px-6 py-2.5 bg-sky-500 hover:bg-sky-600 text-white text-xs font-semibold rounded-xl flex items-center gap-2 transition shadow-md">
            <i data-lucide="refresh-cw" class="w-4 h-4"></i>
            Update Data
          </button>
        </div>

      </form>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200/80 py-4 px-8 text-xs text-slate-500 flex flex-col sm:flex-row items-center justify-between gap-4 mt-auto">
      <p>© 2024 Sekolahan. All rights reserved.</p>
    </footer>

  </div>

  <!-- Initialize Lucide Icons -->
  <script>
    lucide.createIcons();
  </script>
</body>
</html>