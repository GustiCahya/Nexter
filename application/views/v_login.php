<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,400i|Nunito:300,300i" rel="stylesheet">
        <link rel="stylesheet" href="<?=base_url('assets-admin')?>/login/css/style.css">
        <link rel="shortcut icon" type="image/png" href="<?=base_url('assets-admin')?>/login/img/favicon.png">
        
        <title>nexter &mdash; your home, your freedom</title>
    </head>
    <body class="container">
        <div class="login">
            <?= $this->session->flashdata('message') ?>
            <h1>Login to Dashboard</h1>
            <form action="<?=base_url('login')?>" method="POST" class="login__form">
                <div class="username">
                    <label for="username">username</label>
                    <input type="text" name="username" id="username" placeholder="username">
                    <?=form_error('username', '<div style="color:salmon; padding: .5rem">', '</div>')?>
                </div>
                <div class="password">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" placeholder="password">
                    <?=form_error('password', '<div style="color:salmon; padding: .5rem">', '</div>')?>
                </div>
                <button class="btn" type="submit">Login</button>
            </form>
        </div>
    </body>
</html>