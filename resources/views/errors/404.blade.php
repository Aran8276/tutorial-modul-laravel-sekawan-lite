<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <style>
        body {
            background: linear-gradient(135deg, #f06, #f79);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
        }

        .container {
            max-width: 600px;
        }

        h1 {
            font-size: 10em;
            margin: 0;
            animation: fadeIn 1s ease-in-out;
        }

        p {
            font-size: 1.5em;
            margin: 20px 0;
        }

        a {
            color: #fff;
            background-color: #ff4081;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #ff79b0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>404</h1>
        <p>Oh no! Halaman yang Anda cari tidak ditemukan.</p>
        <p><a href="/">Kembali ke Beranda</a></p>
    </div>
</body>

</html>
