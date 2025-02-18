<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background-color: #000080;
            color: aliceblue;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .group {
            display: flex;
            align-items: center;
            padding: 10px;
            max-width: 90%;
            box-sizing: border-box;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
        }

        .group img {
            width: 60px; /* ขนาดรูปให้เล็กลง */
            height: auto;
            margin-right: 15px;
        }

        .group p {
            font-size: 14px;
            margin: 5px 0;
            text-align: left;
        }

        /* สำหรับมือถือ */
        @media (max-width: 480px) {
            .group {
                flex-direction: column;
                text-align: center;
            }

            .group img {
                margin-right: 0;
                margin-bottom: 10px;
                width: 50px; /* ขนาดรูปบนมือถือ */
            }

            .group p {
                font-size: 16px; /* ขนาดฟอนต์ใหญ่ขึ้นเล็กน้อยบนมือถือ */
                text-align: center;
                margin: 5px 0;
            }

            /* ข้อความเล็กๆ */
            .group .small-text {
                font-size: 12px;
                text-align: center;
            }
        }

        /* สำหรับหน้าจอขนาดกลาง เช่นแท็บเล็ต */
        @media (max-width: 768px) {
            .group img {
                width: 50px; /* ขนาดรูปในแท็บเล็ต */
            }

            .group p {
                font-size: 16px; /* ขนาดฟอนต์ในแท็บเล็ต */
            }
        }
    </style>
</head>

<body>
    <div class="group">
        <img src="{{ asset('images/logofuji.png') }}" alt="Logo">
        <div>
            <p>ขอบคุณในความคิดเห็นของท่าน 
                <br>เราหวังว่าจะได้บริการท่านอีกในอนาคต</p>
        </div>
        <p class="small-text">(Thank you for your valuable feedback. We look forward to serving you again in the future.)</p>
    </div>
</body>

</html>
