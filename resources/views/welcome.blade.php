<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body{
            font-family: 'figtree' , sans-serif;
        }
        .weather-search {
            margin: 20px;
            
        }

        .weather-search input[type='text'] {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .weather-search button {
            padding: 8px 16px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .weather-search button:hover {
            background-color: #0056b3;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .weather-table {
            width: 100%;
            border-collapse: collapse;
        }

        .weather-table th,
        .weather-table td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .weather-table th {
            background-color: #f2f2f2;
        }

        .weather_header{
            margin:50px 0;
            display:flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap:20px;

        }

        /* Responsive styles */
        @media screen and (max-width: 767px) {
            .table-responsive {
                overflow-x: scroll;
            }
        }
    </style>
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="weather-search">

        <div class="weather_header">
        <h2>Weather Search</h2>
            <form method='POST' action={{route('fetch')}}>
                @csrf
    <div>  <input type="text" name="location" style='width:230px;' placeholder="Enter location" /></div>
    <div><button id="search" type="submit" style='width:250px;margin-top:10px;'>Search</button></div>
            </form>
</div>
    

@if(isset($weatherData))

    <div class="table-responsive">
        <table class="weather-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Max Temp</th>
                    <th>Min Temp</th>
                    <th>Feels Like Max</th>
                    <th>Feels Like Min</th>
                    <th>Humidity</th>
                    <th>Precipitation</th>
                    <th>Wind Gust</th>
                    <th>Wind Speed</th>
                    <th>Wind Direction</th>
                    <th>Pressure</th>
                    <th>Cloud Cover</th>
                    <th>Visibility</th>
                    <th>Solar Radiation</th>
                    <th>Solar Energy</th>
                    <th>UV Index</th>
                    <th>Severe Risk</th>
                    <th>Sunrise</th>
                    <th>Sunset</th>
                    <th>Moon Phase</th>
                    <th>Conditions</th>
                    <th>Description</th>
                    <th>Icon</th>
                </tr>
            </thead>
            <tbody>
                @foreach($weatherData['days'] as $day)
                <tr>
                    <td>{{ $day['datetime'] }}</td>
                    <td>{{ $day['tempmax'] }}</td>
                    <td>{{ $day['tempmin'] }}</td>
                    <td>{{ $day['feelslikemax'] }}</td>
                    <td>{{ $day['feelslikemin'] }}</td>
                    <td>{{ $day['humidity'] }}</td>
                    <td>{{ $day['precip'] }}</td>
                    <td>{{ $day['windgust'] }}</td>
                    <td>{{ $day['windspeed'] }}</td>
                    <td>{{ $day['winddir'] }}</td>
                    <td>{{ $day['pressure'] }}</td>
                    <td>{{ $day['cloudcover'] }}</td>
                    <td>{{ $day['visibility'] }}</td>
                    <td>{{ $day['solarradiation'] }}</td>
                    <td>{{ $day['solarenergy'] }}</td>
                    <td>{{ $day['uvindex'] }}</td>
                    <td>{{ $day['severerisk'] }}</td>
                    <td>{{ $day['sunrise'] }}</td>
                    <td>{{ $day['sunset'] }}</td>
                    <td>{{ $day['moonphase'] }}</td>
                    <td>{{ $day['conditions'] }}</td>
                    <td>{{ $day['description'] }}</td>
                    <td>{{ $day['icon'] }}</td>
                </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>
    @endif
</div>





</body>

</html>
