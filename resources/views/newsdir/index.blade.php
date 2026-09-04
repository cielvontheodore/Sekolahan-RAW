@foreach ($news as $item)
    <img src="{{ asset('storage/' . $item->image) }}" alt="tolong gaada" width="200px">
@endforeach
<a href="{{ route('admin-news.create') }}">
    <p>klik sini</p>
</a>

@foreach ($news as $item)
    <div>
        <h3>{{ $item->title }}</h3>

        <!-- Tombol Edit (Arahkan ke halaman edit) -->
        <a href="{{ route('admin-news.edit', $item->id) }}" class="btn btn-warning">Edit</a>

        <!-- Form Delete (Wajib Pake Form + DELETE Method) -->
        <form action="{{ route('admin-news.destroy', $item->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin mau hapus?')">Delete</button>
        </form>
    </div>
@endforeach

