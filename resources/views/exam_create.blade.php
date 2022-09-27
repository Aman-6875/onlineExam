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
            <a href="/home">Home</a>
        </h1>
        <h1 style="text-align:center;color:green;">
            <a href="/create-question-bank">Question Bank</a>
            <a href="/create-question">Question</a>
            <a href="/create-exam">Exam</a>
            <a href="/create-exam-question">Set ExamQuestion</a>
        </h1>
        <!-- Bootstrap table class -->
        <form method="POST" action="/exam-create">
            @csrf
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" id="" name="title" aria-describedby="emailHelp"
                    placeholder="Enter Title" required>
            </div>
            <div class="form-group">
                <label for="">Type</label>
                <select class="form-control" aria-label="Default select example" id="q_bank_id" name="type" required>
                    <option selected>Select Type</option>
                    <option value="per_question_wise">per_question_wise</option>
                    <option value="full_exam">full_exam</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Time</label>
                <input type="integer" class="form-control" id="" name="time_limit" aria-describedby="emailHelp"
                    placeholder="Enter Time in Seconds">
            </div>
            <div class="form-group">
                <label for="">Negative Marking</label>
                <select class="form-control" aria-label="Default select example" id="q_bank_id" name="is_negative_on">
                    <option selected>Select Type</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Negative Number</label>
                <input type="decimal" class="form-control" id="" name="negative_number"
                    aria-describedby="emailHelp" placeholder="Enter Negative Marking Number">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
