<!DOCTYPE html>
<html lang="en">

<head>
    <title>Result</title>
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
            CORRECT ANSWER:{{ $correct_answer }}
        </h3>
        <h3 style="text-align:center;color:RED;">
            WRONG ANSWER:{{ $wrong_answer }}
        </h3>
        <h3 style="text-align:center;color:RED;">
            NEGATIVE MARK:{{ $negTotal }}
        </h3>
        <h1 style="text-align:center;color:green;">
            TOTAL MARK:{{ $Total }}
        </h1>


    </div>
</body>

</html>
