<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mis Tareas')</title>
    <style>
        :root {
            color-scheme: light;
            --bg: #f4f7fb;
            --surface: #ffffff;
            --surface-muted: #eef3f9;
            --text: #1f2937;
            --text-soft: #6b7280;
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --danger: #dc2626;
            --danger-dark: #b91c1c;
            --success-bg: #dcfce7;
            --success-text: #166534;
            --border: #dbe3ef;
            --shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
            --high: #b91c1c;
            --high-bg: #fee2e2;
            --medium: #a16207;
            --medium-bg: #fef3c7;
            --low: #166534;
            --low-bg: #dcfce7;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background:
                radial-gradient(circle at top right, rgba(37, 99, 235, 0.12), transparent 22rem),
                linear-gradient(180deg, #f8fbff 0%, var(--bg) 100%);
            color: var(--text);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .page {
            min-height: 100vh;
            padding: 2rem 1rem 3rem;
        }

        .container {
            width: min(100%, 1000px);
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            padding: 1.5rem;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(8px);
            box-shadow: var(--shadow);
        }

        .header h1 {
            margin: 0;
            font-size: clamp(1.8rem, 4vw, 2.7rem);
        }

        .header p {
            margin: 0.4rem 0 0;
            color: var(--text-soft);
        }

        .flash {
            margin-bottom: 1.5rem;
            padding: 1rem 1.2rem;
            border-radius: 16px;
            background: var(--success-bg);
            color: var(--success-text);
            font-weight: 600;
        }

        .panel {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 24px;
            box-shadow: var(--shadow);
            padding: 1.5rem;
        }

        .panel + .panel {
            margin-top: 1.25rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .stat-card {
            padding: 1.15rem 1.2rem;
            border-radius: 20px;
            border: 1px solid var(--border);
            background: linear-gradient(180deg, #ffffff 0%, #f7fbff 100%);
        }

        .stat-label {
            margin: 0;
            color: var(--text-soft);
            font-size: 0.9rem;
        }

        .stat-value {
            margin: 0.35rem 0 0;
            font-size: 1.9rem;
            font-weight: 800;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .btn,
        button.btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.35rem;
            border: none;
            border-radius: 999px;
            padding: 0.75rem 1.15rem;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.15s ease, background-color 0.15s ease, opacity 0.15s ease;
        }

        .btn:hover,
        button.btn:hover {
            transform: translateY(-1px);
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-secondary {
            background: var(--surface-muted);
            color: var(--text);
        }

        .btn-danger {
            background: var(--danger);
            color: #fff;
        }

        .btn-danger:hover {
            background: var(--danger-dark);
        }

        .task-list {
            display: grid;
            gap: 1rem;
        }

        .task-item {
            display: grid;
            gap: 1rem;
            grid-template-columns: minmax(0, 1fr) auto;
            align-items: center;
            padding: 1.25rem;
            border: 1px solid var(--border);
            border-radius: 20px;
            background: linear-gradient(180deg, #ffffff 0%, #fbfdff 100%);
        }

        .task-item.completed {
            opacity: 0.72;
        }

        .task-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            align-items: center;
            margin-top: 0.85rem;
            color: var(--text-soft);
            font-size: 0.95rem;
        }

        .task-title {
            margin: 0;
            font-size: 1.15rem;
        }

        .task-title.completed {
            text-decoration: line-through;
        }

        .task-description {
            margin: 0.7rem 0 0;
            color: var(--text-soft);
            line-height: 1.55;
            white-space: pre-line;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            border-radius: 999px;
            padding: 0.35rem 0.8rem;
            font-size: 0.82rem;
            font-weight: 700;
        }

        .badge-alta {
            color: var(--high);
            background: var(--high-bg);
        }

        .badge-media {
            color: var(--medium);
            background: var(--medium-bg);
        }

        .badge-baja {
            color: var(--low);
            background: var(--low-bg);
        }

        .task-buttons,
        .inline-form {
            display: flex;
            flex-wrap: wrap;
            gap: 0.65rem;
        }

        .inline-form {
            margin: 0;
        }

        .empty-state {
            text-align: center;
            padding: 2.5rem 1.5rem;
            color: var(--text-soft);
        }

        .form-grid {
            display: grid;
            gap: 1rem;
        }

        .field {
            display: grid;
            gap: 0.45rem;
        }

        .field label {
            font-weight: 700;
        }

        .field input,
        .field select,
        .field textarea {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 0.9rem 1rem;
            font: inherit;
            background: #fff;
            color: var(--text);
        }

        .field textarea {
            min-height: 140px;
            resize: vertical;
        }

        .field-error input,
        .field-error select,
        .field-error textarea {
            border-color: #ef4444;
        }

        .error-text {
            color: #b91c1c;
            font-size: 0.9rem;
        }

        .panel-title {
            margin: 0 0 1.25rem;
            font-size: 1.4rem;
        }

        @media (max-width: 720px) {
            .stats-grid,
            .header,
            .task-item {
                grid-template-columns: 1fr;
            }

            .task-buttons {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="container">
            <header class="header">
                <div>
                    <h1>Mis Tareas</h1>
                    <p>Organiza tus pendientes y mantén el foco en lo importante.</p>
                </div>
                <a href="{{ route('tareas.create') }}" class="btn btn-primary">Nueva tarea</a>
            </header>

            @if (session('success'))
                <div class="flash">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</body>
</html>
