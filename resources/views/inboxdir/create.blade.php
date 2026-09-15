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
                                Create Inbox
                            </h3>

                            <p class="text-muted mb-0">
                                Add a new school inbox
                            </p>
                        </div>
                    </div>

                    {{-- Form --}}
                    <div class="card-body p-4">

                        <form
                            action="{{ route('admin-inbox.store') }}"
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
                                    name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}"
                                    placeholder="Enter inbox name"
                                >

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $name }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}"
                                    placeholder="Enter email name"
                                >

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $email }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Program --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Program
                                </label>

                                <input
                                    type="text"
                                    name="program"
                                    class="form-control @error('program') is-invalid @enderror"
                                    value="{{ old('program') }}"
                                    placeholder="Enter program name"
                                >

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $email }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Message --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Message
                                </label>

                                <textarea
                                    name="message"
                                    rows="6"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Write the inbox message..."
                                >{{ old('message') }}</textarea>

                                @error('message')
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
                                    Save Inbox
                                </button>

                                <a
                                    href="{{ route('admin-inbox.index') }}"
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
