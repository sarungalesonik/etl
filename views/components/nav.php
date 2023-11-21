<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
    <a href="index.php" class="app-brand-link">
        <span class="app-brand-logo demo">
        
        </span>
        <span class="app-brand-text demo menu-text fw-bolder ms-2">Workfolio</span>
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="index.php?page=dashboard-index" class="menu-link int-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <?php /*foreach(modulelist as $module_parent){ ?>
            <li class="menu-item open">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="<?php echo $module_parent["parent_name"]; ?>"><?php echo $module_parent["parent_name"]; ?></div>
                </a>

                <ul class="menu-sub">
                <?php /* foreach($module_parent["modules"] as $module){ ?>
                    <li class="menu-item">
                        <a href="index.php?page=<?php echo $module["location"]; ?>" class="menu-link int-link">
                        <div data-i18n="Without menu"><?php echo $module["module_name"]; ?></div>
                        </a>
                    </li>
                <?php } *//* ?>
                </ul>
            </li>
        <?php /*}*/ ?>

        <?php if($_SESSION["is_super_user"]){ ?>
            <li class="menu-item open">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Master">Master</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item"><a href="index.php?page=master-apimaster-index" class="menu-link int-link">Local Source</a></li>               
                    <li class="menu-item"><a href="index.php?page=master-cronmaster-index" class="menu-link int-link">Cron Master</a></li>
                </ul>
            </li>
            <li class="menu-item open">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Operation">Operation</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item"><a href="index.php?page=operation-schemamapping-index" class="menu-link int-link">Schema Mapping</a></li> 
                    <li class="menu-item"><a href="index.php?page=operation-apilog-index" class="menu-link int-link">API Log</a></li>
                </ul>
            </li>
        <?php } ?>

        

        
    </ul>
</aside>