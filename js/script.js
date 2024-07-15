$(document).ready(function() {
    const data = [
        { people: 10, rating: 5 },
        { people: 2, rating: 3 }
    ];

    const maxPeople = Math.max(...data.map(d => d.people));
    const chartWidth = $("#chart").width();

    data.forEach(item => {
        const widthPercentage = (item.people / maxPeople) * 100;
        const barClass = `bar-${item.rating}`;
        const bar = $(`<div class="bar ${barClass}">${item.people} човека с оценка ${item.rating}</div>`);
        $("#chart").append(bar);
        bar.animate({ width: `${widthPercentage}%` }, 2000);
    });
});

