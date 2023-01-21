@switch($field['htmlType'])
    @case("filepond_image")
        cellRenderer: "imageCellRenderer",
    @break
    @case("checkbox")
        cellRenderer: "checkboxCellRenderer",
        cellRendererParams: {
            //yesLabel:"فعال",
            //noLabel:"غیرفعال",
            //if you dont specify the labels it shows and icon
        },
    @break

@endswitch
