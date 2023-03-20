<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Question;
use Session;

class BulkImport implements ToModel,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    
         public function model(array $row)
	    {
	    	// dd($row);
	        return new Question([
	            'question'     => $row['question'],
	            'answer_a'     => $row['answer_a'],
	            'answer_b'     => $row['answer_b'],
	            'answer_c'     => $row['answer_c'],
	            'answer_d'     => $row['answer_d'],
	            'correct_answer' => $row['correct_answer'],
	            'questions_no' =>  $row['questions_no'],
	            'module_id'    => Session::get('module_id'),
	            'course_id'    => Session::get('course_id'),
	        ]);
	    }
    
}
