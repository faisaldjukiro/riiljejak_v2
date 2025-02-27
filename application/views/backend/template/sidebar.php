<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- QUERY MENU -->
        <?php 
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT `user_menu`.`id` ,`menu`
            FROM `user_menu` JOIN `user_access_menu`
            ON `user_menu`.`id` = `user_access_menu`.`menu_id`
            WHERE `user_access_menu`.`role_id` = $role_id
            ORDER BY `user_menu`.`urutan` ASC
            ";
        $menu = $this->db->query($queryMenu)->result_array();
      
        ?>
        <!-- LOOPING MENU  -->
        <?php foreach($menu as $m) :?>
        <li class="nav-heading">
            <?= $m['menu'];?>
        </li>
        <!-- SIPKAN SUB-MENU SESUAI MENU -->
        <?php
        $menuId = $m['id'];
            $querySubMenu = "SELECT * FROM `user_sub_menu`
            JOIN `user_menu` ON `user_sub_menu`.`menu_id` = `user_menu`.`id` 
            LEFT JOIN 	`user_sub2_menu` ON `user_sub_menu`.`id` =  `user_sub2_menu`.`id_sub_menu`
            WHERE `user_sub_menu`.`menu_id` = $menuId
            AND `user_sub_menu`.`is_active` = 1
            ORDER BY `user_sub_menu`.`urutan` ASC
            "; 

        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach($subMenu as $sm): ?>
        <?php if($sm['id_sub_menu'] === null): ?>
        <!-- Menu tanpa sub menu -->
        <li class="nav-item">
            <a class="nav-link <?php echo ($title == $sm['title']) ? '' : 'collapsed'; ?>"
                href="<?= base_url($sm['url']) ?>">
                <i class="<?= $sm['icon'] ?>"></i>
                <span><?= $sm['title'] ?></span>
            </a>
        </li>
        <?php else: ?>
        <!-- Menu dengan sub menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav-<?= $sm['id_sub_menu'] ?>"
                data-bs-toggle="collapse" href="#">
                <i class="<?= $sm['icon'] ?>"></i>
                <span><?= $sm['title'] ?></span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav-<?= $sm['id_sub_menu'] ?>" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <!-- Submenu Items -->
                <?php foreach($subMenu as $sub): ?>
                <?php if($sub['id_sub_menu'] === $sm['id_sub_menu']): ?>
                <li>
                    <a href="<?= base_url($sub['sub_url']) ?>">
                        <i class="bi bi-circle"></i>
                        <span><?= $sub['sub_title'] ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </li>
        <?php endif; ?>
        <?php endforeach; ?>
        <?php endforeach;?>

        <li class="nav-item">
            <a class="nav-link collapsed text-danger" href="<?= base_url('LoginController/logout')?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>Keluar</span>
            </a>
        </li><!-- End Blank Page Nav -->


    </ul>

</aside><!-- End Sidebar-->