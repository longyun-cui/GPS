<style>
    /*.main-header { position:fixed; left:0; right:0; }*/
    /*.content-wrapper { margin-top:50px; }*/
    /*.main-sidebar { position:fixed; }*/
    /*.control-sidebar { position:fixed; overflow-y:auto; }*/
    /*
 * Skin: Black
 * -----------
 */
    .content { padding:0 !important; }
    .content-wrapper { padding-top:25px !important; }
    .img-icon {
        width: 24px;
        height: 24px;
        margin-top: 0;
        margin-right: 0;
        border-radius: 50px;
    }


    .products-list .product-img {
        position: relative;
        width: 30%;
        float:left;
    }
    .products-list .product-img:before {
        width: 100%;
        padding-top: 75%;
        content: "";
        float: left;
    }
    .products-list .product-img .image-box {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 0;
        overflow: hidden;
    }
    .products-list .product-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .products-list .product-info {
         margin-left: 32%;
    }

    .skin-black .navbar-custom-menu>.navbar-nav>li>.dropdown-menu {
        border:0;
        right:2px;
        background: rgba(0,0,0,0.1) !important;
    }
    .skin-black .navbar-nav>.notifications-menu>.dropdown-menu>li.header,
    .skin-black .navbar-nav>.messages-menu>.dropdown-menu>li.header,
    .skin-black .navbar-nav>.tasks-menu>.dropdown-menu>li.header {
        background: rgba(0,0,0,0.7) !important;
        color: #fff !important;
        border-bottom: 1px solid #444;
    }
    .skin-black .navbar-nav>.notifications-menu>.dropdown-menu>li.footer>a,
    .skin-black .navbar-nav>.messages-menu>.dropdown-menu>li.footer>a,
    .skin-black .navbar-nav>.tasks-menu>.dropdown-menu>li.footer>a {
        background: #000 !important;
        color: #fff !important;
    }


    /* skin-black navbar */
    .skin-black .main-header {
        /*-webkit-box-shadow: 0px 1px 0px rgba(0, 0, 0, 1);*/
        /*box-shadow: 0px 1px 0px rgba(0, 0, 0, 1);*/
        color: #fff;
    }
    .skin-black .main-header .navbar-toggle {
        color: #333;
    }
    .skin-black .main-header .navbar-brand {
        color: #fff;
        border-right: 1px solid #eee;
    }
    .skin-black .main-header .navbar {
        /*background-color: #1a2226;*/
        padding-left:4px;
        padding-right:4px;
        background: rgba(0,0,0,0.7) !important;
    }
    .skin-black .main-header .navbar .nav > li > a {
        color: #fff;
    }
    .skin-black .main-header a {
        color: #fff;
    }
    .skin-black .main-header .navbar .nav > li > a:hover,
    .skin-black .main-header .navbar .nav > li > a:active,
    .skin-black .main-header .navbar .nav > li > a:focus,
    .skin-black .main-header .navbar .nav .open > a,
    .skin-black .main-header .navbar .nav .open > a:hover,
    .skin-black .main-header .navbar .nav .open > a:focus,
    .skin-black .main-header .navbar .nav > .active > a {
        background: #ffffff;
        color: #999999;
    }
    .skin-black .main-header .navbar .sidebar-toggle {
        color: #eee;
    }
    .skin-black .main-header .navbar .sidebar-toggle:hover {
        color: #999999;
        background: #ffffff;
    }
    .skin-black .main-header .navbar > .sidebar-toggle {
        color: #b8c7ce;
        border-right: 1px solid #888;
    }
    .skin-black .main-header .navbar .navbar-nav > li > a {
        border-right: 1px solid #eee;
    }
    .skin-black .main-header .navbar .navbar-custom-menu .navbar-nav > li > a,
    .skin-black .main-header .navbar .navbar-right > li > a {
        border-left: 1px solid #888;
        border-right-width: 0;
    }
    .skin-black .main-header > .logo {
        background-color: #1a2226;
        color: #b8c7ce;
        border-bottom: 0 solid transparent;
        border-right: 1px solid #888;
    }
    .skin-black .main-header > .logo:hover {
        background-color: #fcfcfc;
    }
    @media (max-width: 767px) {
        .skin-black .main-header > .logo {
            background-color: #222222;
            color: #ffffff;
            border-bottom: 0 solid transparent;
            border-right: none;
        }
        .skin-black .main-header > .logo:hover {
            background-color: #1f1f1f;
        }
    }
    .skin-black .main-header li.user-header {
        background-color: #222;
    }
    .skin-black .content-header {
        background: transparent;
        box-shadow: none;
    }
    .skin-black .wrapper,
    .skin-black .main-sidebar,
    .skin-black .left-side {
        background-color: #222d32;
    }
    .skin-black .user-panel > .info,
    .skin-black .user-panel > .info > a {
        color: #fff;
    }
    .skin-black .sidebar-menu > li.header {
        color: #4b646f;
        background: #1a2226;
    }
    .skin-black .sidebar-menu > li > a {
        border-left: 3px solid transparent;
    }
    .skin-black .sidebar-menu > li:hover > a,
    .skin-black .sidebar-menu > li.active > a {
        color: #ffffff;
        background: #1e282c;
        border-left-color: #ffffff;
    }
    .skin-black .sidebar-menu > li > .treeview-menu {
        margin: 0 1px;
        background: #2c3b41;
    }
    .skin-black .sidebar a {
        color: #b8c7ce;
    }
    .skin-black .sidebar a:hover {
        text-decoration: none;
    }
    .skin-black .treeview-menu > li > a {
        color: #8aa4af;
    }
    .skin-black .treeview-menu > li.active > a,
    .skin-black .treeview-menu > li > a:hover {
        color: #ffffff;
    }
    .skin-black .sidebar-form {
        border-radius: 3px;
        border: 1px solid #374850;
        margin: 10px 10px;
    }
    .skin-black .sidebar-form input[type="text"],
    .skin-black .sidebar-form .btn {
        box-shadow: none;
        background-color: #374850;
        border: 1px solid transparent;
        height: 35px;
    }
    .skin-black .sidebar-form input[type="text"] {
        color: #666;
        border-top-left-radius: 2px;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 2px;
    }
    .skin-black .sidebar-form input[type="text"]:focus,
    .skin-black .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
        background-color: #fff;
        color: #666;
    }
    .skin-black .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
        border-left-color: #fff;
    }
    .skin-black .sidebar-form .btn {
        color: #999;
        border-top-left-radius: 0;
        border-top-right-radius: 2px;
        border-bottom-right-radius: 2px;
        border-bottom-left-radius: 0;
    }
    .skin-black .pace .pace-progress {
        background: #222;
    }
    .skin-black .pace .pace-activity {
        border-top-color: #222;
        border-left-color: #222;
    }

    .skin-black .dropdown-menu {
        background-color: #222;
    }
    .skin-black .pull-right .dropdown-menu {
        left:auto;
        right:0;
    }

</style>