<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Fetch extends Controller
{
    public function fetchLocation(Request $request)
    {
        if ($request->location != '') {
            // Construct the API URL
            $url = 'https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/' . urlencode($request->location) . '?unitGroup=us&key=3C8TRCWYPKSPU83H6U8CJ5CUR&contentType=json';

            // Fetch weather data
            $response = file_get_contents($url);

            // Check if API request was successful
            if ($response !== false) {
                // Decode JSON response
                $data = json_decode($response, true);

                // Check if data was successfully decoded
                if ($data !== null) {
                    // Pass the weather data to the view and return
                    return view('welcome', ['weatherData' => $data]);
                } else {
                    // Failed to decode JSON
                    return redirect()->back()->with('error', 'Failed to decode JSON response from the API');
                }
            } else {
                // API request failed
                return redirect()->back()->with('error', 'Failed to fetch weather data from the API');
            }
        } else {
            // Location parameter is empty
            return redirect()->back()->with('error', 'Location parameter is empty');
        }
    }
}
