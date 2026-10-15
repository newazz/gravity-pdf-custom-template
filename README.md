# Gravity PDF Custom Template

A custom Gravity PDF template in PHP that turns a Gravity Forms submission into a clean, branded one-page document. This is the kind of custom template I build when the default Gravity PDF layouts are not enough.

## What it shows

- A branded header, a field table, and a footer, all styled for the mPDF engine that Gravity PDF uses.
- Safe output: every value pulled from the form is escaped before it reaches the PDF.
- Field labels read from the form definition, so the template stays correct even if labels change.

## Files

- `summary-template.php` : the template. Place it in your theme's `PDF_EXTENDED_TEMPLATES` folder, or upload it from Gravity PDF, Advanced, Manage Templates, then select it in the form's PDF settings.

## Customizing

- Change the field IDs in `$body_fields` to control which answers appear.
- Edit the CSS at the top for your brand colors, keeping to the mPDF-supported CSS subset.

## Notes

Generic sample, no client data. For data-heavy documents like invoices or multi-page reports, I extend this same pattern with repeating sections and calculations.

---

Built by Newaz, FormLogic Studio (https://formlogicstudio.com).
