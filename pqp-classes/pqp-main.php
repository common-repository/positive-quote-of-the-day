<?php
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

class pqp_main{
	static $addshortcode;
	public function __construct(){
		self::$addshortcode=false;
		$this->init();
	}
	public function init(){
	add_shortcode( 'pqp-quote', array($this,'pqp_display_shortcode_content'));
	add_action('wp_footer',array($this,'pqp_call_api_script'),100);
	}
	
	public function pqp_display_shortcode_content($atts){
		self::$addshortcode=true;
		$pqp_option = shortcode_atts( array(
        'color' => 'AA4839'
    ), $atts );
	
	if(strtolower($pqp_option['color'])=='red'){
	$pqp_option['color']='AA4839';
	}else if(strtolower($pqp_option['color'])=='green'){
	$pqp_option['color']='267158';
	}else if(strtolower($pqp_option['color'])=='blue'){
	$pqp_option['color']='294F6D';
	}else if(strtolower($pqp_option['color'])=='yellow'){
	$pqp_option['color']='A9A439';
	}else{
		$pqp_option['color']='AA4839';
	}

	return '<div class="client-qoute-of-the-day" data-color="'.$pqp_option['color'].'">
	<img src="'.plugins_url('assets/images/loader.gif',dirname(__FILE__) ).'"/>
	</div>';
	
	}
	
	function pqp_call_api_script(){
		if(!self::$addshortcode)
		return ;
		?>
        <script>
jQuery(document).ready(function(e) {
	$=jQuery;
	$('.client-qoute-of-the-day').each(function(index) {
	var color=$(this).attr('data-color');
	var $this=$(this);
$.ajax({ 
     data: "action=pqp_get_qoute_of_the_day&color="+color,
     type: 'post',
     url: '<?php echo pqp_api_url.'/wp-admin/admin-ajax.php'; ?>',
     success: function(data) {
          $this.html(data);
    }
});

    });
})</script>
        <?php
	}

}
if(class_exists('pqp_main')){
$pqp_main = new pqp_main();
}
?>