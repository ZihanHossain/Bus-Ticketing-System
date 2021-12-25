<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/app.css">
</head>
<body>
    <center>
        <div>
            <h1>Book Your Ticket!</h1>
            <form id="book_ticket" action="/searchticket" method="POST">
                <div id="route">
                    <legend>Route</legend>
                    <select name="from" id="from">
                        <option value="" selected>From</option>
                        @foreach($places as $place)
                            <option value="{{$place['id']}}">{{$place['name']}}</option>
                        @endforeach
                    </select>
                    <span>---</span>
                    <select name="to" id="to">
                        <option value="" selected>To</option>
                        @foreach($places as $place)
                            <option value="{{$place['id']}}">{{$place['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div>
                    <Select name="ticket_amount" id="ticket_amount">
                        <option value="" selected>Ticket Amount</option>
                        <option value=1 >1</option>
                        <option value=2 >2</option>
                        <option value=3 >3</option>
                        <option value=4 >4</option>
                    </Select>
                </div>
                <br>
                <div>
                    <span>Select Journey Date: </span>
                    <input name="journey_date" type="date" id="journey_date">
                </div>
                <br>
                <div>
                    <button type="submit">Search</button>
                </div>
            </form>
        </div>
    </center>
    <!-- <div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="./js/customer_dashboard.js"></script>
    </div> -->
</body>
</html>