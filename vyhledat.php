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
                <li><a href="index.php">Seznam knih</a></li>
                <li><a href="pridat.php">Přidat knihu</a></li>
                <li><a class="selected" href="vyhledat.php">Vyhledat knihu</a></li>
            </ul>
        </div>

        <div class="wrapper">
            <h2>Vyhledat knihy</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
                <label for="book_name">Název knihy:</label>
                <input type="text" id="book_name" name="book_name">
                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isbn">
                <label for="author_firstname">Jméno autora:</label>
                <input type="text" id="author_firstname" name="author_firstname">
                <label for="author_lastname">Příjmení autora:</label>
                <input type="text" id="author_lastname" name="author_lastname">
                <input type="submit" value="Vyhledat">
            </form>
            <?php
            include 'dbLogin.php'; // Zahrnutí souboru s připojením k databázi
            
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['author_lastname'])) {
                // Získání hodnot z formuláře
                $author_lastname = $_GET['author_lastname'] ?? '';
                $author_firstname = $_GET['author_firstname'] ?? '';
                $book_name = $_GET['book_name'] ?? '';
                $isbn = $_GET['isbn'] ?? '';

                // Vyhledání knih v databázi podle zadaných kritérií
                $sql = "SELECT * FROM knihy WHERE 
                        author_lastname LIKE '%$author_lastname%' 
                        AND author_firstname LIKE '%$author_firstname%' 
                        AND book_name LIKE '%$book_name%' 
                        AND isbn LIKE '%$isbn%'";
                $result = mysqli_query($conn, $sql);

                // Zobrazení výsledků
                if (mysqli_num_rows($result) > 0) {
                    echo "<hr>";
                    echo "<h3>Výsledky vyhledávání:</h3>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="searched">';
                        echo "<strong>Název knihy:</strong> " . $row['book_name'] . "<br>";
                        echo "<p><strong>ISBN:</strong> " . $row['isbn'] . "<br>";
                        echo "<strong>Jméno autora:</strong> " . $row['author_firstname'] . " " . $row['author_lastname'] . "<br>";
                        echo "<strong>Popis:</strong> " . $row['description'] . "</p>";
                        echo '</div>';

                    }
                } else {
                    echo "<p>Žádné knihy nebyly nalezeny.</p>";
                }
            }
            ?>
        </div>

        <div class="wrapper">
            <a href="http://davak.cz">DAVAK.CZ</a>
        </div>
    </div>
</body>

</html>