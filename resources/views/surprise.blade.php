<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surprise 🎉</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/4549/4549811.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background: linear-gradient(to right, #ffdde1, #ee9ca7);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        min-height: 100vh;
        margin: 0;
        padding: 20px;
        text-align: center;
        font-family: 'Comic Sans MS', cursive;
        overflow-x: hidden;
    }

    h1 {
        color: #d63384;
        font-size: clamp(1.8rem, 6vw, 3rem);
        word-break: break-word;
        margin-top: 10px;
    }

    h2 {
        font-size: clamp(1rem, 4vw, 1.6rem);
        margin-bottom: 15px;
    }

    /* Gambar cake responsive */
    .cake {
        width: 100%;
        max-width: 280px;
        height: auto;
        margin: 20px auto;
        border-radius: 15px;
        animation: bounce 2s infinite;
    }

    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-15px);
        }
    }

    /* Balon bulat */
    .balloon {
        position: absolute;
        bottom: -150px;
        width: 40px;
        height: 60px;
        border-radius: 50%;
        opacity: 0.8;
        animation: rise 10s linear infinite;
    }

    .balloon::after {
        content: '';
        position: absolute;
        top: 55px;
        left: 18px;
        width: 3px;
        height: 30px;
        background: #555;
    }

    /* Balon love */
    .heart {
        position: absolute;
        bottom: -150px;
        width: 40px;
        height: 35px;
        background: red;
        transform: rotate(-45deg);
        animation: rise 10s linear infinite;
    }

    .heart::before,
    .heart::after {
        content: "";
        position: absolute;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: red;
    }

    .heart::before {
        top: -20px;
        left: 0;
    }

    .heart::after {
        left: 20px;
        top: 0;
    }

    @keyframes rise {
        0% {
            bottom: -150px;
            opacity: 1;
        }

        100% {
            bottom: 110%;
            opacity: 0;
        }
    }

    /* Teks romantis typing */
    .romantic-text {
        margin-top: 20px;
        font-size: clamp(0.9rem, 3.5vw, 1.3rem);
        color: #fff;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        white-space: pre-line;
        display: inline-block;
        max-width: 95%;
        border-right: 2px solid rgba(255, 255, 255, 0.75);
        animation: blink 0.7s infinite;
        word-wrap: break-word;
        background: rgba(0, 0, 0, 0.4);
        padding: 10px 15px;
        border-radius: 12px;
        box-sizing: border-box;
    }

    @keyframes blink {
        50% {
            border-color: transparent;
        }
    }

    /* Responsif balon */
    @media (max-width: 768px) {

        .balloon,
        .heart {
            width: 30px;
            height: 45px;
        }

        .balloon::after {
            top: 40px;
            left: 13px;
            height: 25px;
        }
    }

    /* Untuk HP kecil */
    @media (max-width: 480px) {
        body {
            padding: 10px;
        }

        h1 {
            font-size: 2rem;
            /* lebih besar */
        }

        h2 {
            font-size: 1.3rem;
            /* lebih besar */
        }

        .cake {
            max-width: 300px;
            /* lebih besar dari sebelumnya */
        }

        .romantic-text {
            font-size: 1.3rem;
            /* biar tetap terbaca jelas */
            padding: 10px 14px;
        }
    }
    </style>
</head>

<body>
    <h1>🎉 祝你生日快乐 {{ $name }} 🎂</h1>
    <img src="{{ asset('images/gf.jpg') }}" class="cake" alt="生日">
    <h2>愿你永远健康幸福，笑容常伴 💕</h2>

    <!-- Teks romantis typing -->
    <div id="romanticText" class="romantic-text"></div>

    <!-- Musik Happy Birthday Mandarin -->
    <iframe width="0" height="0" src="https://www.youtube.com/embed/n4iWaZrRAl8?autoplay=1&loop=1&playlist=n4iWaZrRAl8"
        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
    </iframe>

    <!-- Container Balon -->
    <div id="balloon-container"></div>

    <!-- Confetti -->
    <canvas id="confetti"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    <script>
    // Confetti
    function runConfetti() {
        confetti({
            particleCount: 150,
            spread: 70,
            origin: {
                y: 0.6
            }
        });
    }
    setTimeout(runConfetti, 500);

    // Balon naik
    function createBalloon() {
        const balloonType = Math.random() > 0.5 ? "balloon" : "heart";
        const balloon = document.createElement("div");
        balloon.classList.add(balloonType);

        const colors = ["red", "blue", "green", "yellow", "purple", "pink"];
        if (balloonType === "balloon") {
            balloon.style.background = colors[Math.floor(Math.random() * colors.length)];
        } else {
            balloon.style.background = "red";
        }

        balloon.style.left = Math.random() * window.innerWidth + "px";
        balloon.style.animationDuration = (5 + Math.random() * 5) + "s";

        document.getElementById("balloon-container").appendChild(balloon);

        setTimeout(() => balloon.remove(), 10000);
    }
    setInterval(createBalloon, 1000);

    // Efek typing teks
    const romanticMessage =
        "宝宝，能有你在，我每天都心存感激 ❤️\n" +
        "虽然我们是异国恋，不能常常陪伴在你身边…\n" +
        "但今天，我只能为你做这样一个小小的惊喜 🎁\n" +
        "愿你生日这天被爱与幸福环绕 ✨";

    const romanticTextEl = document.getElementById("romanticText");
    let i = 0;

    function typeWriter() {
        if (i < romanticMessage.length) {
            romanticTextEl.textContent += romanticMessage.charAt(i);
            i++;
            setTimeout(typeWriter, 80);
        }
    }

    setTimeout(typeWriter, 2000);
    </script>
</body>

</html>