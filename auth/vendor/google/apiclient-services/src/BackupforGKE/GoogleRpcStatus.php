Format()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDD2);

$objPHPExcel->getActiveSheet()->setCellValue('A10', 'Date/Time')
                              ->setCellValue('B10', 'Time')
                              ->setCellValue('C10', PHPExcel_Shared_Date::PHPToExcel( $dateTimeNow ));
$objPHPExcel->getActiveSheet()->getStyle('C10')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_TIME4);

$objPHPExcel->getActiveSheet()->setCellValue('A11', 'Date/Time')
                              ->setCellValue('B11', 'Date and Time')
                              ->setCellValue('C11', PHPExcel_Shared_Date::PHPToExcel( $dateTimeNow ));
$objPHPExcel->getActiveSheet()->getStyle('C11')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DATETIME);

$objPHPExcel->getActiveSheet()->setCellValue('A12', 'NULL')
                              ->setCellValue('C12', NULL);

$objRichText = new PHPExcel_RichText();
$objRichText->createText('你好 ');

$objPayable = $objRichText->createTextRun('你 好 吗？');
$objPayable->getFont()->setBold(true);
$objPayable->getFont()->setItalic(true);
$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_DARKGREEN ) );

$objRichText->createText(', unless specified otherwise on the invoice.');

$objPHPExcel->getActiveSheet()->setCellValue('A13', 'Rich Text')
                              ->setCellValue('C13', $objRichText);


$objRichText2 = new PHPExcel_RichText();
$objRichText2->createText("black text\n");

$objRed = $objRichText2->createTextRun("red text");
$objRed->getFont()->setColor( new PHPEx