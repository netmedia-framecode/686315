Input error')
    ->setError('Continent is not in the list.')
    ->setPromptTitle('Pick from the list')
    ->setPrompt('Please pick a continent from the drop-down list.')
    ->setFormula1('=Continents');

$objPHPExcel->getActiveSheet()
    ->setCellValue('A3', 'Country:');
$objPHPExcel->getActiveSheet()
    ->getStyle('A3')
    ->getFont()->setBold(true);

$objValidation = $objPHPExcel->getActiveSheet()
    ->getCell('B3')
    ->getDataValidation();
$objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST )
    ->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION )
    ->setAllowBlank(false)
    ->setShowInputMessage(true)
    ->setShowErrorMessage(true)
    ->setShowDropDown(true)
    ->setErrorTitle('Input error')
    ->setError('Country is not in the list.')
    ->setPromptTitle('Pick from the list')
    ->setPrompt('Please pick a country from the drop-down list.')
    ->setFormula1('=INDIRECT($B$1)');


$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30)