<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\Income;
use App\Models\Item;
use App\Models\CarNumber;
use App\Http\Requests;
use Excel;

    class ReportController extends Controller
    {
        public function indexsale()
        {
            $cars = CarNumber::all();
            return view('reports.salereport',['cars' => $cars]);
        }
        public function indeximport()
        {
            return view('reports.importreport');
        }
        public function indexincome()
        {
            return view('reports.incomereport');
        }
        public function indexexpanse()
        {
            return view('reports.expansereport');
        }

        public function exportsale(Request $request)
        {
            $customerId = $request->input('hdfcustomerId');
            $carNumber = $request->input('hdfcarNumber');
            $fromDate = $request->input('saleFromDate');
            $toDate = $request->input('saleToDate');
            $query = DB::table('Sales')
                    ->join('Customers', 'Sales.customerid', '=', 'Customers.id')
                    ->join('Items','Sales.itemid','=','Items.id');
            if(!Empty($customerId)){
                $query->where('Sales.CustomerId', '=', $customerId);
            }
            if(!Empty($carNumber)){
                $query->where('Sales.CarNumber', '=', $carNumber);
            }
            if(!Empty($fromDate)){
                $query->whereDate('Sales.SaleDate', '>=', $fromDate);
            }
            if(!Empty($toDate)){
                $query->whereDate('Sales.SaleDate', '<=', $toDate);
            }
            $query->where('Sales.isorder', '=',0)->where('Sales.SubTotal', '=', DB::raw('Sales.PayAmount'))->orderBy('Sales.saledate','DESC')->get();
            $sales = $query->select('Customers.customername as CustomerName','Sales.saledate as SaleDate','Items.itemname as ItemName','CarNumber','Sales.quantity as Qauntity','Sales.saleprice as SalePrice',DB::raw('Sales.quantity*Sales.saleprice as Total'))->get();
            if($sales){
                Excel::create('SaleExcel', function($excel) use($sales) {
                    $excel->sheet('Excel sheet', function($sheet) use($sales) {
                        $sumTotal=0;
                        foreach ($sales as &$sale) {
                            $sale = (array)$sale;
                            $sumTotal  += $sale['Total'];
                        }
                        $sheet->fromArray($sales);
                        $sheet->appendRow(['', '', '', '','','Sub Total',$sumTotal]);
                    });
                })->export('xlsx');
            }else{
                $cars = CarNumber::all();
                return view('reports.salereport',['cars' => $cars]);
            }
        }

        public function exportimport(Request $request)
        {
            $supplyId = $request->input('hdfSupplierId');
            $fromDate = $request->input('saleFromDate');
            $toDate = $request->input('saleToDate');
            $query = DB::table('Imports')
                    ->join('Suppliers', 'Imports.supplierid', '=', 'Suppliers.id')
                    ->join('Items','Imports.itemid','=','Items.id');
            if ( !Empty($supplyId )) {
                $query->where('Imports.supplierId', '=', $supplyId);
            }
            if ( !Empty($fromDate) ) {
                $query->whereDate('Imports.ImportDate', '>=', $fromDate);
            }
            if ( !Empty($toDate) ){
                $query->whereDate('Imports.ImportDate', '<=', $toDate);
            }
            $query->where('Imports.isorder', '=',0)->where('Imports.SubTotal', '=', DB::raw('Imports.PayAmount'))->orderBy('Imports.ImportDate','DESC')->get();
            $imports = $query->select('Suppliers.suppliername as SupplierName','Imports.importdate as ImportDate','Items.itemname as ItemName','Imports.quantity as Qauntity','Imports.saleprice as SalePrice',DB::raw('Imports.quantity*Imports.saleprice as Total'))->get();
            if($imports){
                Excel::create('ImportExcel', function($excel) use($imports) {
                    $excel->sheet('Excel sheet', function($sheet) use($imports) {
                        $sumTotal=0;
                        foreach ($imports as &$import) {
                            $import = (array)$import;
                            $sumTotal  += $import['Total'];
                        }
                        $sheet->fromArray($imports);
                        $sheet->appendRow(['','', '','','Sub Total',$sumTotal]);
                    });
                })->export('xlsx');
            }else{
                return view('reports.importreport');
            }
        }
    }
