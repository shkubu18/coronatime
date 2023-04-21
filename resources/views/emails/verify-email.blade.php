<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coronatime</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;900&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Inter', sans-serif;
    }

    body {
        min-height: 100vh;
        display: grid;
        align-items: center;
        justify-content: center;
    }

    div {
        max-width: 520px;
        min-width: 300px;
        padding: 5px;
        text-align: center;
    }

    img {
        width: 100%;
    }

    h1 {
        font-size: 25px;
        margin-top: 45px;
        margin-bottom: 15px;
    }

    h3 {
        font-weight: 400;
        margin-bottom: 35px;
    }

    a {
        background-color: #0FBA68;
        display: inline-block;
        color: white;
        padding: 12px;
        width: 80%;
        border-radius: 6px;
        font-weight: 900;
        text-decoration: none;
    }

    @media screen and (max-width: 500px) {
        a {
            width: 100%;
        }
    }
</style>
<body>
    <div>
        <img src="{{ asset('./assets/images/image-for-emails.png') }}" alt="dashboard">
        <h1>Confirmation Email</h1>
        <h3>click this button to verify your email</h3>
        <br>
        @if(isset($url))
            <a href="{{ $url }}">Verify Email</a>
        @endif
    </div>
</body>
</html>
