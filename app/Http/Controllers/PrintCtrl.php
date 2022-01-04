<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Console\ConsoleMakeCommand;
use Illuminate\Support\Facades\Session;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class PrintCtrl extends Controller
{
    public function index()
    {
        return view('print');
    }

    public function store($number,$section,$priority=0)
    {
        $date = date('M d, Y h:i A');

        if($section=="OB")
            $section = "OB-Gyne";


        try {
            // Enter the share name for your USB printer here
            //$connector = "POS-58";
            //$connector = new WindowsPrintConnector("POS-58");
            //$connector = new WindowsPrintConnector("smb://Administrator:pass1234@Maui/WORKGROUP/MAUI-T82II");
            $connector = new WindowsPrintConnector("smb://Administrator:pass1234@Maui/WORKGROUP/MAUI-T82II");
            /* Print a "Hello world" receipt" */
            $printer = new Printer($connector);
            /* Name of shop */
            $printer->setJustification($printer::JUSTIFY_CENTER);
            $printer->setEmphasis(true); //bold characters
            $printer->text("CEBU SOUTH MEDICAL CENTER \n");
            $printer->text("Out Patient Department \n");
            $printer->setEmphasis(false);
            if($priority==1)
            {
                $printer->text("<Priority Lane>\n");
            }
            $printer->text("---------------------------------------\n");
            $printer->setTextSize(6,6);
            $printer->text("$number\n");
            $printer->selectPrintMode();
            $printer->text("---------------------------------------\n");

            $printer->setEmphasis(true); //bold characters
            $printer->setFont($printer::FONT_C);
            $printer->text("$section \n");

            $printer->setEmphasis(false);

            $printer->text("$date\n");

            /* Cut the receipt and open the cash drawer */
            $printer->cut();
            $printer->pulse();
            /* Close printer */
            $printer->close();
            // echo "Sudah di Print";
            return 1;
        } catch (Exception $e) {
            $message = "Couldn't print to this printer: " . $e->getMessage() . "\n";
            return 0;
        }
    }

    public function prints()
    {

        try {
            // Enter the share name for your USB printer here
            //$connector = "POS-58";
            //$connector = new WindowsPrintConnector("POS-58");
            $connector = new WindowsPrintConnector("MAUI-T82II");
            /* Print a "Hello world" receipt" */
            $printer = new Printer($connector);
            /* Name of shop */
            $printer->setJustification($printer::JUSTIFY_CENTER);
            $printer->setEmphasis(true); //bold characters
            $printer->text("TALISAY DISTRICT HOSPITAL \n");
            $printer->text("Out Patient Department \n");

            $printer->setEmphasis(false);
            $printer->text("---------------------------------------\n");
            $printer->setTextSize(6,6);
            $printer->text("P1\n");
            $printer->selectPrintMode();
            $printer->text("---------------------------------------\n");

            $printer->setEmphasis(true); //bold characters
            $printer->setFont($printer::FONT_C);
            $printer->text("Pedia \n");

            $printer->setEmphasis(false);

            $printer->text("Dec 10,2018 9:53 AM\n");


            /* Cut the receipt and open the cash drawer */
            $printer->cut();
            $printer->pulse();
            /* Close printer */
            $printer->close();
            // echo "Sudah di Print";
            return 1;
        } catch (Exception $e) {
            $message = "Couldn't print to this printer: " . $e->getMessage() . "\n";
            return 0;
        }
    }

}
