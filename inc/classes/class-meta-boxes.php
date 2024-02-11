<?php
/**
 * Register Meta Boxes
 *
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Meta_Boxes {
	use Singleton;

	protected function __construct() {
		$this->setup_hooks();
	}

	protected function setup_hooks() {
		add_action( 'add_meta_boxes', [ $this, 'add_custom_meta_box' ] );
		add_action( 'save_post', [ $this, 'save_post_meta_data' ] );
	}

	public function add_custom_meta_box() {
		$screens = [ 'post' ];

		foreach ( $screens as $screen ) {
			add_meta_box(
				'hide-page-title',
				__( 'Hide page title', 'aquila' ),
				[ $this, 'custom_meta_box_html' ],
				$screen,
				'side'
			);
		}
	}

	public function custom_meta_box_html( $post ) {
		$value = get_post_meta( $post->ID, '_hide_page_title', true );

		/**
		 * Use nonce for verification.
		 * This will create a hidden input field with id and name as
		 * 'hide_title_meta_box_nonce_name' and unique nonce input value.
		 */
		wp_nonce_field( plugin_basename(__FILE__), 'hide_title_meta_box_nonce_name' );

		?>
		<label for="aquila-field"><?php esc_html_e( 'Hide the page title', 'aquila' ); ?></label>
		<select name="aquila_hide_title_field" id="aquila-field" class="postbox">
			<option value=""><?php esc_html_e( 'Select', 'aquila' ); ?></option>
			<option value="yes" <?php selected( $value, 'yes' ); ?>>
				<?php esc_html_e( 'Yes', 'aquila' ); ?>
			</option>
			<option value="no" <?php selected( $value, 'no' ); ?>>
				<?php esc_html_e( 'No', 'aquila' ); ?>
			</option>
		</select>
		<?php
	}

	public function save_post_meta_data( $post_id ) {
		if (!current_user_can('edit_post', $post_id)){
			return;
		}

    if (
      !isset($_POST['hide_title_meta_box_nonce_name']) || 
      !wp_verify_nonce($_POST['hide_title_meta_box_nonce_name'], plugin_basename(__FILE__))
    ){
			return;
		}

		if (array_key_exists( 'aquila_hide_title_field', $_POST )){
			update_post_meta(
				$post_id,
				'_hide_page_title',
				$_POST['aquila_hide_title_field']
			);
		}
	}

}
