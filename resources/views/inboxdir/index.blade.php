<div class="card shadow-sm">
    <div class="card-header">
        Inbox
    </div>

    <div class="card-body">
        <a href="{{ route('admin-inbox.create') }}" class="btn btn-success mb-3">
            Tambah Inbox
        </a>

        @foreach ($inbox as $item)
            <div class="card mb-3">
                <div class="card-body">
                    <h5>{{ $item->name }}</h5>

                    <p><strong>Email:</strong>{{ $item->email }}</p>

                    <p><strong>Program:</strong>{{ $item->program }}</p>

                    <p><strong>Message:</strong>{{ $item->message }}</p>

                    <a href="{{ route('admin-inbox.edit', $item->id) }}"
                        class="btn btn-warning">
                        Edit
                    </a>

                    <form
                        action="{{ route('admin-inbox.destroy', $item->id) }}"
                        method="POST"
                        style="display:inline;"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger"
                            onclick="return confirm('Yakin mau hapus?')"
                        >
                            Delete
                        </button>
                    </form>

                </div>
            </div>
        @endforeach

        {{ $inbox->links() }}

    </div>
</div>
