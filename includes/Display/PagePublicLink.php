<?php if ( ! defined( 'ABSPATH' ) ) exit;

class NF_Display_PagePublicLink extends NF_Display_Page
{
	public function __construct($form_id)
	{
		$this->form_id = $form_id;
		parent::__construct();
	}

	/**
	 * @return string HTML
	 */
	public function get_content()
	{
		ob_start();
		echo do_shortcode("[ninja_forms id='$this->form_id']");
		$content = ob_get_clean();
		return $content;
	}

	/**
	 * @return string
	 */
    public function get_title()
    {
        return 'Ninja Forms Public Form';
    }

	/**
	 * @return string
	 */
    public function get_guid()
    {
        return 'ninja-forms-public-form';
    }
}
