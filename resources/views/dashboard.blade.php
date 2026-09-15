<x-app-layout>
@vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-slot name="header">
        <div>
            <h2 class="fw-bold mb-1">Dashboard</h2>
            <p class="text-muted mb-0">
                Manage your school website
            </p>
        </div>
    </x-slot>

    <div class="container py-4">

        <div class="row g-3">

            {{-- News --}}
            <div class="col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h6 class="text-muted mb-2">News</h6>

                        <h2 class="fw-bold mb-3">
                            12
                        </h2>

                        <a
                            href="{{ route('admin-news.index') }}"
                            class="text-decoration-none"
                        >
                            Manage News →
                        </a>
                    </div>
                </div>
            </div>

            {{-- Gallery --}}
            <div class="col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h6 class="text-muted mb-2">Gallery</h6>

                        <h2 class="fw-bold mb-3">
                            24
                        </h2>

                        <a
                            href="{{ route('admin-gallery.index') }}"
                            class="text-decoration-none"
                        >
                            Manage Gallery →
                        </a>
                    </div>
                </div>
            </div>

            {{-- Inbox --}}
            <div class="col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h6 class="text-muted mb-2">Inbox</h6>

                        <h2 class="fw-bold mb-3">
                            8
                        </h2>

                        <a
                            href="{{ route('admin-inbox.index') }}"
                            class="text-decoration-none"
                        >
                            View Inbox →
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</x-app-layout>

