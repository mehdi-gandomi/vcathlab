<?php
namespace Modules\User\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;


/**
 * Class EchoCalculationController
 * @package Modules\User\Http\Controllers\API
 */

class GPTController extends AppBaseController
{

    public function generateTableText($data,$name){
        $types=[
            'ostial',
            'proximal',
            'mid',
            'distal',
        ];
        $text="";
        foreach($types as $type){
            if(isset($data[$name."_".$type]) && count($data[$name."_".$type])){
                $text.=implode(",",$data[$name."_".$type])." "."At ".$type." Portion \n";
            }
        }
        return $text;
    }
    public function report(Request $request){
        $data=$request->all();
        $table=[
            'LM',
            'LAD',
            'Diagonal1',
            'Diagonal2',
            'lcx',
            'om1',
            'om2',
            'rca',
            'pda',
            'plv',
            'ramus'
        ];
        foreach($table as $key=>$item){
            $data[$item]=$this->generateTableText($data,$item);
            $data[$item]=trim($data[$item]) ? $data[$item]."\n":$data[$item."_description"];
        }
        $text=view('user::angiography-report.report',$data)->render();
        $response = \Http::withHeaders([
            'Authorization' => 'Bearer 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'
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4',
            'messages' => [
                // ["role"=>'system','content'=>$base],
                ['role' => 'user', 'content' => $text]
            ]
        ]);
        dd($response->json());
    \Log::info("response: ".$response->json('choices')[0]['message']['content']);
        return response()->json(['response' => $response->json('choices')[0]['message']['content']]);
    }

    public function transcript(Request $request){
         $request->validate([
            'file' => 'required|file'
        ]);

        $file = $request->file('file');
            $filePath = $file->store('audio', 'public');


        // $response = \Http::withHeaders([
        //     'Authorization' => 'Bearer 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'
        // ])->attach(
        //     'file', file_get_contents(storage_path('app/public/' . $filePath)), 'audio.wav'
        // )->post('https://api.openai.com/v1/audio/transcriptions');
         $response = \Http::withHeaders([
        'Authorization' => 'Bearer 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'
    ])->attach(
        'file', file_get_contents(storage_path('app/public/' . $filePath)), 'audio.wav'
    )->post('https://api.openai.com/v1/audio/transcriptions', [
        'language'=>'en',
        'model' => 'whisper-1' // Specifying the model parameter
    ]);

        \Log::info("transcript: ".$response->body());
        return response()->json(['transcript' => $response->json('text')]);
    }
    public function completion(Request $request){
           $request->validate([
                'transcript' => 'required|string',
                'description'=>'sometimes'
            ]);
            $prompt='
Please write coronary angiography report with very long text report with at least ones for LM, LAD, D1, D2, LCX, OM1, OM2 and RCA, PDA, PLV with at least one lines and significant findings and recommendation
please calculate syntax score accurately
"answer in english"
            ';
            $base='For Calculating Syntax score I
Definition stenosis percentage (Diameter Stenosis: DS%):
DS% = 0.0, (Normal, Patent, intact, No significant, Without stenosis, no stenosis)
DS% = 20%-40% (mild, non-significant)
DS% = 30%- 50% (mild, non-significant)
DS% = 50%-70% (moderate, NiFFR assessment)
DS% = 70%-80% (moderate to severe, significant)
DS% = 80%-90% (significant)
DS%= 99% (Sub-total)
DS% = 100% (Cut-ff)
if stenosis is diffiuse or muscle bridge, then segment score = 0.0
If stenosis is =< 50% (Muscle bridge, diffiuse and non-significant),
{
the segment score = 0.
}
If stenosis is > 50%, the segment scoring is
{
Segment Scores for Right Dominant and Left Dominant:
if Right Dominant:
{
- RCA proximal portion > 50%: 5
- RCA mid portion > 50%: 2
- RCA distal portion > 50%: 2
- PDA > 50%: 2
- PLV > 50%: 1
- *Left Dominant:*
- RCA proximal portion > 50%: 0
- RCA mid portion > 50%: 0
- RCA distal portion > 50%: 0
- PDA > 50%: 0
- PLV > 50%: 0
}
Common Scores for Both Dominances:
{
- Left Main > 50%: Right Dominant = 10, Left Dominant = 12
- LAD proximal portion > 50%: 7
- LAD mid portion > 50%: 5
- LAD apical > 50%: 2
- Diagonal 1 > 50%: 2
- Diagonal 2 > 50%: 1
- LCX proximal portion > 50%: Right Dominant = 3, Left Dominant = 5
- LCX mid portion > 50%: 2
- LCX distal portion > 50%: Right Dominant = 1, Left Dominant = 3
- OM1 > 50%: Right Dominant = 1, Left Dominant = 2
- OM2 > 50%: Right Dominant = 1, Left Dominant = 2
}
Morphology Scoring
- Aortic ostial lesion: If yes, add 1
- Severe calcification: If yes, add 2
- Severe tortuosity: If yes, add 2
- Thrombus: If yes, add 1
- If none of the above conditions are present, morphology score is 0.

Syntax Score Calculation
- Syntax Score = Morphology Score + Segment Scoring
            ';
            $response = \Http::withHeaders([
                'Authorization' => 'Bearer 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'
            ])->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-4',
                'messages' => [
                    ["role"=>'system','content'=>$base],
                    ['role' => 'user', 'content' => $request->input('transcript')."\n".$request->description."\n".$prompt]
                ]
            ]);
        \Log::info("response: ".$response->json('choices')[0]['message']['content']);
            return response()->json(['response' => $response->json('choices')[0]['message']['content']]);
    }
}
