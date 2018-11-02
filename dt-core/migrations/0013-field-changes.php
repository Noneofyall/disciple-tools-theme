<?php

class Disciple_Tools_Migration_0013 extends Disciple_Tools_Migration {
    public function up() {
        $contact_fields = Disciple_Tools_Contact_Post_Type::instance()->get_custom_fields_settings( null, null, true );
        $custom_lists = dt_get_option( "dt_site_custom_lists" );
        $custom_field_options = dt_get_option( "dt_field_customizations" );

        foreach ( $custom_lists as $list_key => $list_field ){
            if ( in_array( $list_key, [ "seeker_path", "overall_status", "custom_reason_closed", "custom_reason_pause", "custom_reason_unassignable" ] )){
                $key = str_replace( "custom_", "", $list_key );
                if ( !isset( $custom_field_options["contacts"][$key] )){
                    $custom_field_options["contacts"][$key] = [
                        "default" => []
                    ];
                }
                foreach ( $list_field as $option_key => $option_value ){
                    if ( !isset( $contact_fields[$key]["default"][$option_key] ) ){
                        $custom_field_options["contacts"][$key]["default"][$option_key] = [ "label" => $option_value ];
                    }
                }
            }
        }

        $custom_dropdowns = $custom_lists["custom_dropdown_contact_options"] ?? [];
        foreach ( $custom_dropdowns as $k => $v ){
            if ( ! isset( $contact_fields[$k] ) ){
                unset( $v["label"] );
                $default = [];
                foreach ( $v as $option_key => $option_value ){
                    $default[$option_key] = [ "label" => $option_value ];
                }
                $custom_field_options["contacts"][$k] = [
                    'name'        => $k,
                    'type'        => 'key_select',
                    'default'     => $default,
                ];
            }
        }


        update_option( "dt_field_customizations", $custom_field_options );

    }

    public function down() {
        return;
    }

    public function test() {
        $this->test_expected_tables();
    }


    public function get_expected_tables(): array {
        return array();
    }
}
