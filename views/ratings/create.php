<?php require "views/common/head.php"; ?>

<form id="addForm" method="POST" action="/ratings/create">
    <h2>Добавяне на Оценка</h2>
    <label for="addName">Име:</label>
    <input type="text" id="addName" name="name" required>
    <label for="addRating">Оценка:</label>
    <input type="number" id="addRating" name="rating" step="0.01" required>
    <input type="hidden" name="action" value="add">
    <button class="button" type="submit">Добави</button>
</form>

<?php require "views/common/foot.php"; ?>
