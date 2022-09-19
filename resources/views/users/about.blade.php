@extends('layouts.app')

@section('content')
    {{-- start cards --}}
    <div class="container">
        <div class="d-flex align-content-center justify-content-center flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 ">
            <div class="shadow rounded mt-3 col-md-9">
                <div class="col-lg-12">
                    <div class="card cards-category-name cards-category border border-0">

                        <img src="{{ $user->photo() }}" alt="{{ $user->name }}" class="rounded img-fluid mx-auto mt-3"
                            width="350" height="50">

                        <p class="text-paragraph col-md-12 p-4">
                            @if ($user->name = $user->name)
                                <span class="name">{{ $user->name }}</span>
                            @else
                                <p>Its Not You</p>
                            @endif

                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo ea accusamus quam. Fugiat
                            consectetur excepturi dolorum, perspiciatis vitae molestiae porro ex sequi reprehenderit! Nemo
                            reiciendis aliquid, officiis repudiandae minima fugiat dolore quos ad necessitatibus mollitia
                            libero eius similique, excepturi, expedita vitae? Illo fugiat, non excepturi ipsa ut molestias
                            fuga quis iste numquam ex corporis vel doloribus eaque suscipit deserunt officia unde! Deleniti
                            accusamus cupiditate voluptate impedit ipsam molestiae doloribus ipsum dicta autem provident
                            nobis aliquam quod numquam in rerum sequi possimus, optio voluptas dolore ex rem culpa?
                            Distinctio nisi perferendis veniam, illo expedita deleniti asperiores, obcaecati facilis cum
                            nostrum ducimus dolorem dolores quod voluptatibus maxime autem pariatur culpa. Quod delectus
                            quae soluta excepturi beatae saepe distinctio ipsa, perferendis officia explicabo nobis,
                            accusantium id nihil accusamus nostrum consequuntur recusandae. Ab iste iusto tempore
                            consequatur autem quibusdam numquam tempora, impedit ducimus ipsam odit aperiam optio corrupti
                            non nesciunt. Officiis sapiente eius nobis!
                        </p>

                    </div>
                    <div class="p-4 btn-link">
                        <a href="{{ route('category.index') }}" class="btn btn-dark ">Category</a>
                        <a href="{{ route('tags.index') }}" class="btn btn-dark ">Tags</a>
                        <a href="" class="btn btn-dark ">Likes</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- end cards --}}
@endsection
