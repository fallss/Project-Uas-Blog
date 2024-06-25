<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virus Scan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .loading {
            display: none;
            font-size: 20px;
        }
        .result {
            display: none;
            margin-top: 20px;
        }
        .result.success {
            color: green;
        }
        .result.danger {
            color: red;
        }
        .clean-button {
            display: none;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>Scan Website for Virus</h2>
    <form id="scan-form">
        <label for="url">Website URL:</label>
        <input type="text" id="url" name="url" required>
        <button type="submit">Scan</button>
    </form>
    <div class="loading">Scanning...</div>
    <div class="result"></div>
    <button class="clean-button">Clean</button>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#scan-form').on('submit', function(e) {
                e.preventDefault();

                $('.loading').show(); 

                $.ajax({
                    url: '{{ route('scan-virus') }}',
                    method: 'POST',
                    data: {
                        url: $('#url').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('.loading').hide();
                        if (response.status === 'success') {
                            $('.result').text(response.message).addClass('success').removeClass('danger').show();
                        } else {
                            $('.result').text(response.message).addClass('danger').removeClass('success').show();
                            $('.clean-button').show();
                        }
                    },
                    error: function(xhr, status, error) {
                        $('.loading').hide();
                        $('.result').text('Error: ' + error).addClass('danger').removeClass('success').show();
                    }
                });
            });

            $('.clean-button').on('click', function() {
                $('.result').text('Cleaning successfully').addClass('success').removeClass('danger').show();
                $('.clean-button').hide();
            });
        });
    </script>
</body>
</html>




