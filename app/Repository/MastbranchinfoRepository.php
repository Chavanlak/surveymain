<?php
namespace App\Repository;

use App\Http\Controllers\AnswerController;
use App\Models\Mastbranchinfo;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MastbranchinfoRepository{
    public static function getAllBranch(){
        return Mastbranchinfo::all();
    }
    public static function selectbranch(){
    //    $branches = DB::table('fujipos.mastbranchinfo')
    $branches = Mastbranchinfo::select(['MBranchInfo_Code','Location'])
    //    ->select('location')
    ->where('dbtype', 'fuji')
    ->whereNotIn('MBranchInfo_Code',['HO'])
    ->where('branch_active',1)
    ->where(function ($query) {
        $query->whereNull('closed')
            ->orWhere('closed', 0);
    })
    ->get();
    return $branches;
    // return view('surveyform',compact('branches'));
    }
   


    public static function searchBrachByID($branch){
        $branchName = Mastbranchinfo::select(['Mastbranchinfo.Location'])->where('Mastbranchinfo.MBranchInfo_Code','=',$branch)->first();
        return $branchName->Location;
    }

}
?>
