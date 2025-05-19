<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - iLanding Bootstrap Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        /*--------------------------------------------------------------
# Hero Section
--------------------------------------------------------------*/
        .hero {
            position: relative;
            padding-top: 160px;
            background: linear-gradient(135deg, color-mix(in srgb, var(--accent-color), transparent 95%) 50%, color-mix(in srgb, var(--accent-color), transparent 98%) 25%, transparent 50%);
        }

        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 90% 10%, color-mix(in srgb, var(--accent-color), transparent 92%), transparent 40%);
            pointer-events: none;
        }

        .hero .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .hero .hero-content h1 .accent-text {
            color: var(--accent-color);
        }

        @media (max-width: 992px) {
            .hero .hero-content {
                text-align: center;
                margin-bottom: 3rem;
            }

            .hero .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero .hero-content .hero-buttons {
                justify-content: center;
            }
        }

        @media (max-width: 575px) {
            .hero .hero-content h1 {
                font-size: 2rem;
            }
        }

        .hero .company-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            background-color: color-mix(in srgb, var(--accent-color), transparent 92%);
            border-radius: 50px;
            color: var(--accent-color);
            font-weight: 500;
        }

        .hero .company-badge i {
            font-size: 1.25rem;
        }

        .hero .btn-primary {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: var(--contrast-color);
            padding: 0.75rem 2.5rem;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .hero .btn-primary:hover {
            background-color: color-mix(in srgb, var(--accent-color), black 20%);
            border-color: color-mix(in srgb, var(--accent-color), black 20%);
        }

        .hero .btn-link {
            color: var(--heading-color);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .hero .btn-link:hover {
            color: var(--accent-color);
        }

        .hero .btn-link i {
            font-size: 1.5rem;
            vertical-align: middle;
        }

        .hero .hero-image {
            position: relative;
            text-align: center;
            z-index: 1;
        }

        .hero .hero-image img {
            max-width: 100%;
            height: auto;
        }

        .hero .customers-badge {
            position: absolute;
            bottom: 10px;
            right: 30px;
            background-color: var(--surface-color);
            padding: 1rem;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            animation: float-badge 3s ease-in-out infinite;
            will-change: transform;
        }

        .hero .customers-badge .customer-avatars {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .hero .customers-badge .avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: 2px solid var(--surface-color);
            margin-left: -8px;
        }

        .hero .customers-badge .avatar:first-child {
            margin-left: 0;
        }

        .hero .customers-badge .avatar.more {
            background-color: var(--accent-color);
            color: var(--contrast-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .hero .customers-badge p {
            font-size: 0.875rem;
            color: color-mix(in srgb, var(--default-color), transparent 40%);
        }

        @media (max-width: 992px) {
            .hero .customers-badge {
                position: static;
                margin: 1rem auto;
                max-width: 250px;
            }
        }

        .hero .stats-row {
            position: relative;
            z-index: 1;
            margin-top: 5rem;
            background-color: var(--surface-color);
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding-bottom: 2rem;
        }

        .hero .stat-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 2rem;
        }

        .hero .stat-item .stat-icon {
            flex-shrink: 0;
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: color-mix(in srgb, var(--accent-color), transparent 92%);
            border-radius: 50px;
            transition: 0.3s;
        }

        .hero .stat-item .stat-icon i {
            font-size: 1.5rem;
            color: var(--accent-color);
        }

        .hero .stat-item:hover .stat-icon {
            background-color: var(--accent-color);
        }

        .hero .stat-item:hover .stat-icon i {
            color: var(--contrast-color);
        }

        .hero .stat-item .stat-content {
            flex-grow: 1;
        }

        .hero .stat-item .stat-content h4 {
            font-size: 1.25rem;
            margin-bottom: 0.25rem;
            font-weight: 600;
        }

        .hero .stat-item .stat-content p {
            font-size: 0.875rem;
            color: color-mix(in srgb, var(--default-color), transparent 40%);
            margin: 0;
        }

        @media (max-width: 575px) {
            .hero .stat-item {
                padding: 1.5rem;
            }
        }

        @keyframes float-badge {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0);
            }
        }

        /*--------------------------------------------------------------
          # Global Header
        --------------------------------------------------------------*/
        .header {
            --background-color: rgba(255, 255, 255, 0);
            color: var(--default-color);
            background-color: var(--background-color);
            padding: 20px 0;
            transition: all 0.5s;
            z-index: 997;
        }

        .header .header-container {
            background: var(--surface-color);
            border-radius: 50px;
            padding: 5px 25px;
            box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
        }

        .scrolled .header .header-container {
            background: color-mix(in srgb, var(--surface-color), transparent 5%);
        }

        .header .logo {
            line-height: 1;
            padding-left: 5px;
        }

        .header .logo img {
            max-height: 36px;
            margin-right: 8px;
        }

        .header .logo h1 {
            font-size: 24px;
            margin: 0;
            font-weight: 500;
            color: var(--heading-color);
        }

        .header .btn-getstarted,
        .header .btn-getstarted:focus {
            color: var(--contrast-color);
            background: var(--accent-color);
            font-size: 14px;
            padding: 8px 20px;
            margin: 0 0 0 30px;
            border-radius: 50px;
            transition: 0.3s;
        }

        .header .btn-getstarted:hover,
        .header .btn-getstarted:focus:hover {
            color: var(--contrast-color);
            background: color-mix(in srgb, var(--accent-color), transparent 15%);
        }

        @media (max-width: 1200px) {
            .header {
                padding-top: 10px;
            }

            .header .header-container {
                margin-left: 10px;
                margin-right: 10px;
                padding: 10px 5px 10px 15px;
            }

            .header .logo {
                order: 1;
            }

            .header .btn-getstarted {
                order: 2;
                margin: 0 10px 0 0;
                padding: 6px 15px;
            }

            .header .navmenu {
                order: 3;
            }
        }

        /*--------------------------------------------------------------
        # Navigation Menu
        --------------------------------------------------------------*/
        /* Navmenu - Desktop */
        @media (min-width: 1200px) {
            .navmenu {
                padding: 0;
            }

            .navmenu ul {
                margin: 0;
                padding: 0;
                display: flex;
                list-style: none;
                align-items: center;
            }

            .navmenu li {
                position: relative;
            }

            .navmenu a,
            .navmenu a:focus {
                color: var(--nav-color);
                padding: 18px 15px;
                font-size: 16px;
                font-family: var(--nav-font);
                font-weight: 400;
                display: flex;
                align-items: center;
                justify-content: space-between;
                white-space: nowrap;
                transition: 0.3s;
            }

            .navmenu a i,
            .navmenu a:focus i {
                font-size: 12px;
                line-height: 0;
                margin-left: 5px;
                transition: 0.3s;
            }

            .navmenu li:last-child a {
                padding-right: 0;
            }

            .navmenu li:hover>a,
            .navmenu .active,
            .navmenu .active:focus {
                color: var(--nav-hover-color);
            }

            .navmenu .dropdown ul {
                margin: 0;
                padding: 10px 0;
                background: var(--nav-dropdown-background-color);
                display: block;
                position: absolute;
                visibility: hidden;
                left: 14px;
                top: 130%;
                opacity: 0;
                transition: 0.3s;
                border-radius: 4px;
                z-index: 99;
                box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
            }

            .navmenu .dropdown ul li {
                min-width: 200px;
            }

            .navmenu .dropdown ul a {
                padding: 10px 20px;
                font-size: 15px;
                text-transform: none;
                color: var(--nav-dropdown-color);
            }

            .navmenu .dropdown ul a i {
                font-size: 12px;
            }

            .navmenu .dropdown ul a:hover,
            .navmenu .dropdown ul .active:hover,
            .navmenu .dropdown ul li:hover>a {
                color: var(--nav-dropdown-hover-color);
            }

            .navmenu .dropdown:hover>ul {
                opacity: 1;
                top: 100%;
                visibility: visible;
            }

            .navmenu .dropdown .dropdown ul {
                top: 0;
                left: -90%;
                visibility: hidden;
            }

            .navmenu .dropdown .dropdown:hover>ul {
                opacity: 1;
                top: 0;
                left: -100%;
                visibility: visible;
            }
        }

        /* Navmenu - Mobile */
        @media (max-width: 1199px) {
            .mobile-nav-toggle {
                color: var(--nav-color);
                font-size: 28px;
                line-height: 0;
                margin-right: 10px;
                cursor: pointer;
                transition: color 0.3s;
            }

            .navmenu {
                padding: 0;
                z-index: 9997;
            }

            .navmenu ul {
                display: none;
                list-style: none;
                position: absolute;
                inset: 60px 20px 20px 20px;
                padding: 10px 0;
                margin: 0;
                border-radius: 6px;
                background-color: var(--nav-mobile-background-color);
                overflow-y: auto;
                transition: 0.3s;
                z-index: 9998;
                box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
            }

            .navmenu a,
            .navmenu a:focus {
                color: var(--nav-dropdown-color);
                padding: 10px 20px;
                font-family: var(--nav-font);
                font-size: 17px;
                font-weight: 500;
                display: flex;
                align-items: center;
                justify-content: space-between;
                white-space: nowrap;
                transition: 0.3s;
            }

            .navmenu a i,
            .navmenu a:focus i {
                font-size: 12px;
                line-height: 0;
                margin-left: 5px;
                width: 30px;
                height: 30px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 50%;
                transition: 0.3s;
                background-color: color-mix(in srgb, var(--accent-color), transparent 90%);
            }

            .navmenu a i:hover,
            .navmenu a:focus i:hover {
                background-color: var(--accent-color);
                color: var(--contrast-color);
            }

            .navmenu a:hover,
            .navmenu .active,
            .navmenu .active:focus {
                color: var(--nav-dropdown-hover-color);
            }

            .navmenu .active i,
            .navmenu .active:focus i {
                background-color: var(--accent-color);
                color: var(--contrast-color);
                transform: rotate(180deg);
            }

            .navmenu .dropdown ul {
                position: static;
                display: none;
                z-index: 99;
                padding: 10px 0;
                margin: 10px 20px;
                background-color: var(--nav-dropdown-background-color);
                border: 1px solid color-mix(in srgb, var(--default-color), transparent 90%);
                box-shadow: none;
                transition: all 0.5s ease-in-out;
            }

            .navmenu .dropdown ul ul {
                background-color: rgba(33, 37, 41, 0.1);
            }

            .navmenu .dropdown>.dropdown-active {
                display: block;
                background-color: rgba(33, 37, 41, 0.03);
            }

            .mobile-nav-active {
                overflow: hidden;
            }

            .mobile-nav-active .mobile-nav-toggle {
                color: #fff;
                position: absolute;
                font-size: 32px;
                top: 15px;
                right: 15px;
                margin-right: 0;
                z-index: 9999;
            }

            .mobile-nav-active .navmenu {
                position: fixed;
                overflow: hidden;
                inset: 0;
                background: rgba(33, 37, 41, 0.8);
                transition: 0.3s;
            }

            .mobile-nav-active .navmenu>ul {
                display: block;
            }
        }
    </style>
</head>

<body class="index-page">
    <x-navbar-guest />
    <main>
        {{ $slot }}

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
