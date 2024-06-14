<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="Viewport" content="width=device-width, initial-scale=1.0">
     <title>Articles</title>
    <style>
        .article{
            margin-buttom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .add-button{
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #28a745;
            color:white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .add-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Welcome to Blog Digital</h1>
    <div class="article">
        <h2>Blog</h2>
        <p>Teknologi ini merupakan hasil karya itu sendiri. Tidak di pungkiri bahwa teknologi menyertai dunia Blog. Salah satunya adalah handphone yang semakin digemari oleh
            masyarakat dunia. Handphone memiliki kelas kelas nya yaitu kelas low end, mid-range, dan flagship. low end merupakan hp kelas rendah yang memilki budget di bawah 3 juta,
            mid-range adalah hp kelas menengah yang memilki budget sekitar 4 samapi dengan 10 juta.Sekarang kita akan menjelaskan ciri ciri dari hp flagship, midrange, dan juga low end. Ciri ciri hp low end adalah sebagai berikut :
            a. memiliki budget dibawah 3 juta
            b. Biasanya masih memakai processor snapdragon seri 400 kebawah atau setaranya.
            c. Tidak cocok untuk bermain game
        </p>
    </div>
    <a href="#" class="add-button">+</a>
    <div id="noteContainer"></div>

    <script>
        document.getElementById('addButton').addEventListener('click', function() {
            var noteContainer = document.getElementById('noteContainer');
            var noteBox = document.createElement('div');
            noteBox.classList.add('note-box');
            noteBox.innerHTML = '<textarea rows="4" cols="50" placeholder="Enter your note here..."></textarea>';
            noteContainer.appendChild(noteBox);
        });
    </script>
</body>
</html>
