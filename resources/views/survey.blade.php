<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Food Feedback Survey</title>
    <style>
        body {
            background-color: #000080;
            color: aliceblue;
            text-align: left;
            padding-left: 60px;
            margin: 50px;
        }

        .emoji {
            font-size: 2rem;
            cursor: pointer;
            transition: transform 0.2s;
            margin: 1 1px;
        }

        .emoji:hover,
        .selected {
            transform: scale(1.3);
        }

        .emoji-group {
            display: flex;
            gap: 5px;
        }
        .required::after{
            content:"*";
            color: red;
            font-size: 20px;
        }

        /* p { margin-bottom: 15px; } */
    </style>
</head>

<body>
    <div>
        <div style="font-size: 20px">
            <p>Satisfaction Survey</p>
        </div>

        <div class="btn-group my-6" style="margin: auto">
            <button type="button" class="btn btn-secondary dropdown-toggle my-3" data-bs-toggle="dropdown">
                กรุณาเลือกสาขาที่คุณใช้บริการในครั้งนี้
            </button>
            <ul class="dropdown-menu">
                <li><button class="dropdown-item" type="button">สาขา1</button></li>
                <li><button class="dropdown-item" type="button">สาขา2</button></li>
                <li><button class="dropdown-item" type="button">สาขา3</button></li>
            </ul>
        </div>

        <div>
            <div class="form">
                <form method="POST" action="/"></form>
                <label for="MemberID" class="required">ชื่อลูกค้า</label>
                <input type="text" class="form-control me-2" id="MemberID"name="MemberID" placeholder="ชื่อลูกค้า" value="{{$name}}">
                <div class="d-grid gap-2"></div>
            </div>
            <div>
                <label for="MemberID" class="required">เบอร์โทรลูกค้า</label>
                <input type="text" class="form-control me-2" id="MemberID"name="MemberID"placeholder="เบอร์โทรลูกค้า" value="{{$phone}}">
                <div class="d-grid gap-2"></div>
            </div>
            <div>
                <label for="MemberID" class="form-label">อีเมล</label>
                <input type="text" class="form-control me-2" id="MemberID"name="MemberID" placeholder="อีเมล" value="{{$email}}">
                <div class="d-grid gap-2"></div>
            </div>
        </div>
        @foreach ($section->question as $question)
            @foreach ($question as $choice)
            <div class="emoji-group">
                <div class="emoji" data-value="1">😡</div>
                <div class="emoji" data-value="2">😞</div>
                <div class="emoji" data-value="3">😐</div>
                <div class="emoji" data-value="4">😊</div>
                <div class="emoji" data-value="5">😍</div>
            </div>
            @endforeach
        @endforeach
            <div class="my-3">
                <p>คุณภาพอาหาร (Food Quality)</p>
                <div class="emoji-group">
                    <div class="emoji" data-value="1">😡</div>
                    <div class="emoji" data-value="2">😞</div>
                    <div class="emoji" data-value="3">😐</div>
                    <div class="emoji" data-value="4">😊</div>
                    <div class="emoji" data-value="5">😍</div>
                </div>
            </div>

            <div class="my-3">
                <p>รสชาติอาหาร (Taste)</p>
                <div class="emoji-group">
                    <div class="emoji" data-value="1">😡</div>
                    <div class="emoji" data-value="2">😞</div>
                    <div class="emoji" data-value="3">😐</div>
                    <div class="emoji" data-value="4">😊</div>
                    <div class="emoji" data-value="5">😍</div>
                </div>
            </div>

            <div class="my-3">
                <p>ความรวดเร็วในการให้บริการ (Speed of Service)</p>
                <div class="emoji-group">
                    <div class="emoji" data-value="1">😡</div>
                    <div class="emoji" data-value="2">😞</div>
                    <div class="emoji" data-value="3">😐</div>
                    <div class="emoji" data-value="4">😊</div>
                    <div class="emoji" data-value="5">😍</div>
                </div>
            </div>
            <div class="my-3">
                <p>ความดูเเลเอาใจใส่ของพนักงาน (Service Mind)</p>
                <div class="emoji-group">
                    <div class="emoji" data-value="1">😡</div>
                    <div class="emoji" data-value="2">😞</div>
                    <div class="emoji" data-value="3">😐</div>
                    <div class="emoji" data-value="4">😊</div>
                    <div class="emoji" data-value="5">😍</div>
                </div>
            </div>
            <div>
                <p>ข้อเสนอเเนะ</p>
                <div>
                    <textarea name="" id=""></textarea>
                </div>

            </div>
        </div>
        <div class="my-3">
            <button type="submit">Submit</button>
        </div>


        <script>
            document.querySelectorAll('.emoji-group').forEach(group => {
                group.addEventListener('click', function(event) {
                    if (event.target.classList.contains('emoji')) {
                        group.querySelectorAll('.emoji').forEach(emoji => emoji.classList.remove('selected'));
                        event.target.classList.add('selected');
                    }
                });
            });
        </script>
</body>

</html>
