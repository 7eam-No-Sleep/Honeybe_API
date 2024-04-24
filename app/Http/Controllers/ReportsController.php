<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\inventory;
use App\Models\Sales;
use App\Models\transactions;
use App\Models\employees;




class ReportsController extends Controller
{
       public function exportData(Request $request)
    {
        $selectedCategory = $request->input('selectedCategory');

        // Check if the selected option is a valid table name
        $validTables = ['inventory', 'Sales', 'Transactions', 'Employees'];
        if (in_array($selectedCategory, $validTables)) {
            // Fetch data from the selected table
            $data = DB::table($selectedCategory)->get();

            // Convert fetched data to CSV format
            $csvData = $this->arrayToCsv($data);

            // Set response headers for CSV download
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="' . strtolower($selectedCategory) . '.csv"',
            ];

            // Return CSV data as response
            return response($csvData, 200, $headers);
        } else {
            // Return error response if selected table is invalid
            return response('Invalid table selected', 400);
        }
    }

    // Helper function to convert array to CSV format
    private function arrayToCsv($array)
    {
        $csvData = '';
        if (!empty($array)) {
            $headers = array_keys((array)$array[0]);
            $csvData .= implode(',', $headers) . PHP_EOL;
            foreach ($array as $row) {
                $csvData .= implode(',', (array)$row) . PHP_EOL;
            }
        }
        return $csvData;
    }
}




// The below code block was removed from InventoryController.php

// public function exportInventory(Request $request)
// {
//     // Fetch data from the "Inventory" table
//     $inventory = inventory::table('Inventory')->get();

//     // Convert fetched data to CSV format
//     $csvData = 'ProductID,ProductName,Category,Description,CostPrice,SellingPrice,QuantityInStock,Color,Size,Material,Status' . PHP_EOL;
//     foreach ($inventory as $row) {
//         $csvData .= implode(',', (array)$row) . PHP_EOL;
//     }

//      // Set response headers for CSV download
//      $headers = [
//         'Content-Type' => 'text/csv',
//         'Content-Disposition' => 'attachment; filename="inventory.csv"',
//     ];

//     // Return CSV data as response
//     return response($csvData, 200, $headers);
// }