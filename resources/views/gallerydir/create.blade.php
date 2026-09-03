<div class="card shadow-sm">
    <div class="card-header">Create Item</div>
    <div class="card-body">
        <form action="{{ route('admin-gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div>
                <p>description</p>
                <input type="text" name="description" value="">
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('admin-gallery.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
