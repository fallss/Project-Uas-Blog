<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class VirusScanController extends Controller
{
    public function index()
    {
        return view('scan-virus');
    }

    public function scanWebVirus(Request $request)
    {
        try {
            $request->validate([
                'url' => 'required|url'
            ]);

            $url = $request->input('url');
            $apiKey = config('services.virustotal.api_key');

            $scanResponse = Http::post('https://www.virustotal.com/vtapi/v2/url/scan', [
                'apikey' => $apiKey,
                'url' => $url
            ]);

            $scanResult = $scanResponse->json();
            if (!isset($scanResult['scan_id'])) {
                Log::error('Scan ID not found in response', $scanResult);
                return response()->json(['status' => 'error', 'message' => 'Failed to scan the URL. Please try again.'], 500);
            }

            $resource = $scanResult['scan_id'];

            $tries = 0;
            $maxTries = 5;
            do {
                sleep(5);
                $reportResponse = Http::get('https://www.virustotal.com/vtapi/v2/url/report', [
                    'apikey' => $apiKey,
                    'resource' => $resource
                ]);
                $reportResult = $reportResponse->json();
                $tries++;
            } while ($tries < $maxTries && !isset($reportResult['positives']));

            if (isset($reportResult['positives']) && $reportResult['positives'] > 0) {
                return response()->json(['status' => 'danger', 'message' => 'Virus detected']);
            } else {
                return response()->json(['status' => 'success', 'message' => 'Scanned successfully, no virus detected']);
            }
        } catch (\Exception $e) {
            Log::error('Error scanning URL: ' . $e->getMessage(), []);
            return response()->json(['status' => 'error', 'message' => 'Internal Server Error. Please try again later.'], 500);
        }
    }
}





