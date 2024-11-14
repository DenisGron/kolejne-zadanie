<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwiaty</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <header>
        <h1>Grupa Polskich Kwiaciarni</h1>
    </header>

    <main>
        <h2>Menu</h2>
        <ol>
                <li><a href="index.html">Strona główna</a></li>
                <li><a href="https://www.kwiaty.pl/">Rozpoznaj kwiaty</a></li>
                <li><a href="znajdz.php">Znajdź kwiaciarnię</a>
                    <ul>
                        <li>w Warszawie</li>
                        <li>w Malborku</li>
                        <li>w Poznaniu</li>
                    </ul>
                </li>
                </ol>   
    </main>

    <aside>
        <h2>Znajdź kwiaciarnie</h2>
        <form action="znajdz.php" method="post">
            Podaj nazwe miasta: <input type="text" name="sprawdz" id="sprawdz">
            <input type="submit" value="SPRAWDŹ">
        <?php
        $polaczenie = mysqli_connect('localhost', 'root', '', 'kwiaciarnia');
        if (isset($_POST['sprawdz'])) {
            $sprawdz = $_POST['sprawdz'];
            $sql = "SELECT `nazwa`, `ulica` FROM kwiaciarnie WHERE miasto = '$sprawdz';";
            $wynik = mysqli_query($polaczenie, $sql);
                while ($wiersz = mysqli_fetch_assoc($wynik)) {
                    echo "<h3>".$wiersz['nazwa'].", " .$wiersz['ulica']."</h3>";
                }
                mysqli_close($polaczenie);
        }
        ?>
    </aside>

    <footer>
        <p>Strone opracował: Denis Groń</p>
    </footer>
</body>
</html>