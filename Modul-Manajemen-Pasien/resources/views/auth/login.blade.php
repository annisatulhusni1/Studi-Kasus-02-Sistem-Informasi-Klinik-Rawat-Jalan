<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Klinik Rawat Jalan</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f2f4f7; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .card { background: #fff; padding: 28px; border-radius: 8px; width: 340px; box-shadow: 0 2px 8px rgba(0,0,0,.1); }
        h2 { margin-top: 0; text-align: center; }
        label { display: block; margin-top: 14px; font-size: 14px; }
        input { width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box; }
        button { width: 100%; margin-top: 20px; padding: 10px; background: #1f3a5f; color: #fff; border: 0; border-radius: 4px; cursor: pointer; }
        .error { background: #fde8e8; color: #b42318; padding: 8px; border-radius: 4px; margin-top: 12px; font-size: 14px; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Login Klinik</h2>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Masuk</button>
        </form>
    </div>
</body>
</html>