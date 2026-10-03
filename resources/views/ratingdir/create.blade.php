<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Rating</title>
</head>
<body>

    <h1>Create Rating</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin-rating.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Nama</label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
            >
        </div>

        <div>
            <label for="rating">Rating</label>
            <select name="rating" id="rating" required>
                <option value="">Pilih rating</option>

                @for ($i = 1; $i <= 5; $i++)
                    <option
                        value="{{ $i }}"
                        {{ old('rating') == $i ? 'selected' : '' }}
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
            >{{ old('message') }}</textarea>
        </div>

        <button type="submit">Create Rating</button>

        <a href="{{ route('admin-rating.index') }}">
            Cancel
        </a>
    </form>

</body>
</html>
