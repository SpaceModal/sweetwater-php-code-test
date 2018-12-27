<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sweetwater Comments</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="{{ URL::asset('js/comments.js') }}"></script>

    </head>
    <body>
        <div class="position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Sweetwater Comments
                </div>

                <!-- Candy Comments -->
                <div class="comment-section">
                    <div class="subtitle">
                        Candy Comments
                    </div>
                    <div class="comment-block" id="candy-comments"></div>
                </div>

                <!-- Call Comments -->
                <div class="comment-section">
                    <div class="subtitle">
                        Call Comments
                    </div>
                    <div class="comment-block" id="call-comments"></div>
                </div>

                <!-- Referral Comments -->
                <div class="comment-section">
                    <div class="subtitle">
                        Referral Comments
                    </div>
                    <div class="comment-block" id="referral-comments"></div>
                </div>

                <!-- Signature Comments -->
                <div class="comment-section">
                    <div class="subtitle">
                        Signature Comments
                    </div>
                    <div class="comment-block" id="signature-comments"></div>
                </div>

                <!-- Miscellaneous Comments -->
                <div class="comment-section">
                    <div class="subtitle">
                        Miscellaneous Comments
                    </div>
                    <div class="comment-block" id="misc-comments"></div>
                </div>
            </div>
        </div>
    </body>
</html>
