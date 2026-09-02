<!DOCTYPE html>
<html>
<head>
    <title>Edit Foto Gallery</title>
</head>
<body>

    <h1>Edit Data Foto</h1>

    <!-- Action mengarah ke route update dengan parameter ID -->
    <form action="{{ route('galleries-admin.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- WAJIB ADA: Mengubah request POST jadi PUT/PATCH -->

        <div>
            <label>Judul:</label><br>
            <input type="text" name="title" value="{{ old('title', $gallery->title) }}">
        </div>

        <br>

        <div>
            <label>Foto Saat Ini:</label><br>
            <img src="{{ asset('storage/' . $gallery->path) }}" width="150"><br><br>
            
            <label>Ganti Foto Baru (Kosongkan jika tidak ingin mengganti):</label><br>
            <input type="file" name="image" accept="image/*">
        </div>

        <br>

        <div>
            <label>Deskripsi:</label><br>
            <textarea name="description">{{ old('description', $gallery->description) }}</textarea>
        </div>

        <br>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('galleries-admin.index') }}">Batal</a>
    </form>

</body>
</html>