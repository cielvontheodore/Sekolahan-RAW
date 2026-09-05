<div class="card shadow-sm">
    <div class="card-header">Create Item</div>
    <div class="card-body">
        <form action="{{ route('admin-inbox.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <p>description</p>
                <input type="text" name="description" value="">
            </div>

            <div>
                <p>description</p>
                <input type="text" name="description" value="">
            </div>

            <div>
                <p>description</p>
                <input type="text" name="description" value="">
            </div>

            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('admin-inbox.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

