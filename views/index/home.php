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
        const data = JSON.parse(document.querySelector("main").getAttribute("data-ratings"));

        const peaple = {};

        data.forEach(item => {
            if (!(Object.keys(peaple).some((x) => x == item.rating))) {
                peaple[item.rating] = 1;
            } else {
                peaple[item.rating]++;
            }
        });

        renderChart(peaple);
    });

    function renderChart(peaple) {
        Object.entries(peaple).forEach(([key, value]) => {
            const item = `
    <li class="list-item">
        <span class="bold">Оценка ${key}: </span>
        <span>${value} човека</span>
    </li>
    `;

            document.querySelector("#chart").innerHTML += item;
        });
    }
</script>

<script>
    document.querySelector("main").addEventListener("click", handleClick);

    function handleClick(event) {
        const deleteId = event.target.getAttribute("data-delete-id");

        if (deleteId) {
            deleteItem(deleteId);
        }
    }

    async function deleteItem(id) {
        try {
            await fetch(`/ratings/delete/${id}`, {
                method: "DELETE"
            });
            window.location.reload();
        } catch (error) {
            console.log(error);
        }
    }
</script>

<?php require "views/common/foot.php"; ?>