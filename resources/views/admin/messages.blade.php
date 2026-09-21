<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Message Inbox - Contact Form Inbox</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
            Contact Form Inbox
        </a>

        <div class="d-flex align-items-center">

            <span class="text-white me-3">
                Welcome, {{ session('admin_name') }}
            </span>

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf

                <button type="submit" class="btn btn-danger btn-sm">
                    Logout
                </button>
            </form>

        </div>

    </div>
</nav>


<!-- Main Content -->
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2>Message Inbox</h2>
            <p class="text-muted">
                Manage all contact form submissions
            </p>
        </div>

        <a href="{{ route('admin.dashboard') }}"
           class="btn btn-secondary">
            Dashboard
        </a>

    </div>


    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <!-- Search and Filter -->
    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <form method="GET"
                  action="{{ route('admin.messages') }}">

                <div class="row g-3">

                    <!-- Search -->
                    <div class="col-md-6">

                        <label class="form-label">
                            Search
                        </label>

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Search name, email or subject..."
                            value="{{ request('search') }}"
                        >

                    </div>


                    <!-- Status -->
                    <div class="col-md-4">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status" class="form-select">

                            <option value="">
                                All Messages
                            </option>

                            <option value="new"
                                {{ request('status') == 'new' ? 'selected' : '' }}>
                                New
                            </option>

                            <option value="replied"
                                {{ request('status') == 'replied' ? 'selected' : '' }}>
                                Replied
                            </option>

                            <option value="resolved"
                                {{ request('status') == 'resolved' ? 'selected' : '' }}>
                                Resolved
                            </option>

                            <option value="archived"
                                {{ request('status') == 'archived' ? 'selected' : '' }}>
                                Archived
                            </option>

                        </select>

                    </div>


                    <!-- Search Button -->
                    <div class="col-md-2 d-flex align-items-end">

                        <button type="submit"
                                class="btn btn-primary w-100">
                            Search
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    <!-- Messages Table -->
    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                    @forelse($messages as $message)

                        <tr>

                            <td>
                                {{ $message->id }}
                            </td>

                            <td>
                                <strong>
                                    {{ $message->name }}
                                </strong>
                            </td>

                            <td>
                                {{ $message->email }}
                            </td>

                            <td>
                                {{ $message->subject }}
                            </td>

                            <td>
                                {{ $message->created_at->format('d M Y') }}
                            </td>

                            <td>

                                @if($message->status == 'new')

                                    <span class="badge bg-primary">
                                        New
                                    </span>

                                @elseif($message->status == 'replied')

                                    <span class="badge bg-success">
                                        Replied
                                    </span>

                                @elseif($message->status == 'resolved')

                                    <span class="badge bg-secondary">
                                        Resolved
                                    </span>

                                @elseif($message->status == 'archived')

                                    <span class="badge bg-warning text-dark">
                                        Archived
                                    </span>

                                @endif

                            </td>

                            <td>

                                <a href="{{ route('admin.message.show', $message->id) }}"
                                   class="btn btn-sm btn-primary">
                                    View
                                </a>


                                <form
                                    action="{{ route('admin.message.delete', $message->id) }}"
                                    method="POST"
                                    class="d-inline"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this message?')"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7"
                                class="text-center py-4">

                                <h5>No messages found</h5>

                                <p class="text-muted">
                                    There are no contact messages matching your search.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>
</html>