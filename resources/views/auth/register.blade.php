<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sosmed | Daftar</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <section class="auth">
        <form action="/register" class="auth-form" method="post">
            <h1>Daftar</h1>

            @csrf

            <div class="auth-form-field">
                <label for="name" class="auth-form-label">Name</label>
                <input type="text" id="name" class="auth-form-input" name='name' placeholder="test" required>
            </div>

            <div class="auth-form-field">
                <label for="email" class="auth-form-label">Email</label>
                <input type="email" id="email" class="auth-form-input" name='email' placeholder="test" required>
            </div>

            <div class="auth-form-field">
                <label for="password" class="auth-form-label">Password</label>
                {{-- prettier-ignore --}}
                <input type="password" id="password" class="auth-form-input" name='password' placeholder="test" required>
            </div>

            <button type="submit" class="auth-form-button">Daftar</button>

            <p>Sudah punya akun ? <a href="/login">Masuk</a></p>
        </form>
    </section>
</body>

</html>
