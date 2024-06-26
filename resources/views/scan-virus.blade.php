<!DOCTYPE html>
<html>
<head>
    <title>Antivirus Scanning</title>
    <style>
        .loader {
            border: 16px solid #f3f3f3;
            border-top: 16px solid #3498db;
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left: -60px;
            margin-top: -60px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* CSS untuk overlay */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999; }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#scanButton').click(function() {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('scan') }}',
                    beforeSend: function() {
                        $('#scanResult').text('');
                        $('.overlay').show();
                        $('#loader').show();
                    },
                    success: function(response) {
                        $('#loader').hide();
                        $('.overlay').hide();
                        $('#scanResult').text(response.message);
                    },
                    error: function(xhr, status, error) {
                        $('#loader').hide();
                        $('.overlay').hide();
                        $('#scanResult').text('Error scanning: ' + error);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <div class="overlay">
        <div id="loader" class="loader"></div>
    </div>

    <article>
        <h1>BLOG</h1>
        <p>Konten artikel...</p>
        <button id="scanButton">Start Scan</button>
        <div id="scanResult"></div>
    </article>
</body>
</html>
