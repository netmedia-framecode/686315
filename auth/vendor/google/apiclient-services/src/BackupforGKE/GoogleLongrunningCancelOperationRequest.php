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
                              ->setCellValue('C12', NUL