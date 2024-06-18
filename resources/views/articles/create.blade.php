<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add new Blog</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            .container{
                margin: 0 auto;
                max-width: 600px;
                padding: 20px;
            }
            h1 {
                text-align: center;
                margin-button: 20px;
            }
            .form-group{
                margin-buttom: 15px;
            }
            .btn{
                display: inline-block;
                padding: 10px 20px;
                color: #fff;
                background-color: #007bff;
                border: none;
                border-radius: 5px;
                text-decoration: none;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Add notes</h1>
            <form method="POST" action="{{ route('articles.store') }}">
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autofocus>
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content">Konten</label>
                    <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" required>{{ old('content') }}</textarea>
                    @error('content')
                       <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn"></button>
                    Create
                  </button>
                  </div>
                    </span>
                </div>
            </form>
        </div>
    </body>
</html>
