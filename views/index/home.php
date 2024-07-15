<?php require "views/common/head.php"; ?>

<h1>Home</h1>

<main data-ratings="<?= htmlspecialchars(json_encode($ratings)) ?>" class="home">
    <div class="container">
        <div class="flex">
            <ul>
                <?php foreach ($ratings as $rating) : ?>
                    <li>
                        <div>
                            <span>Name:</span>
                            <span><?= $rating["name"] ?></span>
                        </div>
                        <div>
                            <span>Rating:</span>
                            <span><?= $rating["rating"] ?></span>
                        </div>
                        <div class="buttons">
                            <button class="button" data-delete-id="<?= $rating["id"] ?>">Delete</button>
                            <a class="button" href="/ratings/edit/<?= $rating["id"] ?>">Edit</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
            <ul id="chart">
            </ul>
        </div>
    </div>
</main>

<script>
    $(document).ready(function() {
        const data = JSON.parse($("main").attr("data-ratings"));

        const people = {};

        data.forEach(item => {
            if (!(item.rating in people)) {
                people[item.rating] = 1;
            } else {
                people[item.rating]++;
            }
        });

        renderChart(people);
    });

    function renderChart(people) {
        $.each(people, function(key, value) {
            const item = `
                <li class="list-item">
                    <span class="bold">Оценка ${key}: </span>
                    <span>${value} човека</span>
                </li>
            `;
            $("#chart").append(item);
        });
    }
</script>

<script>
    $("main").on("click", handleClick);

    function handleClick(event) {
        const deleteId = $(event.target).attr("data-delete-id");

        if (deleteId) {
            deleteItem(deleteId);
        }
    }

    function deleteItem(id) {
        $.ajax({
            url: `/ratings/delete/${id}`,
            method: "DELETE",
            success: function() {
                window.location.reload();
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>

<?php require "views/common/foot.php"; ?>