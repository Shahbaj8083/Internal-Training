
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
<div class="container d-flex justify-content-center align-items-center" style="min-height:80vh;">
    <form class=" rounded shadow" method="POST" action="{{url('/')}}/register" style="padding:90px;">
    @csrf
    <div class="container">
        <x-user type="text" name="name" label="Enter your name"/>
            <!-- <span class="text-danger">
                @error('name')
                {{$message}}
                @enderror
            </span> -->
        <x-user type="email" name="email" label="Enter your email"/>
        <x-user type="password" name="password" label="Password"/>
        <x-user type="password" name="password_confirmation" label="Confirm Password"/>
    <!-- <pre>
    @php
    print_r($errors->all());
    @endphp
    </pre> -->
        <!-- <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{old('name')}}">
            <span class="text-danger">
                @error('name')
                {{$message}}
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email </label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{old('email')}}">
            <span class="text-danger">
                @error('email')
                {{$message}}
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            <span class="text-danger">
                @error('password')
                {{$message}}
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation">
            <span class="text-danger">
                @error('confirm_password')
                {{$message}}
                @enderror
            </span>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>