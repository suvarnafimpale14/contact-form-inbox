
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Message Details | ContactFlow</title>

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
            background: #fff;
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
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 30px;
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
            flex-shrink: 0;
            border-radius: 12px;
            background: #e0e7ff;
            color: #3730a3;
            font-weight: 800;
        }

        .user-name { font-size: 13px; font-weight: 700; }
        .user-role { color: var(--muted); font-size: 11px; }

        .button {
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

        .button-primary { background: var(--primary); color: white; }
        .button-primary:hover { background: #304fe5; color: white; }

        .button-secondary {
            border-color: #e1e7f0;
            background: white;
            color: #475569;
        }

        .button-secondary:hover { background: #f8fafc; color: #1e293b; }

        .button-success { background: #16803d; color: white; }
        .button-success:hover { background: #126b33; color: white; }

        .button-warning { background: #fff0d5; color: #a16207; border-color: #fde4ac; }
        .button-warning:hover { background: #ffe6b3; color: #854d0e; }

        .button-resolve { background: #edf2ff; color: #3156d8; border-color: #dbe5ff; }
        .button-resolve:hover { background: #dce6ff; color: #1d4ed8; }

        .layout {
            display: grid;
            grid-template-columns: minmax(0, 1.7fr) minmax(245px, .85fr);
            align-items: start;
            gap: 22px;
        }

        .panel {
            overflow: hidden;
            margin-bottom: 22px;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: white;
            box-shadow: 0 5px 20px rgb(15 23 42 / 3%);
        }

        .panel-heading {
            padding: 20px 23px;
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

        .panel-body { padding: 23px; }

        .subject {
            margin: 0 0 18px;
            font-size: 24px;
            font-weight: 800;
            line-height: 1.4;
            overflow-wrap: anywhere;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 800;
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

        .divider {
            height: 1px;
            margin: 23px 0;
            background: var(--border);
        }

        .section-label {
            margin-bottom: 14px;
            color: #334155;
            font-size: 13px;
            font-weight: 800;
        }

        .message-content {
            padding: 20px;
            border: 1px solid #e7ecf5;
            border-radius: 12px;
            background: #f8faff;
            color: #475569;
            font-size: 14px;
            line-height: 1.9;
            overflow-wrap: anywhere;
            white-space: pre-wrap;
        }

        .reply-content {
            padding: 20px;
            border: 1px solid #bbf7d0;
            border-radius: 12px;
            background: #f0fdf4;
            color: #166534;
            font-size: 14px;
            line-height: 1.9;
            overflow-wrap: anywhere;
            white-space: pre-wrap;
        }

        .sender-profile {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 22px;
        }

        .sender-avatar {
            display: grid;
            place-items: center;
            width: 53px;
            height: 53px;
            flex-shrink: 0;
            border-radius: 16px;
            background: #e0e7ff;
            color: #3730a3;
            font-size: 21px;
            font-weight: 800;
        }

        .sender-name {
            margin-bottom: 4px;
            font-size: 15px;
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        .sender-email {
            color: var(--muted);
            font-size: 12px;
            overflow-wrap: anywhere;
        }

        .detail-item {
            padding: 14px 0;
            border-bottom: 1px solid #eef1f6;
        }

        .detail-item:last-child { border-bottom: 0; }

        .detail-label {
            margin-bottom: 6px;
            color: #8490a3;
            font-size: 11px;
        }

        .detail-value {
            color: #334155;
            font-size: 13px;
            font-weight: 650;
            overflow-wrap: anywhere;
        }

        .action-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .action-list .button { width: 100%; }

        .alert { border-radius: 10px; font-size: 13px; }

        .footer {
            margin-top: 25px;
            color: #94a3b8;
            font-size: 11px;
            text-align: center;
        }

        @media (max-width: 1100px) {
            .layout { grid-template-columns: minmax(0, 1fr); }
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
            .page-title { font-size: 22px; }
            .user-area { gap: 7px; }
            .user-role { display: none; }
            .user-name { max-width: 75px; overflow-wrap: anywhere; }
            .panel-body, .panel-heading { padding: 17px; }
            .subject { font-size: 20px; }
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
        <p class="mb-0 mt-2">Manage customer conversations in one place.</p>
    </div>
</aside>

<main class="main">

    <header class="topbar">
        <div>
            <div class="eyebrow">WORKSPACE / INBOX / MESSAGE DETAILS</div>
            <h1 class="page-title">Message Details</h1>
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
                <button type="submit" class="button button-secondary">Logout</button>
            </form>
        </div>
    </header>

    <div class="mb-4">
        <a href="{{ route('admin.messages') }}" class="button button-secondary">
            ← Back to Inbox
        </a>
    </div>

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

    <section class="layout">

        <div>

            <article class="panel">
                <div class="panel-heading">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div>
                            <h2>Customer Message</h2>
                            <p>Read the full message submitted through your contact form.</p>
                        </div>

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
                    </div>
                </div>

                <div class="panel-body">

                    <h2 class="subject">{{ $message->subject }}</h2>

                    <div class="sender-profile">
                        <div class="sender-avatar">
                            {{ strtoupper(substr($message->name ?? 'U', 0, 1)) }}
                        </div>

                        <div>
                            <div class="sender-name">{{ $message->name }}</div>
                            <div class="sender-email">{{ $message->email }}</div>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <h3 class="section-label">Message Content</h3>

                    <div class="message-content">{{ $message->message }}</div>

                    <div class="divider"></div>

                    <div class="d-flex flex-wrap justify-content-between gap-2">
                        <div class="text-secondary small">
                            <strong>Received on</strong><br>
                            {{ $message->created_at->format('d M Y, h:i A') }}
                        </div>

                        <div class="text-secondary small">
                            <strong>Message ID</strong><br>
                            #{{ $message->id }}
                        </div>
                    </div>

                    @if($message->admin_reply)
                        <div class="divider"></div>

                        <h3 class="section-label">Your Reply</h3>

                        <div class="reply-content">{{ $message->admin_reply }}</div>
                    @endif

                </div>
            </article>

        </div>

        <aside>

            <section class="panel">
                <div class="panel-heading">
                    <h2>Sender Information</h2>
                    <p>Customer contact details</p>
                </div>

                <div class="panel-body">

                    <div class="detail-item">
                        <div class="detail-label">Full Name</div>
                        <div class="detail-value">{{ $message->name }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label">Email Address</div>
                        <div class="detail-value">{{ $message->email }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label">Phone Number</div>
                        <div class="detail-value">{{ $message->phone ?: 'Not provided' }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label">Current Status</div>
                        <div class="detail-value">{{ ucfirst($message->status ?? 'Unknown') }}</div>
                    </div>

                </div>
            </section>

            <section class="panel">
                <div class="panel-heading">
                    <h2>Message Actions</h2>
                    <p>Choose what to do with this message.</p>
                </div>

                <div class="panel-body">
                    <div class="action-list">

                        <a
                            href="{{ route('admin.message.reply.form', $message->id) }}"
                            class="button button-success"
                        >
                            ✉ &nbsp; Reply to Customer
                        </a>

                        <form
                            method="POST"
                            action="{{ route('admin.message.resolve', $message->id) }}"
                            onsubmit="return confirm('Mark this message as resolved?')"
                        >
                            @csrf

                            <button type="submit" class="button button-resolve">
                                ✓ &nbsp; Mark as Resolved
                            </button>
                        </form>

                        <form
                            method="POST"
                            action="{{ route('admin.message.archive', $message->id) }}"
                            onsubmit="return confirm('Archive this message?')"
                        >
                            @csrf

                            <button type="submit" class="button button-warning">
                                ▣ &nbsp; Archive Message
                            </button>
                        </form>

                        <a href="{{ route('admin.messages') }}" class="button button-secondary">
                            ← Return to Inbox
                        </a>

                    </div>
                </div>
            </section>

        </aside>

    </section>

    <footer class="footer">
        © {{ date('Y') }} ContactFlow Inbox · Admin Workspace
    </footer>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>