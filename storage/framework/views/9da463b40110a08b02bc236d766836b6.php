<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Employés</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg-primary: #ffffff;
            --bg-secondary: #f5f5f4;
            --bg-tertiary: #f0efea;
            --bg-info: #e6f1fb;
            --bg-success: #eaf3de;
            --bg-warning: #faeeda;
            --bg-danger: #fcebeb;
            --text-primary: #1a1a18;
            --text-secondary: #5f5e5a;
            --text-info: #185fa5;
            --text-success: #3b6d11;
            --text-warning: #854f0b;
            --text-danger: #a32d2d;
            --border: rgba(0,0,0,0.12);
            --border-md: rgba(0,0,0,0.22);
            --radius-md: 8px;
            --radius-lg: 12px;
            --font: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            --mono: 'SF Mono', 'Fira Code', monospace;
        }

        @media (prefers-color-scheme: dark) {
            :root {
                --bg-primary: #1e1e1c;
                --bg-secondary: #2a2a28;
                --bg-tertiary: #151513;
                --bg-info: #0c447c;
                --bg-success: #27500a;
                --bg-warning: #633806;
                --bg-danger: #791f1f;
                --text-primary: #f0efea;
                --text-secondary: #b4b2a9;
                --text-info: #85b7eb;
                --text-success: #97c459;
                --text-warning: #ef9f27;
                --text-danger: #f09595;
                --border: rgba(255,255,255,0.1);
                --border-md: rgba(255,255,255,0.2);
            }
        }

        body {
            font-family: var(--font);
            background: var(--bg-tertiary);
            color: var(--text-primary);
            min-height: 100vh;
            font-size: 14px;
            line-height: 1.6;
        }

        /* NAVBAR */
        .navbar {
            background: var(--bg-primary);
            border-bottom: 0.5px solid var(--border);
            height: 52px;
            display: flex;
            align-items: center;
            padding: 0 1.5rem;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .navbar-brand {
            font-size: 15px;
            font-weight: 500;
            color: var(--text-primary);
            text-decoration: none;
        }
        .navbar-sub {
            font-size: 12px;
            color: var(--text-secondary);
        }

        /* PAGE */
        .page {
            max-width: 1100px;
            margin: 0 auto;
            padding: 1.5rem;
        }

        /* ALERTS */
        .alert-success {
            background: var(--bg-success);
            color: var(--text-success);
            border: 0.5px solid var(--text-success);
            border-radius: var(--radius-md);
            padding: .6rem 1rem;
            font-size: 13px;
            margin-bottom: 1rem;
        }
        .alert-danger {
            background: var(--bg-danger);
            color: var(--text-danger);
            border: 0.5px solid var(--text-danger);
            border-radius: var(--radius-md);
            padding: .6rem 1rem;
            font-size: 13px;
            margin-bottom: 1rem;
        }

        /* BUTTONS */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 16px;
            border-radius: var(--radius-md);
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            border: 0.5px solid var(--border-md);
            background: var(--bg-primary);
            color: var(--text-primary);
            text-decoration: none;
            transition: background .15s, opacity .15s;
            white-space: nowrap;
        }
        .btn:hover { background: var(--bg-secondary); }
        .btn-primary { background: var(--bg-info); color: var(--text-info); border-color: var(--text-info); }
        .btn-primary:hover { opacity: .85; background: var(--bg-info); }
        .btn-success { background: var(--bg-success); color: var(--text-success); border-color: var(--text-success); }
        .btn-success:hover { opacity: .85; background: var(--bg-success); }
        .btn-warning { background: var(--bg-warning); color: var(--text-warning); border-color: var(--text-warning); padding: 4px 12px; font-size: 12px; }
        .btn-danger  { background: var(--bg-danger);  color: var(--text-danger);  border-color: var(--text-danger);  padding: 4px 12px; font-size: 12px; }
        .btn-dark    { background: var(--bg-secondary); color: var(--text-secondary); padding: 5px 12px; font-size: 12px; }

        /* FORM INPUTS */
        .form-control {
            width: 100%;
            height: 36px;
            padding: 0 12px;
            border-radius: var(--radius-md);
            border: 0.5px solid var(--border-md);
            background: var(--bg-secondary);
            color: var(--text-primary);
            font-size: 13px;
            font-family: var(--font);
            outline: none;
            transition: border-color .15s, box-shadow .15s;
        }
        .form-control:focus {
            border-color: var(--text-info);
            box-shadow: 0 0 0 3px rgba(24,95,165,.15);
            background: var(--bg-primary);
        }
        .form-control::placeholder { color: var(--text-secondary); }

        textarea.form-control { height: auto; padding: 10px 12px; resize: vertical; }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: var(--text-secondary);
            margin-bottom: 5px;
        }
        .form-group { margin-bottom: .875rem; }

        /* CARD */
        .card {
            background: var(--bg-primary);
            border: 0.5px solid var(--border);
            border-radius: var(--radius-lg);
            overflow: hidden;
        }
        .card-body { padding: 1.25rem; }
    </style>
</head>
<body>

<nav class="navbar">
    <a class="navbar-brand" href="<?php echo e(route('employes.index')); ?>">👥 Gestion Employés</a>
    <span class="navbar-sub">RH Dashboard</span>
</nav>

<div class="page">
    <?php echo $__env->yieldContent('content'); ?>
</div>

</body>
</html><?php /**PATH C:\Users\HP\gestion-employes\resources\views/layout.blade.php ENDPATH**/ ?>