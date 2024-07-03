@extends('front.layout.template')

@section('title', 'Contact Laravel Blog - IFHAL FAIZI')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8" data-aos="zoom-in">

                <!-- Featured blog post-->
                <div class="card mb-4 shadow">
                    <div class="text-center">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.666426976269!2d106.8271528!3d-6.1753924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2e764b12d%3A0x3d2ad6e1e0e9bcc8!2sMonumen%20Nasional!5e0!3m2!1sid!2sid!4v1720017644395!5m2!1sid!2sid"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                    <div class="card-body">
                        <div class="small text-muted">{{ date('d/m/Y') }}</div>
                        <h2 class="card-title">Contact Laravel Blog</h2>
                        <p class="card-text">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum quod nesciunt recusandae hic ad
                            accusamus exercitationem vel, reprehenderit, consectetur esse enim, earum distinctio excepturi
                            id consequatur eveniet consequuntur molestias iusto.
                        </p>

                        <ul>
                            <li>Phone : +62895346184632</li>
                            <li>Email : ifhalf21@gmail.com</li>
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
