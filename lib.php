<?php

function block_sharing_cart_after_file_deleted(\stored_file $file): void
{
    $base_factory = \block_sharing_cart\app\factory::make();

    if ($item = $base_factory->item()->repository()->get_by_file_id($file->get_id())) {
        $base_factory->item()->repository()->delete_by_id($item->get_id());
    }
}

function block_sharing_cart_output_fragment_item($args)
{
    global $OUTPUT, $USER;

    $item_id = clean_param($args['item_id'], PARAM_INT);

    $base_factory = \block_sharing_cart\app\factory::make();
    $item = $base_factory->item()->repository()->get_by_id($item_id);
    if (!$item) {
        return '';
    }

    if ($item->get_user_id() !== (int)$USER->id) {
        return '';
    }

    $template = new \block_sharing_cart\output\block\item($base_factory, $item);

    return $OUTPUT->render($template);
}

function block_sharing_cart_output_fragment_item_restore_form($args)
{
    global $OUTPUT, $USER;

    $item_id = clean_param($args['item_id'], PARAM_INT);

    $base_factory = \block_sharing_cart\app\factory::make();
    $item = $base_factory->item()->repository()->get_by_id($item_id);
    if (!$item) {
        return '';
    }

    if ($item->get_user_id() !== (int)$USER->id) {
        return '';
    }

    if ($item->is_module()) {
        return get_string(
                'confirm_copy_item',
                'block_sharing_cart'
            ) . "<input type='checkbox' class='form-check-input d-none' data-id='{$item->get_old_instance_id()}' data-type='coursemodule' checked>";
    }

    $template = new \block_sharing_cart\output\modal\import_item_modal_body($base_factory, $item);

    return $OUTPUT->render($template);
}