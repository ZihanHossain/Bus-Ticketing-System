<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/ticket_confirmation.css">
    <title>Ticket confirmation</title>
</head>
<body>
    <div class="container">
        <legend>Ticket Information</legend>
        @if($message == 'ticket available')
            <span class="badge badge-pill badge-success">TICKET AVAILABLE</span>
        @elseif($message == 'no sit')
            <span class="badge badge-pill badge-warning">Sorry no sit available for the day</span>
        @elseif($message == 'ticket not confirmed')
            <span class="badge badge-pill badge-warning">Ticket not confirmed for the day. Please contact with the customer care agent</span>
        @endif
        @if(isset($from))
        
            <table class="table-wrapper" border="1">
            <tr>
                <th>From</th>
                <th>To</th>
                <th>Bus</th>
                <th>Fare</th>
                <th>Journey Date</th>
            </tr>
            <tr>
                <td>{{$from}}</td>
                <td>{{$to}}</td>
                <td>{{$bus}}</td>
                <td>{{$fare}}</td>
                <td>{{$journey_date}}</td>
            </tr>
            </table>
        
        @endif
        <center>
            <button class="btn btn-primary">Confirm</button>
        </center>
    </div>
</body>
</html>