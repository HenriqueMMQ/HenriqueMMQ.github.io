<?php
session_start();
require('api.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    require('./starter-scripts/bootstrap.html');
    require('./starter-scripts/jquery.html');
    require('./starter-scripts/fancybox.html');
    require('./starter-scripts/mapbox.html');
    ?>

    <script src="script.js"></script>

    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/form_style.css">

    <title>Perfil</title>

</head>

<body>

    <script>
        $(document).ready(function () {
            <?php
            $getUsers();
            $update_user();
            ?>
        });

    </script>
    <nav class="navbar navbar-icon-top navbar-expand-lg">
        <a class="navbar-brand">
            <p>Olá,
                <?= $_SESSION['user']['name'] ?>
            </p>
        </a>
        <h3 id="time" style='text-align: justify;'>
            <?php
            $timezone = date_default_timezone_get();
            date_default_timezone_set($timezone);
            $date = new DateTime();
            $result = $date->format('d/m/Y');
            echo $result .
                "
                <div id='current-time'></div>
                <script>

                  setInterval(function() {

                    let date1 = new Date();

                    let hours = date1.getHours().toString();
                    let minutes = ('0'+date1.getMinutes()).slice(-2);
                    let seconds = ('0'+date1.getSeconds()).slice(-2);

                    document.getElementById('current-time').innerHTML = hours.concat(':', minutes, ':', seconds);
                  }, 1000);
                </script>
                "

                ?>
        </h3>

    </nav>

    <div style="text-align:center; padding-bottom: 50px">
        <div style="height: 5px; background-color: rgb(51, 51, 51);"></div>
    </div>

    <div class="grid-container">
        <div class="container text-center col-md-8 mb-1">

            <div class="col" style="height: 20%">
                <form class="form" method="POST">
                    <div class="input-container">
                        <h2 style="text-align: center;">Dados do Utilizador</h2>
                        <input type="text" name="name" id="name" placeholder="Nome"
                            value="<?php echo $_SESSION['user']['name'] ?>" required>
                    </div>
                    <div class="input-container">
                        <input type="text" name="surname" id="surname" placeholder="Sobrenome"
                            value="<?php echo $_SESSION['user']['surname'] ?>" required>
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" id="email" placeholder="Email"
                            value="<?php echo $_SESSION['user']['email'] ?>" required>
                    </div>
                    <div class="input-container">
                        <input type="tel" name="phone" id="phone" placeholder="Telemóvel"
                            value="<?php echo $_SESSION['user']['phone'] ?>">
                    </div>
                    <div>
                        <input name="action" value="update_user" hidden>
                    </div>
                    <button type="submit" class="submit">
                        Guardar dados
                    </button>
                </form>
            </div>
        </div>

        <div class="container text-center col-md-8">

            <?php

            $user_admin = $_SESSION['user']['admin'];

            if ($user_admin == 1) {
                ?>
                <div class="col" style="height: 20%">
                    <form class="form mb-1" method="GET">
                        <div class="input-container">
                            <h2 style="text-align: center;">Editar utilizadores</h2>
                            <label for="userSelect">Selecione um utilizador:</label>
                            <select class="input-container form" name="userSelect" id="userSelect"
                                onchange="this.form.submit()">
                                <option> Selecione um utilizador</option>
                                <?php
                                foreach ($_SESSION['users'] as $users) {
                                    echo
                                        '<option ' . ($_SESSION['userSelected']['id'] == $users['id'] ? 'selected' : '') . ' name="otherUserUsername" value="' . $users['username'] . '"> ' . $users['username'] . '</option>';
                                }

                                ?>
                            </select>
                            <button type="submit" class="submit">
                                Selecionar utilizador
                            </button>
                        </div>
                    </form>
                    <form class="form" method="POST">

                        <div class="col" style="height: 20%">
                            <div class="input-container">
                                <h2 style="text-align: center;">Dados do Utilizador:
                                </h2>
                                <?php
                                if (isset($_SESSION['user'])) {
                                    echo '<input type="text" name="other_user_name" id="name" placeholder="Nome"
                                                value="' . $_SESSION['userSelected']['name'] . '" >
                                              <div class="input-container">
                                                  <input type="text" name="other_user_surname" id="surname" placeholder="Sobrenome"
                                                  value="' . $_SESSION['userSelected']['surname'] . '" >
                                              </div>
                                              <div class="input-container">
                                                  <input type="email" name="other_user_email" id="email" placeholder="Email"
                                                  value="' . $_SESSION['userSelected']['email'] . '" >
                                              </div>
                                              <div class="input-container">
                                                  <input type="tel" name="other_user_phone" id="phone" placeholder="Telemóvel"
                                                  value="' . $_SESSION['userSelected']['phone'] . '">
                                              </div>';
                                }
                                ?>
                                <div>
                                    <input name="action" value="update_other_user" hidden>
                                </div>
                                <button type="submit" class="submit">
                                    Editar dados
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>

        <?php
            }
            ?>


    <?php
    include('sidebar.php');
    ?>
</body>

</html>