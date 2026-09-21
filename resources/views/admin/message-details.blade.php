<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Message Details</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Message Details</h2>

        <a href="{{ route('admin.messages') }}"
           class="btn btn-secondary">
            ← Back to Inbox
        </a>

    </div>


    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                {{ $message->subject }}
            </h4>

        </div>


        <div class="card-body">

            <div class="row mb-3">

                <div class="col-md-6">

                    <strong>Name:</strong>

                    <p>
                        {{ $message->name }}
                    </p>

                </div>


                <div class="col-md-6">

                    <strong>Email:</strong>

                    <p>
                        {{ $message->email }}
                    </p>

                </div>

            </div>


            <div class="row mb-3">

                <div class="col-md-6">

                    <strong>Phone:</strong>

                    <p>
                        {{ $message->phone ?? 'Not provided' }}
                    </p>

                </div>


                <div class="col-md-6">

                    <strong>Status:</strong>

                    <p>

                        @if($message->status == 'new')

                            <span class="badge bg-danger">
                                NEW
                            </span>

                        @elseif($message->status == 'replied')

                            <span class="badge bg-success">
                                REPLIED
                            </span>

                        @elseif($message->status == 'resolved')

                            <span class="badge bg-primary">
                                RESOLVED
                            </span>

                        @else

                            <span class="badge bg-secondary">
                                {{ strtoupper($message->status) }}
                            </span>

                        @endif

                    </p>

                </div>

            </div>


            <hr>


            <h5>Message</h5>

            <div class="alert alert-light border">

                {{ $message->message }}

            </div>


            <p class="text-muted">

                Received:
                {{ $message->created_at->format('d-m-Y H:i') }}

            </p>


            @if($message->admin_reply)

                <hr>

                <h5>Admin Reply</h5>

                <div class="alert alert-success">

                    {{ $message->admin_reply }}

                </div>

            @endif


            <hr>


            <div class="d-flex gap-2">

                <a
    href="{{ route('admin.message.reply.form', $message->id) }}"
    class="btn btn-success"
>
    Reply
</a>

                <form
    method="POST"
    action="{{ route('admin.message.resolve', $message->id) }}"
    style="display:inline;"
>
    @csrf

    <button type="submit" class="btn btn-primary">
        Resolve
    </button>
</form>

                <form
    method="POST"
    action="{{ route('admin.message.archive', $message->id) }}"
    style="display:inline;"
>
    @csrf

    <button type="submit" class="btn btn-warning">
        Archive
    </button>
</form>

            </div>

        </div>

    </div>

</div>

</body>

</html>