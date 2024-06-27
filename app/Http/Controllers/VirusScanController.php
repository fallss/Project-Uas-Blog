<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VirusScanController extends Controller
{
    public function index(){
        return view('scan-virus');
    }
public function scanWebVirus(Request $request)
{
    $url = $request->input('url');
    $apiKey = 'YOUR_VIRUSTOTAL_API_KEY';

    $response = Http::post('https://www.virustotal.com/vtapi/v2/url/scan', [
        'apikey' => $apiKey,
        'url' => $url
    ]);

    $result = $response->json();

    $reportResponse = Http::asForm()->post('https://www.virustotal.com/vtapi/v2/url/report', [
        'apikey' => $apiKey,
        'resource' => $result['scan_id']
    ]);

    $reportResult = $reportResponse->json();

    if($reportResult['positives'] > 0){
        return response()->json(['status' => 'danger', 'message' => 'Virus detected']);
    }
    else {
      return response()->json(['status' => 'danger', 'message' => 'Scanned succesfully, there is no virus detected']);
    }
    }
}

