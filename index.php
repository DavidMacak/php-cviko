<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Macák</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="menu">
            <ul>
                <li><a class="selected" href="index.php">Seznam knih</a></li>
                <li><a href="pridat.php">Přidat knihu</a></li>
                <li><a href="vyhledat.php">Vyhledat knihu</a></li>
            </ul>
        </div>

        <div class="wrapper">
            <h2>Seznam knih:</h2>

            <?php
            include 'dbLogin.php'; // Zahrnutí souboru s připojením k databázi
            
            // Dotaz na získání všech knih z databáze
            $sql = "SELECT * FROM knihy";
            $result = mysqli_query($conn, $sql);

            // Zobrazení výsledků
            if (mysqli_num_rows($result) > 0) {
                echo '<div class="searched">';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<strong>Název knihy:</strong> " . $row['book_name'] . "<br>";
                    echo "<p><strong>ISBN:</strong> " . $row['isbn'] . "<br>";
                    echo "<strong>Jméno autora:</strong> " . $row['author_firstname'] . " " . $row['author_lastname'] . "<br>";
                    echo "<strong>Popis:</strong> " . $row['description'] . "</p>";
                    echo "<hr>";
                }
                echo '</div>';
            } else {
                echo "<p>Žádné knihy nebyly nalezeny.</p>";
            }
            ?>
        </div>

        <div class="wrapper">
            <a href="http://davak.cz">DAVAK.CZ</a>
        </div>
    </div>
</body>

</html>