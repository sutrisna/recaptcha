<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Re-Captcha</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        html,
        body {
            height: 100%;
            font-family: "Poppins", serif;
            font-weight: 500;
            font-style: normal;
        }

        .login-container {
            min-height: 100vh;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center login-container">
        <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
            <h3 class="text-center mb-3">Login with Captcha</h3>
            <form action="verify.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" value="test" placeholder="Type your username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" value="test" placeholder="Type your password">
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-3">
                            <img src="image.php" alt="Gambar Captcha">
                        </div>
                        <div class="col-6">
                            <input id="captcha" type="text" name="captchaText" class="form-control" placeholder="Type Captcha" required>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-secondary" onclick="location.reload(true);">
                                <i class="fa-solid fa-rotate"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary w-100">Login</button>
            </form>
        </div>
    </div>
</body>

</html>