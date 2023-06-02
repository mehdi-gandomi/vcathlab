<?php

namespace Modules\User\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\User\Enums\Sex;
use PhpOffice\PhpWord\Element\TextRun;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html;

class CreateNIFFRReport
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // \PhpOffice\PhpWord\Settings::setPdfRendererPath(base_path("vendor/tecnickcom/tcpdf"));
        // \PhpOffice\PhpWord\Settings::setPdfRendererName('TCPDF');
        // \PhpOffice\PhpWord\Settings::setPdfRendererPath(base_path('vendor/dompdf/dompdf'));
	    // \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
        $template=new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/report.docx"));
        $template->setValue("hospital",$event->nIFFRCase->niffr_case->patient->hospital);
        $template->setValue("doctor",$event->nIFFRCase->niffr_case->physician);
        $template->setValue("patient",$event->nIFFRCase->niffr_case->patient->name);
        $template->setValue("sex",($event->nIFFRCase->niffr_case->patient->sex == 0 ? 'Female':"Male"));
        $template->setValue("age",$event->nIFFRCase->niffr_case->patient->age);
        $template->setValue("time",$event->nIFFRCase->created_at->format("H:i"));
        $template->setValue("date",$event->nIFFRCase->created_at->format("Y-m-d"));
        $template->setValue("vessel",$event->nIFFRCase->vessel);
        $template->setValue("region",$event->nIFFRCase->region);
        $template->setValue("status",$this->renderStatus($event->nIFFRCase));
        $template->setValue("MAP",$event->nIFFRCase->map);
        $template->setValue("MAP", $event->nIFFRCase->map);
        $template->setValue("FFR", $event->nIFFRCase->ffr);
        $template->setValue("ASS",$event->nIFFRCase->ass);
        $template->setValue("DSS", $event->nIFFRCase->dss);
        $template->setValue("WSS", $event->nIFFRCase->wss);
        $template->setValue("IMR", $event->nIFFRCase->imr);
        $template->setValue("GP", $event->nIFFRCase->gp);
        $template->setValue("PD",number_format(($event->nIFFRCase->map * $event->nIFFRCase->ffr), 2, '.', ''));
        $filename=$this->getName($event);
        if(!file_exists(storage_path("app/public/niffr_cases"))){
            mkdir(storage_path("app/public/niffr_cases"));
        }
        $template->saveAs(storage_path("app/public/niffr_cases/".$filename));
        // $phpWord = \PhpOffice\PhpWord\IOFactory::load(storage_path("app/public/niffr_cases/".$filename));
        // //Save it
        // $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord , 'PDF');
        // $xmlWriter->save(storage_path('result.pdf'));
        $event->nIFFRCase->update([
            'result_file'=>"storage/niffr_cases/".$filename
        ]);
    }
    public function getName($event)
    {
        return "NIFFR-".$event->nIFFRCase->vessel."-".$event->nIFFRCase->region."-".$event->nIFFRCase->created_at->format("Y-m-d")."_".$event->nIFFRCase->id.".docx";
    }
    public function renderStatus($point)
    {
        $status = "Non-Significant";
        if ($point->ffr < 0.8)
        {
            $status = "Significant";
        }
        return $status;
    }
    protected function getBodyBlock($string){
        if (preg_match('%(?i)(?<=<w:body>)[\s|\S]*?(?=</w:body>)%', $string, $regs)) {
            return $regs[0];
        } else {
            return '';
        }
    }
}
