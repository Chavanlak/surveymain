<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use App\Models\Surveyform;

// SELECT surveyform.IdSurvey, surveyform.name, question.question, surveyform.date, surveyform.phone, surveyform.email, surveyform.branch, CONCAT(choice.Idchoice,"(",choice.name,")") as answerdata, surveyform.comment
// FROM surveyform INNER JOIN answer ON surveyform.IdSurvey = answer.IdSurveyform INNER JOIN choice ON choice.Idchoice = answer.Idchoice INNER JOIN question ON question.IdQuestion = answer.IdQuestion
// ORDER BY surveyform.IdSurvey;

class ExcelRepository
{
    // public static function exportExcel(){
    //     $dataList = Surveyform::select(['surveyform.IdSurvey', 'surveyform.name', 'surveyform.date', 'surveyform.phone', 'surveyform.email', 'surveyform.branch', 'question.question', DB::raw('CONCAT(choice.Idchoice,"(",choice.name,")") as answerdata'),
    //     'surveyform.comment'])->join('answer','surveyform.IdSurvey','=','answer.IdSurveyform')->join('choice','choice.Idchoice','=','answer.Idchoice')->join('question','question.IdQuestion','=','answer.IdQuestion')->orderBy('surveyform.IdSurvey', 'desc')->get()->toArray();
    //     $answer = Surveyform::select('question.quesion');
    //     for($i=0;$i<count($dataList);$i++){
    //         $branchdat = $dataList[$i]['branch'];
    //         $dataList[$i]['branch'] = $branchdat." ".MastbranchinfoRepository::searchBrachByID($dataList[$i]['branch']);
    //     }
    //     for($i=0;$i<count($dataList);$i++){
    //         $answerdata = $dataList[$i]['answerdata'];
    //         $answer[$i]['answerdata'] = $answerdata;
    //     }
    //     $choice = ['','','',''
    //     ];
    //     // unset($datadump);
    //     // var_dump($datadump);



    //     $newData = array();
    //     $firstLine = true;

    //     foreach ($dataList as $dataRow)
    //     {
    //         if ($firstLine) 
    //         {
    //             $newData[] = array_keys($dataRow);
    //             $firstLine = false;
    //         }

    //         $newData[] = array_values($dataRow);
    //     }

    //     return $newData;
    // }

    // public static function exportExcel()
    // {
    //     $dataList = Surveyform::select(
    //         'surveyform.IdSurvey',
    //         'surveyform.name',
    //         'question.question',
    //         'surveyform.date',
    //         'surveyform.phone',
    //         'surveyform.branch',
    //         'choice.Idchoice',
    //         'choice.name as answer', // Renamed for clarity
    //         'surveyform.comment'

    //     )
    //         ->join('answer', 'surveyform.IdSurvey', '=', 'answer.IdSurveyform')
    //         ->join('choice', 'choice.Idchoice', '=', 'answer.Idchoice')
    //         ->join('question', 'question.IdQuestion', '=', 'answer.IdQuestion')
    //         ->orderBy('surveyform.IdSurvey')
    //         ->get()
    //         ->toArray();
    //     //add brance name   
    //     for ($i = 0; $i < count($dataList); $i++) {
    //         $branchdat = $dataList[$i]['branch'];
    //         $dataList[$i]['branch'] = $branchdat . " " . MastbranchinfoRepository::searchBrachByID($dataList[$i]['branch']);
    //     }
    //     $groupedData = [];
    //     foreach ($dataList as $item) {
    //         $id = $item['IdSurvey'];
    //         if (!isset($groupedData[$id])) {
    //             $groupedData[$id] = [
    //                 'IdSurvey' => $item['Idsurvey'],
    //                 'name' => $item['name'],
    //                 'date' => $item['date'],
    //                 'phone' => $item['phone'],
    //                 'branch' => $item['branch'],
    //                 'questions' => []
    //             ];
    //             $groupedData[$id]['questions'][] = [
    //                 'question' => $item['question'],
    //                 'answer' => $item['answer'],
    //                 'Idchoice' => $item['Idchoice'],
    //                 'comment' => $item['comment']
    //             ];
    //         }
    //         $newData = [];  // Initialize $newData OUTSIDE the loop
    //         $firstLine = true;
        
    //         foreach ($groupedData as $dataRow) { // Iterate through $groupedData
    //             if ($firstLine) {
    //                 $newData[] = array_keys($dataRow); // Use keys from $groupedData
    //                 $firstLine = false;
    //             }
        
    //             $row_values = array_values($dataRow); // Get values from $groupedData
    //             $questions = $row_values['questions'];
    //             unset($row_values['questions']);
    //             $row = $row_values;
    //             foreach($questions as $question){
    //                 $row[] = $question['question'];
    //                 $row[] = $question['answer'];
    //             }
    //             $newData[] = $row; // Add the row to $newData
    //         }
        
    //         return $newData; // Return AFTER processing all data
    //     }
    // }
    public static function exportExcel()
    {
        $dataList = Surveyform::select([
                'surveyform.IdSurvey',
                'surveyform.name',
                'surveyform.date',
                'surveyform.phone',
                'surveyform.email',
                'surveyform.branch',
                'question.question',
                'choice.name as answer',
                'surveyform.comment'
            ])
            ->join('answer', 'surveyform.IdSurvey', '=', 'answer.IdSurveyform')
            ->join('choice', 'choice.Idchoice', '=', 'answer.Idchoice')
            ->join('question', 'question.IdQuestion', '=', 'answer.IdQuestion')
            ->orderBy('surveyform.IdSurvey', 'asc')
            ->get();

        // Pivot ข้อมูลให้แปลงจากแนวตั้งเป็นแนวนอน
        $result = [];
        $questionHeaders = [];

        foreach ($dataList as $row) {
            $surveyId = $row->IdSurvey;

            if (!isset($result[$surveyId])) {
                $result[$surveyId] = [
                    'IdSurvey' => $row->IdSurvey,
                    'name' => $row->name,
                    'date' => $row->date,
                    'phone' => $row->phone,
                    'email' => $row->email,
                    'branch' => $row->branch . ' ' . MastbranchinfoRepository::searchBrachByID($row->branch),
                    'comment' => $row->comment,
                ];
            }

            // เก็บหัวข้อคำถามทั้งหมดเพื่อไปใช้เป็น header
            $questionHeaders[$row->question] = $row->question;

            // เก็บคำตอบลงในแต่ละคอลัมน์ตามชื่อคำถาม
            $result[$surveyId][$row->question] = $row->answer;
        }

        // จัดการข้อมูลให้กลายเป็น array ปกติ พร้อมใส่ header ทุกช่องให้ครบ
        $finalData = [];
        $headers = array_merge(
            ['IdSurvey', 'name', 'date', 'phone', 'email', 'branch'],
            array_values($questionHeaders),
            ['comment']
        );

        $finalData[] = $headers;

        foreach ($result as $surveyData) {
            $row = [];
            foreach ($headers as $header) {
                $row[] = $surveyData[$header] ?? ''; // ถ้าไม่มีคำตอบใส่เป็นค่าว่าง
            }
            $finalData[] = $row;
        }

        return $finalData;
    }

    
}
