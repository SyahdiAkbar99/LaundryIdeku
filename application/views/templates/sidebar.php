<!-- sidebar -->

<!-- Query Menu -->
<?php
$role_id = $this->session->userdata('role_id');
$queryMenu = "SELECT `user_menu`.`id`, `menu`
                    FROM `user_menu` JOIN `user_access_menu` 
                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                    WHERE `user_access_menu`.`role_id` =  $role_id
                    ORDER BY `user_access_menu`.`menu_id` ASC";
$menu = $this->db->query($queryMenu)->result_array();
// var_dump($menu);
// die;
?>
<!-- ./Query Menu -->


<nav class="navbar-default navbar-side" role="navigation" id="side-bar">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <!-- LOOPING MENU -->
            <?php foreach ($menu as $m) : ?>
                <?php
                $menuId = $m['id'];
                $querySubMenu = "SELECT *
                      FROM `user_sub_menu` JOIN `user_menu`
                        ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                      WHERE `user_sub_menu`.`menu_id` = $menuId
                      AND `user_sub_menu`.`is_active` = 1";
                $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>
                <?php foreach ($subMenu as $sm) : ?>
                    <li>
                        <a href="<?= base_url($sm['url']); ?>"><i class="<?= $sm['icon']; ?> "></i><?= $sm['title'] ?></a>
                    </li>
                <?php endforeach; ?>
            <?php endforeach; ?>
            <!-- ./LOOPING MENU -->

            <li>
                <a href="#"><i class="fa fa-fw fa-sitemap "></i>Opsi<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= base_url('auth/logout'); ?>" onclick="return confirm('Anda yakin ingin keluar?');"><i class="fas fa-sign-out-alt"></i>Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- sidebar  -->