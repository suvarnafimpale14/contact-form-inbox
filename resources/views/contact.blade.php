
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Us | ContactFlow</title>

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
            min-height: 100vh;
            background: #f4f7fc;
            color: #172033;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        .navbar-custom {
            background: #fff;
            border-bottom: 1px solid #e8edf5;
            padding: 17px 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #172554;
            font-size: 21px;
            font-weight: 800;
            text-decoration: none;
        }

        .brand-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: #4361ee;
            color: white;
            font-size: 21px;
        }

        .nav-note {
            color: #64748b;
            font-size: 13px;
        }

        .page-wrapper {
            max-width: 1050px;
            margin: 45px auto;
            padding: 0 20px;
        }

        .contact-layout {
            display: grid;
            grid-template-columns: 0.85fr 1.15fr;
            overflow: hidden;
            background: white;
            border: 1px solid #e5eaf3;
            border-radius: 22px;
            box-shadow: 0 15px 45px rgba(30, 50, 90, 0.08);
        }

        .info-panel {
            position: relative;
            overflow: hidden;
            padding: 45px 35px;
            background: linear-gradient(145deg, #304fe5, #6579f5);
            color: white;
        }

        .info-panel::after {
            content: "";
            position: absolute;
            width: 230px;
            height: 230px;
            right: -100px;
            bottom: -75px;
            border: 35px solid rgba(255, 255, 255, 0.12);
            border-radius: 50%;
        }

        .info-panel h1 {
            position: relative;
            z-index: 1;
            margin: 18px 0 14px;
            font-size: 34px;
            font-weight: 800;
            line-height: 1.2;
        }

        .info-panel > p {
            position: relative;
            z-index: 1;
            color: #e5eaff;
            font-size: 14px;
            line-height: 1.8;
        }

        .info-symbol {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 58px;
            height: 58px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 17px;
            background: rgba(255, 255, 255, 0.15);
            font-size: 27px;
        }

        .info-feature {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: flex-start;
            gap: 13px;
            margin-top: 30px;
        }

        .feature-icon {
            font-size: 19px;
            color: #dce4ff;
        }

        .feature-title {
            margin-bottom: 4px;
            font-size: 14px;
            font-weight: 700;
        }

        .feature-text {
            color: #e0e7ff;
            font-size: 12px;
            line-height: 1.6;
        }

        .form-panel {
            padding: 40px;
        }

        .form-heading {
            margin-bottom: 7px;
            font-size: 25px;
            font-weight: 800;
        }

        .form-subheading {
            margin-bottom: 25px;
            color: #718096;
            font-size: 13px;
            line-height: 1.7;
        }

        .form-label {
            margin-bottom: 8px;
            color: #334155;
            font-size: 13px;
            font-weight: 700;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap > i {
            position: absolute;
            top: 14px;
            left: 14px;
            color: #8a97ab;
            pointer-events: none;
        }

        .form-control {
            min-height: 45px;
            padding: 11px 13px;
            border: 1px solid #dfe5ef;
            border-radius: 9px;
            background: #fff;
            font-size: 13px;
        }

        .input-wrap .form-control {
            padding-left: 40px;
        }

        textarea.form-control {
            min-height: 125px;
            resize: vertical;
        }

        .form-control:focus {
            border-color: #4361ee;
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.12);
        }

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .submit-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            min-height: 48px;
            margin-top: 8px;
            border: 0;
            border-radius: 10px;
            background: #4361ee;
            color: white;
            font-size: 14px;
            font-weight: 700;
            transition: background 0.2s, transform 0.2s;
        }

        .submit-btn:hover {
            background: #304fe5;
            transform: translateY(-1px);
        }

        .required-mark {
            color: #dc3545;
        }

        .footer-note {
            margin-top: 22px;
            color: #8a97ab;
            font-size: 11px;
            text-align: center;
        }

        @media (max-width: 768px) {
            .page-wrapper {
                margin: 25px auto;
                padding: 0 13px;
            }

            .contact-layout {
                grid-template-columns: 1fr;
                border-radius: 16px;
            }

            .info-panel {
                padding: 30px 25px;
            }

            .info-panel h1 {
                font-size: 28px;
            }

            .info-feature {
                margin-top: 20px;
            }

            .form-panel {
                padding: 27px 22px;
            }

            .form-heading {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar-custom">
        <div class="container d-flex justify-content-between align-items-center gap-3">

            <a href="{{ route('contact.create') }}" class="brand">
                <span class="brand-icon">
                    <i class="bi bi-envelope-paper-fill"></i>
                </span>
                ContactFlow
            </a>

            <span class="nav-note d-none d-sm-inline">
                <i class="bi bi-shield-check me-1"></i>
                We'd love to hear from you
            </span>

        </div>
    </nav>

    <main class="page-wrapper">

        <div class="contact-layout">

            <!-- Left Information Panel -->
            <section class="info-panel">

                <div class="info-symbol">
                    <i class="bi bi-chat-dots"></i>
                </div>

                <h1>Let's start a conversation.</h1>

                <p>
                    Have a question, suggestion, or need help?
                    Send us a message and our team will review your request.
                </p>

                <div class="info-feature">
                    <i class="bi bi-send-check feature-icon"></i>
                    <div>
                        <div class="feature-title">Easy Communication</div>
                        <div class="feature-text">
                            Share your questions and details using the form.
                        </div>
                    </div>
                </div>

                <div class="info-feature">
                    <i class="bi bi-chat-square-text feature-icon"></i>
                    <div>
                        <div class="feature-title">Personalized Response</div>
                        <div class="feature-text">
                            Our team can review your message and respond to you.
                        </div>
                    </div>
                </div>

                <div class="info-feature">
                    <i class="bi bi-lock feature-icon"></i>
                    <div>
                        <div class="feature-title">Your Message Matters</div>
                        <div class="feature-text">
                            Please provide accurate contact details so we can reach you.
                        </div>
                    </div>
                </div>

            </section>

            <!-- Contact Form -->
            <section class="form-panel">

                <h2 class="form-heading">Contact Us</h2>

                <p class="form-subheading">
                    Fill in the details below. Fields marked with
                    <span class="required-mark">*</span> are required.
                </p>

                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
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

                    <div class="mb-3">
                        <label for="name" class="form-label">
                            Full Name <span class="required-mark">*</span>
                        </label>

                        <div class="input-wrap">
                            <i class="bi bi-person"></i>
                            <input
                                id="name"
                                type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}"
                                placeholder="Enter your full name"
                                autocomplete="name"
                                required
                            >
                        </div>

                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">
                            Email Address <span class="required-mark">*</span>
                        </label>

                        <div class="input-wrap">
                            <i class="bi bi-envelope"></i>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}"
                                placeholder="you@example.com"
                                autocomplete="email"
                                required
                            >
                        </div>

                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>

                        <div class="input-wrap">
                            <i class="bi bi-telephone"></i>
                            <input
                                id="phone"
                                type="tel"
                                name="phone"
                                class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone') }}"
                                placeholder="Enter your phone number"
                                autocomplete="tel"
                            >
                        </div>

                        @error('phone')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="subject" class="form-label">
                            Subject <span class="required-mark">*</span>
                        </label>

                        <div class="input-wrap">
                            <i class="bi bi-chat-left-text"></i>
                            <input
                                id="subject"
                                type="text"
                                name="subject"
                                class="form-control @error('subject') is-invalid @enderror"
                                value="{{ old('subject') }}"
                                placeholder="What is your message about?"
                                required
                            >
                        </div>

                        @error('subject')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">
                            Your Message <span class="required-mark">*</span>
                        </label>

                        <textarea
                            id="message"
                            name="message"
                            class="form-control @error('message') is-invalid @enderror"
                            rows="5"
                            placeholder="Tell us how we can help..."
                            required
                        >{{ old('message') }}</textarea>

                        @error('message')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="submit-btn">
                        <i class="bi bi-send-fill"></i>
                        Send Message
                    </button>

                </form>

                <div class="footer-note">
                    ContactFlow · Customer Contact Portal
                </div>

            </section>

        </div>

    </main>

</body>
</html>