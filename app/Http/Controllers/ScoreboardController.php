<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ScoreboardController extends Controller
{
    public function scoreboard()
    {
        $data = array(
            'menu' => 'scoreboard',
            'submenu' => '',
        );
        return view('scoreboard.scoreboard', $data);
    }

    public function message(){
        $response = new \Symfony\Component\HttpFoundation\StreamedResponse(function() {
            while(true) {
                $data = DB::table('scoreboard')->get();
                echo 'data: ' . json_encode($data) . "\n\n";
                
                // print PHP_EOL;
                ob_end_flush();
                flush();
                sleep(1);
            }
        });
        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('X-Accel-Buffering', 'no');
        $response->headers->set('Cach-Control', 'no-cache');
        return $response;
    }

    public function index()
    {
        $data = array(
            'menu' => 'controller',
            'submenu' => '',
        );
        return view('scoreboard.controller', $data);
    }

    public function store(Request $r){
        if($r->countdown != null){
            DB::table('scoreboard')->where('id', $r->id)->update([
                'countdown' => $r->countdown
            ]);
        }
        elseif($r->status != null){
            DB::table('scoreboard')->where('id', $r->id)->update([
                'id_sound' => $r->id_sound
            ]);
            DB::table('sound')->where('id_sound', $r->id_sound)->update([
                'status' => $r->status
            ]);
        }
        else{
            DB::table('scoreboard')->where('id', $r->id)->update([
                'home' => strtoupper($r->home),
                'away' => strtoupper($r->away),
                'home_score' => $r->home_score,
                'away_score' => $r->away_score,
                'home_foul' => $r->home_foul,
                'away_foul' => $r->away_foul,
                'period' => $r->period
            ]);
        }
    }
    
    
    public function ajaxRequest()
    {
        $data = array(
            'menu' => 'scoreboard',
            'submenu' => '',
        );
        return view('scoreboard/coba', $data);
    }
     
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function ajaxRequestPost(Request $request)
    {
        // $input = $request->all();
          
        // Log::info($input);

        DB::table('scoreboard')->where('id', $request->id)->update([
            // 'home' => strtoupper($r->home),
            // 'away' => strtoupper($r->away),
            'home_score' => $request->score,
        ]);
        // DB::table('scoreboard')->insert([
        //     'home' => $request->home,      
        //     'away' => $request->away,      
        //     'home_score' => $request->hc,    
        // ]);
     
        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }

}
