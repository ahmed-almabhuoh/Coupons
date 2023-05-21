<!DOCTYPE html>
<html lang="ar">

<head>
    <title>صفحة إرسال البريد الإلكتروني</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>

<body>
    <header class="bg-primary text-white text-center py-3">
        <h1>صفحة إرسال البريد الإلكتروني</h1>
    </header>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h3 class="mb-4">أدخل معلوماتك</h3>
                <form action="{{ route('license.submit') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="username">اسم المستخدم:</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                            id="username" name="username" value="{{ old('username') }}" required>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">كلمة المرور:</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="serial">الرقم التسلسلي:</label>
                        <input type="text" class="form-control @error('serial') is-invalid @enderror" id="serial"
                            name="serial" required>
                        @error('serial')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">إرسال البريد الإلكتروني</button>
                </form>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-lg-6">
                <h4>ماذا سيحدث بعد ذلك؟</h4>
                <p>بعد تأكيد البيانات المدخلة والنقر على زر "إرسال البريد الإلكتروني"، سيتم إرسال بريد إلكتروني إلى
                    العنوان المحدد يحتوي على رابط لتنزيل الملف المطلوب.</p>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-lg-6">
            <h4>ماذا سيحدث بعد ذلك؟</h4>
            <p>بعد تأكيد البيانات المدخلة والنقر على زر "إرسال البريد الإلكتروني"، سيتم إرسال بريد إلكتروني إلى
                العنوان المحدد يحتوي على رابط لتنزيل الملف المطلوب.</p>
        </div>
    </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
