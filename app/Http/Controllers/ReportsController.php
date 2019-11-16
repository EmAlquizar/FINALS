<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function word()
    {
    	$templateProcessor->setValue('first_name', 'Juan');
    	$templateProcessor->setValue('last_name', 'Blank');
    	$templateProcessor->saveAs('Juan DelaCruz.docx');
    	return reponse()->download('Juan DelaCruz.docx');
    }
    public function excel()
    {
    	$spreadsheet =\PhpOffice\PhpSpreadsheet\IOfactory::load('./templates/form138.xlsx');
    	$worksheet =$spreadsheet->getActiveSheet();
    	$worksheet->getCell('A7')->setValue('Name: Juan dela');
    	$worksheet->getCell('A8')->setValue('11-B');

    	$writer=\PhpOffcie\PhpSpreadsheet\IOFactory::createdWriter($spreadsheet, 'Xls');
    	$writer->save()->download('form138.xlsx');
    	return response()->download('form138.xlsx');
    }
}
