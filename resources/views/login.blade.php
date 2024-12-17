<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/login.css" />
    <title>Goverchive</title>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <a href="/home">
                    <h2>
                        Goverchive
                    </h2>
                </a>
                <div class="navbar">
                    <a href="/organisasi">
                        Contact
                    </a>
                    <a href="#">
                        <div class="loginbutton">
                            <i class='bx bx-log-in-circle' ></i>
                            <a href="#">
                                Login
                            </a>
                        </div>
                    </a>
                </div>
            </div>
        </header>

        <main>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="loginbox">
        <div class="box form-box">
            <header>Login</header>
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <form action="/login" method="post">
                @csrf
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required value="{{ old('email') }}">
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                    @error('password')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login">
                    @if(session('error'))
                        <span class="error">{{ session('error') }}</span>
                    @endif
                </div>
            </form>
        </div>
    </div>
</body>
</html>

        </main>
    </div>

</body>
</html>
