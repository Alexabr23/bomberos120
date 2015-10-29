<?php
/**
 * @file
 * page_fields.field_group.inc
 */

/**
 * Implements hook_field_group_info().
 */
function page_fields_field_group_info() {
  $export = array();

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_layout_settings|node|page|form';
  $field_group->group_name = 'group_layout_settings';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'page';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Layout settings',
    'weight' => '3',
    'children' => array(
      0 => 'field_page_layout',
      1 => 'field_page_show_header',
      2 => 'field_page_header_background',
      3 => 'field_page_subtitle',
      4 => 'field_page_show_breadcrumbs',
      5 => 'field_page_bgcolor',
      6 => 'field_header_bg_img',
      7 => 'field_title_bar_text_color',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-layout-settings field-group-fieldset',
        'required_fields' => 1,
      ),
    ),
  );
  $export['group_layout_settings|node|page|form'] = $field_group;

  return $export;
}
