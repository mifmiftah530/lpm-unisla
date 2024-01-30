<?php
include 'koneksi.php'
    ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/png/jpg" href="images/unisla.png">
    <link rel="stylesheet" href="style-2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">


                    <div class="text">
                        <p>Sistem Informasi Audit Mutu Internal</p>
                    </div>

                </div>

                <div class="col-md-6 right">

                    <div class="input-box">

                        <img src="images/unisla.png" alt="">

                        <header>Audit Mutu Internal</header>

                        <form action="proses_login.php" method="post">

                            <div class="input-field">
                                <input type="text" class="input" id="username" name="username" required>
                                <label for="email">Username</label>
                            </div>
                            <div class="input-field">
                                <input type="password" class="input" id="password" name="password" required><label
                                    for="pass">Password</label>
                            </div>



                            <div>
                                <select class="form-select" aria-label="Default select example" id="user_type"
                                    name="user_type">
                                    <option selected>Pilih</option>
                                    <option value="auditee">Auditee</option>
                                    <option value="auditor">Auditor</option>
                                    <option value="Pimpinan">Pimpinan</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                            <div class="input-field" style="padding-top: 25px;">
                                <input type="submit" class="submit" value="Login">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

  `

</body>

</html>