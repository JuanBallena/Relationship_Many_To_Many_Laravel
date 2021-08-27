<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <!-- Styles -->
        {{-- <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style> --}}
    </head>
    <body>
        <div class="container py-5">
            <h3>Many to Many</h3><br>
            <a 
                href="{{ route('jobs.index')}}"
                class="btn btn-primary"
            >Jobs</a>
            <a 
                href="{{ route('jobs.create') }}"
                class="btn btn-secondary"
            >Create Job</a>
            
            <div class="pt-3">
                @yield('body')
            </div>

        </div>

        {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> --}}
        {{-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div> --}}

        <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>

        <script>
            ClassicEditor
            .create( document.querySelector( '#editor' ), {
                toolbar: [ 'bold', 'bulletedList' ]
            } )
            .catch( error => {
                //console.log(error );
            } );
            //removePlugins: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' ]

            ClassicEditor
            .create( document.querySelector( '#editor2' ), {
                toolbar: [ 'bold', 'bulletedList' ]
            } )
            .catch( error => {
                //console.log(error );
            } );
        </script>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js"></script>

        <script>

            var jobSelected = null;
            
            $('.js-btn-see-job').on('click', function() {

                // const variable = '{!! env("VARIABLE_GLOBAL") !!}';
                //console.log(variable);

                $('.js-job-seasons').empty();

                const seasons = $(this).data('seasons');
                // const title = $(this).data('title');

                const job = $(this).data('job');

                jobSelected = job;
                
                $('.js-job-title').text(job.title);

                seasons.forEach(function(season, index) {
                    $('.js-job-seasons').append(`<li>${ season }</li>`);
                });

                // const description = $(this).data('html');

                // console.log(description);

                $('.js-job-content').html(job.description);
            });

            $('.casilla').on('click', function() {

                const casilla = $(this).data('casilla');
                $('.js-job-content').html('');

                switch (casilla) {
                    case 1:
                        $('.js-job-content').html(jobSelected.description);
                        break;
                    case 2:
                        $('.js-job-content').html(jobSelected.demand);    
                        break;
                    default:
                        break;
                }

                // console.log(jobSelected);
            });

            $('#js-form-update-job').submit(async function(e) {
                e.preventDefault();

                const data = $('#js-form-update-job').serialize();
                const uri = $(this).attr('action');
                
                try {
                    const res = await axios.put(uri, data);
                    console.log(res.data);
                } catch (error) {

                    const errorResponse = JSON.parse(error.request.response);
                    const errors = errorResponse['errors'];

                    if (errors['title']) {
                        $('.error-title').text(errors['title'][0]);
                    }
                    if (errors['description']) {
                        $('.error-description').text(errors['description'][0]);
                    }
                    if (errors['demand']) {
                        $('.error-demand').text(errors['demand'][0]);
                    }
                }

            })
        </script>
    </body> 
</html>
