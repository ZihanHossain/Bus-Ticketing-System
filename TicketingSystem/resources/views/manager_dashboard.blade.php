<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/manager_dashboard.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-around" >
            <div class="col">
                <legend>Add Ticket</legend>
                <form id="add_ticket">
                    <select id="from">
                        <option value="" selected>From</option>
                        @foreach($places as $place)
                            <option value="{{$place['id']}}">{{$place['name']}}</option>
                        @endforeach
                    </select>
                    <span>  ->  </span>
                    <select id="to">
                        <option value="" selected>To</option>
                        @foreach($places as $place)
                            <option value="{{$place['id']}}">{{$place['name']}}</option>
                        @endforeach
                    </select>
                    <br>
                    <br>
                    <input type="number" id="fare" placeholder="Fare">
                    <br>
                    <br>
                    <span> Select a bus: </span>
                    <select id="bus">
                        <option value="" selected>Select a bus</option>
                        @foreach($buses as $bus)
                            <option value="{{$bus['id']}}">{{$bus['name']}}</option>
                        @endforeach
                    </select>
                    <br>
                    <br>
                    <button type="submit" id="add_ticket">Add</button>
                </form>
            </div>
            <div class="col">
                <div class="">
                    <form class="add_place" id="add_place">
                        <legend>Add a place</legend>
                        <input type="text" name="place_name" id="place_name">
                        <button type="submit">Add</button>
                    </form>
                </div>
                <div class="">
                    <legend>Add a bus</legend>
                    <form class="add_bus" id="add_bus">
                        <input type="text" name="bus_name" id="bus_name">
                        <button type="submit">Add</button>
                    </form>
                </div>
                <div class="">
                    <legend>Add a Driver</legend>
                    <form class="add_driver" id="add_driver">
                        
                        <input type="text" name="driver_name" id="driver_name" placeholder="Enter name">
                        <br>
                        <br>
                        <input type="text" name="driver_username" id="driver_username" placeholder="Enter username">
                        <br>
                        <br>
                        <input type="text" name="driver_email" id="driver_email" placeholder="Enter email">
                        <br>
                        <br>
                        <input type="text" name="driver_password" id="driver_password" placeholder="Enter password">
                        <br>
                        <br>
                        <select id="assign_bus">
                            <option value="" selected>Assign a bus</option>
                            @foreach($buses as $bus)
                            <option value="{{$bus['id']}}">{{$bus['name']}}</option>
                            @endforeach
                            </select>
                        <button type="submit">Add</button>
                    </form>
                </div>
            </div>
            <div class="col">
                <div class="" style="max-height: 25vh;">
                    <legend>Places list</legend>
                    <div id="table-wrapper">
                        <div id="table-scroll">
                            <table id="places_list" border="1" style="width: 100%">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                </tr>
                                @foreach($places as $place)
                                    <tr>
                                        <th>{{$place['id']}}</th>
                                        <th>{{$place['name']}}</th>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="" style="max-height: 25vh;">
                    <legend>Buse's list</legend>
                    <div id="table-wrapper">
                        <div id="table-scroll">
                            <table id="buses_list" border="1" style="width: 100%">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                </tr>
                                @foreach($buses as $bus)
                                    <tr>
                                        <th>{{$bus['id']}}</th>
                                        <th>{{$bus['name']}}</th>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="" style="max-height: 25vh;">
                    <legend>Driver's list</legend>
                    <div id="table-wrapper">
                        <div id="table-scroll">
                            <table id="driver_list" border="1" style="width: 100%">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Assinged Bus</th>
                                </tr>
                                @foreach($drivers as $driver)
                                    <tr>
                                        <th>{{$driver['id']}}</th>
                                        <th>{{$driver['name']}}</th>
                                        <th>{{$driver['bus']}}</th>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="" style="max-height: 25vh;">
                    <legend>Tickets's list</legend>
                    <div id="table-wrapper">
                        <div id="table-scroll">
                            <table id="ticket_list" border="1" style="width: 100%">
                                <tr>
                                    <th>ID</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Fare</th>
                                    <th>Bus</th>
                                </tr>
                                @foreach($tickets as $ticket)
                                    <tr>
                                        <th>{{$ticket['id']}}</th>
                                        <th>{{$ticket['from']}}</th>
                                        <th>{{$ticket['to']}}</th>
                                        <th>{{$ticket['fare']}}</th>
                                        <th>{{$ticket['b_id']}}</th>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/app.js"></script>
</body>
</html>