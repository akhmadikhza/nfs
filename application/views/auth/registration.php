<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="google-site-verification" content="fioX8wIYTuB26U2zDusK5qWYqWLgJPUcWNPCljxmVwc" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title; ?></title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/image/ilus.png'); ?>">


    <meta name="description" content="E-Learning IEANS">
    <!-- Keywords -->
    <meta name="keywords" content="<?= $title . ', ' . $title ?>">
    <!-- Author -->
    <meta name="author" content="<?= $title ?>">
    <meta property="og:type" content="article" />
    <meta property="og:image" content="<?= base_url('assets/image/ilus.png'); ?>">


    <meta property="og:site_name" content="http://elearning.ipnuippnumernek.com/" />



    <!-- <link rel="icon" type="image/png" sizes="36x36" href="<?= base_url('assets/favicon/android-icon-36x36.png'); ?>">
    <link rel="icon" type="image/png" sizes="48x48" href="<?= base_url('assets/favicon/android-icon-48x48.png'); ?>">
    <link rel="icon" type="image/png" sizes="72x72" href="<?= base_url('assets/favicon/android-icon-72x72.png'); ?>">
    <link rel="icon" type="image/png" sizes="144x144" href="<?= base_url('assets/favicon/android-icon-144x144.png'); ?>">
    <link rel="icon" type="image/png" href="<?= base_url('assets/favicon/favicon.ico'); ?>">
    <link rel="icon" type="image/png" sizes="144x144" href="<?= base_url('assets/favicon/android-icon-144x144.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/favicon/android-icon-16x16.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/favicon/android-icon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('assets/favicon/android-icon-96x96.png'); ?>"> -->

    <link href="<?= base_url(''); ?>assets/sbadmin/dist/css/styles.css" rel="stylesheet" />
    <link href="<?= base_url(''); ?>assets/css/style.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body style="background-color: #6a26bd">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header" style="background-color: #4a188f">
                                    <h5 class="text-center text-light my-3 font-weight-bold">Create Account</h5>
                                    <img src="<?= base_url('assets/image/ilus.jpg'); ?>" alt="Amikom Purwokerto" class="rounded mx-auto d-block img-thumbnail logo_univ">
                                </div>
                                <div class="card-body mx-auto ">
                                    <form method="post" action="<?= base_url('auth/registration'); ?>">


                                        <div class="form-row">
                                            <div class="col-lg">
                                                <div class="form-group">
                                                    <label class="small mb-1 font-weight-bold" style="color: #4a188f;" for="inputEmailAddress">Full Name</label>
                                                    <input class="form-control py-4" id="nama" name="nama" type="text" aria-describedby="emailHelp" placeholder="Full name" value="<?= set_value('nama') ?>" />
                                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-lg">
                                                <div class="form-group" style="margin-top: -20px;">
                                                    <label class="small mb-1 font-weight-bold" style="color: #4a188f;" for="inputEmailAddress">Email</label>
                                                    <input class="form-control py-4" id="email" name="email" type="text" aria-describedby="emailHelp" placeholder="Enter email address" value="<?= set_value('email') ?>" />
                                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-row">
                                            <div class="col-lg">
                                                <div class="form-group" style="margin-top: -20px;">
                                                    <label class="small mb-1 font-weight-bold" style="color: #4a188f;" for="inputEmailAddress">No Telp</label>
                                                    <input class="form-control py-4" id="no_telp" name="no_telp" type="text" aria-describedby="no_telpHelp" placeholder="Enter phone number" value="<?= set_value('no_telp') ?>" />
                                                    <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>






                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group" style="margin-top: -18px;">
                                                    <label class="small mb-1 font-weight-bold" style="color: #4a188f;" for="inputPassword">Password</label>
                                                    <input class="form-control py-4" id="password1" name="password1" type="password" placeholder="Enter password" />
                                                    <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" style="margin-top: -18px;">
                                                    <label class="small mb-1 font-weight-bold" style="color: #4a188f;" for="inputConfirmPassword">Confirm Password</label>
                                                    <input class="form-control py-4" id="password2" name="password2" type="password" placeholder="Confirm password" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-1 mb-0"><button type="submit" class="btn text-light btn-block" style="background-color:#4a188f;">Create Account</button></div>
                                    </form>
                                </div>
                                <div class="card-footer text-center" style="background-color:#4a188f;">
                                    <div class="small"><a href="<?= base_url('auth'); ?>" class="text-light">Have an account? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer" style="margin-top: 20px;">
            <footer class="py-3 bg-light mt-auto">
                <div class="container-fluid">
                    <div class=" align-items-center justify-content-between small">
                        <div class="text-dark text-center">Copyright &copy; Rumah Nifas 2021</div>
                        <div>

                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>