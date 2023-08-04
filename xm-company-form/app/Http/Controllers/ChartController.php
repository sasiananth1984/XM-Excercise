<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\YhFinanceController;
use Illuminate\Support\Facades\Session;

class ChartController extends Controller
{
    protected $yhFinanceController;

    public function __construct(YhFinanceController $YhFinanceController)
    {
        $this->yhFinanceController = $YhFinanceController;
    }
    public function loadFormSessionData()
    {
        $values = Session::get('formData');
        return $values;
    }
    public function chartJson()
    {
        $data = $this->loadFormSessionData();
        $showPricevalues = array();
        if (!empty($data)) {
            $loadJson = $this->yhFinanceController->loadJson($data); //load Json Data Function
            if (!empty($loadJson)) {
                $showPricevalues = $loadJson['prices'];
            }
        }
        return $showPricevalues;
    }
    public function getHighlowValues()
    {
        $showPricevalues = $this->chartJson();
        if (!empty($showPricevalues)) {
            foreach ($showPricevalues as $values) {
                $high = isset($values['high']) ? $values['high'] : '';
                $low = isset($values['low']) ? $values['low'] : '';
                $list['low'][] = number_format((float)$low, 2); // Rounds to 2 decimal places
                $list['high'][] = number_format((float)$high, 2); // Rounds to 2 decimal places
            }
        }
        return $list;
    }
    public function index()
    {
        $result = $this->chartJson();
        $getHighlowValues = $this->getHighlowValues();
        if (!empty($getHighlowValues)) {
            $highValues = $getHighlowValues['high'];
            $lowValues =  $getHighlowValues['low'];
            $labels = ['Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5'];
            return view('chart/index', compact('labels', 'highValues', 'lowValues'));
        }
    }
}
