@extends('layouts.app')

@section('content')
    {{-- start cards --}}
    <div class="container">
        <div class="d-flex align-content-center justify-content-center flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 ">
            <div class="shadow rounded mt-3 col-md-9">
                <div class="col-lg-12">
                    @foreach ($user as $users)
                        <div class="card cards-category-name border border-0">

                            <img src="{{ asset('assets/users/images/breaking-news-zoom-virtual-background-video-design-template-a8bc63cc142d10b6d482df50cd70acd1_screen.jpg') }}"
                                alt="..." class="rounded img-fluid mx-auto mt-3" width="350" height="50">

                            <p class="text-paragraph col-md-12 p-5 "> <span
                                    class="fs-1 fw-bold text-dark">{{ $users->name }}</span>
                                Lorem
                                ipsum dolor
                                sit
                                amet, consectetur
                                adipisicing elit. Asperiores, quam. Optio, aliquam.
                                Nesciunt ullam mollitia rerum nisi autem cupiditate, alias ab recusandae voluptates
                                reprehenderit voluptatum, quae quidem distinctio sint. Consequuntur repellat distinctio
                                tempora officia harum velit corrupti nisi, incidunt totam iure voluptatem odio.
                                Dignissimos
                                nostrum molestias cum laborum saepe, est nobis itaque cumque amet corporis minus at illo
                                aut
                                vero eaque reprehenderit laudantium veritatis? Suscipit necessitatibus voluptates culpa
                                repudiandae nisi eligendi sit adipisci, reiciendis quos ut, vitae mollitia minima
                                similique
                                ab officiis atque natus quia aperiam voluptatem nihil ex. Repudiandae provident optio
                                blanditiis cupiditate quasi reiciendis dolorem perspiciatis, alias unde?</p>


                        </div>
                    @endforeach

                </div>



            </div>

        </div>
    </div>

    {{-- end cards --}}
@endsection
