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

    public function store($number,$section)
    {
        $date = date('F d, Y');
        $time = date('h:i A');
        try {
            // Enter the share name for your USB printer here
            //$connector = "POS-58";
            //$connector = new WindowsPrintConnector("POS-58");
            $connector = new WindowsPrintConnector("EPSONTM-T82II");
            /* Print a "Hello world" receipt" */
            $printer = new Printer($connector);
            /* Name of shop */
            $printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->setTextSize(1,2);
            $printer->text("Talisay District Hospital\n");
            $printer->feed();

            $printer->selectPrintMode();
            $printer->text("-----------------------------------------------\n");

            $printer->setTextSize(8,7);
            $printer->text("$number\n");

            $printer->selectPrintMode();
            $printer->text("-----------------------------------------------\n");

            $printer->setTextSize(2,2);
            $printer->text("$section\n");

            $printer->selectPrintMode();
            $printer->text("$date\n");
            $printer->text("$time\n");

            $printer->feed();
            /* Title of receipt */
            $printer->setEmphasis(true);

            $printer->feed(2);

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
