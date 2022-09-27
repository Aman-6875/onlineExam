<!DOCTYPE html>
<html lang="en">

<head>
    <title>All Exams</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 style="text-align:center;color:green;">
            Exam:{{ $exam->title }}
        </h1>
        <h3 style="text-align:center;color:green;">
            {{ $exam->type }}
        </h3>
        <h3 style="text-align:center;color:green;">
            Time:{{ $exam_time }}
        </h3>
        <h1 style="text-align:center;color:green;">
            {{-- Question Bank:{{ $questionBank->title }} --}}
        </h1>
        <h1 style="text-align:center;color:green;">
            <a class="btn btn-primary start-quiz" href="#">Start Quiz</a>
            <p id="demo"></p>
        </h1>

        <!-- Bootstrap table class -->
        <form method="POST" action="/submit-answer" id="question_form">
            @csrf
            <div class="row">
                <input class="form-control" type="hidden" value="{{ $exam->id }}" name="exam_id">
                @foreach ($exam_questions as $exam_question)
                    {{-- @dump($exam_question->question) --}}

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $exam_question->question->title }}</h5>
                                <input class="form-control" type="hidden" value="{{ $exam_question->question->id }}"
                                    name="question[]">


                                @foreach ($exam_question->question->questionOptions as $itemOption)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="answers-{{ $itemOption->id }}" id="{{ $itemOption->id }}">
                                        <label class="form-check-label" for="{{ $itemOption->id }}">
                                            {{ $itemOption->title }}
                                        </label>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <button type="submit" id="submitBtn" class="btn btn-primary">Submit Answer</button>
        </form>
    </div>






    {{-- script for timer --}}
    <script>
        document.getElementById("submitBtn").disabled = true;
        document.addEventListener('click', function(event) {
            document.getElementById("submitBtn").disabled = false;


            // If the clicked element doesn't have the right selector, bail
            if (!event.target.matches('.start-quiz')) return;

            // Don't follow the link
            event.preventDefault();

            // Log the clicked element in the console
            var countDownDate = {{ $exam_time }};

            // Update the count down every 1 second
            var distance = countDownDate - 0;
            var x = setInterval(function() {

                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date


                // Time calculations for days, hours, minutes and seconds
                // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                // if (distance >= 3600) {
                var hours = Math.floor((distance / 3600));
                // }
                // alert(hours);
                var minutes = Math.floor((distance % (3600)) / (60));
                var seconds = Math.floor((distance % (60)) / 1);

                // Output the result in an element with id="demo"
                document.getElementById("demo").innerHTML = hours + "h " +
                    minutes + "m " + seconds + "s ";
                distance = distance - 1;
                // If the count down is over, write some text 

                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "EXPIRED";
                    document.getElementById("question_form").submit();
                }

            }, 1000);

        }, false);
        // Set the date we're counting down to
    </script>
</body>

</html>
