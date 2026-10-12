
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages Inbox | ContactFlow</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #edf2ff;
            --page-bg: #f5f7fc;
            --text: #1e293b;
            --muted: #718096;
            --border: #e8edf5;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--page-bg);
            color: var(--text);
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            font-size: 14px;
        }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 5;
            width: 245px;
            padding: 27px 17px;
            border-right: 1px solid var(--border);
            background: white;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            margin: 0 8px 38px;
            color: #172554;
            font-size: 20px;
            font-weight: 800;
            text-decoration: none;
        }

        .brand-icon {
            display: grid;
            place-items: center;
            width: 42px;
            height: 42px;
            border-radius: 13px;
            background: var(--primary);
            color: white;
            font-size: 21px;
        }

        .nav-label {
            margin: 0 10px 12px;
            color: #9aa5b7;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.3px;
        }

        .side-link {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 8px;
            padding: 13px;
            border-radius: 10px;
            color: #65738b;
            font-weight: 600;
            text-decoration: none;
        }

        .side-link:hover, .side-link.active {
            background: var(--primary-light);
            color: var(--primary);
        }

        .side-icon {
            width: 23px;
            text-align: center;
            font-size: 18px;
        }

        .sidebar-note {
            position: absolute;
            right: 17px;
            bottom: 24px;
            left: 17px;
            padding: 15px;
            border-radius: 13px;
            background: #f3f6ff;
            color: #64748b;
            font-size: 12px;
        }

        .main {
            min-height: 100vh;
            margin-left: 245px;
            padding: 30px 34px 45px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            margin-bottom: 32px;
        }

        .eyebrow {
            margin-bottom: 5px;
            color: var(--muted);
            font-size: 12px;
        }

        .page-title {
            margin: 0;
            font-size: 27px;
            font-weight: 800;
            letter-spacing: -.5px;
        }

        .user-area {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .avatar {
            display: grid;
            place-items: center;
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: #e0e7ff;
            color: #3730a3;
            font-weight: 800;
        }

        .user-name { font-size: 13px; font-weight: 700; }
        .user-role { color: var(--muted); font-size: 11px; }

        .button-primary, .button-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            min-height: 40px;
            padding: 9px 14px;
            border: 1px solid transparent;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: .2s;
        }

        .button-primary {
            background: var(--primary);
            color: white;
        }

        .button-primary:hover {
            background: #304fe5;
            color: white;
        }

        .button-secondary {
            border-color: #e1e7f0;
            background: white;
            color: #475569;
        }

        .button-secondary:hover {
            background: #f8fafc;
            color: #1e293b;
        }

        .page-intro {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 22px;
        }

        .page-intro p {
            margin: 7px 0 0;
            color: var(--muted);
            font-size: 13px;
        }

        .panel {
            overflow: hidden;
            margin-bottom: 22px;
            border: 1px solid var(--border);
            border-radius: 15px;
            background: white;
            box-shadow: 0 5px 20px rgb(15 23 42 / 3%);
        }

        .panel-heading {
            padding: 19px 22px;
            border-bottom: 1px solid var(--border);
        }

        .panel-heading h2 {
            margin: 0;
            font-size: 15px;
            font-weight: 800;
        }

        .panel-heading p {
            margin: 5px 0 0;
            color: var(--muted);
            font-size: 12px;
        }

        .filter-body { padding: 21px 22px; }

        .form-label {
            margin-bottom: 7px;
            color: #475569;
            font-size: 12px;
            font-weight: 700;
        }

        .form-control, .form-select {
            min-height: 43px;
            border: 1px solid #e1e7f0;
            border-radius: 9px;
            font-size: 13px;
            box-shadow: none !important;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
        }

        .table-wrap { overflow-x: auto; }

        .inbox-table {
            width: 100%;
            min-width: 850px;
            margin: 0;
            border-collapse: collapse;
        }

        .inbox-table thead th {
            padding: 15px 17px;
            background: #f8faff;
            color: #718096;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .8px;
            text-align: left;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .inbox-table tbody td {
            padding: 17px;
            border-top: 1px solid #eef1f6;
            color: #526078;
            font-size: 12px;
            vertical-align: middle;
        }

        .inbox-table tbody tr {
            transition: background .15s;
        }

        .inbox-table tbody tr:hover {
            background: #fafbff;
        }

        .sender-name {
            color: #1e293b;
            font-size: 13px;
            font-weight: 750;
        }

        .sender-email {
            margin-top: 4px;
            color: #8490a3;
            font-size: 11px;
        }

        .subject-text {
            max-width: 190px;
            overflow-wrap: anywhere;
            color: #475569;
        }

        .message-id {
            color: #8490a3;
            font-weight: 700;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 800;
            white-space: nowrap;
        }

        .status::before {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
            content: "";
        }

        .status-new { background: #e8efff; color: #3156d8; }
        .status-replied { background: #dcfce7; color: #16803d; }
        .status-resolved { background: #e8edf2; color: #526078; }
        .status-archived { background: #fff0d5; color: #a16207; }
        .status-other { background: #f1f5f9; color: #475569; }

        .action-group {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .view-button, .delete-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 32px;
            padding: 6px 10px;
            border: 1px solid transparent;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }

        .view-button {
            border-color: #dbe5ff;
            background: #edf2ff;
            color: #3156d8;
        }

        .view-button:hover { background: #dce6ff; color: #1d4ed8; }

        .delete-button {
            border-color: #fecaca;
            background: #fff1f2;
            color: #be123c;
        }

        .delete-button:hover { background: #ffe4e6; }

        .empty-state {
            padding: 55px 20px !important;
            text-align: center;
        }

        .empty-icon {
            display: grid;
            place-items: center;
            width: 60px;
            height: 60px;
            margin: 0 auto 14px;
            border-radius: 18px;
            background: #edf2ff;
            color: var(--primary);
            font-size: 27px;
        }

        .empty-state h3 {
            color: #334155;
            font-size: 16px;
            font-weight: 800;
        }

        .empty-state p {
            margin-bottom: 0;
            color: var(--muted);
            font-size: 12px;
        }

        .alert {
            border-radius: 10px;
            font-size: 13px;
        }

        .footer {
            margin-top: 28px;
            color: #94a3b8;
            font-size: 11px;
            text-align: center;
        }

        @media (max-width: 950px) {
            .sidebar {
                position: static;
                width: 100%;
                padding: 15px;
                border-right: 0;
                border-bottom: 1px solid var(--border);
            }

            .brand { margin: 0 5px 14px; }
            .nav-label, .sidebar-note { display: none; }
            .sidebar nav { display: flex; flex-wrap: wrap; gap: 5px; }
            .side-link { margin: 0; padding: 9px 11px; font-size: 12px; }
            .main { margin-left: 0; padding: 24px 20px; }
        }

        @media (max-width: 560px) {
            .main { padding: 20px 12px; }
            .topbar { align-items: flex-start; }
            .page-title { font-size: 23px; }
            .user-area { gap: 7px; }
            .user-role { display: none; }
            .user-name { max-width: 75px; overflow-wrap: anywhere; }
            .page-intro { align-items: flex-start; }
            .filter-body { padding: 16px; }
            .panel-heading { padding: 16px; }
        }
    </style>
</head>

<body>

<aside class="sidebar">
    <a class="brand" href="{{ route('admin.dashboard') }}">
        <span class="brand-icon">✉</span>
        <span>ContactFlow</span>
    </a>

    <div class="nav-label">WORKSPACE</div>

    <nav>
        <a href="{{ route('admin.dashboard') }}" class="side-link">
            <span class="side-icon">▦</span>
            Dashboard
        </a>

        <a href="{{ route('admin.messages') }}" class="side-link active">
            <span class="side-icon">✉</span>
            Messages Inbox
        </a>

        <a href="{{ route('contact.create') }}" class="side-link">
            <span class="side-icon">↗</span>
            Contact Form
        </a>
    </nav>

    <div class="sidebar-note">
        <strong>ContactFlow Inbox</strong>
        <p class="mb-0 mt-2">Your customer conversations, organized in one place.</p>
    </div>
</aside>

<main class="main">

    <header class="topbar">
        <div>
            <div class="eyebrow">WORKSPACE / MESSAGES</div>
            <h1 class="page-title">Messages Inbox</h1>
        </div>

        <div class="user-area">
            <div class="avatar">
                {{ strtoupper(substr(session('admin_name', 'A'), 0, 1)) }}
            </div>

            <div>
                <div class="user-name">{{ session('admin_name', 'Admin') }}</div>
                <div class="user-role">Administrator</div>
            </div>

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="button-secondary">Logout</button>
            </form>
        </div>
    </header>

    <section class="page-intro">
        <div>
            <h2 class="h5 fw-bold mb-0">All Messages</h2>
            <p>Search, filter and manage your contact form submissions.</p>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="button-secondary">
            ← Dashboard
        </a>
    </section>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <section class="panel">
        <div class="panel-heading">
            <h2>Find a message</h2>
            <p>Search by sender, email address or subject.</p>
        </div>

        <div class="filter-body">
            <form method="GET" action="{{ route('admin.messages') }}">
                <div class="row g-3 align-items-end">

                    <div class="col-lg-6 col-md-6">
                        <label for="search" class="form-label">Search messages</label>
                        <input
                            id="search"
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Enter name, email or subject..."
                            value="{{ request('search') }}"
                        >
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <label for="status" class="form-label">Filter by status</label>
                        <select id="status" name="status" class="form-select">
                            <option value="">All Messages</option>
                            <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New</option>
                            <option value="replied" {{ request('status') == 'replied' ? 'selected' : '' }}>Replied</option>
                            <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>Resolved</option>
                            <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                    </div>

                    <div class="col-lg-2 col-md-2 d-flex gap-2">
                        <button type="submit" class="button-primary flex-grow-1">
                            Search
                        </button>
                        <a href="{{ route('admin.messages') }}" class="button-secondary">
                            Reset
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </section>

    <section class="panel">

        <div class="panel-heading d-flex justify-content-between align-items-center gap-3">
            <div>
                <h2>Message Records</h2>
                <p>Review and manage incoming requests.</p>
            </div>
            <span class="status status-new">Inbox</span>
        </div>

        <div class="table-wrap">
            <table class="inbox-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sender</th>
                        <th>Subject</th>
                        <th>Received</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($messages as $message)
                    <tr>
                        <td class="message-id">#{{ $message->id }}</td>

                        <td>
                            <div class="sender-name">{{ $message->name }}</div>
                            <div class="sender-email">{{ $message->email }}</div>
                        </td>

                        <td>
                            <div class="subject-text">{{ $message->subject }}</div>
                        </td>

                        <td>
                            {{ $message->created_at->format('d M Y') }}
                            <div class="sender-email">{{ $message->created_at->format('h:i A') }}</div>
                        </td>

                        <td>
                            @if($message->status == 'new')
                                <span class="status status-new">New</span>
                            @elseif($message->status == 'replied')
                                <span class="status status-replied">Replied</span>
                            @elseif($message->status == 'resolved')
                                <span class="status status-resolved">Resolved</span>
                            @elseif($message->status == 'archived')
                                <span class="status status-archived">Archived</span>
                            @else
                                <span class="status status-other">{{ ucfirst($message->status ?? 'Unknown') }}</span>
                            @endif
                        </td>

                        <td>
                            <div class="action-group">
                                <a
                                    href="{{ route('admin.message.show', $message->id) }}"
                                    class="view-button"
                                >
                                    View →
                                </a>

                                <form
                                    action="{{ route('admin.message.delete', $message->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to permanently delete this message?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="delete-button">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty-state">
                            <div class="empty-icon">✉</div>
                            <h3>No messages found</h3>
                            <p>No messages match your current search or filter.</p>
                            <a href="{{ route('contact.create') }}" class="button-primary mt-3">
                                Open Contact Form
                            </a>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </section>

    <footer class="footer">
        © {{ date('Y') }} ContactFlow Inbox · Admin Workspace
    </footer>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>