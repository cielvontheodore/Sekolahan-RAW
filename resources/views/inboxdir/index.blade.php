<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Inbox - Admin NARRA</title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <!-- Google Fonts -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
    >

    <style>
        :root {
            --primary-blue: #2b66f6;
            --primary-blue-hover: #1e52d8;
            --light-bg: #f8fafd;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont,
                "Segoe UI", Roboto, sans-serif;
            background-color: var(--light-bg);
            color: var(--text-main);
            overflow-x: hidden;
            min-height: 100vh;
        }

        /* Sidebar */

        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #ffffff;
            border-right: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 1.5rem 1.25rem;
            z-index: 100;
        }

        .brand-logo {
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--primary-blue);
            text-decoration: none;
            letter-spacing: -0.5px;
            display: inline-block;
            margin-bottom: 2rem;
            padding-left: 0.75rem;
        }

        .nav-link-custom {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            padding: 0.75rem 1rem;
            color: #475569;
            font-weight: 600;
            font-size: 0.925rem;
            border-radius: 0.5rem;
            text-decoration: none;
            margin-bottom: 0.35rem;
            transition: all 0.2s ease;
        }

        .nav-link-custom i {
            font-size: 1.15rem;
        }

        .nav-link-custom:hover {
            background-color: #f1f5f9;
            color: var(--primary-blue);
        }

        .nav-link-custom.active {
            background-color: var(--primary-blue);
            color: #ffffff;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding-top: 1rem;
            border-top: 1px solid #f1f5f9;
        }

        .admin-avatar {
            width: 38px;
            height: 38px;
            background-color: var(--primary-blue);
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .admin-name {
            font-weight: 700;
            font-size: 0.9rem;
            color: #0f172a;
            line-height: 1.2;
        }

        .admin-role {
            font-size: 0.75rem;
            color: #64748b;
        }

        /* Main */

        .main-wrapper {
            margin-left: 260px;
            padding: 2.25rem 2.5rem;
            min-height: 100vh;
        }

        .page-title {
            font-weight: 800;
            font-size: 2.1rem;
            color: #0f172a;
            letter-spacing: -0.5px;
            margin-bottom: 0.25rem;
        }

        .page-subtitle {
            color: var(--text-muted);
            font-size: 0.95rem;
        }

        /* Add Button */

        .btn-top-add {
            background-color: var(--primary-blue);
            color: #ffffff;
            font-weight: 600;
            padding: 0.65rem 1.35rem;
            border-radius: 0.5rem;
            border: none;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .btn-top-add:hover {
            background-color: var(--primary-blue-hover);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(43, 102, 246, 0.25);
        }

        /* Search */

        .search-container {
            position: relative;
            max-width: 380px;
            margin-bottom: 1.5rem;
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 0.95rem;
        }

        .search-input {
            width: 100%;
            padding: 0.65rem 1rem 0.65rem 2.6rem;
            background-color: #ffffff;
            border: 1px solid transparent;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            color: #334155;
            outline: none;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03);
            transition: all 0.2s ease;
        }

        .search-input::placeholder {
            color: #94a3b8;
        }

        .search-input:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(43, 102, 246, 0.12);
        }

        /* Table */

        .table-card {
            background-color: #ffffff;
            border-radius: 0.85rem;
            border: 1px solid #f1f5f9;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
            overflow: hidden;
        }

        .custom-table {
            width: 100%;
            margin: 0;
            border-collapse: collapse;
        }

        .custom-table th {
            background-color: #eff4fe;
            color: #475569;
            font-weight: 700;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            padding: 1rem 1.5rem;
            border: none;
        }

        .custom-table td {
            padding: 1.15rem 1.5rem;
            vertical-align: middle;
            border-bottom: 1px solid #f8fafc;
            font-size: 0.875rem;
        }

        .custom-table tr:last-child td {
            border-bottom: none;
        }

        .sender-name {
            font-weight: 700;
            color: #0f172a;
        }

        .email-text {
            color: #64748b;
            font-size: 0.825rem;
        }

        .program-text {
            color: #475569;
            font-weight: 600;
            font-size: 0.825rem;
        }

        .message-text {
            color: #64748b;
            display: block;
            max-width: 350px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .date-text {
            color: #64748b;
            font-weight: 500;
            white-space: nowrap;
        }

        /* Actions */

        .action-btn-group {
            display: flex;
            align-items: center;
            gap: 1.25rem;
        }

        .action-link {
            font-weight: 600;
            font-size: 0.825rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            transition: opacity 0.2s ease;
            border: none;
            background: none;
            padding: 0;
        }

        .action-link-edit {
            color: #2b66f6;
        }

        .action-link-edit:hover {
            color: #1e52d8;
            text-decoration: underline;
        }

        .action-link-delete {
            color: #ef4444;
        }

        .action-link-delete:hover {
            color: #dc2626;
            text-decoration: underline;
        }

        /* Empty State */

        .empty-state {
            padding: 4rem 1.5rem;
            text-align: center;
        }

        .empty-icon {
            width: 56px;
            height: 56px;
            background-color: #f1f5f9;
            color: var(--text-muted);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.4rem;
        }

        .empty-title {
            font-size: 1rem;
            font-weight: 800;
            margin-bottom: 0.35rem;
        }

        .empty-text {
            color: var(--text-muted);
            font-size: 0.85rem;
            margin-bottom: 1.25rem;
        }

        /* Pagination */

        .pagination-wrapper {
            padding: 1.25rem 1.5rem;
            border-top: 1px solid #f1f5f9;
        }

        /* Mobile */

        @media (max-width: 991.98px) {

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                border-right: none;
                border-bottom: 1px solid var(--border-color);
            }

            .main-wrapper {
                margin-left: 0;
                padding: 1.5rem;
            }

        }

        @media (max-width: 767.98px) {

            .message-text {
                max-width: 250px;
            }

        }

        @media (max-width: 575.98px) {

            .page-title {
                font-size: 1.7rem;
            }

            .custom-table th,
            .custom-table td {
                padding: 1rem;
            }

            .message-text {
                max-width: 180px;
            }

        }
    </style>
