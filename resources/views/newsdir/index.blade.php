@foreach ($news as $item)
    <img src="{{ asset('storage/' . $item->image) }}" alt="tolong gaada" width="200px">
@endforeach
<a href="{{ route('admin-news.create') }}">
    <p>klik sini</p>
</a>

