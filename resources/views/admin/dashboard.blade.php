<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard - Contact Form Inbox</title>

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


    <!-- Dashboard -->
    <div class="container py-5">

        <h2 class="mb-4">
            Admin Dashboard
        </h2>

        <!-- Statistics -->
        <div class="row g-4">

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5>Total Messages</h5>
                        <h2>{{ $totalMessages }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5>New Messages</h5>
                        <h2>{{ $newMessages }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5>Replied Messages</h5>
                        <h2>{{ $repliedMessages }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5>Resolved Messages</h5>
                        <h2>{{ $resolvedMessages }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5>Archived Messages</h5>
                        <h2>{{ $archivedMessages }}</h2>
                    </div>
                </div>
            </div>

        </div>


        <!-- Quick Links -->
        <div class="mt-5">

            <a href="{{ route('admin.messages') }}"
               class="btn btn-primary me-2">
                View Inbox
            </a>

            <a href="{{ route('contact.create') }}"
               class="btn btn-secondary">
                Open Contact Form
            </a>

        </div>

    </div>

</body>
</html>