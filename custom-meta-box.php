<?php

/*
 * Plugin Name:       Custom Meta Box
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       This is  Meta Box plugin. With the phone ..
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Muhammad Aniab
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

 class mb_meta_box{
	public function __construct(){
		add_action("add_meta_boxes", array( $this,"create_meta_box") );
		add_action("save_post", array( $this,"save_meta_box") );
	}

	public function create_meta_box( ){
		add_meta_box(
			"meta_box_id",
			"Meta box name",
			array($this,"display_meta_box_content"),
			"post",
	

		);

	}

	public function display_meta_box_content( $post ) {
		$post_id = $post->ID;
		$post_meta=get_post_meta($post_id,"Meta box name",true);
		?>
		<label for="">Instructor Name</label>
		<input type="text" value="<?php echo $post_meta ?>" name="instructor_name">
		<?php

	}

	public function save_meta_box( $post_id) {
		$meta_box = $_POST['instructor_name'];
		update_post_meta( $post_id,"Meta box name","$meta_box");


	}

	
 }

 //new mb_meta_box();

 // New meta box creation by AIO
class mba_meta_box_aio{
	public function __construct(){
		add_filter( 'rwmb_meta_boxes',array($this,'your_prefix_register_meta_boxes') );
	}
	public function your_prefix_register_meta_boxes( $meta_boxes ) {
		$prefix = '';
	
		$meta_boxes[] = [
			'title'   => esc_html__( 'New Meta Box', 'online-generator' ),
			'id'      => 'new_meta_box_id',
			'post_types'=> 'post',
			'context' => 'side',
			'fields'  => [
				[
					'type'    => 'radio',
					'name'    => esc_html__( 'Radio', 'online-generator' ),
					'id'      => $prefix . 'radio_0w9ik95frmkg',
					'options' => [
						'Good'   => esc_html__( 'Good', 'online-generator' ),
						'Best'   => esc_html__( 'Best', 'online-generator' ),
						'Normal' => esc_html__( 'Normal', 'online-generator' ),
						'Bad'    => esc_html__( 'Bad', 'online-generator' ),
					],
				],
			],
		];
	
		return $meta_boxes;
	}
}

new mba_meta_box_aio();

