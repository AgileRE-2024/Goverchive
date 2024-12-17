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
                                login
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
    <title>Register</title>
</head>
<body>
    <div class="loginbox">
        <div class="box form-box">
            <header>Register</header>
            <form action="/register" method="post">
                @csrf
                <div class="field input">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" autocomplete="off" required>
                    @error('name')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
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

                <div class="field input">
                    <label for="divisi">Divisi</label>
                    <input type="text" name="divisi" id="divisi" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="posisi">Posisi</label>
                    <input type="text" name="posisi" id="posisi" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="unit-kerja">Unit Kerja</label>
                    <input type="text" name="unit-kerja" id="unit-kerja" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register">
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
