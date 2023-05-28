<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="<?= base_url('users/index') ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>K</b>SA</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b>KSA</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="<?= base_url('assets/img/') . $users['image']; ?>" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs"><?= $users['username']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="<?= base_url('assets/img/') . $users['image']; ?>" class="img-circle" alt="User Image">

                                    <p>
                                        <?= $users['username']; ?>
                                        <small>member since <?= date('d F Y', $users['date_create']); ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="<?= base_url('users/signout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->

                    </ul>
                </div>
            </nav>
        </header>