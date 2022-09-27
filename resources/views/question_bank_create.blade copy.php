<!DOCTYPE html>
<html lang="en">

<head>
	<title>All Exams</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
	</script>
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
		<form>
			<input type="text" id="name" placeholder="Name">
			<input type="text" id="email" placeholder="Email Address">
			<input type="button" class="add-row" value="Add Row">
		</form>
		<table>
			<thead>
				<tr>
					<th>Select</th>
					<th>Question Title</th>
					<th>Action</th>

				</tr>
			</thead>
			<tbody>
				<tr>

					<td>Peter Parker</td>

				</tr>
			</tbody>
		</table>
		<button type="button" class="delete-row">Delete Row</button>
	</div>
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
</body>

</html>