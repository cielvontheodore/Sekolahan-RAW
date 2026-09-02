<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sekolahan - Create News Article</title>
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
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-300/50 hover:text-slate-900 transition">
          <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
          Dashboard
        </a>
        <!-- Active Link -->
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-sky-500/10 text-sky-600 border-r-4 border-sky-500 transition">
          <i data-lucide="newspaper" class="w-4 h-4"></i>
          News Manager
        </a>
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-300/50 hover:text-slate-900 transition">
          <i data-lucide="user-plus" class="w-4 h-4"></i>
          PPDB Admissions
        </a>
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-300/50 hover:text-slate-900 transition">
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
          JD
        </div>
        <div>
          <h4 class="text-xs font-bold text-slate-800 leading-tight">John Doe</h4>
          <p class="text-[10px] text-slate-500">Super Admin</p>
        </div>
      </div>
      <button class="text-slate-500 hover:text-slate-800 transition">
        <i data-lucide="log-out" class="w-4 h-4"></i>
      </button>
    </div>
  </aside>

  <!-- ================= MAIN CONTENT AREA ================= -->
  <div class="flex-1 flex flex-col min-w-0">

    <!-- Top Header Bar -->
    <header class="bg-white border-b border-slate-200/80 px-8 py-4 flex items-center justify-between sticky top-0 z-40">
      <div>
        <h2 class="text-lg font-bold text-slate-800">News Manager</h2>
        <div class="flex items-center gap-1.5 text-[11px] text-slate-400">
          <span>Admin</span>
          <i data-lucide="chevron-right" class="w-3 h-3"></i>
          <span>News Manager</span>
          <i data-lucide="chevron-right" class="w-3 h-3"></i>
          <span class="text-sky-500 font-medium">Create</span>
        </div>
      </div>

      <div class="flex items-center gap-4">
        <!-- Search Bar -->
        <div class="relative w-72">
          <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2"></i>
          <input 
            type="text" 
            placeholder="Search media by title..." 
            class="w-full pl-9 pr-4 py-2 bg-slate-100/80 border border-slate-200 rounded-lg text-xs text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
          >
        </div>

        <!-- Upload Media Button -->
        <button class="bg-sky-500 hover:bg-sky-600 text-white font-semibold px-4 py-2 rounded-lg text-xs flex items-center gap-2 transition shadow-sm">
          <i data-lucide="cloud-upload" class="w-4 h-4"></i>
          Upload New Media
        </button>
      </div>
    </header>

   <!-- Main Content Padding -->
<main class="p-8 flex-1">
  <!-- FORM UTAMA -->
  <form action="{{ route('news-admin.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
    @csrf

    <!-- Main Form Card (8 cols) -->
    <div class="lg:col-span-8 bg-white p-8 rounded-2xl border border-slate-200/70 shadow-sm space-y-6">
      
      <!-- News Title -->
      <div>
        <label class="block text-xs font-bold text-slate-700 mb-2">News Title</label>
        <input 
          type="text" 
          name="title" 
          value="{{ old('title') }}" 
          placeholder="Enter a descriptive headline..." 
          class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-500 transition shadow-sm"
          required
        >
        @error('title')
          <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Featured Thumbnail Area -->
      <div>
        <label class="block text-xs font-bold text-slate-700 mb-2">Featured Thumbnail</label>
        <div class="border-2 border-dashed border-slate-300 hover:border-sky-400 rounded-2xl p-8 flex flex-col items-center justify-center text-center cursor-pointer transition bg-slate-50/50 hover:bg-sky-50/30 group relative">
          <div class="w-12 h-12 rounded-full bg-sky-100/80 text-sky-500 flex items-center justify-center mb-3 group-hover:scale-110 transition">
            <i data-lucide="cloud-upload" class="w-6 h-6"></i>
          </div>
          <p class="text-xs font-bold text-slate-800 mb-1">Upload your image here</p>
          <p class="text-[11px] text-slate-400">JPG, PNG, WEBP (Max 10MB)</p>
          
          <!-- Input file diberi name="thumbnail" -->
          <input type="file" name="thumbnail" accept="image/*" class="mt-4 text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-sky-50 file:text-sky-700 hover:file:bg-sky-100">
        </div>
        @error('thumbnail')
          <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- News Content -->
      <div>
        <label class="block text-xs font-bold text-slate-700 mb-2">News Content</label>
        <div class="border border-slate-200 rounded-xl overflow-hidden shadow-sm">
          <textarea 
            name="content" 
            rows="10" 
            placeholder="Start writing your news story here..." 
            class="w-full px-4 py-4 text-xs text-slate-800 placeholder-slate-400 focus:outline-none resize-none"
            required
          >{{ old('content') }}</textarea>
        </div>
        @error('content')
          <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p>
        @enderror
      </div>

    </div>

    <!-- Right Side / Action Panel (4 cols) -->
    <div class="lg:col-span-4 space-y-4">
      <div class="bg-white p-6 rounded-2xl border border-slate-200/70 shadow-sm space-y-4">
        <h3 class="text-xs font-bold text-teal-800 tracking-wider uppercase">Publishing Action</h3>

        <!-- Tombol Submit -->
        <button type="submit" class="w-full bg-sky-500 hover:bg-sky-600 text-white font-semibold py-3 px-4 rounded-xl text-xs flex items-center justify-center gap-2 transition shadow-sm">
          <i data-lucide="send" class="w-4 h-4"></i>
          Publish Article
        </button>

        <a href="{{ route('news-admin.index') }}" class="w-full block text-center bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold py-3 px-4 rounded-xl text-xs transition">
          Cancel
        </a>
      </div>
    </div>

  </form>
</main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200/80 py-4 px-8 text-xs text-slate-500 flex flex-col sm:flex-row items-center justify-between gap-4 mt-auto">
      <p>© 2024 Sekolah. All rights reserved.</p>
    </footer>

  </div>

  <!-- Initialize Lucide Icons -->
  <script>
    lucide.createIcons();
  </script>
</body>
</html>