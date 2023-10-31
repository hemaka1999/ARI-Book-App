<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body class="container-fluid py-1  vw-100 weather-data bg-light bg-gradient  ">
    <nav class="navbar navbar-expand-md  text-light  bg-dark shadow-sm my-2" style="border-radius: 10px">
        <div class="container">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <h2>ARI Book StX</h2>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        {{-- @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif --}}
                    @else
                        <li class="nav-item dropdown  ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" text-l data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="margin-top:20px">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Book</h2>
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <form method="post" action="{{ url('update-book') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="md-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name='title' placeholder="Enter Title"
                            value="{{$data->title}}">
                        @error('title')
                            <div class="alert alert-danger " role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="form-label">Author</label>
                        <input type="text" class="form-control" name='author' placeholder="Enter Author"
                            value="{{$data->author}}">
                        @error('author')
                            <div class="alert alert-danger " role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" name='price' placeholder="Enter Price"
                            value="{{$data->price}}">
                        @error('price')
                            <div class="alert alert-danger " role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="form-label">Stock</label>
                        <input type="text" class="form-control" name='stock' placeholder="Enter Stock"
                            value="{{$data->stock}}">
                        @error('stock')
                            <div class="alert alert-danger " role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div><br>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ url('book-list') }}" class="btn btn-danger">Cancel</a>

                </form>
            </div>
        </div>
    </div>

</body>

</html>
