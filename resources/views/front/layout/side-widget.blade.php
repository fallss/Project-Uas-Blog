<div class="col-lg-4">
    <!-- Search widget-->
    <div class="card mb-4 shadow">
        <div class="card-header">Search</div>
        <div class="card-body">

            <form action="{{ route('search') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="keyword" placeholder="Serch articles..." />
                    <button class="btn btn-primary" id="button-search" type="submit">Submit</button>
                </div>
            </form>

        </div>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4 shadow">
        <div class="card-header">Categories</div>
        <div class="card-body">

            <div>
                @foreach ($categories as $item)
                    <span><a href="{{ url('category/' . $item->slugz) }}"
                            class="bg-primary badge text-white unstyle-categories">{{ $item->name }}</a></span>
                @endforeach
            </div>

        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4 shadow">
        <div class="card-header">Side Widget</div>
        <div class="card-body">Feel free to customize these side widgets to include any content you desire. They are
            user-friendly and utilize the Bootstrap 5 card component for a sleek and modern appearance!.</div>
    </div>
</div>
