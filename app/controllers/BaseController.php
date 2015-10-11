<?php

class BaseController extends Controller {

	public function __construct() {

       	$logo_customers = Customer::select(['logo'])->get();

       	$top5posts = Post::select(['id', 'title', 'description', 'image'])
       				->orderBy('updated_at', 'desc')
       				->limit(3)
       				->get();

		$top5faqs = Faq::select(['id', 'title', 'content'])
       				->orderBy('updated_at', 'desc')
       				->limit(3)
       				->get();

       	$setting = Setting::first();
       	$layout_slides = json_decode($setting->silde_images);

       	// print_r($layout_slides); exit();

       	View::share ( 'logo_customers', $logo_customers );
       	View::share ( 'top5posts', $top5posts );
       	View::share ( 'top5faqs', $top5faqs );
       	View::share ( 'layout_slides', $layout_slides );
    }

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
