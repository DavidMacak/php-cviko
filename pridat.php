<?php
include 'dbLogin.php'; // Zahrnutí souboru s připojením k databázi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Získání dat z formuláře
    $isbn = $_POST['isbn'];
    $author_firstname = $_POST['author_firstname'];
    $author_lastname = $_POST['author_lastname'];
    $book_name = $_POST['book_name'];
    $description = $_POST['description'];

    if (!empty($book_name)) {
        // Přidání knihy do databáze
        $sql = "INSERT INTO knihy (isbn, author_firstname, author_lastname, book_name, description) 
            VALUES ('$isbn', '$author_firstname', '$author_lastname', '$book_name', '$description')";
        $result = mysqli_query($conn, $sql);

        // if ($result) {
        //     echo "Kniha byla úspěšně přidána.";
        // } else {
        //     echo "Chyba při přidávání knihy: " . mysqli_error($conn);
        // }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přidat knihu</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="menu">
            <ul>
                <li><a href="index.php">Seznam knih</a></li>
                <li><a class="selected" href="pridat.php">Přidat knihu</a></li>
                <li><a href="vyhledat.php">Vyhledat knihu</a></li>
            </ul>
        </div>

        <div class="wrapper">
            <h2>Přidat knihu</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="book_name">Název knihy:</label>
                <input type="text" id="book_name" name="book_name">
                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isbn">
                <hr>
                <label for="author_firstname">Jméno:</label>
                <input type="text" id="author_firstname" name="author_firstname">
                <label for="author_lastname">Příjmení:</label>
                <input type="text" id="author_lastname" name="author_lastname">
                <hr>
                <label for="description">Popis:</label>
                <textarea id="description" name="description"></textarea>
                <input type="submit" value="Přidat">
            </form>
        </div>

        <div class="wrapper">
            <a href="http://davak.cz">DAVAK.CZ</a>
        </div>
    </div>
</body>

</html>