<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <nav id="navmenu" class="navmenu">
            <ul class="nav-list">
                <li>
                    <a href="#hero" class="active">Home</a></li>
                <li><a href="#about">Kegiatan</a></li>
                <li><a href="#features">Features</a></li>
                <li class="dropdown">
                    <a href="#" class="toggle-hima">
                        <span>HIMA</span> <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="#">Teknik Informatika</a></li>
                        <li><a href="#">Teknik Otomotif</a></li>
                        <li><a href="#">Budidaya Tanaman dan Perkebunan</a></li>
                        <li><a href="#">Bisnis Digital</a></li>
                    </ul>
                </li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="{{route('login')}}">Login</a>

    </div>
</header>

<style>
    /* Styling Navbar */
    .header {
        background: #fff;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        padding: 10px 0;
    }

    .navmenu {
        display: flex;
    }

    .nav-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        align-items: center;
    }

    .nav-list li {
        position: relative;
        margin: 0 15px;
    }

    .nav-list a {
        text-decoration: none;
        color: #333;
        font-weight: 600;
        padding: 10px 15px;
        display: block;
    }

    .nav-list a:hover {
        color: #007bff;
    }

    /* Dropdown Styling */
    .submenu {
        display: none;
        position: absolute;
        background: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        list-style: none;
        padding: 0;
        margin: 0;
        top: 100%;
        left: 0;
        min-width: 200px;
        border-radius: 5px;
        z-index: 1000;
    }

    .submenu li {
        width: 100%;
    }

    .submenu a {
        padding: 10px 15px;
        color: #333;
        display: block;
    }

    .submenu a:hover {
        background: #f8f9fa;
    }

    .dropdown.show .submenu {
        display: block;
    }

    /* Button Styling */
    .btn-getstarted {
        background: #007bff;
        color: white;
        padding: 8px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
    }

    .btn-getstarted:hover {
        background: #0056b3;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelector(".toggle-hima").addEventListener("click", function (e) {
            e.preventDefault();
            this.parentElement.classList.toggle("show");
        });
    });
</script>
