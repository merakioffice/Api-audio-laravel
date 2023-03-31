<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>

    <h1 style="color:#4598b9" class="text-center">
        Register
    </h1>

    <form class="form-control-sm" action="{{ route('register') }}" method="POST">
        @csrf

        <label>
            Name
            <br>
            <input class="form-control form-control-sm"
            autofocus="autofocus"
            name="name"
            type="text"
            value="{{ old('name') }}">

            @error('name')
                <br>
                <small style="color:#ff0000a9">{{ $message }}</small>
            @enderror
        </label><br>

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
            Password Confirmation
             <br>
             <input class="form-control form-control-sm" name="password_confirmation" type="password">
             @error('password_confirmation')
                 <br>
                 <small style="color:#ff0000a9">{{ $message }}</small>
             @enderror
         </label><br>

        <button class="btn btn-create" type="submit">Register</button>
        <br>
    </form>
    <br>
    <a class="btn btn-light" href="{{ route('login') }}">Login</a>

</body>
</html>
