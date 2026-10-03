<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ratings</title>
</head>
<body>

    <h1>Ratings</h1>

    <a href="{{ route('admin-rating.create') }}">
        Create Rating
    </a>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($ratings->count())
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Rating</th>
                    <th>Pesan</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($ratings as $rating)
                    <tr>
                        <td>{{ $rating->id }}</td>

                        <td>
                            {{ $rating->name ?? '-' }}
                        </td>

                        <td>
                            {{ $rating->rating }}/5
                        </td>

                        <td>
                            {{ $rating->message ?? '-' }}
                        </td>

                        <td>
                            {{ $rating->created_at->format('d/m/Y H:i') }}
                        </td>

                        <td>
                            <a href="{{ route('admin-rating.edit', $rating) }}">
                                Edit
                            </a>

                            <form
                                action="{{ route('admin-rating.destroy', $rating) }}"
                                method="POST"
                                style="display: inline;"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('Yakin ingin menghapus rating ini?')"
                                >
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{ $ratings->links() }}
        </div>
    @else
        <p>Belum ada rating.</p>
    @endif

</body>
</html>
