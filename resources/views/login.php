<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="bg-img">
        <div class="flex">
            <div>
                <h1 class="text">Daftar</h1>
                <h4 class="text2">Nama Lengkap</h4>
                <input class="flex2" type="text" name="nama" id="nama" placeholder="Nama Lengkap" >
                <div class="flex4">
                    <h4 class="text3">Tempat,Tanggal lahir</h4>
                    <h4 class="text4">Jenis Kelamin</h4>
                </div>
                <div class="flex4">
                    <input class="flex3" type="text" name="ttg" id="ttg" placeholder="Tempat,Tanggal lahir">
                    <input class="radio1" type="radio" name="laki" id="laki" value="LAKI">
                    <label for="laki">Pria</label>
                    <input class="radio1" type="radio" name="Perempuan" id="Perempuan" value="PEREMPUAN">
                    <label for="perempuan">Perempuan</label>
                </div>
            </div>
            <h4 class="text5">Agama</h4>
            <input class="flex3" type="text" name="agama" id="agama" placeholder="Agama">
            <h4 class="text5">Alamat</h4>
            <input class="flex5" type="text" name="alamat" id="alamat" placeholder="Alamat">
            <button class= "button" type="button" >
                <p class="s">Daftar</p>
            </button>
        </div>
    </div>
</body>
</html>