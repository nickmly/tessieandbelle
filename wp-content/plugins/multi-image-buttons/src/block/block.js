/**
 * BLOCK: multi-image-buttons
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import './editor.scss';
import './style.scss';

const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks
const { InspectorControls, MediaUpload } = wp.blockEditor;
const { PanelBody, Button } = wp.components;

/**
 * Register: aa Gutenberg Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made editor as an option to any
 * editor interface where blocks are implemented.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */
registerBlockType( 'cgb/block-multi-image-buttons', {
	// Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'Multi Image Buttons' ), // Block title.
	icon: 'images-alt2', // Block icon from Dashicons → https://developer.wordpress.org/resource/dashicons/.
	category: 'common', // Block category — Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
	keywords: [
		__( 'multi image buttons' ),
		__( 'CGB Example' ),
		__( 'create-guten-block' ),
	],
	attributes: {
		images: {
			type: 'array',
		},
		links: {
			type: 'array',
		},
	},

	/**
	 * The edit function describes the structure of your block in the context of the editor.
	 * This represents what the editor will render when the block is used.
	 *
	 * The "edit" property must be a valid function.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 *
	 * @param {Object} props Props.
	 * @returns {Mixed} JSX Component.
	 */
	edit: ( { className, attributes, setAttributes } ) => {
		const onUploadImages = ( newImages ) => {
			setAttributes( { images: newImages, links: Array( newImages.length ).fill( null ) } );
		};

		const onChangeLink = ( event, index ) => {
			const links = [ ...attributes.links ];
			links[ index ] = event.target.value;
			setAttributes( { links } );
		};

		const { images, links } = attributes;
		const renderedImages = images ? images.map( ( image ) => {
			return (
				<a key={ image.id } className="tb-multi-image-button">
					<div className="tb-multi-image-button-overlay"></div>
					<p className="tb-multi-image-button-caption">{ image.caption }</p>
					<img className="tb-multi-image-button-image" src={ image.url } alt={ image.alt } />
				</a>
			);
		} ) : null;
		const linkFields = links ? links.map( ( link, index ) => {
			return (
				<input key={ index } type="text" value={ link } onChange={ ( event ) => onChangeLink( event, index ) } />
			);
		} ) : null;

		// Creates a <p class='wp-block-cgb-block-multi-image-buttons'></p>.
		return (
			<div>
				{
					<InspectorControls>
						<PanelBody title="Images">
							<p><strong>Upload images:</strong></p>
							<MediaUpload
								gallery
								multiple
								onSelect={ onUploadImages }
								type="image"
								render={ ( { open } ) => {
									return ( <Button
										onClick={ open }
										icon="upload"
										className="editor-media-placeholder__button is-button is-default is-large"
									>
										Images
									</Button>
									);
								} }
							/>
						</PanelBody>
						<PanelBody title="Links">
							{ linkFields }
						</PanelBody>
					</InspectorControls>
				}
				<div className={ className }>
					{ renderedImages }
				</div>
			</div>
		);
	},

	/**
	 * The save function defines the way in which the different attributes should be combined
	 * into the final markup, which is then serialized by Gutenberg into post_content.
	 *
	 * The "save" property must be specified and must be a valid function.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 *
	 * @param {Object} props Props.
	 * @returns {Mixed} JSX Frontend HTML.
	 */
	save: ( { className, attributes } ) => {
		const { images, links } = attributes;
		const renderedImages = images ? images.map( ( image, index ) => {
			return (
				<a key={ image.id } className="tb-multi-image-button" href={ links[ index ] }>
					<div className="tb-multi-image-button-overlay"></div>
					<p className="tb-multi-image-button-caption">{ image.caption }</p>
					<img className="tb-multi-image-button-image" src={ image.url } alt={ image.alt } />
				</a>
			);
		} ) : null;

		return (
			<div className={ className }>
				{ renderedImages }
			</div>
		);
	},
} );
