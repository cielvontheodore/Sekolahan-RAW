<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rating</title>
</head>
<body>

    <h1>Edit Rating</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('admin-rating.update', $rating) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nama</label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name', $rating->name) }}"
            >
        </div>

        <div>
            <label for="rating">Rating</label>
            <select name="rating" id="rating" required>
                <option value="">Pilih rating</option>

                @for ($i = 1; $i <= 5; $i++)
                    <option
                        value="{{ $i }}"
                        {{ old('rating', $rating->rating) == $i ? 'selected' : '' }}
                    >
                        {{ $i }}
                    </option>
                @endfor
            </select>
        </div>

        <div>
            <label for="message">Pesan</label>
            <textarea
                name="message"
                id="message"
                rows="5"
            >{{ old('message', $rating->message) }}</textarea>
        </div>

        <button type="submit">Update Rating</button>

        <a href="{{ route('admin-rating.index') }}">
            Cancel
        </a>
    </form>

</body>
</html>
