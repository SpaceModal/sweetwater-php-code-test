<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use DB;
use Log;

class CommentController extends Controller
{

    //Gets all necessary comments and sends them back in a response object
    //Also updates the shipdate_expected field
    public function GetComments(){
        $this->UpdateCommentsShipDate();

        $candyComments = $this->GetCandyComments();
        $callComments = $this->GetCallComments();
        $referralComments = $this->GetReferralComments();
        $signatureComments = $this->GetSignatureComments();
        $miscComments = $this->GetMiscComments();

        return response()->json([
            'candy' => $candyComments,
            'call' => $callComments,
            'referral' => $referralComments,
            'signature' => $signatureComments,
            'misc' => $miscComments
        ], 200);
    }


    //Gets all comments that mention candy
    private function GetCandyComments(){
        $candyComments = Comments::select('orderid', 'comments', 'shipdate_expected')
            ->where('comments', 'like', '%candy%')
            ->orderBy('orderid', 'asc')
            ->get();

        return $candyComments;
    }


    //Gets all comments that mention calling or calls
    private function GetCallComments(){
        $callComments = Comments::select('orderid', 'comments', 'shipdate_expected')
            ->where('comments', 'like', '%call%')
            ->orderBy('orderid', 'asc')
            ->get();

        return $callComments;
    }


    //Gets all comments that mention referrals or referring
    private function GetReferralComments(){
        $referralComments = Comments::select('orderid', 'comments', 'shipdate_expected')
            ->where('comments', 'like', '%referr%')
            ->orderBy('orderid', 'asc')
            ->get();

        return $referralComments;
    }


    //Gets all comments that mention of signatures or signing.
    private function GetSignatureComments(){
        $signatureComments = Comments::select('orderid', 'comments', 'shipdate_expected')
            ->where('comments', 'like', '%sign%')
            ->orderBy('orderid', 'asc')
            ->get();

        return $signatureComments;
    }


    //Gets all miscellaneous comments
    private function GetMiscComments(){
        $miscComments = Comments::select('orderid', 'comments', 'shipdate_expected')
            ->whereRaw("comments not like '%candy%' and comments not like '%call%' and comments not like '%referr%' and comments not like '%sign%' ")
            ->orderBy('orderid', 'asc')
            ->get();
        return $miscComments;
    }


    //This pulls all of the comment entries and checks to see if it has a valid ship date in
    //the comment column. If so, it updates the shipdate_expected column with the extracted date
    //and removes the date from the original comment
    private function UpdateCommentsShipDate(){
        $allComments = Comments::all();

        for($i = 0; $i < sizeof($allComments); $i++){
            $currentCommentId = $allComments[$i]->orderid;
            $currentComment = $allComments[$i]->comments;

            if(stripos($currentComment, "Expected Ship Date: ")){
                $commentArray = explode("Expected Ship Date: ", $currentComment);
                $shipDate = $this->convertStringtoDateTime(substr($commentArray[1], 0, 8));
                $updatedComment = $commentArray[0];

                Comments::where('orderid', $currentCommentId)
                    ->update(["comments"=>$updatedComment,"shipdate_expected" => $shipDate]);
            }
        }
    }


    //Formats the shipdate_expected value into a usable datetime
    private function convertStringtoDateTime($shipDate){
        $splitDate = explode("/", $shipDate);
        $month = $splitDate[0];
        $day = $splitDate[1];
        $year = "20".$splitDate[2];

        $newDate = date("Y-m-d", strtotime($year."-".$month."-".$day));

        return $newDate;
    }

}
