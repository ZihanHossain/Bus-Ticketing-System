// const { default: axios } = require("axios");

const book_ticket_form = document.getElementById("book_ticket");
const from = document.getElementById("from");
const to = document.getElementById("to");
const ticket_amount = document.getElementById("ticket_amount");
const journey_date = document.getElementById("journey_date");

book_ticket_form.addEventListener("submit", function (e) {
    e.preventDefault();

    let has_error = false;

    if (from.value == "") {
        alert("Please select from");
        has_error = true;
        return;
    }
    if (to.value == "") {
        alert("Please select to");
        has_error = true;
        return;
    }
    if (ticket_amount.value == "") {
        alert("Please select ticket amount");
        has_error = true;
        return;
    }

    $.post(
        "/searchticket",
        {
            from: from.value,
            to: to.value,
            journey_date: journey_date.value,
            ticket_amount: ticket_amount.value,
        },
        function (data, status) {
            if (typeof data == "string") {
                alert("Status: " + data);
            } else {
                const info = {
                    from: data.from,
                    to: data.to,
                    journey_date: data.journey_date,
                };
                window.location.replace("/ticket_confirmation/" + info.from);
            }
        }
    );
});
