<x-app-layout>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-lg-10">

                {{-- Main Card --}}
                <div class="card border-0 shadow">

                    {{-- Header --}}
                    <div class="card-header bg-white border-0 p-4">
                        <div>
                            <h3 class="fw-bold mb-1">
                                Create Gallery
                            </h3>

                            <p class="text-muted mb-0">
                                Add a new school gallery
                            </p>
                        </div>
                    </div>

                    {{-- Form --}}
                    <div class="card-body p-4">

                        <form
                            action="{{ route('admin-gallery.store') }}"
                            method="POST"
                            enctype="multipart/form-data"
                        >
                            @csrf

                            {{-- Title --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Title
                                </label>

                                <input
                                    type="text"
                                    name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title') }}"
                                    placeholder="Enter gallery title"
                                >

                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Description --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Description
                                </label>

                                <textarea
                                    name="description"
                                    rows="6"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Write the gallery description..."
                                >{{ old('description') }}</textarea>

                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Image --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Image
                                </label>

                                <input
                                    type="file"
                                    name="image"
                                    class="form-control @error('image') is-invalid @enderror"
                                >

                                <div class="form-text">
                                    Upload an image for this gallery.
                                </div>

                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Actions --}}
                            <div class="d-flex gap-2">

                                <button
                                    type="submit"
                                    class="btn btn-dark"
                                >
                                    Save Gallery
                                </button>

                                <a
                                    href="{{ route('admin-gallery.index') }}"
                                    class="btn btn-secondary"
                                >
                                    Cancel
                                </a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
</x-app-layout>
