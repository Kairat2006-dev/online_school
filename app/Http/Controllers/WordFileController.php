<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;

class WordFileController extends Controller
{
    public static function readDocxFile($filePath)
    {
        $phpWord = IOFactory::load($filePath);
        $sections = $phpWord->getSections();
        foreach ($sections as $section) {
            $elements = $section->getElements();
            foreach ($elements as $element) {
                dd(1111);
            }
        }   }
}
