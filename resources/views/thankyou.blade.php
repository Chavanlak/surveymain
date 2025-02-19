<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You Page</title>
    <style>
        body {
            background-color: #000080;
            color: aliceblue;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.15);
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            max-width: 90%;
            width: 360px;
            box-sizing: border-box;
        }

        .logo {
            width: 80px;
            height: auto;
            margin-bottom: 15px;
        }

        .message {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 8px;
        }

        .sub-message {
            font-size: 14px;
            color: #d3d3d3;
            line-height: 1.4;
        }

        @media (max-width: 480px) {
            .container {
                padding: 15px;
                width: 95%;
            }

            .message {
                font-size: 16px;
            }

            .sub-message {
                font-size: 12px;
            }

            .logo {
                width: 60px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <img class="logo" src="{{ asset('images/logofuji.png') }}" alt="Logo">
        <p class="message">
            ขอบคุณในความคิดเห็นของท่าน<br>เราหวังว่าจะได้บริการท่านอีกในอนาคต
        </p>
        <p class="sub-message">
            (Thank you for your valuable feedback. We look forward to serving you again in the future.)
        </p>
    </div>
</body>

</html>
