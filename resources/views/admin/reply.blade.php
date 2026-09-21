<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reply to Message</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-success text-white">

            <h4 class="mb-0">
                Reply to Message
            </h4>

        </div>

        <div class="card-body">

            <div class="mb-4">

                <strong>From:</strong>

                {{ $message->name }}

                <br>

                <strong>Email:</strong>

                {{ $message->email }}

                <br>

                <strong>Subject:</strong>

                {{ $message->subject }}

            </div>


            <div class="alert alert-light border">

                <strong>Original Message:</strong>

                <p class="mt-2 mb-0">
                    {{ $message->message }}
                </p>

            </div>


            <form method="POST"
                  action="{{ route('admin.message.reply', $message->id) }}">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Admin Reply
                    </label>

                    <textarea
                        name="admin_reply"
                        class="form-control"
                        rows="6"
                        placeholder="Write your reply here..."
                        required
                    ></textarea>

                </div>


                @error('admin_reply')

                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>

                @enderror


                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Save Reply
                </button>


                <a
                    href="{{ route('admin.message.show', $message->id) }}"
                    class="btn btn-secondary"
                >
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>