
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | ContactFlow</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --blue: #4361ee;
            --navy: #172554;
            --muted: #718096;
            --page: #f5f7fc;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--page);
            color: #1e293b;
            font-family: Inter, "Segoe UI", Arial, sans-serif;
        }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 250px;
            padding: 28px 18px;
            background: #fff;
            border-right: 1px solid #e9edf5;
            z-index: 10;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            margin: 0 8px 38px;
            color: var(--navy);
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
            background: var(--blue);
            color: white;
            font-size: 21px;
        }

        .nav-label {
            margin: 0 10px 12px;
            color: #9aa5b7;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.4px;
        }

        .side-link {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 8px;
            padding: 13px 14px;
            border-radius: 11px;
            color: #65738b;
            font-weight: 600;
            text-decoration: none;
        }

        .side-link:hover, .side-link.active {
            background: #edf2ff;
            color: var(--blue);
        }

        .side-icon { width: 23px; text-align: center; font-size: 18px; }

        .sidebar-bottom {
            position: absolute;
            right: 18px;
            bottom: 24px;
            left: 18px;
        }

        .help-card {
            padding: 16px;
            border-radius: 14px;
            background: #f3f6ff;
            color: #53627b;
            font-size: 12px;
        }

        .main {
            min-height: 100vh;
            margin-left: 250px;
            padding: 30px 36px 45px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 34px;
        }

        .eyebrow {
            margin-bottom: 5px;
            color: var(--muted);
            font-size: 13px;
        }

        .page-title {
            margin: 0;
            font-size: 28px;
            font-weight: 800;
            letter-spacing: -.7px;
        }

        .user-pill {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 9px 13px;
            border: 1px solid #e7ebf3;
            border-radius: 13px;
            background: white;
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

        .welcome-banner {
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 30px;
            padding: 30px 32px;
            border-radius: 20px;
            background: linear-gradient(115deg, #304fe5, #6579f5);
            color: white;
            box-shadow: 0 12px 30px #4361ee24;
        }

        .welcome-banner::after {
            position: absolute;
            top: -75px;
            right: 90px;
            width: 240px;
            height: 240px;
            border: 35px solid #ffffff14;
            border-radius: 50%;
            content: "";
        }

        .welcome-banner h2 {
            margin-bottom: 8px;
            color: white;
            font-size: 25px;
            font-weight: 800;
        }

        .welcome-banner p {
            margin: 0;
            color: #e3e9ff;
            font-size: 13px;
        }

        .banner-icon {
            position: relative;
            z-index: 1;
            font-size: 62px;
        }

        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 17px;
        }

        .section-heading h3 {
            margin: 0;
            font-size: 17px;
            font-weight: 800;
        }

        .section-heading span { color: var(--muted); font-size: 12px; }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .stat-card {
            padding: 22px;
            border: 1px solid #e9edf5;
            border-radius: 17px;
            background: #fff;
            box-shadow: 0 5px 20px #0f172a06;
            transition: transform .2s, box-shadow .2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px #0f172a0d;
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 20px;
        }

        .stat-icon {
            display: grid;
            place-items: center;
            width: 47px;
            height: 47px;
            border-radius: 14px;
            font-size: 22px;
        }

        .icon-blue { background: #e8edff; color: #4361ee; }
        .icon-orange { background: #fff0df; color: #ea8b25; }
        .icon-green { background: #dcfce7; color: #159447; }
        .icon-purple { background: #f1e8ff; color: #8b5cf6; }
        .icon-red { background: #ffe4e6; color: #e11d48; }

        .stat-tag {
            padding: 5px 8px;
            border-radius: 7px;
            background: #f5f7fb;
            color: #718096;
            font-size: 10px;
            font-weight: 700;
        }

        .stat-value {
            margin-bottom: 4px;
            font-size: 31px;
            font-weight: 800;
            line-height: 1.2;
        }

        .stat-label { color: #7a879b; font-size: 12px; }

        .bottom-grid {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 18px;
            margin-top: 27px;
        }

        .content-card {
            padding: 23px;
            border: 1px solid #e9edf5;
            border-radius: 17px;
            background: #fff;
        }

        .action-row {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 14px 0;
            border-bottom: 1px solid #eef1f6;
        }

        .action-row:last-child { border-bottom: 0; }

        .action-icon {
            display: grid;
            place-items: center;
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            border-radius: 12px;
            background: #edf2ff;
            color: var(--blue);
            font-size: 19px;
        }

        .action-title { margin-bottom: 3px; font-size: 13px; font-weight: 700; }
        .action-description { color: var(--muted); font-size: 11px; }

        .action-arrow {
            margin-left: auto;
            color: #94a3b8;
            font-size: 20px;
        }

        .primary-button, .secondary-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 42px;
            padding: 10px 16px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
        }

        .primary-button { background: var(--blue); color: white; }
        .primary-button:hover { background: #304fe5; color: white; }

        .secondary-button {
            border: 1px solid #e1e7f0;
            background: white;
            color: #475569;
        }

        .secondary-button:hover { background: #f8fafc; color: #1e293b; }

        .footer {
            margin-top: 28px;
            color: #94a3b8;
            font-size: 11px;
            text-align: center;
        }

        @media (max-width: 1100px) {
            .main { padding: 25px 22px; }
            .stats-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .bottom-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 700px) {
            .sidebar {
                position: static;
                width: 100%;
                padding: 15px;
                border-right: 0;
                border-bottom: 1px solid #e9edf5;
            }

            .brand { margin: 0 5px 15px; }
            .nav-label, .sidebar-bottom { display: none; }
            .sidebar nav { display: flex; flex-wrap: wrap; gap: 5px; }
            .side-link { margin: 0; padding: 9px 11px; font-size: 12px; }
            .side-icon { width: auto; }
            .main { margin-left: 0; padding: 22px 15px; }
            .topbar { align-items: flex-start; }
            .page-title { font-size: 23px; }
            .user-pill { padding: 6px; }
            .user-name { max-width: 90px; overflow-wrap: anywhere; }
            .welcome-banner { padding: 23px 20px; }
            .welcome-banner h2 { font-size: 21px; }
            .banner-icon { font-size: 40px; }
            .stats-grid { grid-template-columns: 1fr 1fr; gap: 11px; }
            .stat-card { padding: 15px; }
            .stat-value { font-size: 25px; }
            .stat-icon { width: 40px; height: 40px; }
            .stat-tag { display: none; }
            .content-card { padding: 17px; }
        }

        @media (max-width: 380px) {
            .stats-grid { grid-template-columns: 1fr; }
            .user-role { display: none; }
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
            <a href="{{ route('admin.dashboard') }}" class="side-link active">
                <span class="side-icon">▦</span>
                Dashboard
            </a>

            <a href="{{ route('admin.messages') }}" class="side-link">
                <span class="side-icon">✉</span>
                Messages Inbox
            </a>

            <a href="{{ route('contact.create') }}" class="side-link">
                <span class="side-icon">↗</span>
                Contact Form
            </a>
        </nav>

        <div class="sidebar-bottom">
            <div class="help-card">
                <strong>ContactFlow Inbox</strong>
                <p class="mb-0 mt-2">Manage messages, reply to customers and keep every request organized.</p>
            </div>
        </div>
    </aside>

    <main class="main">

        <header class="topbar">
            <div>
                <div class="eyebrow">WORKSPACE / OVERVIEW</div>
                <h1 class="page-title">Dashboard</h1>
            </div>

            <div class="d-flex align-items-center gap-3">
                <div class="user-pill">
                    <div class="avatar">
                        {{ strtoupper(substr(session('admin_name', 'A'), 0, 1)) }}
                    </div>
                    <div>
                        <div class="user-name">{{ session('admin_name', 'Admin') }}</div>
                        <div class="user-role">Administrator</div>
                    </div>
                </div>

                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-secondary btn-sm">
                        Logout
                    </button>
                </form>
            </div>
        </header>

        <section class="welcome-banner">
            <div>
                <div class="mb-2 small fw-semibold">YOUR WORKSPACE AT A GLANCE</div>
                <h2>Welcome back, {{ session('admin_name', 'Admin') }}! 👋</h2>
                <p>Here is an overview of your contact messages and customer requests.</p>
            </div>
            <div class="banner-icon">📬</div>
        </section>

        <div class="section-heading">
            <h3>Message Overview</h3>
            <span>Live totals from your inbox</span>
        </div>

        <section class="stats-grid">

            <article class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon icon-blue">✉</div>
                    <span class="stat-tag">ALL MESSAGES</span>
                </div>
                <div class="stat-value">{{ $totalMessages }}</div>
                <div class="stat-label">Total messages received</div>
            </article>

            <article class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon icon-orange">◷</div>
                    <span class="stat-tag">NEW</span>
                </div>
                <div class="stat-value">{{ $newMessages }}</div>
                <div class="stat-label">Messages needing attention</div>
            </article>

            <article class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon icon-green">↗</div>
                    <span class="stat-tag">REPLIED</span>
                </div>
                <div class="stat-value">{{ $repliedMessages }}</div>
                <div class="stat-label">Messages with replies</div>
            </article>

            <article class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon icon-purple">✓</div>
                    <span class="stat-tag">RESOLVED</span>
                </div>
                <div class="stat-value">{{ $resolvedMessages }}</div>
                <div class="stat-label">Requests marked resolved</div>
            </article>

            <article class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon icon-red">▣</div>
                    <span class="stat-tag">ARCHIVED</span>
                </div>
                <div class="stat-value">{{ $archivedMessages }}</div>
                <div class="stat-label">Messages moved to archive</div>
            </article>

        </section>

        <section class="bottom-grid">

            <div class="content-card">
                <div class="section-heading">
                    <h3>Quick Actions</h3>
                </div>

                <a href="{{ route('admin.messages') }}" class="action-row text-decoration-none">
                    <div class="action-icon">✉</div>
                    <div>
                        <div class="action-title">Open Messages Inbox</div>
                        <div class="action-description">View, reply to and manage customer messages.</div>
                    </div>
                    <span class="action-arrow">›</span>
                </a>

                <a href="{{ route('contact.create') }}" class="action-row text-decoration-none">
                    <div class="action-icon">↗</div>
                    <div>
                        <div class="action-title">Open Contact Form</div>
                        <div class="action-description">Preview the form visitors use to contact you.</div>
                    </div>
                    <span class="action-arrow">›</span>
                </a>
            </div>

            <div class="content-card">
                <div class="section-heading">
                    <h3>Inbox at a glance</h3>
                </div>

                <div class="action-row">
                    <div class="action-icon icon-orange">◷</div>
                    <div>
                        <div class="action-title">Needs attention</div>
                        <div class="action-description">{{ $newMessages }} new messages</div>
                    </div>
                </div>

                <div class="action-row">
                    <div class="action-icon icon-green">✓</div>
                    <div>
                        <div class="action-title">Successfully resolved</div>
                        <div class="action-description">{{ $resolvedMessages }} resolved messages</div>
                    </div>
                </div>

                <div class="mt-4 d-flex flex-wrap gap-2">
                    <a href="{{ route('admin.messages') }}" class="primary-button">
                        Go to Inbox <span>→</span>
                    </a>
                    <a href="{{ route('contact.create') }}" class="secondary-button">
                        Preview Form
                    </a>
                </div>
            </div>

        </section>
        
<!-- Recent Messages Table -->
<section class="content-card mt-4">

    <div class="section-heading">
        <div>
            <h3>Recent Messages</h3>
            <span>Latest customer enquiries received</span>
        </div>

        <a href="{{ route('admin.messages') }}" class="primary-button">
            View All Messages →
        </a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle mb-0">

            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Subject</th>
                    <th>Date Received</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($recentMessages as $message)
                    <tr>
                        <td>
                            <div class="fw-semibold">
                                {{ $message->name }}
                            </div>
                            <small class="text-muted">
                                {{ $message->email }}
                            </small>
                        </td>

                        <td>
                            {{ \Illuminate\Support\Str::limit($message->subject, 30) }}
                        </td>

                        <td>
                            {{ $message->created_at
                                ? $message->created_at->format('d M Y')
                                : 'N/A' }}
                        </td>

                        <td>
                            @php
                                $status = strtolower($message->status ?? 'new');

                                $statusClass = match ($status) {
                                    'resolved' => 'success',
                                    'replied' => 'primary',
                                    'archived' => 'secondary',
                                    default => 'warning',
                                };
                            @endphp

                            <span class="badge text-bg-{{ $statusClass }}">
                                {{ ucfirst($status) }}
                            </span>
                        </td>

                        <td>
                            <a
                                href="{{ route('admin.message.show', $message->id) }}"
                                class="secondary-button"
                            >
                                View Details
                            </a>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            No messages received yet.
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

</body>
</html>