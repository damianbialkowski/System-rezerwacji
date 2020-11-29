<header class="navbar-header">
    <div class="left-side">
        <div class="collapse-left-side" @click="toggleMenu()">
            <i class="fa fa-fw fa-bars"></i>
        </div>
    </div>
    <div class="right-side">
        <div class="user-info">
            <span class="initials">D.B.</span>
            <span>{{ admin()->name }}</span>
            <i class="fa fa-angle-down"></i>
        </div>
    </div>
</header>
