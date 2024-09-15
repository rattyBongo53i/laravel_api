<?php

namespace App\Http\Controllers;

use App\Models\ExpenditureBudget;
use App\Models\FeeCategory;
use App\Models\Fees;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Models\InvoiceTemp;
use App\Models\InvoiceFees;
use Illuminate\Support\Str;
use Carbon\Carbon;


class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

          /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFeeCategory()
    {
        // return ["category"=> "error"]);
          
        
        $users = Cache::remember('category_all', 240, function () {
          return $response =  FeeCategory::latest()->get();
        });
         return  response()->json($users);
        
    }

    public function getFees(){
        //
        // return Cache::remember('fees', 950, function () {
    //    return Fees::all();
        // });
             // Join the fees table with the categories table
              $fee = Cache::remember('fees_all', 340, function () {
               return $fees = DB::table('fees')
            ->join('fee_categories', 'fees.category_id', '=', 'fee_categories.id')
            ->select('fees.id','fees.amount', 'fees.name', 'fees.description', 'fees.short_name', 'fee_categories.name as category')
            ->get();
        });
        return response()->json($fee);
    }

    public function getExpenditureBudget(){
        //
        return Cache::remember('expenditure', 250, function () {
          return  ExpenditureBudget::all();
        });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeExpense(Request $request)
    {
        //
       if ($request->name == '' || $request->name == null){
        return response()->json(['message' => 'Name is required'], 400);
       }
                    $expense = new ExpenditureBudget();
                    $expense->name = $request->name;
                    $expense->nameShort = $request->name;
                    $expense->category = 'ADMINISTRATION';
                    $expense->created_at = Carbon::now();
                    $expense->updated_at = Carbon::now();
                    $expense->save();
                    $expense = ExpenditureBudget::where('id', $expense->id)->first();
                    
                    if($expense->name == $request->name){
                        return response()->json($expense, 201);
                    }
                    
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyExpense($id)
    {
        //
        $expense = ExpenditureBudget::find($id);
        $expense->delete();
        return response()->json(['message' => 'expense deleted successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
       //created deleteCache function
    public function deleteCache(){
        Cache::flush();
        return response()->json('Cache deleted');
    }



/******************************* *
    Invoice
/****************************** */

public function storeInvoice(Request $request)
{
    // Validate request data
    $this->validate($request, [
        'due_date' => 'required|date|after:today',
    ]);


    // if student is null retrun 
    if ($request->student_id == '' || $request->student_id == null){
        return response()->json(['message' => 'Student ID is required'], 401);
    }


    // Generate a unique invoice ID using current datetime and hash
  if (empty($request->fees) || !is_array($request->fees) || count($request->fees) === 0) {
        return response()->json(['message' => 'no fees added'], 400);
    }
    // Generate a unique invoice ID using current datetime and hash it
    $currentDateTime = Carbon::now()->toDateTimeString(); // Get current date and time
    $invoiceId = substr(md5($currentDateTime), 0, 10); // Hash and take the first 10 characters

    // Determine the issue date based on whether the invoice is sent
    $issue_date = $request->isSent ? Carbon::now()->toDateTimeString() : null;

    // Check if an invoice with the same student_id, due_date, and total_amount already exists
    $existingInvoice = Invoice::where('student_id', $request->student_id)
                        ->where('due_date', $request->due_date)
                        ->where('total_amount', $request->totalFeeAmount)
                        ->first();

    // If the invoice exists, return a message to avoid duplicate entry
    if ($existingInvoice) {
        return response()->json([
            'message' => 'Invoice already exists',
            'invoice' => $existingInvoice,
        ], 409); // 409 Conflict HTTP status code
    }

    // Create a new invoice
    $invoice = new Invoice();
    $invoice->invoice_id = $invoiceId;
    $invoice->student_id = $request->student_id;
    $invoice->due_date = $request->due_date;
    $invoice->issue_date = $issue_date;
    $invoice->student_name = $request->student_name;
    $invoice->total_amount = $request->totalFeeAmount;
    $invoice->notes = $request->note;
    $invoice->created_at = Carbon::now();
    $invoice->save();

    // After saving, check if the invoice was saved successfully
    if ($invoice->id) {
        // Create the fees for the invoice
        foreach ($request['fees'] as $fee) {
            InvoiceFees::create([
                'invoice_id' => $invoice->id,
                'name' => $fee['name'],
                'amount' => $fee['amount'],
                'fee_id' => $fee['id'],
                'invoice_uuid' => $invoice->invoice_id,
            ]);
        }

        // Return the newly created invoice
        return response()->json($invoice, 201); // 201 Created HTTP status code
    }

    return response()->json(["message" => "Error saving invoice"], 500); // 500 Internal Server Error HTTP status code
}

    public function invoiceTemp($id){
        $invoice = InvoiceTemp::find($id);
        $invoice->delete();
        return response()->json(['message' => 'invoice deleted successfully']);
    }

    public function getLateInvoices()
{
    $lateInvoices = InvoiceTemp::whereColumn('payment_date', '>', 'due_date')->get();
    return $lateInvoices;
}

public function getLateInvoicesOther()
{
    $lateInvoices = DB::table('invoices')
                      ->whereColumn('payment_date', '>', 'due_date')
                      ->get();
    return $lateInvoices;
}

public function getLateInvoicesStatus()
{
    $lateInvoices = DB::table('invoices')
                      ->whereColumn('payment_date', '>', 'due_date')
                      ->get();
    return $lateInvoices;
}

//Fetch only late invoices from the current month
public function getLateInvoicesCurrentMonth()
{
    $currentMonth = Carbon::now()->format('F');
    $lateInvoices = InvoiceTemp::whereColumn('payment_date', '>', 'due_date')
                      ->whereMonth('due_date', Carbon::now()->month)
                      ->get();
    return $lateInvoices;
}

public function getLateInvoicesOtherMonth(){
  return  $lateInvoices = InvoiceTemp::whereColumn('payment_date', '>', 'due_date')
    ->whereMonth('payment_date', Carbon::now()->month)
    ->get();

}

}