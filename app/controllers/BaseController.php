<?php

class BaseController extends Controller {

	public function __construct() {

       	$logo_customers = Customer::select(['logo'])->get();

       	$top5posts = Post::select(['id', 'title', 'slug', 'description', 'image'])
       				->where('status','1')
       				->orderBy('updated_at', 'desc')
       				->limit(5)
       				->get();

		$top5faqs = Faq::select(['id', 'title', 'content'])
					->where('status','1')
       				->orderBy('updated_at', 'desc')
       				->limit(5)
       				->get();

       	$setting = Setting::first();
       	$layout_slides = json_decode($setting->silde_images);

        $menu = Category::where('parent_id', '0')->with('children', 'pages')->get();

       	View::share ( 'logo_customers', $logo_customers );
       	View::share ( 'top5posts', $top5posts );
       	View::share ( 'top5faqs', $top5faqs );
       	View::share ( 'layout_slides', $layout_slides );
        View::share ( 'menu', $menu );
       	View::share ( 'info', $setting );
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
