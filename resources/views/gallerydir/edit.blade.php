<div class="card shadow-sm">
    <div class="card-header">Edit Item</div>
    <div class="card-body">
        <form action="{{ route('admin-gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $gallery->title) }}">
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', $gallery->description) }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            @if($gallery->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="Preview" class="img-thumbnail" width="150">
                </div>
            @endif

            <div class="mb-3">
                <label class="form-label">Image (Opsional)</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin-gallery.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>


