<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   @foreach ($section->questions as $question)
    <div class="question">
        <p>{{ $question->text }}</p> {{-- แสดงคำถาม --}}
        <div class="emoji-group">
            @foreach ($question->choices as $choice)
                <label class="emoji-label">
                    <input type="radio" name="answers[{{ $question->IdQuestion }}]" value="{{ $choice->id }}" class="emoji-input" required>
                    <span class="emoji" data-value="{{ $choice->Idchoice }}">
                        @switch($choice->text)
                            @case('Poor') 😡 @break
                            @case('Below Average') 😞 @break
                            @case('Average') 😐 @break
                            @case('Above Average') 😊 @break
                            @case('Excellent') 😍 @break
                        @endswitch
                    </span>
                </label>
            @endforeach
        </div>
    </div>
@endforeach

<button type="submit">Submit</button>

<style>
    .emoji-group { display: flex; gap: 10px; cursor: pointer; }
    .emoji { font-size: 30px; cursor: pointer; transition: transform 0.2s; }
    .emoji:hover, .emoji-input:checked + .emoji { transform: scale(1.3); }
    .emoji-input { display: none; }
</style>

</body>

<script>
    document.querySelectorAll('.emoji').forEach(emoji => {
        emoji.addEventListener('click', function () {
            let input = this.previousElementSibling;
            if (input) input.checked = true;
        });
    });
</script>
</html>