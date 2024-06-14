<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pengguna</title>
</head>
<body>
    <h2>Registrasi Pengguna</h2>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/register" method="POST">
        @csrf
        <div>
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <label for="password_confirmation">Password Confirm:</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>
        <button type="button" onclick="window.location.href='/login'" class="link-button">Register</button>
    </form>
</body>
</html>

