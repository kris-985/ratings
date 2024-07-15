<?php
require 'php/Ratings.php';
require 'db_config.php';

$ratings = new Ratings($db_host, $db_user, $db_password, $db_name);
$allRatings = $ratings->getRatings();
?>

<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <title>Визуализация на Оценки</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Управление на Оценки</h1>

    <div class="form-container">
        <form id="addForm" method="POST" action="handle_form.php">
            <h2>Добавяне на Оценка</h2>
            <label for="addName">Име:</label>
            <input type="text" id="addName" name="name" required>
            <label for="addRating">Оценка:</label>
            <input type="number" id="addRating" name="rating" step="0.01" required>
            <input type="hidden" name="action" value="add">
            <button type="submit">Добави</button>
        </form>

        <form id="editForm" method="POST" action="handle_form.php">
            <h2>Редакция на Оценка</h2>
            <label for="editId">ID:</label>
            <input type="number" id="editId" name="id" required>
            <label for="editName">Име:</label>
            <input type="text" id="editName" name="name" required>
            <label for="editRating">Оценка:</label>
            <input type="number" id="editRating" name="rating" step="0.01" required>
            <input type="hidden" name="action" value="edit">
            <button type="submit">Редактирай</button>
        </form>

        <form id="deleteForm" method="POST" action="handle_form.php">
            <h2>Изтриване на Оценка</h2>
            <label for="deleteId">ID:</label>
            <input type="number" id="deleteId" name="id" required>
            <input type="hidden" name="action" value="delete">
            <button type="submit">Изтрий</button>
        </form>
    </div>

    <h2>Съществуващи Оценки</h2>
    <div id="chart">
        <?php foreach ($allRatings as $rating): ?>
            <div class="bar bar-<?php echo str_replace('.', '_', $rating['rating']); ?>">
                <?php echo $rating['name'] . ': ' . $rating['rating']; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        $(document).ready(function() {
            const data = [
                <?php foreach ($allRatings as $rating): ?>
                { people: <?php echo $rating['rating']; ?>, rating: <?php echo $rating['rating']; ?> },
                <?php endforeach; ?>
            ];

            const maxPeople = Math.max(...data.map(d => d.people));
            const chartWidth = $("#chart").width();

            data.forEach(item => {
                const widthPercentage = (item.people / maxPeople) * 100;
                const barClass = `bar-${String(item.rating).replace('.', '_')}`;
                const bar = $(`<div class="bar ${barClass}">${item.people} човека с оценка ${item.rating}</div>`);
                $("#chart").append(bar);
                bar.animate({ width: `${widthPercentage}%` }, 2000);
            });
        });
    </script>
</body>
</html>



