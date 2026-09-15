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
                                Edit News
                            </h3>

                            <p class="text-muted mb-0">
                                Update the school news
                            </p>
                        </div>
                    </div>

                    {{-- Form --}}
                    <div class="card-body p-4">

                        <form
                            action="{{ route('admin-news.update', $news->id) }}"
                            method="POST"
                            enctype="multipart/form-data"
                        >
                            @csrf
                            @method('PUT')

                            {{-- Title --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Title
                                </label>

                                <input
                                    type="text"
                                    name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $news->title) }}"
                                    placeholder="Enter news title"
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
                                    placeholder="Write the news description..."
                                >{{ old('description', $news->description) }}</textarea>

                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Current Image --}}
                            @if($news->image)

                                <div class="mb-4">
                                    <label class="form-label fw-semibold">
                                        Current Image
                                    </label>

                                    <div>
                                        <img
                                            src="{{ asset('storage/' . $news->image) }}"
                                            alt="{{ $news->title }}"
                                            class="img-thumbnail rounded"
                                            style="
                                                width: 200px;
                                                height: 130px;
                                                object-fit: cover;
                                            "
                                        >
                                    </div>
                                </div>

                            @endif

                            {{-- New Image --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Replace Image
                                </label>

                                <input
                                    type="file"
                                    name="image"
                                    class="form-control @error('image') is-invalid @enderror"
                                >

                                <div class="form-text">
                                    Leave empty if you want to keep the current image.
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
                                    Update News
                                </button>

                                <a
                                    href="{{ route('admin-news.index') }}"
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
