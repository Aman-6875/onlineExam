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
            All Exams
        </h1>
        <h1 style="text-align:center;color:green;">
            <a href="/create-question-bank">Question Bank</a>
            <a href="/create-question">Question</a>
            <a href="/create-exam">Exam</a>
            <a href="/create-exam-question">Set ExamQuestion</a>
        </h1>
        <!-- Bootstrap table class -->
        <form method="POST" action="/question-bank-create">
            @csrf
            <div class="form-group">
                <label for="exampleInput">Title</label>
                <input type="text" class="form-control" id="exampleInput" name="title" aria-describedby="emailHelp"
                    placeholder="Enter Title">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
