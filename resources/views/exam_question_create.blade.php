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
            <a href="/">Home</a>
        </h1>
        <h1 style="text-align:center;color:green;">
            <a href="/create-question-bank">Question Bank</a>
            <a href="/create-question">Question</a>
            <a href="/create-exam">Exam</a>
            <a href="/create-exam-question">Set ExamQuestion</a>
        </h1>
        <!-- Bootstrap table class -->
        <form method="POST" action="/add-exam-question" id="myForm">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <select class="form-control" aria-label="Default select example" name="exam_id">
                        @php
                            $exams = DB::table('exams')->get();
                            $exam_id = session()->get('exam_id');
                            $exam_questions = session()->get('examQuestion');
                            // dd($exam_id);
                        @endphp

                        <option selected>Select Exam </option>
                        @foreach ($exams as $item)
                            <option @if ($exam_id == $item->id) selected @endif value="{{ $item->id }}">
                                {{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-control" aria-label="Default select example" id="q_bank_id">
                        <option selected>Open Question bank</option>
                        @php
                            $q_banks = DB::table('question_banks')->get();
                        @endphp
                        @foreach ($q_banks as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-control" aria-label="Default select example" id="question_id"
                        name="question_id">
                        <option selected>Open this select menu</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <button type="submit" class="form-control add-row">Add</button>
                </div>
            </div>

        </form>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Mark</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($exam_questions != null)
                    @foreach ($exam_questions as $item)
                        <tr>

                            <td>{{ $item->question->title }}</td>

                            <td>{{ $item->number }}</td>
                            <td>
                                <a href="/edit-exam-question/{{ $item->id }}">Edit</a>
                                <a href="/delete-exam-question/{{ $item->id }}">Delete</a>
                            </td>

                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $('#q_bank_id').change(function() {
            var q_bank_id = this.value;
            $.ajax({
                url: '/filter-question/' + q_bank_id,
                data: {
                    q_bank_id
                },
                type: "GET",
                success: function(response) {
                    //location.reload();
                    //console.log(response.categories[0].id);
                    $('#question_id').empty();
                    console.log(response.questions);

                    $('#question_id').append('<option value="">' + "Select" + '</option>');
                    $.each(response.questions.questions, function(index, question) {
                        $('#question_id').append('<option value="' + question.id + '">' +
                            question.title + '</option>');
                    })
                }
            });
        });
    </script>
</body>

</html>
