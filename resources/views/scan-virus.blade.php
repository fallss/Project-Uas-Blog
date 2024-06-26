<!DOCTYPE html>
<html>
<head>
    <title>Antivirus Scanning</title>
    <style>
        body {
            background-image: url('images/defender.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
        }

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

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }
        #cleanButton {
            display: none;
        }

        article {
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
            position: relative;
            top: 50px;
        }
        #scanResult{
            font-size:50px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#scanButton').click(function() {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('scan-virus') }}',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    beforeSend: function() {
                        $('#scanResult').text('');
                        $('.overlay').show();
                        $('.loader').show();
                    },
                    success: function(response) {
                        $('.loader').hide();
                        $('.overlay').hide();
                        $('#scanResult').text(response.message);

                        if(response.message === 'virus detected'){
                            $('#cleanButton').show();
                        }
                    },
                    error: function(xhr, status, error) {
                        $('.loader').hide();
                        $('.overlay').hide();
                        $('#scanResult').text('Error scanning: ' + error);
                    }
                });
            });
            $('#cleanButton').click(function() {
                alert('Cleaning...');
            });
        });
    </script>
</head>
<body>
    <div class="overlay">
        <div class="loader"></div>
    </div>

    <article>
        <h1>Scan Virus</h1>
        <form id="scanForm" method="POST" action="{{ route('scan-virus') }}">
            @csrf
            <button type="submit" id="scanButton">Start Scan</button>
        </form>
        <div id="scanResult"></div>
    </article>
</body>
</html>
