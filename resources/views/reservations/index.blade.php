<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>予約画面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>🐾 猫カフェ予約フォーム</h1>
        <div>
            <a href="{{ url('/') }}" class="btn">トップに戻る</a>
        </div>
        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">お名前</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="date">予約日</label>
                <input type="date" id="date" name="reserved_date">
            </div>
            <div class="form-group">
                <label for="time">時間</label>
                <select id="time" name="reserved_time">
                    <option value="10:00">10:00</option>
                    <option value="12:00">12:00</option>
                    <option value="14:00">14:00</option>
                    <option value="16:00">16:00</option>
                    <option value="18:00">18:00</option>
                </select>
            </div>
            <div class="form-group">
                <label for="number_of_people">人数</label>
                <input type="number" id="number_of_people" name="number_of_people" min="1" max="10">
            </div>
            <button type="submit" class="btn btn-primary">予約を確定する</button>
        </form>
        @if ($errors->any())
            <div class="mt-3">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        @if (session('success'))
            <div class="mt-3">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        @endif
    </div>
</body>
</html>