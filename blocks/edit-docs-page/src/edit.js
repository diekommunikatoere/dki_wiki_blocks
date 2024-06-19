/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from "@wordpress/i18n";

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import { PanelBody, ToggleControl } from "@wordpress/components";

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {
	const { isButton } = attributes;

	let buttonClass = isButton ? "primary-button" : "";

	return (
		<>
			<InspectorControls>
				<PanelBody title={__("Settings", "edit-docs-page")}>
					<ToggleControl
						checked={isButton}
						label={__("Show as Button", "edit-docs-page")}
						onChange={(value) => setAttributes({ isButton: value })}
					/>
					{isButton && (
						<>
							<p>Button Options</p>
						</>
					)}
				</PanelBody>
			</InspectorControls>
			<p {...useBlockProps()}>
				<a class={buttonClass} href="#">
					Text
				</a>
			</p>
		</>
	);
}
