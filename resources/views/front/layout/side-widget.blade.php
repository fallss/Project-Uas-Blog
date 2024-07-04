<div class="col-lg-4" data-aos="fade-left">
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
                    <span><a href="{{ url('category/' . $item->slug) }}"
                            class="bg-primary badge text-white unstyle-categories">
                            {{ $item->name }} ({{ $item->articles_count }})
                        </a></span>
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

    <!-- Popular Post -->
    <div class="card mb-4 shadow">
        <div class="card-header">Popular Post</div>
        <div class="card-body">
            @foreach ($popular_posts as $item)
                <div class="card mb-2">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/back/' . $item->img) }}" alt="{{ $item->title }}"
                                class="img-fluid">
                        </div>

                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-title">
                                    <a href="{{ url('p/' . $item->slug) }}">{{ $item->title }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
