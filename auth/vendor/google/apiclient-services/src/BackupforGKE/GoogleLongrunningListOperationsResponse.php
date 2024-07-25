<?php
/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */

/** Error reporting */
error_reporting(E_ALL);

if (PHP_SAPI != 'cli') {
	die ('This script executes all tests, and should only be run from the command line');
}

// List of tests
$aTests = array(
	  '01simple.php'
	, '01simplePCLZip.php'
	, '02types.php'
	, '02types-xls.php'
	, '03formulas.php'
	, '04printing.php'
	, '05featuredemo.php'
	, '06largescale.php'
	, '06largescale-with-cellcaching.php'
	, '06largescale-with-cellcaching-sqlite.php'
	, '06largescale-with-cellcaching-sqlite3.php'
	, '06largescale-xls.php'
	, '07reader.php'
	, '07readerPCLZip.php'
	, '08conditionalformatting.