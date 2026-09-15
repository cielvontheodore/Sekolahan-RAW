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
                                Gallery
                            </h3>

                            <p class="text-muted mb-0">
                                Manage school gallery
                            </p>
                        </div>

                        <a
                            href="{{ route('admin-gallery.create') }}"
                            class="btn btn-dark"
                        >
                            + Add gallery
                        </a>

                    </div>
                </div>

                {{-- gallery List --}}
                <div class="card-body p-4">

                    @forelse ($gallery as $item)

                        <div class="border rounded p-3 mb-3">

                            <div class="row align-items-center g-3">

                                {{-- Image --}}
                                <div class="col-md-3">

                                    @if ($item->image)

                                        <img
                                            src="{{ asset('storage/' . $item->image) }}"
                                            alt="{{ $item->title }}"
                                            class="img-fluid rounded"
                                            style="
                                                width: 100%;
                                                height: 130px;
                                                object-fit: cover;
                                            "
                                        >

                                    @else

                                        <div
                                            class="bg-light rounded d-flex align-items-center justify-content-center text-muted"
                                            style="height: 130px;"
                                        >
                                            No Image
                                        </div>

                                    @endif

                                </div>

                                {{-- gallery Content --}}
                                <div class="col-md-6">

                                    <h5 class="fw-bold mb-2">
                                        {{ $item->title }}
                                    </h5>

                                    @if ($item->description)

                                        <p class="text-muted mb-0">
                                            {{ Str::limit($item->description, 120) }}
                                        </p>

                                    @endif

                                </div>

                                {{-- Actions --}}
                                <div class="col-md-3">

                                    <div class="d-flex justify-content-md-end gap-2">

                                        <a
                                            href="{{ route('admin-gallery.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('admin-gallery.destroy', $item->id) }}"
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
                                Belum ada gallery
                            </h5>

                            <p class="text-muted">
                                Belum ada berita yang ditambahkan.
                            </p>

                            <a
                                href="{{ route('admin-gallery.create') }}"
                                class="btn btn-dark"
                            >
                                + Add gallery
                            </a>

                        </div>

                    @endforelse

                    {{-- Pagination --}}
                    @if ($gallery->hasPages())

                        <div class="mt-4">
                            {{ $gallery->links() }}
                        </div>

                    @endif

                </div>

            </div>

        </div>
    </div>

</div>
</x-app-layout>

