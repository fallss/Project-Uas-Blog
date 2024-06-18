<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DJONG BLOG MAKER</title>
    <style>
        .article {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .add-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .add-button:hover {
            background-color: #218838;
        }
        .note-box {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .submit-button {
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .submit-button:hover {
            background-color: #0056b3;
        }
        .success-message {
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            font-size: 16px;
            display: none;
        }
        .logout-button{
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 10px 15px;
            background-color: #dc3545;
            color:white;
            border: none;
            border-radius: 5px;
            font-size:16px;
            cursor: pointer;
        }
        .logout-button:hover{
            background-color: #c82333;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <a><img src="LOGO.jpg" alt="Logo"></a>
    <h1>Welcome to Djong Blog Digital</h1>
    <div id="articleContainer">
        <div class="article">
            <h2>Blog</h2>
            <p>Teknologi ini merupakan hasil karya itu sendiri. Tidak di pungkiri bahwa teknologi menyertai dunia Blog. Salah satunya adalah handphone yang semakin digemari oleh
                masyarakat dunia. Handphone memiliki kelas kelas nya yaitu kelas low end, mid-range, dan flagship. low end merupakan hp kelas rendah yang memilki budget di bawah 3 juta,
                mid-range adalah hp kelas menengah yang memilki budget sekitar 4 sampai dengan 10 juta. Sekarang kita akan menjelaskan ciri ciri dari hp flagship, midrange, dan juga low end. Ciri ciri hp low end adalah sebagai berikut :
                a. memiliki budget dibawah 3 juta
                b. Biasanya masih memakai processor snapdragon seri 400 kebawah atau setaranya.
                c. Tidak cocok untuk bermain game
            </p>
        </div>
        <form id="logoutForm" action='/logout' method="POST">
            @csrf
            <button type="submit" class="logout-button">Logout</button>
        </form>
        <a href="#" id="addButton" class="add-button">+</a>
        <div id="noteContainer"></div>
    </div>

    <script>
        $(document).ready(function() {
            $('#addButton').click(function(event) {
                event.preventDefault();
                var noteContainer = $('#noteContainer');
                var noteBox = $('<div>').addClass('note-box');
                noteBox.append(`
                    <form class="noteForm">
                        <div>
                            <label for="title">Title:</label>
                            <input type="text" class="title" name="title" required>
                        </div>
                        <div>
                            <label for="content">Content:</label>
                            <textarea class="content" name="content" rows="4" cols="50" placeholder="Create new note in here..." required></textarea>
                        </div>
                        <button type="submit" class="submit-button">POST</button>
                    </form>
                `);
                noteContainer.append(noteBox);
            });

            $(document).on('submit', '.noteForm', function(event) {
                event.preventDefault();
                var form = $(this);
                var title = form.find('.title').val();
                var content = form.find('.content').val();

                var noteDisplay = $('<div>').addClass('note-display');
                noteDisplay.append('<h3>' + title + '</h3>');
                noteDisplay.append('<p>' + content + '</p>');

                form.replaceWith(noteDisplay);
            });
        });
    </script>
</body>
</html>

