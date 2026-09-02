<!DOCTYPE html>
<html>
<head>
    <title>Upload Foto</title>
</head>
<body>

    <h1>Tambah Foto Baru</h1>

    <!-- 
      Wajib pakai:
      1. method="POST"
      2. action ke route galleries.store
      3. enctype="multipart/form-data" (karena ada upload file)
    -->
    <form action="{{ route('galleries-admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- Wajib di Laravel buat keamanan -->

        <div>
            <label>Judul:</label><br>
            <input type="text" name="title" required>
        </div>

        <br>

        <div>
            <label>Pilih Gambar:</label><br>
            <input type="file" name="image" required accept="image/*">
        </div>

        <br>

        <div>
            <label>Caption:</label><br>
            <textarea name="caption"></textarea>
        </div>

        <br>

        <button type="submit">Upload</button>
        <a href="{{ route('galleries-admin.index') }}">Batal</a>
    </form>

</body>
</html>