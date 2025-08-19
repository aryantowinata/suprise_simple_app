<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <title>宝宝的生日 🎂</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/4549/4549811.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background: linear-gradient(to right, #ffdde1, #ee9ca7);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 15px;
    }

    .card {
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        font-family: "Microsoft YaHei", "Heiti SC", sans-serif;
        max-width: 500px;
        width: 100%;
    }

    /* Ukuran default (desktop / tablet) */
    h2 {
        font-size: 1.8rem;
        font-weight: bold;
    }

    input.form-control {
        font-size: 1.3rem;
        padding: 15px;
    }

    button.btn {
        font-size: 1.4rem;
        padding: 15px 25px;
    }

    /* Versi HP (layar kecil) */
    @media (max-width: 480px) {
        .card {
            padding: 25px;
        }

        h2 {
            font-size: 2.1rem;
            /* judul lebih besar */
        }

        input.form-control {
            font-size: 1.5rem;
            /* input lebih besar */
            padding: 18px;
        }

        button.btn {
            font-size: 1.6rem;
            /* tombol lebih besar */
            padding: 18px 28px;
        }
    }
    </style>
</head>

<body>
    <div class="card text-center">
        <h2>请输入宝宝的名字 💖</h2>
        <form action="/surprise" method="POST">
            @csrf
            <input type="text" name="name" class="form-control my-3" placeholder="输入名字..." required>
            <button type="submit" class="btn btn-danger">查看惊喜 🎁</button>
        </form>
    </div>
</body>

</html>