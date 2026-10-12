
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reply to Message | ContactFlow</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f5f7fb;
            color: #1e293b;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #172033;
            color: white;
            padding: 25px 16px;
        }

        .brand {
            font-size: 23px;
            font-weight: 700;
            margin: 0 0 35px 10px;
        }

        .brand i {
            color: #60a5fa;
            margin-right: 8px;
        }

        .nav-label {
            color: #94a3b8;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin: 25px 10px 12px;
        }

        .sidebar a {
            display: block;
            color: #cbd5e1;
            text-decoration: none;
            padding: 12px 14px;
            border-radius: 8px;
            margin-bottom: 7px;
            transition: 0.2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #293750;
            color: white;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        .main-content {
            margin-left: 250px;
            padding: 35px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 27px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .muted {
            color: #64748b;
            font-size: 14px;
        }

        .admin-profile {
            background: white;
            border: 1px solid #e2e8f0;
            padding: 10px 15px;
            border-radius: 10px;
            font-size: 14px;
        }

        .content-card {
            background: white;
            border: 1px solid #e5eaf2;
            border-radius: 14px;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.04);
            margin-bottom: 22px;
            overflow: hidden;
        }

        .card-heading {
            padding: 20px 24px;
            border-bottom: 1px solid #edf0f5;
        }

        .card-heading h5 {
            margin: 0;
            font-size: 17px;
            font-weight: 700;
        }

        .card-body-custom {
            padding: 24px;
        }

        .sender-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #e0eaff;
            color: #315bd6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .sender-name {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .detail-label {
            color: #64748b;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .detail-value {
            font-weight: 600;
            overflow-wrap: anywhere;
        }

        .original-message {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 20px;
            line-height: 1.8;
            overflow-wrap: anywhere;
            white-space: pre-wrap;
        }

        .form-label {
            font-weight: 700;
            margin-bottom: 10px;
        }

        .form-control {
            border: 1px solid #dbe2ec;
            border-radius: 9px;
            padding: 13px 14px;
        }

        .form-control:focus {
            border-color: #4f7cff;
            box-shadow: 0 0 0 3px rgba(79, 124, 255, 0.12);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 180px;
        }

        .btn-primary-custom {
            background: #315bd6;
            border: none;
            color: white;
            border-radius: 8px;
            padding: 11px 18px;
            font-weight: 600;
        }

        .btn-primary-custom:hover {
            background: #2449b7;
            color: white;
        }

        .btn-light-custom {
            background: white;
            border: 1px solid #dbe2ec;
            color: #334155;
            border-radius: 8px;
            padding: 11px 18px;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-light-custom:hover {
            background: #f1f5f9;
            color: #1e293b;
        }

        .error-message {
            color: #dc2626;
            font-size: 13px;
            margin-top: 7px;
        }

        .reply-tip {
            color: #64748b;
            font-size: 13px;
            margin-top: 10px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding: 15px;
            }

            .brand {
                margin-bottom: 15px;
            }

            .nav-label {
                display: none;
            }

            .sidebar a {
                display: inline-block;
                margin-bottom: 0;
                padding: 9px;
            }

            .main-content {
                margin-left: 0;
                padding: 20px 14px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .page-title {
                font-size: 23px;
            }

            .card-body-custom {
                padding: 18px;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <div class="brand">
            <i class="bi bi-chat-square-text-fill"></i>
            ContactFlow
        </div>

        <div class="nav-label">Workspace</div>

        <a href="{{ route('admin.dashboard') }}">
            <i class="bi bi-grid"></i> Dashboard
        </a>

        <a href="{{ route('admin.messages') }}" class="active">
            <i class="bi bi-envelope"></i> Messages
        </a>

        <div class="nav-label">Other</div>

        <a href="{{ route('contact.create') }}">
            <i class="bi bi-box-arrow-up-right"></i> Contact Page
        </a>

        <a href="{{ route('admin.logout') }}">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </aside>

    <main class="main-content">

        <div class="topbar">
            <div>
                <div class="page-title">Reply to Message</div>
                <div class="muted">
                    Review the customer's message and write your response.
                </div>
            </div>

            <div class="admin-profile">
                <i class="bi bi-person-circle me-2"></i>
                {{ session('admin_name', 'Administrator') }}
            </div>
        </div>

        <div class="mb-4">
            <a
                href="{{ route('admin.message.show', $message->id) }}"
                class="btn-light-custom d-inline-block"
            >
                <i class="bi bi-arrow-left me-2"></i>
                Back to Message
            </a>
        </div>

        <!-- Sender Details -->
        <section class="content-card">

            <div class="card-heading">
                <h5>
                    <i class="bi bi-person-lines-fill me-2 text-primary"></i>
                    Sender Information
                </h5>
            </div>

            <div class="card-body-custom">

                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="sender-icon">
                        <i class="bi bi-person"></i>
                    </div>

                    <div>
                        <div class="sender-name">{{ $message->name }}</div>
                        <div class="muted">Customer message</div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="detail-label">EMAIL ADDRESS</div>
                        <div class="detail-value">
                            <i class="bi bi-envelope me-2 text-primary"></i>
                            {{ $message->email }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="detail-label">SUBJECT</div>
                        <div class="detail-value">
                            <i class="bi bi-chat-left-text me-2 text-primary"></i>
                            {{ $message->subject }}
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Original Message -->
        <section class="content-card">

            <div class="card-heading">
                <h5>
                    <i class="bi bi-envelope-open me-2 text-primary"></i>
                    Original Message
                </h5>
            </div>

            <div class="card-body-custom">
                <div class="original-message">{{ $message->message }}</div>
            </div>

        </section>

        <!-- Reply Form -->
        <section class="content-card">

            <div class="card-heading">
                <h5>
                    <i class="bi bi-reply-fill me-2 text-primary"></i>
                    Write Your Reply
                </h5>
                <div class="muted mt-2">
                    Prepare a clear and helpful response for the sender.
                </div>
            </div>

            <div class="card-body-custom">

                @if ($errors->has('admin_reply'))
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-circle me-2"></i>
                        {{ $errors->first('admin_reply') }}
                    </div>
                @endif

                <form
                    method="POST"
                    action="{{ route('admin.message.reply', $message->id) }}"
                >
                    @csrf

                    <div class="mb-4">
                        <label for="admin_reply" class="form-label">
                            Admin Reply <span class="text-danger">*</span>
                        </label>

                        <textarea
                            id="admin_reply"
                            name="admin_reply"
                            class="form-control @error('admin_reply') is-invalid @enderror"
                            rows="7"
                            placeholder="Hello {{ $message->name }},&#10;&#10;Thank you for contacting us.&#10;&#10;Write your response here..."
                            required
                        >{{ old('admin_reply', $message->admin_reply ?? '') }}</textarea>

                        <div class="reply-tip">
                            <i class="bi bi-info-circle me-1"></i>
                            Please review your reply before saving.
                        </div>

                        @error('admin_reply')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex flex-wrap gap-3">
                        <button type="submit" class="btn-primary-custom">
                            <i class="bi bi-send me-2"></i>
                            Save Reply
                        </button>

                        <a
                            href="{{ route('admin.message.show', $message->id) }}"
                            class="btn-light-custom"
                        >
                            Cancel
                        </a>
                    </div>

                </form>

            </div>
        </section>

        <div class="text-center muted mt-4 mb-3">
            ContactFlow Admin Panel
        </div>

    </main>

</body>
</html>