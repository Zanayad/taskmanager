<!DOCTYPE html>
<html lang="en" data-theme="light" data-accent="pink">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tasks — Taskflow</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root, [data-accent="pink"] {
            --accent: #b76e79;
            --accent-hover: #9a5a64;
            --accent-light: rgba(183,110,121,0.08);
            --accent-border: rgba(183,110,121,0.25);
        }
        [data-accent="slate"] {
            --accent: #4A6FA5;
            --accent-hover: #3a5a8a;
            --accent-light: rgba(74,111,165,0.08);
            --accent-border: rgba(74,111,165,0.25);
        }
        [data-accent="teal"] {
            --accent: #2D7D6F;
            --accent-hover: #1f6559;
            --accent-light: rgba(45,125,111,0.08);
            --accent-border: rgba(45,125,111,0.25);
        }
        [data-accent="gold"] {
            --accent: #C9A84C;
            --accent-hover: #b8972e;
            --accent-light: rgba(201,168,76,0.08);
            --accent-border: rgba(201,168,76,0.25);
        }
        [data-accent="navy"] {
            --accent: #1B2A4A;
            --accent-hover: #0f1e38;
            --accent-light: rgba(27,42,74,0.08);
            --accent-border: rgba(27,42,74,0.25);
        }
        [data-theme="light"] {
            --bg: #f8f7f4;
            --bg-card: #ffffff;
            --bg-input: #fafaf8;
            --bg-nav: rgba(255,255,255,0.95);
            --text: #1a1a1a;
            --text-muted: #6b6b6b;
            --text-subtle: #9a9a9a;
            --border: #e8e4e0;
            --shadow: rgba(0,0,0,0.05);
            --shadow-md: rgba(0,0,0,0.10);
        }
        [data-theme="dark"] {
            --bg: #111111;
            --bg-card: #1a1a1a;
            --bg-input: #222222;
            --bg-nav: rgba(17,17,17,0.95);
            --text: #f0ede8;
            --text-muted: #a0a0a0;
            --text-subtle: #555555;
            --border: #2a2a2a;
            --shadow: rgba(0,0,0,0.3);
            --shadow-md: rgba(0,0,0,0.5);
        }

        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        html { height: 100%; scroll-behavior: smooth; }

        body {
            font-family: 'Jost', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            transition: background 0.4s ease, color 0.4s ease;
        }

        /* NAV */
        nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            background: var(--bg-nav);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            padding: 0 40px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.3s ease;
        }
        .nav-left {
            display: flex;
            align-items: center;
            gap: 32px;
        }
        .nav-brand {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 400;
            color: var(--text);
            text-decoration: none;
            letter-spacing: 0.5px;
        }
        .nav-brand span { color: var(--accent); }

        .nav-tabs {
            display: flex;
            gap: 4px;
        }
        .nav-tab {
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            cursor: pointer;
            border: none;
            background: transparent;
            transition: all 0.2s ease;
            text-decoration: none;
        }
        .nav-tab:hover { color: var(--text); background: var(--accent-light); }
        .nav-tab.active {
            background: var(--accent);
            color: #fff;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .theme-dots { display: flex; gap: 5px; align-items: center; }
        .theme-dot {
            width: 14px; height: 14px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.2s ease;
        }
        .theme-dot:hover { transform: scale(1.2); }
        .theme-dot.active { border-color: var(--text); }
        .theme-dot[data-color="pink"] { background: #b76e79; }
        .theme-dot[data-color="slate"] { background: #4A6FA5; }
        .theme-dot[data-color="teal"] { background: #2D7D6F; }
        .theme-dot[data-color="gold"] { background: #C9A84C; }
        .theme-dot[data-color="navy"] { background: #1B2A4A; }

        .icon-btn {
            width: 36px; height: 36px;
            border-radius: 50%;
            border: 1px solid var(--border);
            background: transparent;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            transition: all 0.3s ease;
        }
        .icon-btn:hover { border-color: var(--accent); color: var(--accent); }
        .icon-btn svg { width: 15px; height: 15px; }

        .user-menu {
            position: relative;
        }
        .user-avatar {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: var(--accent);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            border: 2px solid var(--accent-border);
            transition: all 0.2s ease;
            font-family: 'Jost', sans-serif;
        }
        .user-avatar:hover { transform: scale(1.05); box-shadow: 0 4px 12px var(--accent-border); }

        .dropdown {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 8px;
            min-width: 200px;
            box-shadow: 0 8px 32px var(--shadow-md);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-8px);
            transition: all 0.2s ease;
            z-index: 200;
        }
        .dropdown.open {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .dropdown-header {
            padding: 12px 12px 8px;
            border-bottom: 1px solid var(--border);
            margin-bottom: 8px;
        }
        .dropdown-name {
            font-size: 14px;
            font-weight: 500;
            color: var(--text);
        }
        .dropdown-email {
            font-size: 12px;
            color: var(--text-muted);
            margin-top: 2px;
        }
        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 12px;
            border-radius: 6px;
            font-size: 13px;
            color: var(--text-muted);
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            border: none;
            background: none;
            width: 100%;
            font-family: 'Jost', sans-serif;
        }
        .dropdown-item:hover { background: var(--accent-light); color: var(--accent); }
        .dropdown-item.danger:hover { background: rgba(220,53,69,0.08); color: #dc3545; }
        .dropdown-item svg { width: 14px; height: 14px; flex-shrink: 0; }
        .dropdown-divider { height: 1px; background: var(--border); margin: 6px 0; }

        /* MAIN */
        main {
            padding-top: 64px;
            max-width: 900px;
            margin: 0 auto;
            padding-left: 24px;
            padding-right: 24px;
            padding-bottom: 60px;
        }

        /* PAGE HEADER */
        .page-header {
            padding: 40px 0 32px;
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
        }
        .page-greeting {
            font-size: 12px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 6px;
            font-weight: 500;
        }
        .page-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 36px;
            font-weight: 300;
            color: var(--text);
            line-height: 1.2;
        }
        .page-date {
            font-size: 13px;
            color: var(--text-subtle);
            font-weight: 300;
            text-align: right;
        }

        /* STATS */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 32px;
        }
        .stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 20px 24px;
            display: flex;
            align-items: center;
            gap: 16px;
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px var(--shadow);
            border-color: var(--accent-border);
        }
        .stat-icon {
            width: 44px; height: 44px;
            border-radius: 10px;
            background: var(--accent-light);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .stat-icon svg { width: 20px; height: 20px; stroke: var(--accent); fill: none; stroke-width: 1.5; }
        .stat-num {
            font-family: 'Cormorant Garamond', serif;
            font-size: 32px;
            font-weight: 300;
            color: var(--text);
            line-height: 1;
        }
        .stat-label {
            font-size: 11px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-top: 3px;
        }

        /* ADD TASK */
        .add-task-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 24px;
            transition: all 0.3s ease;
        }
        .add-task-card:focus-within {
            border-color: var(--accent-border);
            box-shadow: 0 4px 20px var(--accent-light);
        }
        .add-task-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 16px;
        }
        .add-icon {
            width: 28px; height: 28px;
            border-radius: 50%;
            background: var(--accent);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .add-icon svg { width: 14px; height: 14px; stroke: #fff; fill: none; stroke-width: 2; }
        .add-task-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 18px;
            font-weight: 400;
            color: var(--text);
        }
        .add-form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 12px;
        }
        .form-input {
            width: 100%;
            padding: 11px 14px;
            background: var(--bg-input);
            border: 1px solid var(--border);
            border-radius: 8px;
            font-family: 'Jost', sans-serif;
            font-size: 14px;
            color: var(--text);
            transition: all 0.3s ease;
            outline: none;
            appearance: none;
        }
        .form-input:focus {
            border-color: var(--accent);
            background: var(--bg-card);
            box-shadow: 0 0 0 3px var(--accent-light);
        }
        .form-input::placeholder { color: var(--text-subtle); }
        .form-select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%236b6b6b' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 32px;
            cursor: pointer;
        }
        .add-form-bottom {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr auto;
            gap: 12px;
            align-items: end;
        }
        .btn-add {
            padding: 11px 24px;
            background: var(--accent);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-family: 'Jost', sans-serif;
            font-size: 12px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
        }
        .btn-add:hover {
            background: var(--accent-hover);
            transform: translateY(-1px);
            box-shadow: 0 6px 16px var(--accent-border);
        }

        /* SUCCESS MESSAGE */
        .alert-success {
            background: rgba(39,174,96,0.08);
            border: 1px solid rgba(39,174,96,0.2);
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 20px;
            font-size: 13px;
            color: #27ae60;
            display: flex;
            align-items: center;
            gap: 8px;
            animation: slideDown 0.3s ease;
        }
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* FILTER TABS */
        .filter-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }
        .filter-tabs {
            display: flex;
            gap: 4px;
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 4px;
        }
        .filter-tab {
            padding: 7px 18px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 500;
            color: var(--text-muted);
            cursor: pointer;
            transition: all 0.2s ease;
            border: none;
            background: transparent;
            font-family: 'Jost', sans-serif;
        }
        .filter-tab:hover { color: var(--text); }
        .filter-tab.active {
            background: var(--accent);
            color: #fff;
            box-shadow: 0 2px 8px var(--accent-border);
        }

        .sort-select {
            padding: 8px 32px 8px 12px;
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 8px;
            font-family: 'Jost', sans-serif;
            font-size: 12px;
            color: var(--text-muted);
            cursor: pointer;
            outline: none;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%236b6b6b' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            transition: all 0.2s;
        }
        .sort-select:hover { border-color: var(--accent-border); }

        /* TASK LIST */
        .task-list { display: flex; flex-direction: column; gap: 10px; }

        .task-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            gap: 14px;
            transition: all 0.3s ease;
            animation: fadeSlide 0.3s ease;
        }
        @keyframes fadeSlide {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .task-card:hover {
            border-color: var(--accent-border);
            box-shadow: 0 4px 16px var(--shadow);
            transform: translateX(2px);
        }
        .task-card.completed {
            opacity: 0.6;
        }
        .task-card.completed:hover { opacity: 0.8; }

        .task-check-form { display: flex; }
        .task-check {
            width: 22px; height: 22px;
            border-radius: 50%;
            border: 1.5px solid var(--border);
            background: transparent;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            flex-shrink: 0;
            padding: 0;
        }
        .task-check:hover { border-color: var(--accent); background: var(--accent-light); }
        .task-check.checked { background: var(--accent); border-color: var(--accent); }
        .task-check svg { width: 11px; height: 11px; stroke: #fff; fill: none; stroke-width: 2.5; display: none; }
        .task-check.checked svg { display: block; }

        .task-body { flex: 1; min-width: 0; }
        .task-name {
            font-size: 14px;
            font-weight: 500;
            color: var(--text);
            margin-bottom: 4px;
            transition: all 0.2s;
        }
        .task-name.done { text-decoration: line-through; color: var(--text-subtle); }
        .task-desc {
            font-size: 12px;
            color: var(--text-muted);
            font-weight: 300;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .task-meta {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-shrink: 0;
        }

        .priority-badge {
            font-size: 10px;
            padding: 3px 10px;
            border-radius: 20px;
            font-weight: 500;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        .priority-high { background: rgba(183,110,121,0.12); color: #b76e79; }
        .priority-medium { background: rgba(201,168,76,0.12); color: #b8952a; }
        .priority-low { background: rgba(45,125,111,0.12); color: #2D7D6F; }

        .category-badge {
            font-size: 10px;
            padding: 3px 10px;
            border-radius: 20px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .cat-work { background: rgba(74,111,165,0.1); color: #4A6FA5; }
        .cat-personal { background: rgba(183,110,121,0.1); color: #b76e79; }
        .cat-project { background: rgba(45,125,111,0.1); color: #2D7D6F; }
        .cat-general { background: rgba(150,150,150,0.1); color: #888; }

        .task-date {
            font-size: 11px;
            color: var(--text-subtle);
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .task-date svg { width: 11px; height: 11px; stroke: currentColor; fill: none; stroke-width: 1.5; }

        .task-delete {
            width: 28px; height: 28px;
            border-radius: 6px;
            border: none;
            background: transparent;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-subtle);
            transition: all 0.2s ease;
            opacity: 0;
        }
        .task-card:hover .task-delete { opacity: 1; }
        .task-delete:hover { background: rgba(220,53,69,0.08); color: #dc3545; }
        .task-delete svg { width: 14px; height: 14px; stroke: currentColor; fill: none; stroke-width: 2; }

        /* EMPTY STATE */
        .empty-state {
            text-align: center;
            padding: 64px 32px;
            background: var(--bg-card);
            border: 1px dashed var(--border);
            border-radius: 12px;
        }
        .empty-icon {
            width: 64px; height: 64px;
            border-radius: 50%;
            background: var(--accent-light);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        .empty-icon svg { width: 28px; height: 28px; stroke: var(--accent); fill: none; stroke-width: 1.5; }
        .empty-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px;
            font-weight: 300;
            color: var(--text);
            margin-bottom: 8px;
        }
        .empty-sub { font-size: 14px; color: var(--text-muted); font-weight: 300; }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            nav { padding: 0 20px; }
            .nav-tabs { display: none; }
            .theme-dots { display: none; }
            main { padding-left: 16px; padding-right: 16px; }
            .stats-grid { grid-template-columns: repeat(3,1fr); gap: 10px; }
            .stat-card { padding: 14px; gap: 10px; }
            .stat-icon { width: 36px; height: 36px; display: none; }
            .add-form-grid { grid-template-columns: 1fr; }
            .add-form-bottom { grid-template-columns: 1fr 1fr; }
            .btn-add { grid-column: span 2; }
            .task-meta { display: none; }
            .page-header { flex-direction: column; align-items: flex-start; gap: 4px; }
        }
        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .filter-tabs { overflow-x: auto; }
        }
    </style>
</head>
<body>

<!-- NAV -->
<nav>
    <div class="nav-left">
        <a href="/" class="nav-brand">Task<span>flow</span></a>
        <div class="nav-tabs">
            <a href="#" class="nav-tab active">Dashboard</a>
            <a href="#" class="nav-tab">Calendar</a>
        </div>
    </div>
    <div class="nav-right">
        <div class="theme-dots">
            <div class="theme-dot" data-color="pink" title="Rose Pink"></div>
            <div class="theme-dot" data-color="slate" title="Slate Blue"></div>
            <div class="theme-dot" data-color="teal" title="Deep Teal"></div>
            <div class="theme-dot" data-color="gold" title="Warm Gold"></div>
            <div class="theme-dot" data-color="navy" title="Midnight Navy"></div>
        </div>
        <button class="icon-btn" id="darkToggle" title="Toggle dark mode">
            <svg id="moonIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
            <svg id="sunIcon" style="display:none" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
        </button>
        <div class="user-menu">
            <div class="user-avatar" id="userAvatarBtn">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </div>
            <div class="dropdown" id="userDropdown">
                <div class="dropdown-header">
                    <div class="dropdown-name">{{ auth()->user()->name }}</div>
                    <div class="dropdown-email">{{ auth()->user()->email }}</div>
                </div>
                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    Profile settings
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item danger">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                        Sign out
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<main>
    <!-- PAGE HEADER -->
    <div class="page-header">
        <div>
            <div class="page-greeting">Good {{ now()->format('H') < 12 ? 'morning' : (now()->format('H') < 17 ? 'afternoon' : 'evening') }}, {{ explode(' ', auth()->user()->name)[0] }}</div>
            <h1 class="page-title">My Tasks</h1>
        </div>
        <div class="page-date">
            {{ now()->format('l') }}<br>
            <span style="color:var(--text-muted)">{{ now()->format('d F Y') }}</span>
        </div>
    </div>

    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
        <div class="alert-success">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;flex-shrink:0"><polyline points="20 6 9 17 4 12"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <!-- STATS -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <svg viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>
            </div>
            <div>
                <div class="stat-num">{{ $tasks->count() }}</div>
                <div class="stat-label">Total Tasks</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
            </div>
            <div>
                <div class="stat-num" style="color:var(--accent)">{{ $tasks->where('is_completed', true)->count() }}</div>
                <div class="stat-label">Completed</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
            <div>
                <div class="stat-num" style="color:var(--text-muted)">{{ $tasks->where('is_completed', false)->count() }}</div>
                <div class="stat-label">Pending</div>
            </div>
        </div>
    </div>

    <!-- ADD TASK -->
    <div class="add-task-card">
        <div class="add-task-header">
            <div class="add-icon">
                <svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            </div>
            <div class="add-task-title">Add new task</div>
        </div>
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <div class="add-form-grid">
                <input type="text" name="title" class="form-input" placeholder="Task name..." value="{{ old('title') }}" required>
                <textarea name="description" class="form-input" placeholder="Description (optional)..." rows="1" style="resize:none">{{ old('description') }}</textarea>
            </div>
            <div class="add-form-bottom">
                <select name="priority" class="form-input form-select">
                    <option value="low">Low Priority</option>
                    <option value="medium" selected>Medium Priority</option>
                    <option value="high">High Priority</option>
                </select>
                <select name="category_id" class="form-input form-select" id="categorySelect">
                    <option value="">No category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" style="color:{{ $cat->color }}">
                            {{ $cat->name }}
                        </option>
                    @endforeach
                    <option value="__new__">+ New category...</option>
                </select>
                <input type="date" name="due_date" class="form-input" value="{{ old('due_date') }}">
                <button type="submit" class="btn-add">+ Add Task</button>
            </div>
        </form>
    </div>

    <!-- FILTER BAR -->
    <div class="filter-bar">
        <div class="filter-tabs" id="filterTabs">
            <button class="filter-tab active" data-filter="all">All</button>
            @foreach($categories as $cat)
                <button class="filter-tab" data-filter="{{ $cat->id }}" style="--cat-color:{{ $cat->color }}">
                    {{ $cat->name }}
                </button>
            @endforeach
            <button class="filter-tab" data-filter="none">Uncategorised</button>
        </div>
        <select class="sort-select" id="sortSelect">
            <option value="newest">Newest first</option>
            <option value="oldest">Oldest first</option>
            <option value="priority">By priority</option>
            <option value="due">By due date</option>
        </select>
    </div>

    <!-- TASK LIST -->
    <div class="task-list" id="taskList">
        @forelse($tasks as $task)
        <div class="task-card {{ $task->is_completed ? 'completed' : '' }}"
             data-category-id="{{ $task->category_id ?? '' }}"
             data-priority="{{ $task->priority }}"
             data-created="{{ $task->created_at->timestamp }}"
             data-due="{{ $task->due_date ? $task->due_date->timestamp : 9999999999 }}">

            <form method="POST" action="{{ route('tasks.toggle', $task) }}" class="task-check-form">
                @csrf @method('PATCH')
                <button type="submit" class="task-check {{ $task->is_completed ? 'checked' : '' }}">
                    <svg viewBox="0 0 12 12"><polyline points="2,6 5,9 10,3"/></svg>
                </button>
            </form>

            <div class="task-body">
                <div class="task-name {{ $task->is_completed ? 'done' : '' }}">{{ $task->title }}</div>
                @if($task->description)
                    <div class="task-desc">{{ $task->description }}</div>
                @endif
            </div>

            <div class="task-meta">
                @if($task->category)
                    <span class="category-badge" style="background:{{ $task->category->color }}20;color:{{ $task->category->color }}">
                        {{ $task->category->name }}
                    </span>
                @else
                    <span class="category-badge cat-general">General</span>
                @endif

                @if($task->priority === 'high')
                    <span class="priority-badge priority-high">High</span>
                @elseif($task->priority === 'medium')
                    <span class="priority-badge priority-medium">Medium</span>
                @else
                    <span class="priority-badge priority-low">Low</span>
                @endif

                @if($task->due_date)
                    <span class="task-date">
                        <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        {{ $task->due_date->format('d M') }}
                    </span>
                @endif
            </div>

            <form method="POST" action="{{ route('tasks.destroy', $task) }}" onsubmit="return confirm('Delete this task?')">
                @csrf @method('DELETE')
                <button type="submit" class="task-delete">
                    <svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4h6v2"/></svg>
                </button>
            </form>
        </div>
        @empty
        <div class="empty-state">
            <div class="empty-icon">
                <svg viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>
            </div>
            <div class="empty-title">No tasks yet</div>
            <div class="empty-sub">Add your first task above to get started.</div>
        </div>
        @endforelse
    </div>

    <!-- NEW CATEGORY MODAL -->
    <div id="categoryModal" style="display:none;position:fixed;inset:0;z-index:500;background:rgba(0,0,0,0.4);backdrop-filter:blur(4px);align-items:center;justify-content:center;">
        <div style="background:var(--bg-card);border:1px solid var(--border);border-radius:16px;padding:32px;width:100%;max-width:400px;margin:20px;box-shadow:0 24px 64px rgba(0,0,0,0.2);">
            <h3 style="font-family:'Cormorant Garamond',serif;font-size:24px;font-weight:300;color:var(--text);margin-bottom:8px;">New Category</h3>
            <p style="font-size:13px;color:var(--text-muted);margin-bottom:24px;font-weight:300;">Create a custom category for your tasks.</p>

            <div style="margin-bottom:16px;">
                <label style="display:block;font-size:11px;letter-spacing:2px;text-transform:uppercase;color:var(--text-muted);margin-bottom:8px;font-weight:500;">Category name</label>
                <input type="text" id="newCatName" class="form-input" placeholder="e.g. eproc, iiis, taskmanager...">
            </div>

            <div style="margin-bottom:24px;">
                <label style="display:block;font-size:11px;letter-spacing:2px;text-transform:uppercase;color:var(--text-muted);margin-bottom:12px;font-weight:500;">Colour</label>
                <div style="display:flex;gap:10px;flex-wrap:wrap;" id="colorPicker">
                    <div class="color-opt active" data-color="#b76e79" style="width:28px;height:28px;border-radius:50%;background:#b76e79;cursor:pointer;border:3px solid transparent;transition:all 0.2s;"></div>
                    <div class="color-opt" data-color="#4A6FA5" style="width:28px;height:28px;border-radius:50%;background:#4A6FA5;cursor:pointer;border:3px solid transparent;transition:all 0.2s;"></div>
                    <div class="color-opt" data-color="#2D7D6F" style="width:28px;height:28px;border-radius:50%;background:#2D7D6F;cursor:pointer;border:3px solid transparent;transition:all 0.2s;"></div>
                    <div class="color-opt" data-color="#C9A84C" style="width:28px;height:28px;border-radius:50%;background:#C9A84C;cursor:pointer;border:3px solid transparent;transition:all 0.2s;"></div>
                    <div class="color-opt" data-color="#1B2A4A" style="width:28px;height:28px;border-radius:50%;background:#1B2A4A;cursor:pointer;border:3px solid transparent;transition:all 0.2s;"></div>
                    <div class="color-opt" data-color="#7B68EE" style="width:28px;height:28px;border-radius:50%;background:#7B68EE;cursor:pointer;border:3px solid transparent;transition:all 0.2s;"></div>
                    <div class="color-opt" data-color="#E07B54" style="width:28px;height:28px;border-radius:50%;background:#E07B54;cursor:pointer;border:3px solid transparent;transition:all 0.2s;"></div>
                    <div class="color-opt" data-color="#5C8A3C" style="width:28px;height:28px;border-radius:50%;background:#5C8A3C;cursor:pointer;border:3px solid transparent;transition:all 0.2s;"></div>
                </div>
            </div>

            <div style="display:flex;gap:12px;">
                <button id="saveCatBtn" style="flex:1;padding:12px;background:var(--accent);color:#fff;border:none;border-radius:8px;font-family:'Jost',sans-serif;font-size:12px;letter-spacing:2px;text-transform:uppercase;font-weight:500;cursor:pointer;transition:all 0.3s;">
                    Create category
                </button>
                <button id="cancelCatBtn" style="padding:12px 20px;background:transparent;color:var(--text-muted);border:1px solid var(--border);border-radius:8px;font-family:'Jost',sans-serif;font-size:12px;cursor:pointer;transition:all 0.3s;">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</main>

<script>
    const html = document.documentElement;
    const savedTheme = localStorage.getItem('theme') || 'light';
    const savedAccent = localStorage.getItem('accent') || 'pink';
    html.setAttribute('data-theme', savedTheme);
    html.setAttribute('data-accent', savedAccent);
    updateDarkIcons(savedTheme);
    updateAccentDots(savedAccent);

    // Dark mode
    document.getElementById('darkToggle').addEventListener('click', () => {
        const next = html.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
        html.setAttribute('data-theme', next);
        localStorage.setItem('theme', next);
        updateDarkIcons(next);
    });
    function updateDarkIcons(t) {
        document.getElementById('moonIcon').style.display = t === 'dark' ? 'none' : 'block';
        document.getElementById('sunIcon').style.display = t === 'dark' ? 'block' : 'none';
    }

    // Theme accent
    document.querySelectorAll('.theme-dot').forEach(dot => {
        dot.addEventListener('click', () => {
            const color = dot.dataset.color;
            html.setAttribute('data-accent', color);
            localStorage.setItem('accent', color);
            updateAccentDots(color);
        });
    });
    function updateAccentDots(active) {
        document.querySelectorAll('.theme-dot').forEach(d => d.classList.toggle('active', d.dataset.color === active));
    }

    // User dropdown
    const avatarBtn = document.getElementById('userAvatarBtn');
    const dropdown = document.getElementById('userDropdown');
    avatarBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        dropdown.classList.toggle('open');
    });
    document.addEventListener('click', () => dropdown.classList.remove('open'));

    // Filter tabs
    let activeFilter = 'all';
    document.querySelectorAll('.filter-tab').forEach(tab => {
        tab.addEventListener('click', () => {
            activeFilter = tab.dataset.filter;
            document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            filterAndSort();
        });
    });

    // Sort
    document.getElementById('sortSelect').addEventListener('change', filterAndSort);

    function filterAndSort() {
        const tasks = Array.from(document.querySelectorAll('.task-card'));
        const sortVal = document.getElementById('sortSelect').value;
        const priorityOrder = { high: 0, medium: 1, low: 2 };

        // Filter
        tasks.forEach(t => {
            const catId = t.dataset.categoryId;
            let show = false;
            if (activeFilter === 'all') show = true;
            else if (activeFilter === 'none') show = !catId || catId === '';
            else show = catId === activeFilter;
            t.style.display = show ? 'flex' : 'none';
        });

        // Sort visible tasks
        const visible = tasks.filter(t => t.style.display !== 'none');
        const parent = document.getElementById('taskList');

        visible.sort((a, b) => {
            if (sortVal === 'newest') return b.dataset.created - a.dataset.created;
            if (sortVal === 'oldest') return a.dataset.created - b.dataset.created;
            if (sortVal === 'priority') return priorityOrder[a.dataset.priority] - priorityOrder[b.dataset.priority];
            if (sortVal === 'due') return a.dataset.due - b.dataset.due;
        });

        visible.forEach(t => parent.appendChild(t));

        // Show empty state if no visible
        const emptyState = document.querySelector('.empty-state');
        if (emptyState) emptyState.style.display = visible.length === 0 ? 'block' : 'none';
    }

    // Auto-dismiss success message
    const alert = document.querySelector('.alert-success');
    if (alert) setTimeout(() => { alert.style.opacity = '0'; alert.style.transform = 'translateY(-8px)'; alert.style.transition = 'all 0.3s'; setTimeout(() => alert.remove(), 300); }, 3000);

    // Category modal
    const categorySelect = document.getElementById('categorySelect');
    const modal = document.getElementById('categoryModal');
    let selectedColor = '#b76e79';
    let prevSelected = '';

    categorySelect.addEventListener('change', function() {
        if (this.value === '__new__') {
            modal.style.display = 'flex';
            this.value = prevSelected;
        } else {
            prevSelected = this.value;
        }
    });

    document.getElementById('cancelCatBtn').addEventListener('click', () => {
        modal.style.display = 'none';
        document.getElementById('newCatName').value = '';
    });

    modal.addEventListener('click', (e) => {
        if (e.target === modal) modal.style.display = 'none';
    });

    // Color picker
    document.querySelectorAll('.color-opt').forEach(opt => {
        opt.addEventListener('click', () => {
            document.querySelectorAll('.color-opt').forEach(o => o.style.border = '3px solid transparent');
            opt.style.border = '3px solid var(--text)';
            selectedColor = opt.dataset.color;
        });
    });
    // Set default active
    document.querySelector('.color-opt').style.border = '3px solid var(--text)';

    // Save new category
    document.getElementById('saveCatBtn').addEventListener('click', async () => {
        const name = document.getElementById('newCatName').value.trim();
        if (!name) {
            document.getElementById('newCatName').style.borderColor = '#dc3545';
            return;
        }

        const btn = document.getElementById('saveCatBtn');
        btn.textContent = 'Creating...';
        btn.disabled = true;

        try {
            const response = await fetch('{{ route("categories.store") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ name, color: selectedColor }),
            });

            const cat = await response.json();

            // Add to dropdown
            const option = new Option(cat.name, cat.id);
            option.style.color = cat.color;
            categorySelect.insertBefore(option, categorySelect.querySelector('option[value="__new__"]'));
            categorySelect.value = cat.id;

            // Close modal
            modal.style.display = 'none';
            document.getElementById('newCatName').value = '';
            btn.textContent = 'Create category';
            btn.disabled = false;

        } catch (err) {
            btn.textContent = 'Create category';
            btn.disabled = false;
            alert('Something went wrong. Please try again.');
        }
    });
</script>
</body>
</html>