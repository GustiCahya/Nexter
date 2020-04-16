<div class="main">
    <div class="main__header">
        <h1 class="main__title">Account</h1>
        <p class="main__desc">Edit your account</p>
    </div>
    <div class="main__box">
        <form action="<?=base_url('dashboard/account')?>" method="POST">
            <div class="box__account">
                <?= $this->session->flashdata('message') ?>
                <div class="username">
                    <label for="username">Username : </label>
                    <input type="text" name="username" value="<?=$account['username']?>" id="username">
                    <?=form_error('username', '<div style="background:crimson;font-size:1.3rem; padding: .5rem">', '</div>')?>
                </div>
                <div class="password1">
                    <label for="password1">Old Password : </label>
                    <input type="password" name="password1" id="password1">
                    <?=form_error('password1', '<div style="background:crimson;font-size:1.3rem; padding: .5rem">', '</div>')?>
                </div>
                <div class="password2">
                    <label for="password2">Password : </label>
                    <input type="password" name="password2" id="password2">
                    <?=form_error('password2', '<div style="background:crimson;font-size:1.3rem; padding: .5rem">', '</div>')?>
                </div>
                <div class="password3">
                    <label for="password3">Confirm Password : </label>
                    <input type="password" name="password3" id="password3">
                    <?=form_error('password3', '<div style="background:crimson;font-size:1.3rem; padding: .5rem">', '</div>')?>
                </div>
                <div class="button">
                    <button type="submit" class="btn btn-primary">Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>
