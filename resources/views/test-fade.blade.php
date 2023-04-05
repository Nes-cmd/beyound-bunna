<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Here</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Asap", sans-serif;
        }

        body {
            background: #42455a;
        }

        section {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        section:nth-child(1) {
            color: #e0ffff;
        }

        section:nth-child(2) {
            color: #42455a;
            background: #e0ffff;
        }

        section:nth-child(3) {
            color: #e0ffff;
        }

        section:nth-child(4) {
            color: #42455a;
            background: #e0ffff;
        }

        section .container {
            margin: 100px;
        }

        section h1 {
            font-size: 3rem;
            margin: 20px;
        }

        section h2 {
            font-size: 40px;
            text-align: center;
            text-transform: uppercase;
        }

        section .text-container {
            display: flex;
        }

        section .text-container .text-box {
            margin: 20px;
            padding: 20px;
            background: #00c2cb;
        }

        section .text-container .text-box h3 {
            font-size: 30px;
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        @media (max-width: 900px) {
            section h1 {
                font-size: 2rem;
                text-align: center;
            }

            section .text-container {
                flex-direction: column;
            }
        }

        .reveal {
            position: relative;
            opacity: 0;
        }

        .reveal.active {
            opacity: 1;
        }

        .active.fade-bottom {
            animation: fade-bottom 1s ease-in;
        }

        .active.fade-left {
            animation: fade-left 1s ease-in;
        }

        .active.fade-right {
            animation: fade-right 1s ease-in;
        }

        @keyframes fade-bottom {
            0% {
                transform: translateY(50px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fade-left {
            0% {
                transform: translateX(-100px);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes fade-right {
            0% {
                transform: translateX(100px);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
    <script>
        function reveal() {
            var reveals = document.querySelectorAll(".reveal");

            for (var i = 0; i < reveals.length; i++) {
                var windowHeight = window.innerHeight;
                var elementTop = reveals[i].getBoundingClientRect().top;
                var elementVisible = 150;

                if (elementTop < windowHeight - elementVisible) {
                    reveals[i].classList.add("active");
                } else {
                    reveals[i].classList.remove("active");
                }
            }
        }

        window.addEventListener("scroll", reveal);
    </script>
</head>

<body>
    <section>
        <h1>Scroll Down to Reveal Elements &#8595;</h1>
    </section>
    <section>
        <div class="container <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Asap", sans-serif;
        }

        body {
            background: #42455a;
        }

        section {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        section:nth-child(1) {
            color: #e0ffff;
        }

        section:nth-child(2) {
            color: #42455a;
            background: #e0ffff;
        }

        section:nth-child(3) {
            color: #e0ffff;
        }

        section:nth-child(4) {
            color: #42455a;
            background: #e0ffff;
        }

        section .container {
            margin: 100px;
        }

        section h1 {
            font-size: 3rem;
            margin: 20px;
        }

        section h2 {
            font-size: 40px;
            text-align: center;
            text-transform: uppercase;
        }

        section .text-container {
            display: flex;
        }

        section .text-container .text-box {
            margin: 20px;
            padding: 20px;
            background: #00c2cb;
        }

        section .text-container .text-box h3 {
            font-size: 30px;
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        @media (max-width: 900px) {
            section h1 {
                font-size: 2rem;
                text-align: center;
            }

            section .text-container {
                flex-direction: column;
            }
        }

        .reveal {
            position: relative;
            opacity: 0;
        }

        .reveal.active {
            opacity: 1;
        }

        .active.fade-bottom {
            animation: fade-bottom 1s ease-in;
        }

        .active.fade-left {
            animation: fade-left 1s ease-in;
        }

        .active.fade-right {
            animation: fade-right 1s ease-in;
        }

        @keyframes fade-bottom {
            0% {
                transform: translateY(50px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fade-left {
            0% {
                transform: translateX(-100px);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes fade-right {
            0% {
                transform: translateX(100px);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
    <script>
        function reveal() {
            var reveals = document.querySelectorAll(".reveal");

            for (var i = 0; i < reveals.length; i++) {
                var windowHeight = window.innerHeight;
                var elementTop = reveals[i].getBoundingClientRect().top;
                var elementVisible = 150;

                if (elementTop < windowHeight - elementVisible) {
                    reveals[i].classList.add("active");
                } else {
                    reveals[i].classList.remove("active");
                }
            }
        }

        window.addEventListener("scroll", reveal);
    </script>">
            <h2>Caption</h2>
            <div class="text-container">
                <div class="text-box">
                    <h3>Section Text</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore
                        eius molestiae perferendis eos provident vitae iste.
                    </p>
                </div>
                <div class="text-box">
                    <h3>Section Text</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore
                        eius molestiae perferendis eos provident vitae iste.
                    </p>
                </div>
                <div class="text-box">
                    <h3>Section Text</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore
                        eius molestiae perferendis eos provident vitae iste.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container reveal fade-left">
            <h2>Caption</h2>
            <div class="text-container">
                <div class="text-box">
                    <h3>Section Text</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore
                        eius molestiae perferendis eos provident vitae iste.
                    </p>
                </div>
                <div class="text-box">
                    <h3>Section Text</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore
                        eius molestiae perferendis eos provident vitae iste.
                    </p>
                </div>
                <div class="text-box">
                    <h3>Section Text</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore
                        eius molestiae perferendis eos provident vitae iste.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container reveal fade-right">
            <h2>Caption</h2>
            <div class="text-container">
                <div class="text-box">
                    <h3>Section Text</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore
                        eius molestiae perferendis eos provident vitae iste.
                    </p>
                </div>
                <div class="text-box">
                    <h3>Section Text</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore
                        eius molestiae perferendis eos provident vitae iste.
                    </p>
                </div>
                <div class="text-box">
                    <h3>Section Text</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore
                        eius molestiae perferendis eos provident vitae iste.
                    </p>
                </div>
            </div>
        </div>
    </section>
</body>

</html>