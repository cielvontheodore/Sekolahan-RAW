<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sekolah - Admin Portal</title>
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
        <h1 class="text-xl font-bold text-teal-800 tracking-tight">Sekolah</h1>
        <p class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">Admin Portal</p>
      </div>

      <!-- Navigation Menu -->
      <nav class="px-3 space-y-1 text-xs font-semibold">
        <!-- Active Link -->
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-teal-800/10 text-teal-800 border-r-4 border-teal-800 transition">
          <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
          Dashboard
        </a>
        <a href="{{ route('news-admin.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-300/50 hover:text-slate-900 transition">
          <i data-lucide="newspaper" class="w-4 h-4"></i>
          News Manager
        </a>
        <a href="{{ route('ppdb-admin.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-300/50 hover:text-slate-900 transition">
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
      <h2 class="text-lg font-bold text-slate-800">Dashboard Overview</h2>

      <div class="flex items-center gap-4">
        <!-- Search Input -->
        <div class="relative w-64">
          <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2"></i>
          <input
            type="text"
            placeholder="Search data..."
            class="w-full pl-9 pr-4 py-2 bg-slate-100/70 border border-slate-200 rounded-lg text-xs text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-teal-700 transition"
          >
        </div>

        <!-- Notification Icon -->
        <button class="relative p-2 text-slate-500 hover:text-slate-800 transition">
          <i data-lucide="bell" class="w-5 h-5"></i>
          <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-red-500"></span>
        </button>
      </div>
    </header>

    <!-- Dashboard Content Padding -->
    <main class="p-8 space-y-8 flex-1">

      <!-- ================= 4 METRICS CARDS ================= -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- Card 1 -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/70 shadow-sm flex items-start justify-between">
          <div>
            <p class="text-[11px] font-bold text-slate-500 leading-tight mb-2">Total<br>Applicants</p>
            <h3 class="text-3xl font-extrabold text-teal-800 mb-2">2,450</h3>
            <span class="text-[10px] font-semibold text-emerald-600 flex items-center gap-1">
              <i data-lucide="trending-up" class="w-3 h-3"></i> +12% this month
            </span>
          </div>
          <div class="w-10 h-10 rounded-xl bg-teal-50 text-teal-700 flex items-center justify-center">
            <i data-lucide="users" class="w-5 h-5"></i>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/70 shadow-sm flex items-start justify-between">
          <div>
            <p class="text-[11px] font-bold text-slate-500 leading-tight mb-2">Published<br>News</p>
            <h3 class="text-3xl font-extrabold text-teal-800 mb-2">128</h3>
            <span class="text-[10px] text-slate-400 block">
              Latest: Campus Re-opening
            </span>
          </div>
          <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center">
            <i data-lucide="newspaper" class="w-5 h-5"></i>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/70 shadow-sm flex items-start justify-between">
          <div>
            <p class="text-[11px] font-bold text-slate-500 leading-tight mb-2">Gallery<br>Items</p>
            <h3 class="text-3xl font-extrabold text-teal-800 mb-2">512</h3>
            <span class="text-[10px] text-slate-400 block">
              14 pending review
            </span>
          </div>
          <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
            <i data-lucide="image" class="w-5 h-5"></i>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/70 shadow-sm flex items-start justify-between">
          <div>
            <p class="text-[11px] font-bold text-slate-500 leading-tight mb-2">Messages</p>
            <h3 class="text-3xl font-extrabold text-teal-800 mb-2">14</h3>
            <span class="text-[10px] font-bold text-rose-600 block">
              ! Urgent: 3
            </span>
          </div>
          <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center">
            <i data-lucide="mail" class="w-5 h-5"></i>
          </div>
        </div>

      </div>

      <!-- ================= MAIN SECTION: TABLE & RIGHT SIDEBAR ================= -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

        <!-- Recent Admissions Table (8 cols) -->
        <div class="lg:col-span-8 bg-white rounded-2xl border border-slate-200/70 shadow-sm overflow-hidden flex flex-col justify-between">
          <div>
            <!-- Table Header -->
            <div class="p-6 flex items-center justify-between border-b border-slate-100">
              <h3 class="text-sm font-bold text-slate-800">Recent Admissions</h3>
              <a href="#" class="text-xs font-bold text-teal-700 hover:underline">View All PPDB</a>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
              <table class="w-full text-left border-collapse text-xs">
                <thead>
                  <tr class="bg-slate-50 border-b border-slate-100 text-slate-500 font-bold text-[11px]">
                    <th class="py-3 px-6">Name</th>
                    <th class="py-3 px-6">Program</th>
                    <th class="py-3 px-6">Date</th>
                    <th class="py-3 px-6">Status</th>
                    <th class="py-3 px-6 text-right"></th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                  <!-- Row 1 -->
                  <tr class="hover:bg-slate-50/80 transition">
                    <td class="py-4 px-6 font-semibold text-slate-900">Sarah Jenkins</td>
                    <td class="py-4 px-6 text-slate-500">Computer Science</td>
                    <td class="py-4 px-6 text-slate-500">Oct 24, 2023</td>
                    <td class="py-4 px-6">
                      <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-700 uppercase">ACCEPTED</span>
                    </td>
                    <td class="py-4 px-6 text-right">
                      <button class="text-slate-400 hover:text-slate-700"><i data-lucide="more-vertical" class="w-4 h-4"></i></button>
                    </td>
                  </tr>

                  <!-- Row 2 -->
                  <tr class="hover:bg-slate-50/80 transition">
                    <td class="py-4 px-6 font-semibold text-slate-900">Marcus Thorne</td>
                    <td class="py-4 px-6 text-slate-500">Mechanical Eng.</td>
                    <td class="py-4 px-6 text-slate-500">Oct 23, 2023</td>
                    <td class="py-4 px-6">
                      <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-amber-100 text-amber-700 uppercase">PENDING</span>
                    </td>
                    <td class="py-4 px-6 text-right">
                      <button class="text-slate-400 hover:text-slate-700"><i data-lucide="more-vertical" class="w-4 h-4"></i></button>
                    </td>
                  </tr>

                  <!-- Row 3 -->
                  <tr class="hover:bg-slate-50/80 transition">
                    <td class="py-4 px-6 font-semibold text-slate-900">Elena Rodriguez</td>
                    <td class="py-4 px-6 text-slate-500">Liberal Arts</td>
                    <td class="py-4 px-6 text-slate-500">Oct 22, 2023</td>
                    <td class="py-4 px-6">
                      <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-indigo-100 text-indigo-700 uppercase">VERIFIED</span>
                    </td>
                    <td class="py-4 px-6 text-right">
                      <button class="text-slate-400 hover:text-slate-700"><i data-lucide="more-vertical" class="w-4 h-4"></i></button>
                    </td>
                  </tr>

                  <!-- Row 4 -->
                  <tr class="hover:bg-slate-50/80 transition">
                    <td class="py-4 px-6 font-semibold text-slate-900">David Kim</td>
                    <td class="py-4 px-6 text-slate-500">Business Admin</td>
                    <td class="py-4 px-6 text-slate-500">Oct 22, 2023</td>
                    <td class="py-4 px-6">
                      <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-amber-100 text-amber-700 uppercase">PENDING</span>
                    </td>
                    <td class="py-4 px-6 text-right">
                      <button class="text-slate-400 hover:text-slate-700"><i data-lucide="more-vertical" class="w-4 h-4"></i></button>
                    </td>
                  </tr>

                  <!-- Row 5 -->
                  <tr class="hover:bg-slate-50/80 transition">
                    <td class="py-4 px-6 font-semibold text-slate-900">Sohrab Ahmed</td>
                    <td class="py-4 px-6 text-slate-500">Architecture</td>
                    <td class="py-4 px-6 text-slate-500">Oct 21, 2023</td>
                    <td class="py-4 px-6">
                      <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-700 uppercase">ACCEPTED</span>
                    </td>
                    <td class="py-4 px-6 text-right">
                      <button class="text-slate-400 hover:text-slate-700"><i data-lucide="more-vertical" class="w-4 h-4"></i></button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Right Side Widgets (4 cols) -->
        <div class="lg:col-span-4 space-y-6">

          <!-- Quick Actions -->
          <div class="bg-white p-6 rounded-2xl border border-slate-200/70 shadow-sm">
            <h3 class="text-sm font-bold text-slate-800 mb-4">Quick Actions</h3>

            <div class="space-y-3 text-xs font-semibold">
              <a href="#" class="w-full bg-teal-800 hover:bg-teal-900 text-white p-3.5 rounded-xl flex items-center justify-center gap-2 transition shadow-sm">
                <i data-lucide="plus-square" class="w-4 h-4"></i>
                Create News
              </a>
              <a href="#" class="w-full bg-white hover:bg-slate-50 text-teal-800 border border-teal-800/40 p-3.5 rounded-xl flex items-center justify-center gap-2 transition">
                <i data-lucide="download" class="w-4 h-4"></i>
                Export Student Data
              </a>
              <a href="#" class="w-full bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 p-3.5 rounded-xl flex items-center justify-center gap-2 transition">
                <i data-lucide="upload-cloud" class="w-4 h-4"></i>
                Upload Gallery Assets
              </a>
            </div>
          </div>

          <!-- Storage Usage Widget -->
          <div class="bg-white p-6 rounded-2xl border border-slate-200/70 shadow-sm space-y-4">
            <h3 class="text-sm font-bold text-slate-800">Storage Usage</h3>

            <div>
              <div class="flex justify-between text-xs font-semibold mb-1.5">
                <span class="text-slate-500">Cloud Storage</span>
                <span class="text-slate-800">78%</span>
              </div>
              <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                <div class="h-full bg-teal-700 w-[78%] rounded-full"></div>
              </div>
            </div>

            <!-- Server Performance Badges -->
            <div class="grid grid-cols-2 gap-3 pt-2 text-center">
              <div class="bg-slate-50 p-2.5 rounded-xl border border-slate-100">
                <span class="block text-[10px] font-bold text-slate-400 uppercase">CPU</span>
                <span class="text-xs font-bold text-emerald-600">Stable</span>
              </div>
              <div class="bg-slate-50 p-2.5 rounded-xl border border-slate-100">
                <span class="block text-[10px] font-bold text-slate-400 uppercase">DB Speed</span>
                <span class="text-xs font-bold text-emerald-600">42ms</span>
              </div>
            </div>
          </div>

          <!-- Need Assistance Card -->
          <div class="bg-sky-50 p-6 rounded-2xl border border-sky-100 text-sky-900 space-y-3 relative overflow-hidden">
            <h4 class="text-xs font-bold">Need Assistance?</h4>
            <p class="text-[11px] text-sky-700 leading-relaxed">
              Contact our technical support team for system integration help.
            </p>
            <a href="#" class="inline-flex items-center text-xs font-bold text-teal-800 hover:underline pt-1">
              Open Support Ticket &rarr;
            </a>
          </div>

        </div>

      </div>

    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200/80 py-4 px-8 text-xs text-slate-500 flex flex-col sm:flex-row items-center justify-between gap-4 mt-auto">
      <p>© 2024 Sekolah. All rights reserved.</p>
      <div class="flex space-x-6">
        <a href="#" class="hover:text-slate-800 transition">Privacy Policy</a>
        <a href="#" class="hover:text-slate-800 transition">Terms of Service</a>
        <a href="#" class="hover:text-slate-800 transition">Contact Us</a>
      </div>
    </footer>

  </div>

  <!-- Initialize Lucide Icons -->
  <script>
    lucide.createIcons();
  </script>
</body>
</html>
