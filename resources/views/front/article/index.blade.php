@extends('front.layout.template')

@section('title', 'Article Blog - IFHAL FAIZI')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="mb-4">
            <form action="{{ route('search') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="keyword" placeholder="Serch articles..." />
                    <button class="btn btn-primary" id="button-search" type="submit">Submit</button>
                </div>
            </form>
        </div>

        @if ($keyword)
            <p>Showing Article with keyword : <b>{{ $keyword }}</b></p>
            <a href="{{ url('articles') }}" class="btn btn-secondary btn-sm mb-3">Reset</a>
        @endif

        <div class="row">
            @forelse ($articles as $item)
                <div class="col-4" data-aos="flip-up">
                    <!-- Blog post-->
                    <div class="card mb-4">
                        <a href="{{ url('p/' . $item->slug) }}"><img class="card-img-top post-img"
                                src="{{ asset('storage/back/' . $item->img) }}" alt="..." /></a>
                        <div class="card-body card-height">

                            <div class="small text-muted">
                                {{ $item->created_at->format('d-m-Y') }}
                                <a href="{{ url('category/' . $item->Category->slug) }}">{{ $item->Category->name }}
                                </a>
                            </div>

                            <h2 class="card-title h4">{{ $item->title }}</h2>
                            <p class="card-text">
                                {{ Str::limit(strip_tags($item->desc), 300, '...') }}
                            </p>
                            <a class="btn btn-primary" href="{{ url('p/' . $item->slug) }}">Read more →</a>
                        </div>
                    </div>
                </div>

            @empty
                <h3>Not Found..!</h3>
            @endforelse

        </div>
        {{ $articles->links() }}
    </div>
@endsection
