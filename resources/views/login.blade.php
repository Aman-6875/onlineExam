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
            <a href="/login">Login</a>
            <a href="/registration">Registration</a>

        </h1>
        <form method="POST" action="/user-login">
            @csrf
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="form2Example1" name="email" class="form-control" />
                <label class="form-label" for="form2Example1">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="form2Example2" name="password" class="form-control" />
                <label class="form-label" for="form2Example2">Password</label>
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                        <label class="form-check-label" for="form2Example31"> Remember me </label>
                    </div>
                </div>

                <div class="col">
                    <!-- Simple link -->
                    <a href="#!">Forgot password?</a>
                </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Not a member? <a href="/registration">Register</a></p>
                <p>or sign up with:</p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-github"></i>
                </button>
            </div>
        </form>

    </div>
</body>

</html>
