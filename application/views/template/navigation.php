<div class="sidebar" data-color="purple" data-background-color="white">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
    Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="<?=base_url()?>" class="simple-text logo-normal">
            <?=$ui_app_name?>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav nav-parent accordion" id="navAccordion">
            <?php 
                $nav_active = explode('|', $ui_sidebar_active);
                $nav_active_parent = $nav_active[0];
                $nav_active_child = $nav_active[1];

                $parent_id = 0;
                foreach ($ui_sidebar_nav as $nav_parent => $nav_child_array) {
                    $parent_id++;
                    $nav_parent = explode('|', $nav_parent);
                    $nav_parent_title = $nav_parent[0];
                    $nav_parent_icon = $nav_parent[1];

                    if ($nav_parent_title == $nav_active_parent) {
                        $parent_active_class = 'active';
                    }
                    else {
                        $parent_active_class = '';
                    }
            ?>
            <li class="nav-item <?=$parent_active_class?>">
                <a href="#" class="nav-link" data-toggle="collapse" data-target="#collapse<?=$parent_id?>" aria-expanded="false">
                    <i class="material-icons"><?=$nav_parent_icon?></i>
                    <p><?=$nav_parent_title?></p>
                </a>
                <ul id="collapse<?=$parent_id?>" class="collapse <?=($parent_active_class == 'active')? 'show': ''?>" data-parent="#navAccordion">
                    <?php 
                        foreach ($nav_child_array as $nav_child) {
                            $nav_child = explode('|', $nav_child);
                            $nav_child_title = $nav_child[0];
                            $nav_child_icon = $nav_child[1];
                            $nav_child_link = $nav_child[2];

                            $child_active_class = '';
                            if ($parent_active_class == 'active') {
                                if ($nav_child_title == $nav_active_child) {
                                    $child_active_class = 'active';
                                }
                                else {
                                    $child_active_class = '';
                                }
                            }
                    ?>
                    <li class="nav-item <?=$child_active_class?>">
                        <a href="<?=$nav_child_link?>" class="nav-link">
                            <i class="material-icons"><?=$nav_child_icon?></i>
                            <p><?=$nav_child_title?></p>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </li>
            <?php 
                }
            ?>
        </ul>
    </div>
    <div class="sidebar-background" style="background-image: url('<?=site_url('assets/materialdashboard/img/sidebar-1.jpg')?>') "></div>
</div>
<div class="main-panel">
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="#pablo">Dashboard</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav"> 
                    <?php 
                        foreach ($ui_top_nav as $top_nav) {
                            $nav_top = explode('|', $top_nav);
                            $nav_top_title = $nav_top[0];
                            $nav_top_icon = $nav_top[1];
                            $nav_top_link = $nav_top[2];

                            if ($ui_top_nav_active == $nav_top_title) {
                                $nav_top_class = 'active';
                            }
                            else {
                                $nav_top_class = '';
                            }
                    ?>
                    <li class="nav-item <?=$nav_top_class?>"> 
                        <a class="nav-link" href="<?=$nav_top_link?>">
                            <i class="material-icons"><?=$nav_top_icon?></i> <?=$nav_top_title?>
                        </a>
                    </li>
                    <?php 
                        }
                    ?>
                    <!-- your navbar here -->
                </ul>
            </div>
        </div>
    </nav>
    <div class="content mt-1">