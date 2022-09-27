{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>jQuery Add / Remove Table Rows</title>
    <style>
        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #cdcdcd;
        }

        table th,
        table td {
            padding: 5px;
            text-align: left;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".add-row").click(function() {
                var name = $("#name").val();
                var email = $("#email").val();
                var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + name + "</td><td>" +
                    email + "</td></tr>";
                $("table tbody").append(markup);
            });

            // Find and remove selected table rows
            $(".delete-row").click(function() {
                $("table tbody").find('input[name="record"]').each(function() {
                    if ($(this).is(":checked")) {
                        $(this).parents("tr").remove();
                    }
                });
            });
        });
    </script>
</head>

<body>
    <form>
        <input type="text" id="name" placeholder="Name">
        <input type="text" id="email" placeholder="Email Address">
        <input type="button" class="add-row" value="Add Row">
    </form>
    <table>
        <thead>
            <tr>
                <th>Select</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="checkbox" name="record"></td>
                <td>Peter Parker</td>
                <td>peterparker@mail.com</td>
            </tr>
        </tbody>
    </table>
    <button type="button" class="delete-row">Delete Row</button>
</body>

</html> --}}

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
        <form method="POST" action="/update-exam-question" id="myForm">
            @csrf
            <div class="row">


                <div class="col-md-6">
                    <input type="hidden" class="form-control" name="id" value="{{ $exam_Question->id }}" />
                    <input type="decimal" class="form-control" name="number" value="{{ $exam_Question->number }}" />
                </div>

                <div class="col-md-3">
                    <button type="submit" class="form-control add-row">Update</button>
                </div>
            </div>

        </form>
        <br><br>
    </div>

</body>

</html>
