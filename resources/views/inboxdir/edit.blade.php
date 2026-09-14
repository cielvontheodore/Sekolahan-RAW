<div class="card shadow-sm">
    <div class="card-header">
        Edit Inbox
    </div>

    <div class="card-body">
        <form action="{{ route('admin-inbox.update', $inbox->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $inbox->name) }}"
                >

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $inbox->email) }}"
                >

                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="program" class="form-label">Program</label>

                <input
                    type="text"
                    id="program"
                    name="program"
                    class="form-control @error('program') is-invalid @enderror"
                    value="{{ old('program', $inbox->program) }}"
                >

                @error('program')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>

                <textarea
                    id="message"
                    name="message"
                    rows="4"
                    class="form-control @error('message') is-invalid @enderror"
                >{{ old('message', $inbox->message) }}</textarea>

                @error('message')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('admin-inbox.index') }}" class="btn btn-secondary">
                Cancel
            </a>
        </form>
    </div>
</div>
