<?php
/**
 * Template Name: FormLogic Summary
 * Version: 1.0
 * Author: Newaz, FormLogic Studio
 * Description: Clean, branded one-page PDF generated from a Gravity Forms entry.
 *
 * Gravity PDF passes these variables to the template:
 * $form, $entry, $form_data, $fields, $config, $settings, $gfpdf
 * The rendering engine is mPDF, so the CSS below uses the mPDF-supported subset.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Never allow direct access.
}

// Helper: safely read a field value from the processed form data.
function fls_value( $form_data, $field_id ) {
    return ! empty( $form_data['field'][ $field_id ] ) ? wp_kses_post( $form_data['field'][ $field_id ] ) : '';
}

$first_name = fls_value( $form_data, '1' );
$email      = fls_value( $form_data, '2' );
$submitted  = esc_html( rgar( $form_data, 'date_created' ) );

// Field IDs to show in the body, in order.
$body_fields = array( '3', '4', '5' );
?>
<style>
    body { font-family: sans-serif; color: #1f2933; font-size: 11pt; }
    .header { background: #2563eb; color: #ffffff; padding: 18px 22px; }
    .header h1 { margin: 0; font-size: 18pt; }
    .meta { color: #e8effe; font-size: 9pt; margin-top: 4px; }
    .section { padding: 18px 22px; }
    table.fields { width: 100%; border-collapse: collapse; }
    table.fields td { padding: 8px 0; border-bottom: 1px solid #e4e7eb; vertical-align: top; }
    td.label { width: 35%; color: #616e7c; font-size: 9.5pt; }
    td.value { color: #1f2933; }
    .footer { padding: 14px 22px; color: #9aa5b1; font-size: 8.5pt; border-top: 1px solid #e4e7eb; }
</style>

<div class="header">
    <h1>Submission Summary</h1>
    <div class="meta">Prepared for <?php echo $first_name; ?> &nbsp;|&nbsp; <?php echo $submitted; ?></div>
</div>

<div class="section">
    <table class="fields">
        <tr>
            <td class="label">Name</td>
            <td class="value"><?php echo $first_name; ?></td>
        </tr>
        <tr>
            <td class="label">Email</td>
            <td class="value"><?php echo $email; ?></td>
        </tr>
        <?php
        foreach ( $body_fields as $id ) :
            $field = GFFormsModel::get_field( $form, $id );
            if ( empty( $field ) ) {
                continue;
            }
            $label = esc_html( GFCommon::get_label( $field ) );
            $value = fls_value( $form_data, $id );
            if ( $value === '' ) {
                continue;
            }
            ?>
            <tr>
                <td class="label"><?php echo $label; ?></td>
                <td class="value"><?php echo $value; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="footer">
    Generated automatically from a Gravity Forms submission. FormLogic Studio.
</div>
