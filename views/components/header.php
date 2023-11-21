<?php
$user_uid=$_SESSION["user_uid"];
$currentdatetime=date('Y-m-d H:i:s');

$notificationcount=0;
$notifications = array();

?>
<nav
    class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar"
    >
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
        <div class="nav-item d-flex align-items-center">
            <i class="bx bx-search fs-4 lh-0"></i>
            <input
            type="text"
            class="form-control border-0 shadow-none"
            placeholder="Search..."
            aria-label="Search..."
            />
        </div>
        </div>
        <!-- /Search -->

        <div class="ms-auto" style="margin-right: 20px;">
        
        </div>
        <ul class="navbar-nav flex-row align-items-center">
        <!-- Place this tag where you want the button to render. -->
        <!-- Notification -->
        <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
           
          </li>
          <!--/ Notification -->
        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
                <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
            </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                
            <li>
                <a class="dropdown-item" href="#">
                <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                        <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                    </div>
                    <div class="flex-grow-1">
                    <span class="fw-semibold d-block" style="text-transform: capitalize;"><?php echo $_SESSION["username"]; ?></span>
                    <!--small class="text-muted">Admin</small-->
                    </div>
                </div>
                </a>
            </li>
            <li>
                <div class="dropdown-divider"></div>
            </li>
            <li>
                <a class="dropdown-item" href="#">
                <i class="bx bx-user me-2"></i>
                <span class="align-middle">My Profile</span>
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#">
                <i class="bx bx-cog me-2"></i>
                <span class="align-middle">Settings</span>
                </a>
            </li>
            <li>
                <div class="dropdown-divider"></div>
            </li>
            <li>
                <a class="dropdown-item" href="logout.php">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">Log Out</span>
                </a>
            </li>
            </ul>
        </li>
        <!--/ User -->
        </ul>
    </div>
</nav>

<div class="form-noti-alertmaster"></div>
<script>
function setnotificationmodal(notification_uid,oid){
    $("#notification_uid").val(notification_uid);
    $("#noti-open-order-btn").attr("href", "index.php?page=order-manage-index&oid="+oid);
    
}

function marknotification(){
    var notification_uid=$("#notification_uid").val();
    var notification_status=$("#notification_status").val();
    $.ajax({
        url: 'views/components/marknotification.php',
        type: 'POST',
        data: {
            notification_uid: notification_uid,
            notification_status: notification_status
        },
        success: function (data) {
            $(".form-noti-alertmaster").html(data);
        }
    });
}
</script>