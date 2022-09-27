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
        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-12 col-lg-9 col-xl-7">
                        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                                <form method="POST" action="/user-register">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-4">

                                            <div class="form-outline">
                                                <input type="text" id="firstName" name="name"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="firstName">Name</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">

                                            <div class="form-outline">
                                                <input type="email" id="email" name="email"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="email">Email</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">

                                            <div class="form-outline">
                                                <input type="password" id="password" name="password"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="password">Password</label>
                                            </div>

                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-12">

                                            <select class="select form-control-lg" name="user_type">
                                                <option value="1" disabled>Choose option</option>
                                                <option value="2">Examine</option>
                                                <option value="3">Student</option>
                                            </select>
                                            <label class="form-label select-label">Choose option</label>

                                        </div>
                                    </div>

                                    <div class="mt-4 pt-2">
                                        <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</body>

</html>
