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
                                Edit Inbox
                            </h3>

                            <p class="text-muted mb-0">
                                Edit a school inbox
                            </p>
                        </div>
                    </div>

                    {{-- Form --}}
                    <div class="card-body p-4">

                        <form
                            action="{{ route('admin-inbox.update', $inbox->id) }}"
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
                                    name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $inbox->name) }}"
                                    placeholder="Enter inbox name"
                                >

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
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
                                    value="{{ old('email', $inbox->email) }}"
                                    placeholder="Enter email name"
                                >

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
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
                                    value="{{ old('program', $inbox->program) }}"
                                    placeholder="Enter program name"
                                >

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
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
                                >{{ old('message', $inbox->message) }}</textarea>

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
                                    Edit Inbox
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
