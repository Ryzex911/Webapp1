<?php
include_once "conction.php";
include_once "header.php";

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $searchQuery = "SELECT * FROM Rio WHERE titel LIKE :zoekinput";
    $stmt_search = $pdo->prepare($searchQuery);
    $searchParam = "%" . $searchTerm . "%";
    $stmt_search->bindParam(":zoekinput", $searchParam);
    $stmt_search->execute();
} else {
    $stmt_all = $pdo->query("SELECT * FROM Rio");
}
?>




<form class="search-bar" action="menu.php" method="GET">
    <input type="text" name="search" placeholder="Search...">
    <button type="submit">Search</button>
</form>


<div class='menu-item-container'>
    <?php
    if (isset($stmt_search)) {
        while ($Rio = $stmt_search->fetch()) {
            displayMenu($Rio);
        }
    } elseif (isset($stmt_all)) {
        while ($Rio = $stmt_all->fetch()) {
            displayMenu($Rio);
        }
    }
    ?>
</div>

<?php
// Function to display menu item
function displayMenu($Rio) {
    echo "<div class='menu-item'>";
    echo "<div class='menu-title'>" . $Rio['Titel'] . "</div>";
    echo "<div class='menu-description'>" . $Rio['Gerecht'] . "</div>";
    echo "<div class='menu-price'>Price: $" . $Rio['Prijs'] . "</div>";
    if (!empty($Rio['image'])) {
        echo "<img class='object-fit' width='120' style='margin-top: 8px;' src='pics/" . $Rio['image'] . "' />";
    }
    echo "</div>";
}
?>

</body>
</html>
