<?php

namespace App\Http\Controllers;

use App\Repository\MastbranchinfoRepository;
use Illuminate\Http\Request;

class MastbranchinfoController extends Controller
{
    public static function getAllbranch(){
        $branch = MastbranchinfoRepository::getAllBranch();
        // return $branch->MBranchInfo_Code;
        return view('show',['branch'=>$branch]);
      
    }
    // public static function getbranch(Request $request){
    //     $MBranchInfo_Code = $request->MBranchInfo_Code;
    //     $location = $request->location;

    // }
    
}
