<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login | Salvus</title>
</head>
<body>
    <div class="vh-100 d-flex justify-content-center align-items-center ">
        @if(Session::has('status'))
        <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
            {{Session::get('message')}} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card" style="width: 24rem;">
            <div class="card-body">
                <h4 class="card-title mb-5">Login</h4>
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="Email" class="form-label fw-bold">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mt-5">
                        <button class="btn btn-primary form-control" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>