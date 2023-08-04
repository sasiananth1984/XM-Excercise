<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Mail\CompanyReportEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CompanyFormController extends Controller
{
  // Create Company Form
  public function createForm(Request $request)
  {
    //load Json Data
    $getCompanySymbol = $this->loadJsondata();
    return view('company', array(
      'symbols' => $getCompanySymbol
    ));
  }
  // Store Contact Form data
  public function CompanyForm(Request $request)
  {
    // Form validation
    $validator = Validator::make($request->all(), [
      'email' => 'required|email',
      'start_date' => 'required|date|before_or_equal:end_date',
      'end_date' => 'required|date|after_or_equal:start_date',
      // other validation rules for other fields
    ]);

    if ($validator->fails()) {
      return redirect()->back()
        ->withErrors($validator)
        ->withInput();
    }

    $form_data = array(
      'symbol' => $request->symbol,
      'email' => $request->email,
      'start_date' => $request->start_date,
      'end_date' => $request->end_date,
      'message' => $request->message
    );
    Company::create($form_data);
    $data = array(
      'email' => $request->email,
      'symbol' => $request->symbol,
      'from' => $request->start_date,
      'to' => $request->end_date
    );
    $request->session()->put('formData', $data);
    //send mail to customer
    // $sendMail = $this->sendEmail($request); - For Localhost code is commented

    //pass data to Finance Controller
    $financeController = new YhFinanceController();
    return $financeController->getHistoricalData($data);
  }
  //load Json Data
  public function loadJsondata()
  {
    $jsonDataArray = array();
    $jsonurl = "https://pkgstore.datahub.io/core/nasdaq-listings/nasdaq-listed_json/data/a5bc7580d6176d60ac0b2142ca8d7df6/nasdaq-listed_json.json";
    $jsonData = json_decode(file_get_contents($jsonurl), true);
    if (!empty($jsonData)) {
      foreach ($jsonData as $symbol) {
        $jsonDataArray[] = $symbol['Symbol'];
      }
    }
    return $jsonDataArray;
  }
  public function sendEmail($request)
  {
    $companySymbol = $request->symbol;
    $startDate = $request->start_date;
    $endDate = $request->end_date;
    $email = $request->email;
    //send mail to Customer Email
    Mail::to($email)->send(new  CompanyReportEmail($companySymbol, $startDate, $endDate));
    if (Mail::failures()) {
      return response()->Fail('Sorry! Please try again latter');
    } else {
      return response()->success('Great! Successfully send in your mail');
    }
  }
}
