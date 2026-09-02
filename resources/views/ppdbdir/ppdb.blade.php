<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sekolahan - PPDB Manager</title>
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
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-300/50 hover:text-slate-900 transition">
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
        <h2 class="text-lg font-bold text-slate-800">PPDB Manager</h2>
        <div class="flex items-center gap-1.5 text-[11px] text-slate-400">
          <span>Admin</span>
          <i data-lucide="chevron-right" class="w-3 h-3"></i>
          <span class="text-sky-500 font-medium">PPDB Admissions</span>
        </div>
      </div>

      <div class="flex items-center gap-4">
        <!-- Tambah Siswa Baru Button -->
        <a href="{{ route('ppdb-admin.create') }}" class="bg-sky-500 hover:bg-sky-600 text-white font-semibold px-4 py-2 rounded-lg text-xs flex items-center gap-2 transition shadow-sm">
          <i data-lucide="user-plus" class="w-4 h-4"></i>
          + Tambah Siswa Baru
        </a>
      </div>
    </header>

    <!-- Main Content Padding -->
    <main class="p-8 flex-1">

      <!-- Alert Flash Session Success -->
      @if(session('success'))
        <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold flex items-center gap-2">
          <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600"></i>
          {{ session('success') }}
        </div>
      @endif

      <!-- Table Container Card -->
      <div class="bg-white rounded-2xl border border-slate-200/70 shadow-sm overflow-hidden p-6 space-y-6">

        <!-- Filter & Table Search Bar -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
          <!-- Table Search Input -->
          <div class="relative w-full sm:w-96">
            <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
            <input
              type="text"
              placeholder="Cari NISN atau Nama..."
              class="w-full pl-10 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-500 transition shadow-sm"
            >
          </div>

          <!-- Dropdown Filter Status -->
          <div class="flex items-center gap-2 text-xs font-semibold text-slate-500 w-full sm:w-auto justify-end">
            <span>Filter:</span>
            <select class="bg-white border border-slate-200 rounded-xl px-4 py-2 text-xs text-slate-700 focus:outline-none focus:ring-2 focus:ring-sky-500 shadow-sm cursor-pointer">
              <option value="">Semua Status</option>
              <option value="Terverifikasi">Terverifikasi</option>
              <option value="Belum Verifikasi">Belum Verifikasi</option>
            </select>
          </div>
        </div>

        <!-- PPDB Data Table -->
        <div class="overflow-x-auto">
          <table class="w-full text-left border-collapse text-xs">
            <thead>
              <tr class="bg-slate-50/80 border-b border-slate-100 text-slate-500 font-bold text-[11px]">
                <th class="py-3.5 px-6">NISN</th>
                <th class="py-3.5 px-6">Nama Lengkap</th>
                <th class="py-3.5 px-6">Jurusan</th>
                <th class="py-3.5 px-6">No. HP</th>
                <th class="py-3.5 px-6">Status Verifikasi</th>
                <th class="py-3.5 px-6 text-center">Aksi</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700 font-medium">

              @forelse ($ppdb as $item)
                <tr class="hover:bg-slate-50/60 transition">
                  <td class="py-4 px-6 text-slate-400 font-mono">{{ $item->nisn }}</td>
                  <td class="py-4 px-6 font-bold text-slate-800">{{ $item->nama }}</td>
                  <td class="py-4 px-6">
                    <span class="px-3 py-1 rounded-full text-[10px] font-bold {{ strtolower($item->jurusan) == 'ipa' ? 'bg-sky-100 text-sky-600' : 'bg-slate-200/80 text-slate-600' }}">
                      {{ strtoupper($item->jurusan) }}
                    </span>
                  </td>
                  <td class="py-4 px-6 text-slate-500">{{ $item->nomor_hp_siswa ?? $item->no_hp ?? '-' }}</td>
                  <td class="py-4 px-6">
                    @if(strtolower($item->status) == 'terverifikasi' || strtolower($item->status) == 'accepted')
                      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-semibold bg-sky-100 text-sky-600">
                        <span class="w-1.5 h-1.5 rounded-full bg-sky-500"></span> Terverifikasi
                      </span>
                    @else
                      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-semibold bg-orange-100 text-orange-700">
                        <span class="w-1.5 h-1.5 rounded-full bg-orange-500"></span>
                        {{ strtolower($item->status) == 'belumverif' ? 'Belum Verifikasi' : ucfirst($item->status ?? 'Belum Verifikasi') }}
                      </span>
                    @endif
                  </td>
                  <td class="py-4 px-6 text-center">
                    <div class="flex items-center justify-center gap-3 text-slate-400">
                      <!-- Edit Link -->
                      <a href="{{ route('ppdb-admin.edit', $item->id) }}" class="hover:text-slate-700 transition" title="Edit Data">
                        <i data-lucide="edit-2" class="w-4 h-4"></i>
                      </a>

                      <!-- Delete Form -->
                      <form action="{{ route('ppdb-admin.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data pendaftar ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="hover:text-rose-600 transition" title="Hapus Data">
                          <i data-lucide="trash-2" class="w-4 h-4"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="6" class="py-8 text-center text-slate-400">
                    Belum ada data pendaftar.
                  </td>
                </tr>
              @endforelse

            </tbody>
          </table>
        </div>

        <!-- Table Pagination Footer -->
        <div class="pt-4 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
          <div>
            Menampilkan data pendaftaran PPDB
          </div>

          <!-- Laravel Dynamic Pagination Links (jika controller pakai ->paginate()) -->
          @if(method_exists($ppdb, 'links'))
            <div>
              {{ $ppdb->links() }}
            </div>
          @endif
        </div>

      </div>

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
