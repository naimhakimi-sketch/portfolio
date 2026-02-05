<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        aside {
            width: 250px;
            background: #2c3e50;
            color: white;
            padding: 2rem 1rem;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        aside h2 {
            margin-bottom: 2rem;
            font-size: 1.5rem;
        }

        aside ul {
            list-style: none;
        }

        aside li {
            margin-bottom: 0.5rem;
        }

        aside a {
            display: block;
            color: #ecf0f1;
            text-decoration: none;
            padding: 0.75rem 1rem;
            border-radius: 5px;
            transition: background 0.3s;
        }

        aside a:hover,
        aside a.active {
            background: #34495e;
            color: white;
        }

        /* Main Content */
        main {
            flex: 1;
            margin-left: 250px;
            padding: 2rem;
        }

        /* Header */
        .header {
            background: white;
            padding: 1.5rem 2rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .header h1 {
            font-size: 2rem;
            color: #2c3e50;
        }

        .header-actions {
            display: flex;
            gap: 1rem;
        }

        .header-actions a,
        .header-actions form {
            display: inline;
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s;
        }

        .btn:hover {
            background: #2980b9;
        }

        .btn-danger {
            background: #e74c3c;
        }

        .btn-danger:hover {
            background: #c0392b;
        }

        .btn-success {
            background: #27ae60;
        }

        .btn-success:hover {
            background: #229954;
        }

        /* Alert */
        .alert {
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1.5rem;
            border-left: 4px solid;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border-left-color: #28a745;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border-left-color: #f5c6cb;
        }

        /* Content Area */
        .content {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
        }

        thead {
            background: #ecf0f1;
            border-bottom: 2px solid #bdc3c7;
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #ecf0f1;
        }

        tr:hover {
            background: #f9f9f9;
        }

        /* Forms */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #2c3e50;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #bdc3c7;
            border-radius: 5px;
            font-family: inherit;
            font-size: 1rem;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 150px;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .form-group.error input,
        .form-group.error textarea {
            border-color: #e74c3c;
        }

        .error-message {
            color: #e74c3c;
            font-size: 0.9rem;
            margin-top: 0.25rem;
        }

        /* Multi-input for arrays */
        .tech-stack-inputs {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .tech-input {
            flex: 1;
            min-width: 150px;
        }

        .add-tech-btn {
            padding: 0.75rem 1rem;
            background: #27ae60;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            align-self: flex-end;
        }

        .add-tech-btn:hover {
            background: #229954;
        }

        /* Responsive */
        @media (max-width: 768px) {
            aside {
                width: 100%;
                position: static;
                height: auto;
                padding: 1rem;
            }

            main {
                margin-left: 0;
            }

            .header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            table {
                font-size: 0.9rem;
            }

            th, td {
                padding: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar Navigation -->
        <aside>
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="{{ route('portfolio.index') }}" target="_blank">← View Portfolio</a></li>
                <li><a href="{{ route('admin.about.edit') }}">About</a></li>
                <li><a href="{{ route('admin.education.index') }}">Education</a></li>
                <li><a href="{{ route('admin.work.index') }}">Work</a></li>
                <li><a href="{{ route('admin.certification.index') }}">Certifications</a></li>
                <li><a href="{{ route('admin.skill.index') }}">Skills</a></li>
                <li><a href="{{ route('admin.project.index') }}">Projects</a></li>
                <li><a href="{{ route('admin.contact.index') }}">Messages</a></li>
                <li style="margin-top: 2rem; border-top: 1px solid #34495e; padding-top: 1rem;">
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: #ecf0f1; cursor: pointer; padding: 0.75rem 1rem; text-align: left; width: 100%;">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main>
            <!-- Alerts -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Content -->
            @yield('content')
        </main>
    </div>
</body>
</html>
