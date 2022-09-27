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
            <a href="/">Home</a>
        </h1>
        <h1 style="text-align:center;color:green;">
            <a href="/create-question-bank">Question Bank</a>
            <a href="/create-question">Question</a>
            <a href="/create-exam">Exam</a>
            <a href="/create-exam-question">Set ExamQuestion</a>
        </h1>
        <!-- Bootstrap table class -->
        <form method="POST" action="/question-create">
            @csrf
            <div class="form-group">
                <label for="exampleInput">Title</label>
                <input type="text" class="form-control" id="exampleInput" name="title" placeholder="Enter Title">
            </div>
            <div class="form-group">
                <label for="exampleInput">Number</label>
                <input type="decimal" class="form-control" id="exampleInput" name="number" placeholder="Enter Title">
            </div>
            <div class="form-group">
                <label for="exampleInput">Answering Time</label>
                <input type="text" class="form-control" id="exampleInput" name="answering_time"
                    placeholder="Enter Title">
            </div>
            <div class="form-group">
                <label for="exampleInput">Select Question Bank</label>
                <select class="form-control" name="question_bank_id">
                    <option>select</option>
                    @php
                        $question_banks = DB::table('question_banks')->get();
                    @endphp
                    @foreach ($question_banks as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="col-md-6">

                    <div class="mb-3 input-group repeatDiv" id="repeatDiv">
                        <input type="text" class="form-control" name="options[]" placeholder="Enter Option">
                        <select class="form-select" aria-label="Default select example" name="answer[]">
                            <option value="0">Wrong Answer</option>
                            <option value="1">Correct Answer</option>
                        </select>
                    </div>

                    <button type="button" class="btn btn-info" id="repeatDivBtn" data-increment="1">Add More
                        Input</button>

                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {

            $("#repeatDivBtn").click(function() {

                $newid = $(this).data("increment");
                $repeatDiv = $("#repeatDiv").wrap('<div/>').parent().html();
                $('#repeatDiv').unwrap();
                $($repeatDiv).insertAfter($(".repeatDiv").last());
                $(".repeatDiv").last().attr('id', "repeatDiv" + '_' + $newid);
                $("#repeatDiv" + '_' + $newid).append(
                    '<div class="input-group-append"><button type="button" class="btn btn-danger removeDivBtn" data-id="repeatDiv' +
                    '_' + $newid + '">Remove</button></div>');
                $newid++;
                $(this).data("increment", $newid);

            });


            $(document).on('click', '.removeDivBtn', function() {

                $divId = $(this).data("id");
                $("#" + $divId).remove();
                $inc = $("#repeatDivBtn").data("increment");
                $("#repeatDivBtn").data("increment", $inc - 1);

            });

        });
    </script>
</body>

</html>
