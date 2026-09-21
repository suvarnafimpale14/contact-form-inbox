<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Us</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Contact Us</h3>
                </div>

                <div class="card-body">

                    {{-- Success Message --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif


                    {{-- Validation Errors --}}
                    @if($errors->any())
                        <div class="alert alert-danger">

                            <strong>Please fix the following errors:</strong>

                            <ul class="mb-0 mt-2">

                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                            </ul>

                        </div>
                    @endif


                    <form method="POST" action="{{ route('contact.store') }}">

                        @csrf

                        {{-- Name --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name') }}"
                                placeholder="Enter your name"
                                required
                            >

                        </div>


                        {{-- Email --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email') }}"
                                placeholder="Enter your email"
                                required
                            >

                        </div>


                        {{-- Phone --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Phone
                            </label>

                            <input
                                type="text"
                                name="phone"
                                class="form-control"
                                value="{{ old('phone') }}"
                                placeholder="Enter your phone number"
                            >

                        </div>


                        {{-- Subject --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Subject
                            </label>

                            <input
                                type="text"
                                name="subject"
                                class="form-control"
                                value="{{ old('subject') }}"
                                placeholder="Enter subject"
                                required
                            >

                        </div>


                        {{-- Message --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Message
                            </label>

                            <textarea
                                name="message"
                                class="form-control"
                                rows="5"
                                placeholder="Write your message"
                                required
                            >{{ old('message') }}</textarea>

                        </div>


                        {{-- Submit --}}
                        <button
                            type="submit"
                            class="btn btn-primary w-100"
                        >
                            Send Message
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>