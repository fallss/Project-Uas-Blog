<!DOCTYPE html>
<html>
<head>
    <title>Decyption Data As Protection From Cyber</title>
</head>
<body>
    <h1>Decryption Form</h1>
    <form method="POST" action="{{ route('decrypt') }}">
        @crsf
        <label for="encrypted_data">Encrypted Data:</label><br>
        <input type="text" id="encrypted_data" name="encrypted_data" required><br><br>
        <button type="submit">Decrypt</button>
    </form>
  </body>
</html>
