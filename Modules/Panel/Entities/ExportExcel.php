<?php

namespace Modules\Panel\Entities;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model as Model;
// use Jenssegers\Mongodb\Eloquent\Model;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportExcel implements FromQuery, WithHeadings, ShouldAutoSize,WithEvents,WithMapping
{
    use Exportable;
    protected $repo;
    protected $headings=[];
    protected $fields=[];
    public function __construct(BaseRepository $repo,$headings=[])
    {
        $this->repo=$repo;
        $this->fields=$this->generateIndexFields();
        $this->headings=count($headings) ? $headings:$this->generateHeadings();

    }
    public function generateIndexFields()
    {
        $fields=$this->repo->model()::$fields;
        $fields=array_filter($fields,function($item){
            return $item['inIndex'];
        });
        return $fields;
    }
    public function query()
    {
        return $this->repo->allQuery();
    }
    public function map($item): array
    {
        $row=[];
        foreach($this->fields as $name=>$field){
            $value=isset($item->{$name}) ? $item->{$name}:"";
            if($value instanceof Model){
                $value=$value->{$value::$title};
            }
            if(in_array($field['htmlType'],["select","multi_select","radio"])){
                if(isset($field['options'])){
                    $value=isset($field['options'][$value]) ? $field['options'][$value]:$value;
                }
            }
            $row[]=$value;
        }
        return $row;
    }
    public function generateHeadings()
    {

        $headings=[];

        foreach($this->fields as $name=>$field){
            $title=(string) (isset($field['title']) ? $field['title']:\Str::of($name)->snake()->replace('_', ' ')->title());
            $headings[]= __($title);
        }
        return $headings;
    }

    public function headings(): array
    {
        return $this->headings;
    }
    public function withHeadings($headings)
    {
        $this->headings=$headings;
        return $this;
    }
    public function withFields($fields)
    {
        $this->fields=$fields;
        return $this;
    }
     /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
    //             $spreadsheet->getActiveSheet()->getStyle('A1:D4')
    // ->getAlignment()->setWrapText(true);
//     $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
// $spreadsheet->getDefaultStyle()->getFont()->setSize(8);
// $styleArray = [
//     'borders' => [
//         'outline' => [
//             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
//             'color' => ['argb' => 'FFFF0000'],
//         ],
//     ],
// ];

// $worksheet->getStyle('B2:G8')->applyFromArray($styleArray);
            },
        ];
    }
}
