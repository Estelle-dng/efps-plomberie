#Easy Code Plugin

Advance plugin for wordpress working with tinyMce 4

Version 2.0 !

## Exemple Shortcode

```
if(!function_exists('ctaShortcode')) {
    function ctaShortcode() {

        $fields = array(
            'type' => 'listbox',
            'name' => 'id',
            'label' => 'cta',
            'values' => array()
        );

        $fields['values'][] = array(
            'text' => 'ahah', 'value' => 1,
            'text' => 'ohoh', 'value' => 12,
        );

        $arrayFields[] = $fields;
        $arrayFields[] = array(
        "type" => 'textbox',
        "name" => 'ctalabel',
        "label" => 'Label du CTA',
        "value" => ''
    );

        create_easy_code('display_cta', 'Afficher un CTA', $arrayFields, 'ctaShortcodeCallback');
    }

    function ctaShortcodeCallback($atts) {
        $html = "<div>" . $atts['id'] . "</div>";
        $html .= "<div>" . $atts['ctalabel'] . "</div>";

        return $html;
    }

    ctaShortcode();
}
```