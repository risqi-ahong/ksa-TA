<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url('assets/img/') . $users['image']; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $users['username']; ?></p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">

            <!-- Query menu -->
            <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT `user_menu` . `id` , `menu`
                                                FROM `user_menu` JOIN `user_access_menu` 
                                                ON `user_menu` . `id` = `user_access_menu` . `menu_id`
                                            WHERE `user_access_menu` . `role_id` =  $role_id
                                            ORDER BY `user_access_menu` . `menu_id` ASC
                                            ";
            $menu = $this->db->query($queryMenu)->result_array();
            ?>

            <!-- Looping menu -->
            <?php foreach ($menu as $m) : ?>
                <li class="header"><?= $m["menu"]; ?></li>

                <!-- siapkan sub menu sesuai menu -->
                <?php
                $menuId = $m['id'];
                $querySubMENU = "SELECT *
                                                        FROM `user_sub_menu` JOIN `user_menu` 
                                                            ON `user_sub_menu` . `menu_id` = `user_menu` . `id`
                                                        WHERE `user_sub_menu` . `menu_id` =  $menuId
                                                        AND `user_sub_menu` . `is_active` = 1
                                                        ";
                $subMenu = $this->db->query($querySubMENU)->result_array();
                ?>
                <?php foreach ($subMenu as $sm) : ?>
                    <?php if ($judul  == $sm['judul']) : ?>
                        <li class="active">
                        <?php else : ?>
                        <li class="">
                        <?php endif; ?>
                        <a href="<?= base_url(); ?><?= $sm['url'] ?>"><i class="<?= $sm['icon']; ?>"></i> <span><?= $sm['judul']; ?></span></a>
                        </li>
                    <?php endforeach; ?>
                <?php endforeach; ?>

                <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>