<!DOCTYPE html>
<html lang="en" data-theme="light" data-accent="pink">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account — Taskflow</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root, [data-accent="pink"] {
            --accent: #b76e79;
            --accent-hover: #9a5a64;
            --accent-light: rgba(183,110,121,0.08);
            --accent-border: rgba(183,110,121,0.3);
        }
        [data-accent="slate"] {
            --accent: #4A6FA5;
            --accent-hover: #3a5a8a;
            --accent-light: rgba(74,111,165,0.08);
            --accent-border: rgba(74,111,165,0.3);
        }
        [data-accent="teal"] {
            --accent: #2D7D6F;
            --accent-hover: #1f6559;
            --accent-light: rgba(45,125,111,0.08);
            --accent-border: rgba(45,125,111,0.3);
        }
        [data-accent="gold"] {
            --accent: #C9A84C;
            --accent-hover: #b8972e;
            --accent-light: rgba(201,168,76,0.08);
            --accent-border: rgba(201,168,76,0.3);
        }
        [data-accent="navy"] {
            --accent: #1B2A4A;
            --accent-hover: #0f1e38;
            --accent-light: rgba(27,42,74,0.08);
            --accent-border: rgba(27,42,74,0.3);
        }
        [data-theme="light"] {
            --bg: #f8f7f4;
            --bg-card: #ffffff;
            --bg-input: #fafaf8;
            --text: #1a1a1a;
            --text-muted: #6b6b6b;
            --text-subtle: #9a9a9a;
            --border: #e8e4e0;
            --shadow: rgba(0,0,0,0.06);
        }
        [data-theme="dark"] {
            --bg: #111111;
            --bg-card: #1a1a1a;
            --bg-input: #222222;
            --text: #f0ede8;
            --text-muted: #a0a0a0;
            --text-subtle: #666666;
            --border: #2a2a2a;
            --shadow: rgba(0,0,0,0.3);
        }

        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        html { height: 100%; }

        body {
            font-family: 'Jost', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
            transition: background 0.4s ease, color 0.4s ease;
        }

        .left-panel {
            background: var(--accent);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 48px;
            position: relative;
            overflow: hidden;
        }
        .left-panel::before {
            content: '';
            position: absolute;
            top: -100px; right: -100px;
            width: 400px; height: 400px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
            pointer-events: none;
        }
        .left-panel::after {
            content: '';
            position: absolute;
            bottom: -80px; left: -80px;
            width: 300px; height: 300px;
            border-radius: 50%;
            background: rgba(255,255,255,0.04);
            pointer-events: none;
        }
        .panel-brand {
            font-family: 'Cormorant Garamond', serif;
            font-size: 28px;
            font-weight: 400;
            color: rgba(255,255,255,0.9);
            letter-spacing: 1px;
            text-decoration: none;
            position: relative;
            z-index: 1;
        }
        .panel-brand span { color: rgba(255,255,255,0.5); }
        .panel-content { position: relative; z-index: 1; }
        .panel-quote {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(28px, 3vw, 42px);
            font-weight: 300;
            color: #fff;
            line-height: 1.3;
            margin-bottom: 20px;
        }
        .panel-quote em { font-style: italic; opacity: 0.7; }
        .panel-sub {
            font-size: 14px;
            color: rgba(255,255,255,0.5);
            font-weight: 300;
            line-height: 1.7;
        }
        .panel-features {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .panel-feature {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .feature-check {
            width: 20px; height: 20px;
            border-radius: 50%;
            background: rgba(255,255,255,0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .feature-check svg { width: 10px; height: 10px; stroke: #fff; fill: none; stroke-width: 2.5; }
        .panel-feature span {
            font-size: 13px;
            color: rgba(255,255,255,0.7);
            font-weight: 300;
        }

        .right-panel {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 48px 64px;
            position: relative;
            background: var(--bg-card);
            overflow-y: auto;
        }
        .top-bar {
            position: absolute;
            top: 32px; right: 32px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .theme-dots { display: flex; gap: 6px; align-items: center; }
        .theme-dot {
            width: 16px; height: 16px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.2s ease;
        }
        .theme-dot:hover { transform: scale(1.2); }
        .theme-dot.active { border-color: var(--text); transform: scale(1.1); }
        .theme-dot[data-color="pink"] { background: #b76e79; }
        .theme-dot[data-color="slate"] { background: #4A6FA5; }
        .theme-dot[data-color="teal"] { background: #2D7D6F; }
        .theme-dot[data-color="gold"] { background: #C9A84C; }
        .theme-dot[data-color="navy"] { background: #1B2A4A; }

        .dark-toggle {
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
        .dark-toggle:hover { border-color: var(--accent); color: var(--accent); }
        .dark-toggle svg { width: 15px; height: 15px; }

        .form-wrap { max-width: 400px; width: 100%; }
        .form-eyebrow {
            font-size: 11px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 12px;
            font-weight: 500;
        }
        .form-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 38px;
            font-weight: 300;
            color: var(--text);
            margin-bottom: 8px;
            line-height: 1.2;
        }
        .form-sub {
            font-size: 14px;
            color: var(--text-muted);
            margin-bottom: 36px;
            font-weight: 300;
        }
        .form-sub a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
        }
        .form-sub a:hover { opacity: 0.7; }

        .form-row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

        .form-group { margin-bottom: 18px; }
        .form-label {
            display: block;
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 8px;
            font-weight: 500;
        }
        .form-input {
            width: 100%;
            padding: 13px 16px;
            background: var(--bg-input);
            border: 1px solid var(--border);
            border-radius: 4px;
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

        .password-strength {
            margin-top: 8px;
            display: flex;
            gap: 4px;
        }
        .strength-bar {
            height: 3px;
            flex: 1;
            border-radius: 2px;
            background: var(--border);
            transition: background 0.3s ease;
        }
        .strength-text {
            font-size: 11px;
            color: var(--text-subtle);
            margin-top: 4px;
        }

        .terms-wrap {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 24px;
        }
        .terms-wrap input[type="checkbox"] {
            width: 16px; height: 16px;
            accent-color: var(--accent);
            cursor: pointer;
            margin-top: 2px;
            flex-shrink: 0;
        }
        .terms-label {
            font-size: 13px;
            color: var(--text-muted);
            font-weight: 300;
            line-height: 1.5;
        }
        .terms-label a { color: var(--accent); text-decoration: none; }

        .btn-submit {
            width: 100%;
            padding: 15px;
            background: var(--accent);
            color: #fff;
            border: none;
            border-radius: 4px;
            font-family: 'Jost', sans-serif;
            font-size: 12px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .btn-submit:hover {
            background: var(--accent-hover);
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        }
        .btn-submit:active { transform: translateY(0); }

        .login-link {
            text-align: center;
            font-size: 13px;
            color: var(--text-muted);
            font-weight: 300;
            margin-top: 20px;
        }
        .login-link a { color: var(--accent); text-decoration: none; font-weight: 500; }

        .error-msg {
            background: rgba(220,53,69,0.08);
            border: 1px solid rgba(220,53,69,0.2);
            border-radius: 4px;
            padding: 12px 16px;
            margin-bottom: 20px;
            font-size: 13px;
            color: #dc3545;
        }
        .field-error { font-size: 12px; color: #dc3545; margin-top: 6px; }

        @media (max-width: 768px) {
            body { grid-template-columns: 1fr; }
            .left-panel { display: none; }
            .right-panel { padding: 80px 32px 48px; justify-content: flex-start; }
            .top-bar { top: 20px; right: 20px; }
            .form-row-2 { grid-template-columns: 1fr; }
        }
        @media (max-width: 480px) {
            .right-panel { padding: 72px 24px 40px; }
            .form-title { font-size: 30px; }
        }
    </style>
</head>
<body>

<div class="left-panel">
    <a href="/" class="panel-brand">Task<span>flow</span></a>
    <div class="panel-content">
        <h2 class="panel-quote">Begin your journey<br>to <em>clarity.</em></h2>
        <p class="panel-sub">Join thousands who organise their days<br>with intention and elegance.</p>
    </div>
    <div class="panel-features">
        <div class="panel-feature">
            <div class="feature-check"><svg viewBox="0 0 12 12"><polyline points="2,6 5,9 10,3"/></svg></div>
            <span>Smart task prioritisation</span>
        </div>
        <div class="panel-feature">
            <div class="feature-check"><svg viewBox="0 0 12 12"><polyline points="2,6 5,9 10,3"/></svg></div>
            <span>Beautiful custom themes</span>
        </div>
        <div class="panel-feature">
            <div class="feature-check"><svg viewBox="0 0 12 12"><polyline points="2,6 5,9 10,3"/></svg></div>
            <span>Calendar & deadline tracking</span>
        </div>
        <div class="panel-feature">
            <div class="feature-check"><svg viewBox="0 0 12 12"><polyline points="2,6 5,9 10,3"/></svg></div>
            <span>100% free to get started</span>
        </div>
    </div>
</div>

<div class="right-panel">
    <div class="top-bar">
        <div class="theme-dots">
            <div class="theme-dot active" data-color="pink" title="Rose Pink"></div>
            <div class="theme-dot" data-color="slate" title="Slate Blue"></div>
            <div class="theme-dot" data-color="teal" title="Deep Teal"></div>
            <div class="theme-dot" data-color="gold" title="Warm Gold"></div>
            <div class="theme-dot" data-color="navy" title="Midnight Navy"></div>
        </div>
        <button class="dark-toggle" id="darkToggle">
            <svg id="moonIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
            <svg id="sunIcon" style="display:none" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
        </button>
    </div>

    <div class="form-wrap">
        <div class="form-eyebrow">Get started</div>
        <h1 class="form-title">Create your<br>free account</h1>
        <p class="form-sub">Already have an account? <a href="{{ route('login') }}">Sign in here</a></p>

        @if ($errors->any())
            <div class="error-msg">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="name">Full name</label>
                <input type="text" id="name" name="name" class="form-input"
                    placeholder="Your name"
                    value="{{ old('name') }}" required autofocus>
                @error('name') <div class="field-error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="email">Email address</label>
                <input type="email" id="email" name="email" class="form-input"
                    placeholder="you@example.com"
                    value="{{ old('email') }}" required>
                @error('email') <div class="field-error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-input"
                    placeholder="Min. 8 characters" required
                    oninput="checkStrength(this.value)">
                <div class="password-strength">
                    <div class="strength-bar" id="bar1"></div>
                    <div class="strength-bar" id="bar2"></div>
                    <div class="strength-bar" id="bar3"></div>
                    <div class="strength-bar" id="bar4"></div>
                </div>
                <div class="strength-text" id="strengthText"></div>
                @error('password') <div class="field-error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="password_confirmation">Confirm password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="form-input" placeholder="Repeat your password" required>
            </div>

            <button type="submit" class="btn-submit">Create account</button>
        </form>

        <div class="login-link">
            Already have an account? <a href="{{ route('login') }}">Sign in</a>
        </div>
    </div>
</div>

<script>
    const html = document.documentElement;
    const savedTheme = localStorage.getItem('theme') || 'light';
    const savedAccent = localStorage.getItem('accent') || 'pink';
    html.setAttribute('data-theme', savedTheme);
    html.setAttribute('data-accent', savedAccent);
    updateDarkIcons(savedTheme);
    updateAccentDots(savedAccent);

    document.getElementById('darkToggle').addEventListener('click', () => {
        const current = html.getAttribute('data-theme');
        const next = current === 'dark' ? 'light' : 'dark';
        html.setAttribute('data-theme', next);
        localStorage.setItem('theme', next);
        updateDarkIcons(next);
    });

    function updateDarkIcons(theme) {
        document.getElementById('moonIcon').style.display = theme === 'dark' ? 'none' : 'block';
        document.getElementById('sunIcon').style.display = theme === 'dark' ? 'block' : 'none';
    }

    document.querySelectorAll('.theme-dot').forEach(dot => {
        dot.addEventListener('click', () => {
            const color = dot.dataset.color;
            html.setAttribute('data-accent', color);
            localStorage.setItem('accent', color);
            updateAccentDots(color);
        });
    });

    function updateAccentDots(active) {
        document.querySelectorAll('.theme-dot').forEach(d => {
            d.classList.toggle('active', d.dataset.color === active);
        });
    }

    function checkStrength(val) {
        const bars = [
            document.getElementById('bar1'),
            document.getElementById('bar2'),
            document.getElementById('bar3'),
            document.getElementById('bar4')
        ];
        const text = document.getElementById('strengthText');
        const accent = getComputedStyle(document.documentElement).getPropertyValue('--accent').trim();

        bars.forEach(b => b.style.background = 'var(--border)');

        let score = 0;
        if (val.length >= 8) score++;
        if (/[A-Z]/.test(val)) score++;
        if (/[0-9]/.test(val)) score++;
        if (/[^A-Za-z0-9]/.test(val)) score++;

        const colors = ['#e74c3c', '#e67e22', '#f1c40f', '#27ae60'];
        const labels = ['Weak', 'Fair', 'Good', 'Strong'];

        for (let i = 0; i < score; i++) {
            bars[i].style.background = colors[score - 1];
        }
        text.textContent = val.length > 0 ? labels[score - 1] || '' : '';
        text.style.color = score > 0 ? colors[score - 1] : 'var(--text-subtle)';
    }
</script>
</body>
</html>