<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reply to your message</title>
</head>

<body>

    <h2>Hello {{ $message->name }},</h2>

    <p>
        Thank you for contacting us.
    </p>

    <p>
        We have received your message regarding:
        <strong>{{ $message->subject }}</strong>
    </p>

    <hr>

    <h3>Admin Reply:</h3>

    <p>
        {!! nl2br(e($message->admin_reply)) !!}
    </p>

    <hr>

    <p>
        Regards,<br>
        <strong>Contact Form Inbox Admin</strong>
    </p>

</body>
</html>