</head>

<body>

    <!-- Sidebar -->

    <aside class="sidebar">

        <div>

            <a href="{{ route('dashboard') }}" class="brand-logo">
                Narra
            </a>

            <nav class="nav flex-column">

                <a href="{{ route('dashboard') }}" class="nav-link-custom">
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin-news.index') }}" class="nav-link-custom">
                    <i class="bi bi-newspaper"></i>
                    <span>News</span>
                </a>

                <a href="{{ route('admin-gallery.index') }}" class="nav-link-custom">
                    <i class="bi bi-images"></i>
                    <span>Gallery</span>
                </a>

                <a href="{{ route('admin-inbox.index') }}" class="nav-link-custom active">
                    <i class="bi bi-envelope-fill"></i>
                    <span>Inbox</span>
                </a>

                <a href="{{ route('admin-rating.index') }}" class="nav-link-custom">
                    <i class="bi bi-star"></i>
                    <span>Rating</span>
                </a>

                @can('manage-admins')
                    <a href="{{ route('admin-admins.index') }}" class="nav-link-custom">
                        <i class="bi bi-gear"></i>
                        <span>Akun</span>
                    </a>
                @endcan

            </nav>

        </div>

        <div class="admin-profile">

            <div class="admin-avatar">
                <i class="bi bi-person-fill"></i>
            </div>

            <div>

                <div class="admin-name">
                    {{ auth()->user()->name }}
                </div>

                <div class="admin-role">
                    {{ auth()->user()->role ?? 'Admin' }}
                </div>

            </div>

        </div>

    </aside>


    <!-- Main Content -->

    <main class="main-wrapper">

        <!-- Header -->

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

            <div>

                <h1 class="page-title">
                    Kelola Inbox
                </h1>

                <p class="page-subtitle m-0">
                    Kelola pesan dan pertanyaan dari pengunjung website NARRA.
                </p>

            </div>

            <div>

                <a
                    href="{{ route('admin-inbox.create') }}"
                    class="btn-top-add"
                >
                    <i class="bi bi-plus-lg"></i>
                    <span>Tambah Inbox</span>
                </a>

            </div>

        </div>


        <!-- Search -->

        <div class="search-container">

            <i class="bi bi-search search-icon"></i>

            <input
                type="text"
                id="inboxSearch"
                class="search-input"
                placeholder="Cari nama, email, program, atau pesan..."
            >

        </div>


        <!-- Table -->

        <div class="table-card">

            <div class="table-responsive">

                <table class="table custom-table mb-0">

                    <thead>

                        <tr>

                            <th scope="col" style="width: 18%;">
                                PENGIRIM
                            </th>

                            <th scope="col" style="width: 20%;">
                                EMAIL
                            </th>


                            <th scope="col" style="width: 15%;">
                                PROGRAM
                            </th>

                            <th scope="col" style="width: 27%;">
                                PESAN
                            </th>

                            <th scope="col" style="width: 10%;">
                                TANGGAL
                            </th>

                            <th scope="col" style="width: 10%;">
                                AKSI
                            </th>

                        </tr>

                    </thead>

                    <tbody id="inboxTable">

                        @forelse ($inbox as $item)

                            <tr class="inbox-row">

                                <td>
                                    <span class="sender-name">
                                        {{ $item->name ?? 'Anonim' }}
                                    </span>
                                </td>

                                <td>
                                    <span
                                        class="email-text"
                                        title="{{ $item->email }}"
                                    >
                                        {{ $item->email ?? '-' }}
                                    </span>
                                </td>

                                <td>
                                    <span class="program-text">
                                        {{ $item->program ?? '-' }}
                                    </span>
                                </td>

                                <td>
                                    <span
                                        class="message-text"
                                        title="{{ $item->message ?? '-' }}"
                                    >
                                        {{ $item->message ?? '-' }}
                                    </span>
                                </td>

                                <td>
                                    <span class="date-text">
                                        {{ $item->created_at->format('d M Y') }}
                                    </span>
                                </td>

                                <td>

                                    <div class="action-btn-group">

                                        <a
                                            href="{{ route('admin-inbox.edit', $item->id) }}"
                                            class="action-link action-link-edit"
                                        >
                                            <i class="bi bi-pencil"></i>
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('admin-inbox.destroy', $item->id) }}"
                                            method="POST"
                                            class="d-inline"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-link action-link-delete"
                                                onclick="return confirm('Yakin ingin menghapus pesan ini?')"
                                            >
                                                <i class="bi bi-trash"></i>
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6">

                                    <div class="empty-state">

                                        <div class="empty-icon">
                                            <i class="bi bi-envelope"></i>
                                        </div>

                                        <div class="empty-title">
                                            Belum ada inbox
                                        </div>

                                        <p class="empty-text">
                                            Belum ada pesan yang masuk melalui website.
                                        </p>

                                        <a
                                            href="{{ route('admin-inbox.create') }}"
                                            class="btn-top-add"
                                        >
                                            <i class="bi bi-plus-lg"></i>
                                            <span>Tambah Inbox</span>
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            @if ($inbox->hasPages())

                <div class="pagination-wrapper">
                    {{ $inbox->links() }}
                </div>

            @endif

        </div>

    </main>


    <!-- Bootstrap JS -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>


    <!-- Search -->

    <script>

        document
            .getElementById('inboxSearch')
            .addEventListener('input', function () {

                const search = this.value.toLowerCase().trim();

                const rows = document.querySelectorAll('.inbox-row');

                rows.forEach(function (row) {

                    const text = row.textContent.toLowerCase();

                    row.style.display = text.includes(search)
                        ? ''
                        : 'none';

                });

            });

    </script>

</body>
</html>

