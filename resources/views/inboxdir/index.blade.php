<x-app-layout>
@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-10">

            {{-- Main Card --}}
            <div class="card border-0 shadow">

                {{-- Header --}}
                <div class="card-header bg-white border-0 p-4">
                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <h3 class="fw-bold mb-1">
                                Inbox
                            </h3>

                            <p class="text-muted mb-0">
                                Manage school inbox
                            </p>
                        </div>

                        <a
                            href="{{ route('admin-inbox.create') }}"
                            class="btn btn-dark"
                        >
                            + Add Inbox
                        </a>

                    </div>
                </div>

                {{-- News List --}}
                <div class="card-body p-4">

                    @forelse ($inbox as $item)

                        <div class="border rounded p-3 mb-3">

                            <div class="row align-items-center g-3">

                                {{-- News Content --}}
                                <div class="col-md-9">

                                    <h5 class="fw-bold mb-1">
                                        {{ $item->name }}
                                    </h5>
                                
                                    <div class="text-muted small mb-3">
                                        {{ $item->email }} · {{ $item->program }}
                                    </div>
                                
                                    @if ($item->message)
                                        <strong>Message</strong>
                                
                                        <p class="bg-light rounded p-3 mt-2 mb-0 text-muted">
                                            "{{ Str::limit($item->message, 120) }}"
                                        </p>
                                    @endif
                                
                                </div>

                                {{-- Actions --}}
                                <div class="col-md-3">

                                    <div class="d-flex justify-content-md-end gap-2">

                                        <a
                                            href="{{ route('admin-inbox.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('admin-inbox.destroy', $item->id) }}"
                                            method="POST"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin mau hapus?')"
                                            >
                                                Delete
                                            </button>
                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="text-center py-5">

                            <h5 class="fw-bold">
                                Belum ada inbox
                            </h5>

                            <p class="text-muted">
                                Belum ada berita yang ditambahkan.
                            </p>

                            <a
                                href="{{ route('admin-inbox.create') }}"
                                class="btn btn-dark"
                            >
                                + Add inbox
                            </a>

                        </div>

                    @endforelse

                    {{-- Pagination --}}
                    @if ($inbox->hasPages())

                        <div class="mt-4">
                            {{ $inbox->links() }}
                        </div>

                    @endif

                </div>

            </div>

        </div>
    </div>

</div>
</x-app-layout>

