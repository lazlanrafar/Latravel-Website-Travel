<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latravel - Website Travel Online</title>

    @include('includes.style')
</head>

<body>
    <main>
        <div class="section-success d-flex align-items-center">
            <div class="col text-center">
                <img src="{{ url('/assets/icon/ic_mail.png') }}" alt="">
                <h1>Yay! Success</h1>
                <p>
                    We've sent you email for trip instruction
                    <br>
                    please read it as well
                </p>
                <a href="/" class="btn btn-home-page mt-3 px-5">
                    Home Page
                </a>
            </div>
        </div>
    </main>

    @include('includes.script')
</body>

</html>