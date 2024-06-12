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

        <div class="row my-5 d-flex justify-content-center">


            <div class="col-lg-8">

                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">عنوان</th>
                        <th scope="col">توضیحات</th>
                        <th scope="col">متن</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ( $posts as $post )
                     <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title}}</td>
                        <td>{{ $post->description}}</td>
                        <td>{{ $post->body}}</td>
                      </tr>
                     @endforeach


                    </tbody>
                  </table>

            </div>


        </div>

        <div class="row my-5 d-flex justify-content-center">
            <div class="col-lg-8">
                {{ $posts->links() }}
            </div>
        </div>







    </body>

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</html>
