<?php
namespace App\Repository;

use Illuminate\Support\Facades\DB;
use App\Models\Surveyform;

// SELECT surveyform.IdSurvey, surveyform.name, question.question, surveyform.date, surveyform.phone, surveyform.email, surveyform.branch, CONCAT(choice.Idchoice,"(",choice.name,")") as answerdata, surveyform.comment
// FROM surveyform INNER JOIN answer ON surveyform.IdSurvey = answer.IdSurveyform INNER JOIN choice ON choice.Idchoice = answer.Idchoice INNER JOIN question ON question.IdQuestion = answer.IdQuestion
// ORDER BY surveyform.IdSurvey;

class ExcelRepository{
    public static function exportExcel(){
        $dataList = Surveyform::select(['surveyform.IdSurvey', 'surveyform.name', 'surveyform.date', 'surveyform.phone', 'surveyform.email', 'surveyform.branch', 'question.question', DB::raw('CONCAT(choice.Idchoice,"(",choice.name,")") as answerdata'),
        'surveyform.comment'])->join('answer','surveyform.IdSurvey','=','answer.IdSurveyform')->join('choice','choice.Idchoice','=','answer.Idchoice')->join('question','question.IdQuestion','=','answer.IdQuestion')->orderBy('surveyform.IdSurvey', 'desc')->get()->toArray();

        for($i=0;$i<count($dataList);$i++){
            $branchdat = $dataList[$i]['branch'];
            $dataList[$i]['branch'] = $branchdat." ".MastbranchinfoRepository::searchBrachByID($dataList[$i]['branch']);
        }

        // unset($datadump);
        // var_dump($datadump);



        $newData = array();
        $firstLine = true;

        foreach ($dataList as $dataRow)
        {
            if ($firstLine)
            {
                $newData[] = array_keys($dataRow);
                $firstLine = false;
            }

            $newData[] = array_values($dataRow);
        }

        return $newData;
    }
}



?>
