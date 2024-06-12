<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>Laravel</title>
    </head>

    <style>

        body
        {
            font-family:"vazir-med"
        }

    </style>


    <body class="container">

        <div class="row my-4 d-flex justify-content-center">

            <div class="col-lg-10">
                <a href="{{ route('home')}}">خانه</a>
            </div>

        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10 my-5">
                <form action="{{ route('search') }}" method="post">
                    @csrf

                    <div class="mb-3">
                      <label for="search" class="form-label">جستجو</label>
                      <input type="text" class="form-control" id="search" >
                    </div>

                    <button type="submit" class="btn btn-primary">جستجو</button>
                  </form>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-lg-10 my-5">
                <form action="{{ route('search') }}" method="post">
                    @csrf

                    <div class="mb-3">
                      <label for="search" class="form-label">جستجو</label>
                      <input type="text" class="form-control" id="search" >
                    </div>

                    <button type="submit" class="btn btn-primary">جستجو</button>
                  </form>
            </div>
        </div>

        <div class="row my-5 d-flex justify-content-center">


            <div class="col-lg-8">

                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">عنوان</th>
                        <th scope="col">توضیحات</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ( $posts as $post )
                     <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title}}</td>
                        <td>{{ $post->description}}</td>
                      </tr>
                     @endforeach


                    </tbody>
                  </table>

            </div>


        </div>

        <div class="row my-5 d-flex justify-content-center">
            <div class="col-lg-2">
                {{ $posts->links() }}
            </div>
        </div>







    </body>

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</html>
