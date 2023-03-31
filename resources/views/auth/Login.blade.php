<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>

    <h1 style="color:#4598b9" class="text-center">
        Login
    </h1>

    <form class="form-control-sm" action="{{ route('login') }}" method="POST">
        @csrf

        <label>
           Email
            <br>
            <input class="form-control form-control-sm" name="email" type="email" value="{{ old('email') }}">
            @error('email')
                <br>
                <small style="color:#ff0000a9">{{ $message }}</small>
            @enderror
        </label><br>

        <label>
            Password
             <br>
             <input class="form-control form-control-sm" name="password" type="password">
             @error('password')
                 <br>
                 <small style="color:#ff0000a9">{{ $message }}</small>
             @enderror
         </label><br>



        <label>
        <span class="cursor-pointer">
            <input
            name="remember"
            type="checkbox">
            Recuerdame
        </span>

         </label><br>

        <button style="margin-top:10px " class="btn btn-create" type="submit">Login</button>
        <br>
    </form>
    <br>
    <a class="btn btn-light" href="{{ route('register') }}">Register</a>

</body>
</html>
