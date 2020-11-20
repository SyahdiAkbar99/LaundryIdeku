<!-- Query Menu -->
<?php
$role_id = $this->session->userdata('role_id');
$queryMenu = "SELECT `user_menu`.`id`, `menu`
                        FROM `user_menu` JOIN `user_access_menu` 
                        ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                        WHERE `user_access_menu`.`role_id` =  $role_id
                        ORDER BY `user_access_menu`.`menu_id` ASC";
$menu = $this->db->query($queryMenu)->result_array();
?>
<!-- ./Query Menu -->
<!-- navigation -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="adjust-nav">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><i class="fa fa-folder-open"></i>&nbsp;
                <?php foreach ($menu as $m) : ?>
                    <?= $m['menu']; ?>
                <?php endforeach; ?>
            </a>
        </div>
    </div>
</div>
<!-- /. navigation  -->