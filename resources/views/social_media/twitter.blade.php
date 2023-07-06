<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 30%;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .container {
            padding: 20px 16px;
        }
    </style>
</head>

<body>

    <h2>Twitter API integration</h2>

    <div class="card">
        <img src="{{ url('img/img_avatar.png') }}" alt="Avatar" style="width:30%">
        <div class="container">
            <h4><b>Account</b></h4>
            <p> connect with twitter developer API</p>
            <a href="{{ route('twitter-connect') }}">
               <i class="fab fa-twitter"></i> <button type="submit" class="connect"> Connect</button>
            </a>
        </div>
    </div>

</body>

</html>



