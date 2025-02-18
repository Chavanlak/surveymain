<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <title>Food Feedback Survey</title>
    <style>
        body {
            background-color:#FFFF00;
            color: aliceblue;
            margin: 20px;
            padding-left: 15px;
        }

        .emoji {
            font-size: 2rem;
            cursor: pointer;
            transition: transform 0.2s;
            margin: 1px;
        }

        .emoji:hover,
        .selected {
            transform: scale(1.3);
        }

        .emoji-group {
            display: flex;
            gap: 5px;
        }

        .required::after {
            content: "*";
            color: red;
            font-size: 20px;
        }

        textarea {
            width: 100%;
            height: 100px;
            border-radius: 5px;
            padding: 10px;
            margin-top: 10px;
        }

        /* ให้ฟอร์มทุกช่องเป็น full width บนมือถือ */
        @media (max-width: 768px) {
            .form-control {
                width: 100%;
            }

            .emoji-group {
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        {{-- <h2 class="text-center my-4 text-white">Satisfaction Survey</h2> --}}
        <p class="text-center my-4 text-white"style="font-family:'Kanit', sans-serif;  font-size: 20px;">เเบบประเมินความพึงพอใจ</p>
        <form action="/surveytest" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <!-- Branch Select -->
            <div class="form-group my-3">
                <label for="branches" class="required">กรุณาเลือกสาขาที่คุณใช้บริการในครั้งนี้</label>
                {{-- <select name="branches" id="branches" class="form-control"> --}}
                <select name="branches" id="branches">
                    {{-- <button type="button" class="btn btn-secondary dropdown-toggle my-3" data-bs-toggle="dropdown">
                        กรุณาเลือกสาขาที่คุณใช้บริการในครั้งนี้
                    </button> --}}
                    @foreach ($branch as $bb)
                        <option value="{{ $bb->MBranchInfo_Code }}">{{ $bb->Location }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Customer Information -->
            <div class="my-3">
                <label for="name" class="required">ชื่อลูกค้า</label>
                <input type="text" class="form-control" name="name" placeholder="ชื่อลูกค้า"required>
                <div class="invalid-feedback" id="nameError">กรุณากรอกชื่อ</div>
            </div>

            <div class="my-3">
                <label for="phone" class="required">เบอร์โทรลูกค้า</label>
                <input type="text" class="form-control" name="phone" placeholder="เบอร์โทรลูกค้า"required>
            </div>

            <div class="my-3">
                <label for="email" class="form-label">อีเมล</label>
                <input type="text" class="form-control" name="email" placeholder="อีเมล">
            </div>

            <!-- Food Quality Question -->
            <div class="my-3">
                <p>คุณภาพอาหาร (Food Quality)</p>
                <input type="hidden" name="ques1" value="1">
                {{-- <label for="ans1">กรุณาเลือกคำตอบ</label> --}}
                {{-- <input type="text" name="ch1" id="ans1"> --}}
                <input type="hidden" name="ch1" id="ans1" value="1" required>
                {{-- <select class="emoji-group form-control" name="ch1" id="ans1"> --}}
                {{-- <select name="ch1" id="ans1">
                    <option class="emoji" value="1">😡</option>
                    <option class="emoji" value="2" selected>😞</option>
                    <option class="emoji" value="3">😐</option>
                    <option class="emoji" value="4">😊</option>
                    <option class="emoji" value="5">😍</option>
                </select> --}}
                <div class="emoji-group">
                    <div class="emoji" data-value="1" onclick="addScore('ans1',1)">😡</div>
                    <div class="emoji" data-value="2" onclick="addScore('ans1',2)">😞</div>
                    <div class="emoji" data-value="3" onclick="addScore('ans1',3)">😐</div>
                    <div class="emoji" data-value="4" onclick="addScore('ans1',4)">😊</div>
                    <div class="emoji" data-value="5" onclick="addScore('ans1',5)">😍</div>
                </div>
            </div>

            <!-- Taste Question -->
            <div class="my-3">
                <p>รสชาติอาหาร (Taste)</p>
                <input type="hidden" name="ques2" value="2">
                {{-- <label for="ans2">กรุณาเลือกคำตอบ</label> --}}
                {{-- <input type="text" name="ch2" id="ans2"> --}}
                <input type="hidden" name="ch2" id="ans2" value="1" required>
                {{-- <select class="emoji-group form-control" name="ch2" id="ans2"> --}}
                {{-- <select name="ch2" id="ans2">
                    <option class="emoji" value="1">😡</option>
                    <option class="emoji" value="2">😞</option>
                    <option class="emoji" value="3">😐</option>
                    <option class="emoji" value="4">😊</option>
                    <option class="emoji" value="5">😍</option>
                </select> --}}
                <div class="emoji-group">
                    <div class="emoji" data-value="1" onclick="addScore('ans2',1)">😡</div>
                    <div class="emoji" data-value="2" onclick="addScore('ans2',2)">😞</div>
                    <div class="emoji" data-value="3" onclick="addScore('ans2',3)">😐</div>
                    <div class="emoji" data-value="4" onclick="addScore('ans2',4)">😊</div>
                    <div class="emoji" data-value="5" onclick="addScore('ans2',5)">😍</div>
                </div>
            </div>

            <!-- Speed of Service Question -->
            <div class="my-3">
                <p>ความรวดเร็วในการให้บริการ (Speed of Service)</p>
                <input type="hidden" name="ques3" value="5">
                {{-- <label for="ans3">กรุณาเลือกคำตอบ</label> --}}
                {{-- <input type="text" name="ch3" id="ans3"> --}}
                <input type="hidden" name="ch3" id="ans3" value="1" required>
                {{-- <select class="emoji-group form-control" name="ch3" id="ans3"> --}}
                {{-- <select name="ch3" id="ans3">
                    <option class="emoji" value="1">😡</option>
                    <option class="emoji" value="2">😞</option>
                    <option class="emoji" value="3">😐</option>
                    <option class="emoji" value="4">😊</option>
                    <option class="emoji" value="5">😍</option>
                </select> --}}
                <div class="emoji-group">
                    <div class="emoji" data-value="1" onclick="addScore('ans3',1)">😡</div>
                    <div class="emoji" data-value="2" onclick="addScore('ans3',2)">😞</div>
                    <div class="emoji" data-value="3" onclick="addScore('ans3',3)">😐</div>
                    <div class="emoji" data-value="4" onclick="addScore('ans3',4)">😊</div>
                    <div class="emoji" data-value="5" onclick="addScore('ans3',5)">😍</div>
                </div>
            </div>

            <!-- Service Mind Question -->
            <div class="my-3">
                <p>ความดูเเลเอาใจใส่ของพนักงาน (Service Mind)</p>
                <input type="hidden" name="ques4" value="6">
                {{-- <label for="ans4">กรุณาเลือกคำตอบ</label> --}}
                {{-- <input type="text" name="ch4" id="ans4"> --}}
                <input type="hidden" name="ch4" id="ans4" value="1" required>
                {{-- <select class="emoji-group form-control" name="ch4" id="ans4"> --}}
                {{-- <select name="ch4" id="ans4">
                    <option class="emoji" value="1">😡</option>
                    <option class="emoji" value="2">😞</option>
                    <option class="emoji" value="3">😐</option>
                    <option class="emoji" value="4">😊</option>
                    <option class="emoji" value="5">😍</option>
                </select> --}}
                <div class="emoji-group">
                    <div class="emoji" data-value="1" onclick="addScore('ans4',1)">😡</div>
                    <div class="emoji" data-value="2" onclick="addScore('ans4',2)">😞</div>
                    <div class="emoji" data-value="3" onclick="addScore('ans4',3)">😐</div>
                    <div class="emoji" data-value="4" onclick="addScore('ans4',4)">😊</div>
                    <div class="emoji" data-value="5" onclick="addScore('ans4',5)">😍</div>
                </div>
            </div>

            <!-- Suggestions -->
            <div class="my-3">
                <label for="comment">คำเเนะนำเพิ่มเติม</label>
                <textarea name="comment" placeholder="คำเเนะนำเพิ่มเติม..."></textarea>
            </div>

            <!-- Submit Button -->
            <div class="my-3 text-center">
                <input type="submit" value="ส่งเเบบสอบถาม" class="btn btn-primary">
            </div>
        </form>
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


    <script>
        function addScore(eleId,eleScore){
            document.getElementById(eleId).value = eleScore;
        }
    </script>
</body>

</html>
