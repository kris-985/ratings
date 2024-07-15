<?php require "views/common/head.php"; ?>

<form id="editForm" method="POST" action="/ratings/edit">
    <h2>Редакция на Оценка</h2>
    <label for="editId">ID:</label>
    <input type="number" id="editId" value="<?= $item["id"] ?? null ?>" name="id" required>
    <label for="editName">Име:</label>
    <input type="text" id="editName" value="<?= $item["name"] ?? null ?>" name="name" required>
    <label for="editRating">Оценка:</label>
    <input type="number" id="editRating" value="<?= $item["rating"] ?? null ?>" name="rating" step="0.01" required>
    <input type="hidden" name="action" value="edit">
    <button class="button" type="submit">Редактирай</button>
</form>

<?php require "views/common/foot.php"; ?>
