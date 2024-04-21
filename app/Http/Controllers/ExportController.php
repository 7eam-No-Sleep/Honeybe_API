<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ExportController extends Controller
{
    public function export(Request $request)
    {
        $query = $request->input('query');

        // Execute the user query to fetch data from MySQL
        $results = DB::select($query);

        // Convert fetched data to CSV format
        $csvData = '';
        foreach ($results as $row) {
            $csvData .= implode(',', (array)$row) . PHP_EOL;
        }

        // Store CSV data in a temporary file
        $filePath = 'exported_data.csv';
        Storage::put($filePath, $csvData);

        // Return the path to the temporary CSV file
        return response()->download(storage_path('app/' . $filePath))->deleteFileAfterSend(true);
        //^ Uncomment this line after succesfully testing connection
       // return response()->json(['message' => 'Product updated successfully'], 200);

    }
}
