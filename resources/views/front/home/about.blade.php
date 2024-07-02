@extends('front.layout.template')

@section('title', 'About Laravel Blog - IFHAL FAIZI')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">

                <!-- Featured blog post-->
                <div class="card mb-4 shadow">
                    <a href="{{ asset('front/img/laravel.png') }}">
                        <img class="card-img-top featured-img " src="{{ asset('front/img/laravel.png') }}"
                            alt="About Laravel Blog" />
                    </a>

                    <div class="card-body">
                        <div class="small text-muted">{{ date('d/m/Y') }}</div>
                        <h2 class="card-title">About Laravel Blog</h2>
                        <p class="card-text">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum quod nesciunt recusandae hic ad
                            accusamus exercitationem vel, reprehenderit, consectetur esse enim, earum distinctio excepturi
                            id consequatur eveniet consequuntur molestias iusto.
                        </p>

                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde inventore nihil ipsa ut! Porro,
                            nisi sit omnis modi perferendis quaerat excepturi corporis quam aperiam. Beatae soluta vel nulla
                            laboriosam cupiditate.
                        </p>

                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur ex, soluta aperiam quaerat
                            officia repudiandae libero! Maiores fugiat vero, illum sequi quae iure! Hic voluptatum
                            asperiores amet odit deleniti. Fugiat.
                        </p>

                        <ul>
                            <li><a href="https://www.youtube.com/watch?v=2kM5u5xS_X4">Youtube</a></li>
                            <li><a href="https://www.instagram.com/fhzz_21/">Instagram</a></li>
                            <li><a href="https://github.com/fallss/project-UAS-Blog">Github</a></li>
                        </ul>
                        </p>
                    </div>
                </div>


            </div>

            <!-- Side widgets-->
            @include('front.layout.side-widget')

        </div>
    </div>
@endsection
