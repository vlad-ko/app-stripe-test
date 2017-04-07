<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Stripe API - Test App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet" />
    </head>
    <body>


<table id="myTable" class="tablesorter">
<thead>
<tr>
    <th class="header">Last Name</th>
    <th class="header">First Name</th>
    <th class="header">Email</th>
    <th>Due</th>
    <th>Web Site</th>
</tr>
</thead>
<tbody>
<tr>
    <td>Smith</td>
    <td>John</td>
    <td>jsmith@gmail.com</td>
    <td>$50.00</td>
    <td>http://www.jsmith.com</td>
</tr>
<tr>
    <td>Bach</td>
    <td>Frank</td>
    <td>fbach@yahoo.com</td>
    <td>$50.00</td>
    <td>http://www.frank.com</td>
</tr>
<tr>
    <td>Doe</td>
    <td>Jason</td>
    <td>jdoe@hotmail.com</td>
    <td>$100.00</td>
    <td>http://www.jdoe.com</td>
</tr>
<tr>
    <td>Conway</td>
    <td>Tim</td>
    <td>tconway@earthlink.net</td>
    <td>$50.00</td>
    <td>http://www.timconway.com</td>
</tr>
</tbody>
</table>
    </body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="{{ asset('js/jquery.tablesorter.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
</html>
