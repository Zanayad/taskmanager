<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskflow — Organise with Intention</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --rose: #b76e79;
            --rose-dark: #9a5a64;
            --gold: #c9a84c;
            --gold-light: #e8d5a3;
            --blush: #f7e8e8;
            --cream: #fdf6f0;
            --dark: #2c1a1a;
            --muted: #8c6b6b;
            --bg: #ffffff;
            --bg-secondary: #fdf6f0;
            --text: #2c1a1a;
            --text-muted: #8c6b6b;
            --border: #f0e0e0;
            --card-bg: #ffffff;
            --nav-bg: rgba(255,255,255,0.95);
            --shadow: rgba(183,110,121,0.08);
        }
        [data-theme="dark"] {
            --bg: #1a1010;
            --bg-secondary: #221515;
            --text: #f5ece8;
            --text-muted: #c4a0a0;
            --border: #3d2525;
            --card-bg: #2a1818;
            --nav-bg: rgba(26,16,16,0.95);
            --blush: #3d2020;
            --cream: #221515;
            --shadow: rgba(0,0,0,0.3);
        }

        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Jost', sans-serif;
            background: var(--bg);
            color: var(--text);
            overflow-x: hidden;
            transition: background 0.4s ease, color 0.4s ease;
        }

        /* NAV */
        nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1000;
            background: var(--nav-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            padding: 18px 48px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.4s ease;
        }
        nav.scrolled {
            padding: 14px 48px;
            box-shadow: 0 4px 32px var(--shadow);
        }
        .nav-brand {
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px;
            font-weight: 400;
            color: var(--text);
            letter-spacing: 1px;
            text-decoration: none;
        }
        .nav-brand span { color: var(--rose); }
        .nav-links {
            display: flex;
            gap: 36px;
            align-items: center;
        }
        .nav-links a {
            font-size: 11px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--text-muted);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
            position: relative;
        }
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -3px; left: 0; right: 0;
            height: 1px;
            background: var(--rose);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        .nav-links a:hover { color: var(--rose); }
        .nav-links a:hover::after { transform: scaleX(1); }

        .nav-right { display: flex; gap: 12px; align-items: center; }

        .dark-toggle {
            width: 40px; height: 40px;
            border-radius: 50%;
            border: 1px solid var(--border);
            background: var(--card-bg);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            color: var(--text-muted);
        }
        .dark-toggle:hover {
            border-color: var(--gold);
            color: var(--gold);
            transform: rotate(20deg);
        }
        .dark-toggle svg { width: 16px; height: 16px; }

        .nav-btn {
            background: var(--rose);
            color: #fff;
            padding: 10px 26px;
            border-radius: 2px;
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        .nav-btn:hover {
            background: var(--dark);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(183,110,121,0.3);
        }
        [data-theme="dark"] .nav-btn:hover { background: var(--gold); }

        /* HERO */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 120px 40px 80px;
            background: var(--bg-secondary);
            position: relative;
            overflow: hidden;
        }
        .hero-orb {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            transition: opacity 0.4s;
        }
        .hero-orb-1 {
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(183,110,121,0.12) 0%, transparent 70%);
            top: -100px; right: -100px;
            animation: float 8s ease-in-out infinite;
        }
        .hero-orb-2 {
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(201,168,76,0.1) 0%, transparent 70%);
            bottom: -80px; left: -80px;
            animation: float 10s ease-in-out infinite reverse;
        }
        .hero-orb-3 {
            width: 200px; height: 200px;
            background: radial-gradient(circle, rgba(183,110,121,0.08) 0%, transparent 70%);
            top: 40%; left: 20%;
            animation: float 6s ease-in-out infinite 2s;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-20px) scale(1.05); }
        }
        .hero-content {
            position: relative;
            z-index: 2;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeUp 1s ease forwards 0.3s;
        }
        @keyframes fadeUp {
            to { opacity: 1; transform: translateY(0); }
        }
        .hero-eyebrow {
            font-size: 11px;
            letter-spacing: 5px;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 28px;
            font-weight: 500;
            opacity: 0;
            animation: fadeUp 1s ease forwards 0.5s;
        }
        .hero h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(48px, 7vw, 80px);
            font-weight: 300;
            line-height: 1.1;
            color: var(--text);
            margin-bottom: 24px;
            opacity: 0;
            animation: fadeUp 1s ease forwards 0.7s;
        }
        .hero h1 em {
            font-style: italic;
            color: var(--rose);
        }
        .hero-sub {
            font-size: 16px;
            color: var(--text-muted);
            max-width: 480px;
            margin: 0 auto 48px;
            line-height: 1.9;
            font-weight: 300;
            opacity: 0;
            animation: fadeUp 1s ease forwards 0.9s;
        }
        .hero-btns {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
            opacity: 0;
            animation: fadeUp 1s ease forwards 1.1s;
        }
        .btn-primary {
            background: var(--rose);
            color: #fff;
            padding: 16px 40px;
            border-radius: 2px;
            font-size: 12px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            position: relative;
            overflow: hidden;
        }
        .btn-primary::after {
            content: '';
            position: absolute;
            top: 50%; left: 50%;
            width: 0; height: 0;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        .btn-primary:hover::after { width: 300px; height: 300px; }
        .btn-primary:hover {
            background: var(--dark);
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(183,110,121,0.35);
        }
        .btn-outline {
            border: 1px solid var(--gold);
            color: var(--gold);
            padding: 15px 40px;
            border-radius: 2px;
            font-size: 12px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            font-weight: 500;
            background: transparent;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        .btn-outline:hover {
            background: var(--gold);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(201,168,76,0.25);
        }

        /* SCROLL INDICATOR */
        .scroll-hint {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            opacity: 0;
            animation: fadeUp 1s ease forwards 1.5s;
        }
        .scroll-hint span {
            font-size: 10px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--text-muted);
        }
        .scroll-line {
            width: 1px;
            height: 40px;
            background: linear-gradient(to bottom, var(--rose), transparent);
            animation: scrollPulse 2s ease-in-out infinite;
        }
        @keyframes scrollPulse {
            0%, 100% { opacity: 0.3; transform: scaleY(1); }
            50% { opacity: 1; transform: scaleY(1.2); }
        }

        /* SECTION SHARED */
        .section-wrap {
            padding: 100px 48px;
            max-width: 1000px;
            margin: 0 auto;
        }
        .section-header { text-align: center; margin-bottom: 64px; }
        .eyebrow {
            font-size: 11px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 16px;
            font-weight: 500;
        }
        .divider {
            width: 48px;
            height: 1px;
            background: linear-gradient(90deg, var(--rose), var(--gold));
            margin: 0 auto 20px;
        }
        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(32px, 4vw, 44px);
            font-weight: 300;
            color: var(--text);
            margin-bottom: 12px;
        }
        .section-sub {
            font-size: 15px;
            color: var(--text-muted);
            font-weight: 300;
            line-height: 1.8;
        }

        /* FEATURES */
        .features-bg { background: var(--bg); }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }
        .feature-card {
            padding: 36px 28px;
            border: 1px solid var(--border);
            border-radius: 2px;
            background: var(--card-bg);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            cursor: default;
        }
        .feature-card::before {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--rose), var(--gold));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }
        .feature-card::after {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(circle at 50% 50%, rgba(183,110,121,0.04) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        .feature-card:hover {
            transform: translateY(-8px);
            border-color: rgba(201,168,76,0.3);
            box-shadow: 0 20px 48px var(--shadow);
        }
        .feature-card:hover::before { transform: scaleX(1); }
        .feature-card:hover::after { opacity: 1; }
        .feature-icon {
            width: 48px; height: 48px;
            border-radius: 50%;
            background: var(--blush);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        .feature-card:hover .feature-icon {
            background: var(--rose);
            transform: scale(1.1) rotate(-5deg);
        }
        .feature-icon svg {
            width: 20px; height: 20px;
            stroke: var(--rose);
            fill: none;
            stroke-width: 1.5;
            transition: stroke 0.3s;
        }
        .feature-card:hover .feature-icon svg { stroke: #fff; }
        .feature-card h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 400;
            color: var(--text);
            margin-bottom: 12px;
        }
        .feature-card p {
            font-size: 14px;
            color: var(--text-muted);
            line-height: 1.8;
            font-weight: 300;
        }

        /* HOW IT WORKS */
        .how-bg { background: var(--bg-secondary); }
        .steps {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0;
            position: relative;
        }
        .steps::before {
            content: '';
            position: absolute;
            top: 40px;
            left: calc(16.66% + 24px);
            right: calc(16.66% + 24px);
            height: 1px;
            background: linear-gradient(90deg, var(--rose), var(--gold), var(--rose));
            opacity: 0.4;
        }
        .step {
            text-align: center;
            padding: 0 32px;
            position: relative;
        }
        .step-num {
            width: 56px; height: 56px;
            border-radius: 50%;
            border: 1px solid var(--gold);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 28px;
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px;
            color: var(--gold);
            font-weight: 300;
            background: var(--bg-secondary);
            position: relative;
            z-index: 1;
            transition: all 0.3s ease;
        }
        .step:hover .step-num {
            background: var(--gold);
            color: #fff;
            transform: scale(1.1);
            box-shadow: 0 8px 24px rgba(201,168,76,0.3);
        }
        .step h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 400;
            color: var(--text);
            margin-bottom: 12px;
        }
        .step p {
            font-size: 14px;
            color: var(--text-muted);
            line-height: 1.8;
            font-weight: 300;
        }

        /* APP PREVIEW */
        .preview-bg { background: var(--bg); }
        .app-frame {
            background: var(--bg-secondary);
            border: 1px solid var(--border);
            border-radius: 8px;
            overflow: hidden;
            margin-top: 56px;
            box-shadow: 0 32px 80px var(--shadow);
            transform: perspective(1200px) rotateX(2deg);
            transition: transform 0.5s ease;
        }
        .app-frame:hover { transform: perspective(1200px) rotateX(0deg); }
        .app-titlebar {
            background: var(--card-bg);
            border-bottom: 1px solid var(--border);
            padding: 14px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .titlebar-dot { width: 11px; height: 11px; border-radius: 50%; }
        .titlebar-url {
            flex: 1;
            background: var(--bg-secondary);
            border: 1px solid var(--border);
            border-radius: 4px;
            padding: 5px 14px;
            font-size: 11px;
            color: var(--text-muted);
            text-align: center;
            font-family: monospace;
        }
        .app-body { padding: 28px; }
        .app-header-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }
        .app-title-text {
            font-family: 'Cormorant Garamond', serif;
            font-size: 28px;
            font-weight: 300;
            color: var(--text);
        }
        .stats-row { display: grid; grid-template-columns: repeat(3,1fr); gap: 14px; margin-bottom: 24px; }
        .stat-box {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 4px;
            padding: 18px;
            text-align: center;
            transition: all 0.3s ease;
        }
        .stat-box:hover { transform: translateY(-3px); box-shadow: 0 8px 24px var(--shadow); }
        .stat-n {
            font-family: 'Cormorant Garamond', serif;
            font-size: 36px;
            font-weight: 300;
        }
        .stat-l {
            font-size: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-top: 4px;
        }
        .task-row {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 4px;
            padding: 14px 18px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 14px;
            transition: all 0.3s ease;
        }
        .task-row:hover { transform: translateX(4px); border-color: rgba(183,110,121,0.3); }
        .task-circle {
            width: 20px; height: 20px;
            border-radius: 50%;
            border: 1.5px solid var(--rose);
            flex-shrink: 0;
            transition: all 0.3s;
        }
        .task-circle.done { background: var(--rose); border-color: var(--rose); }
        .task-label { flex: 1; font-size: 14px; color: var(--text); }
        .task-label.done { text-decoration: line-through; color: var(--text-muted); }
        .badge {
            font-size: 10px;
            padding: 3px 10px;
            border-radius: 2px;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-weight: 500;
        }
        .badge-high { background: rgba(183,110,121,0.12); color: var(--rose); }
        .badge-med { background: rgba(201,168,76,0.12); color: var(--gold); }

        /* CTA */
        .cta-section {
            background: var(--dark);
            padding: 120px 48px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        [data-theme="dark"] .cta-section { background: #110a0a; }
        .cta-section::before {
            content: '';
            position: absolute;
            top: -150px; left: 50%;
            transform: translateX(-50%);
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(183,110,121,0.15) 0%, transparent 60%);
            pointer-events: none;
        }
        .cta-section .eyebrow { color: var(--gold-light); }
        .cta-section .divider { margin-bottom: 28px; }
        .cta-section h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(36px, 5vw, 56px);
            font-weight: 300;
            color: #fff;
            margin-bottom: 20px;
            line-height: 1.2;
        }
        .cta-section h2 em { font-style: italic; color: var(--rose); }
        .cta-section p {
            font-size: 15px;
            color: rgba(255,255,255,0.5);
            margin-bottom: 48px;
            font-weight: 300;
        }
        .btn-gold {
            background: linear-gradient(135deg, var(--gold), #e8c86a);
            color: var(--dark);
            padding: 18px 48px;
            border-radius: 2px;
            font-size: 12px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            position: relative;
            overflow: hidden;
        }
        .btn-gold:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 40px rgba(201,168,76,0.4);
        }

        /* FOOTER */
        footer {
            background: #1a1010;
            padding: 40px 48px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid rgba(255,255,255,0.05);
        }
        [data-theme="dark"] footer { background: #0d0808; }
        .footer-brand {
            font-family: 'Cormorant Garamond', serif;
            font-size: 18px;
            color: rgba(255,255,255,0.5);
        }
        .footer-brand span { color: var(--rose); }
        .footer-meta {
            text-align: right;
        }
        .footer-version {
            font-size: 11px;
            color: rgba(255,255,255,0.25);
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 4px;
        }
        .footer-copy {
            font-size: 11px;
            color: rgba(255,255,255,0.2);
            letter-spacing: 1px;
        }

        /* SCROLL REVEAL */
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }
        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .reveal-delay-1 { transition-delay: 0.1s; }
        .reveal-delay-2 { transition-delay: 0.2s; }
        .reveal-delay-3 { transition-delay: 0.3s; }

        /* CURSOR GLOW */
        .cursor-glow {
            position: fixed;
            width: 300px; height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(183,110,121,0.06) 0%, transparent 70%);
            pointer-events: none;
            z-index: 9999;
            transform: translate(-50%, -50%);
            transition: left 0.3s ease, top 0.3s ease;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            nav { padding: 16px 20px; }
            nav.scrolled { padding: 12px 20px; }
            .nav-links { display: none; }
            .nav-right { gap: 8px; }
            .nav-btn { padding: 8px 18px; font-size: 10px; }

            .hero { padding: 100px 24px 80px; }
            .hero h1 { font-size: 40px; }
            .hero-sub { font-size: 14px; }
            .hero-btns { flex-direction: column; align-items: center; }
            .btn-primary, .btn-outline { width: 100%; max-width: 280px; text-align: center; }

            .section-wrap { padding: 64px 24px; }
            .section-title { font-size: 30px; }

            .features-grid { grid-template-columns: 1fr; gap: 20px; }
            .feature-card { padding: 28px 20px; }

            .steps { grid-template-columns: 1fr; gap: 40px; }
            .steps::before { display: none; }
            .step { padding: 0 16px; }

            .stats-row { grid-template-columns: repeat(3,1fr); gap: 10px; }
            .stat-n { font-size: 28px; }
            .app-body { padding: 20px; }

            .cta-section { padding: 80px 24px; }
            .cta-section h2 { font-size: 32px; }
            .btn-gold { padding: 16px 32px; }

            footer { flex-direction: column; gap: 16px; text-align: center; padding: 32px 24px; }
            .footer-meta { text-align: center; }
        }

        @media (max-width: 480px) {
            .hero h1 { font-size: 32px; }
            .stats-row { grid-template-columns: 1fr; }
            .app-frame { border-radius: 4px; }
            .titlebar-url { font-size: 10px; }
        }
    </style>
</head>
<body>

<div class="cursor-glow" id="cursorGlow"></div>

<!-- NAV -->
<nav id="mainNav">
    <a href="/" class="nav-brand">Task<span>flow</span></a>
    <div class="nav-links">
        <a href="#features">Features</a>
        <a href="#how">How it works</a>
        <a href="#preview">Preview</a>
    </div>
    <div class="nav-right">
        <button class="dark-toggle" id="darkToggle" title="Toggle dark mode">
            <svg id="sunIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
            </svg>
            <svg id="moonIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="display:none">
                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
            </svg>
        </button>
        <a href="{{ route('register') }}" class="nav-btn">Get started</a>
    </div>
</nav>

<!-- HERO -->
<section class="hero" id="home">
    <div class="hero-orb hero-orb-1"></div>
    <div class="hero-orb hero-orb-2"></div>
    <div class="hero-orb hero-orb-3"></div>
    <div class="hero-content">
        <div class="hero-eyebrow">Your elegant productivity companion</div>
        <h1>Organise your day<br>with <em>intention</em></h1>
        <p class="hero-sub">A beautifully crafted task manager designed to help you focus on what truly matters — nothing more, nothing less.</p>
        <div class="hero-btns">
            <a href="{{ route('register') }}" class="btn-primary">Start for free</a>
            <a href="#how" class="btn-outline">See how it works</a>
        </div>
    </div>
    <div class="scroll-hint">
        <span>Scroll</span>
        <div class="scroll-line"></div>
    </div>
</section>

<!-- FEATURES -->
<div class="features-bg" id="features">
    <div class="section-wrap">
        <div class="section-header reveal">
            <div class="eyebrow">Why Taskflow</div>
            <div class="divider"></div>
            <h2 class="section-title">Crafted for clarity</h2>
            <p class="section-sub">Every feature designed with purpose. Every interaction considered.</p>
        </div>
        <div class="features-grid">
            <div class="feature-card reveal reveal-delay-1">
                <div class="feature-icon">
                    <svg viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>
                </div>
                <h3>Smart priorities</h3>
                <p>Assign high, medium or low priority to each task so you always know what demands your attention first.</p>
            </div>
            <div class="feature-card reveal reveal-delay-2">
                <div class="feature-icon">
                    <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                </div>
                <h3>Due dates</h3>
                <p>Never miss a deadline again. Set due dates and always have a clear picture of what is coming up next.</p>
            </div>
            <div class="feature-card reveal reveal-delay-3">
                <div class="feature-icon">
                    <svg viewBox="0 0 24 24"><path d="M18 20V10"/><path d="M12 20V4"/><path d="M6 20v-6"/></svg>
                </div>
                <h3>Progress at a glance</h3>
                <p>Your dashboard shows total, completed and pending tasks — a calm overview of how your day is going.</p>
            </div>
        </div>
    </div>
</div>

<!-- HOW IT WORKS -->
<div class="how-bg" id="how">
    <div class="section-wrap">
        <div class="section-header reveal">
            <div class="eyebrow">Getting started</div>
            <div class="divider"></div>
            <h2 class="section-title">Simple by design</h2>
            <p class="section-sub">Up and running in under a minute.</p>
        </div>
        <div class="steps">
            <div class="step reveal reveal-delay-1">
                <div class="step-num">01</div>
                <h3>Create your account</h3>
                <p>Register with your email. No credit card, no commitment — just you and your tasks.</p>
            </div>
            <div class="step reveal reveal-delay-2">
                <div class="step-num">02</div>
                <h3>Add your first task</h3>
                <p>Give it a name, a priority, and a due date. Takes less than ten seconds.</p>
            </div>
            <div class="step reveal reveal-delay-3">
                <div class="step-num">03</div>
                <h3>Stay in flow</h3>
                <p>Check off tasks as you go and watch your productivity grow day by day.</p>
            </div>
        </div>
    </div>
</div>

<!-- PREVIEW -->
<div class="preview-bg" id="preview">
    <div class="section-wrap">
        <div class="section-header reveal">
            <div class="eyebrow">The app</div>
            <div class="divider"></div>
            <h2 class="section-title">Beautiful and functional</h2>
            <p class="section-sub">Clean, distraction-free, and always yours.</p>
        </div>
        <div class="app-frame reveal">
            <div class="app-titlebar">
                <div class="titlebar-dot" style="background:#f4c0c0"></div>
                <div class="titlebar-dot" style="background:#f4e0a0"></div>
                <div class="titlebar-dot" style="background:#c0e0c0"></div>
                <div class="titlebar-url">taskflow.app/tasks</div>
            </div>
            <div class="app-body">
                <div class="app-header-bar">
                    <div class="app-title-text">My Tasks</div>
                </div>
                <div class="stats-row">
                    <div class="stat-box"><div class="stat-n" style="color:var(--rose)">12</div><div class="stat-l">Total</div></div>
                    <div class="stat-box"><div class="stat-n" style="color:var(--gold)">8</div><div class="stat-l">Completed</div></div>
                    <div class="stat-box"><div class="stat-n" style="color:var(--text-muted)">4</div><div class="stat-l">Pending</div></div>
                </div>
                <div class="task-row"><div class="task-circle done"></div><div class="task-label done">Morning journaling</div><span class="badge badge-med">Medium</span></div>
                <div class="task-row"><div class="task-circle done"></div><div class="task-label done">Review project proposal</div><span class="badge badge-high">High</span></div>
                <div class="task-row"><div class="task-circle"></div><div class="task-label">Prepare presentation slides</div><span class="badge badge-high">High</span></div>
                <div class="task-row"><div class="task-circle"></div><div class="task-label">Call with mentor</div><span class="badge badge-med">Medium</span></div>
            </div>
        </div>
    </div>
</div>

<!-- CTA -->
<section class="cta-section">
    <div style="position:relative;z-index:2">
        <div class="eyebrow reveal">Begin today</div>
        <div class="divider reveal"></div>
        <h2 class="reveal">Ready to take control<br>of your <em>day?</em></h2>
        <p class="reveal">Join and start organising your life with elegance.</p>
        <a href="{{ route('register') }}" class="btn-gold reveal">Create free account</a>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="footer-brand">Task<span>flow</span></div>
    <div class="footer-meta">
        <div class="footer-version">v1.0.0 &nbsp;—&nbsp; {{ date('Y') }}</div>
        <div class="footer-copy">crafted with care &nbsp;&middot;&nbsp; all rights reserved</div>
    </div>
</footer>

<script>
    // Nav scroll effect
    const nav = document.getElementById('mainNav');
    window.addEventListener('scroll', () => {
        nav.classList.toggle('scrolled', window.scrollY > 50);
    });

    // Dark mode toggle
    const toggle = document.getElementById('darkToggle');
    const sunIcon = document.getElementById('sunIcon');
    const moonIcon = document.getElementById('moonIcon');
    const html = document.documentElement;

    const saved = localStorage.getItem('theme') || 'light';
    html.setAttribute('data-theme', saved);
    updateIcons(saved);

    toggle.addEventListener('click', () => {
        const current = html.getAttribute('data-theme');
        const next = current === 'dark' ? 'light' : 'dark';
        html.setAttribute('data-theme', next);
        localStorage.setItem('theme', next);
        updateIcons(next);
    });

    function updateIcons(theme) {
        if (theme === 'dark') {
            sunIcon.style.display = 'block';
            moonIcon.style.display = 'none';
        } else {
            sunIcon.style.display = 'none';
            moonIcon.style.display = 'block';
        }
    }

    // Scroll reveal
    const reveals = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.15 });
    reveals.forEach(el => observer.observe(el));

    // Cursor glow
    const glow = document.getElementById('cursorGlow');
    document.addEventListener('mousemove', e => {
        glow.style.left = e.clientX + 'px';
        glow.style.top = e.clientY + 'px';
    });
</script>
</body>
</html>