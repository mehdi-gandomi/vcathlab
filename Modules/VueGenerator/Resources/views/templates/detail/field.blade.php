@switch($htmlType)
@case('date')
@case('datetime')
    {{ dateFormat("<?= $field['name'] ?>") }}
@break
@case('radio')
    {{ radioFormat("<?= $field['name'] ?>") }}
@break
@case('select')
@case('multi_select')
    {{ selectFormat("<?= $field['name'] ?>") }}
@break
@case('filepond')
    <a :href="url(details.<?= $field['name'] ?>)" :download="Iracode.basename(details.<?= $field['name'] ?>)">{{ Iracode.basename(details.<?= $field['name'] ?>) }}</a>
@break
@default
    {{ details.<?= $field['name'] ?> }}
@endswitch
