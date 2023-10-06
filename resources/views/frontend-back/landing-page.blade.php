<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ settings('app_name') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/css/all.min.css" integrity="sha512-3PN6gfRNZEX4YFyz+sIyTF6pGlQiryJu9NlGhu9LrLMQ7eDjNgudQoFDK3WSNAayeIKc6B8WXXpo4a7HqxjKwg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            color: #fff;
        }

        .bg {
            background-image: linear-gradient(120deg, #155799, #159957);
            height: 100vh;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .mohrain-btn {
            padding: 10px;
            font-size: 20px;
            display: inline-block;
            margin-bottom: 1rem;
            color: rgba(255, 255, 255, 0.7);
            background-color: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.2);
            border-style: solid;
            border-width: 1px;
            border-radius: 0.25rem;
            transition: color 0.2s, background-color 0.2s, border-color 0.2s;
        }

        .mohrain-btn:hover {
            background-color: #155799;
            border-color: #155799;
            color: inherit;
        }

    </style>
     @laravelPWA
</head>
<body>
    <div class="bg">
        <div class="container py-2">
            <!-- Contact Section -->
            <div class="d-flex justify-content-end mt-4">
                <div class="d-none d-sm-block font-lato-sans pl-5">
                    <h3 class="h3-responsive text-white ">Contact</h3>
                    <label class="text-white"><i class="fa fa-phone-square mr-2"></i>
                        {{ settings('municipality_phone') }} </label>
                    <br>
                    <label class="text-white"><i class="fas fa-envelope-square mr-2"></i>
                        {{ settings('municipality_email') }} </label>
                    <br>
                    <label class="text-white"><i class="fas fa-globe mr-2"></i>
                        {{ settings('municipality_website') }} </label>
                </div>
            </div>
            <!-- End Contact Section -->

            <!-- Logo and Brand Details -->
            <div class="d-flex justify-content-center brand-detail margin-zero">
                <div class="logo">
                    <a class="mr-2" href="/">
                        <img src="/assets/img/nep-gov-logo-sm.png" alt="Nepal Government" style="height: 100px;">
                    </a>
                </div>
            </div>
            <!-- End Logo and Brand Details -->

            <div class="brand mb-4 font-noto-sans">
                <h1 class="text-center text-white mt-2 ">{{ settings('municipality_name') }}</h1>
                <p class="text-center text-white">{{ settings('municipality_tagline') }}<br> {{ settings('municipality_address_line_one') }} </p>
            </div>

            <!-- Operation List -->
            <div class="d-flex flex-column flex-sm-row text-center justify-content-center action-list mb-1">
                <a href="/apply" class="mohrain-btn mr-2" style="text-decoration: none;">नयाँ सूची दर्ता</a>
                <a href="/token-search" class="mohrain-btn mr-2" style="text-decoration: none;">टोकन नम्बर खोजी</a>
                <a href="/login" class="mohrain-btn mr-2" style="text-decoration: none;">कर्मचारी लगइन</a>
            </div>
        </div>
    </div>
</body>
</html>
