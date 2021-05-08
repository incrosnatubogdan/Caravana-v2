<?php

class HTTP_Exception_404 extends Kohana_HTTP_Exception_404 {
 
    /**
     * Generate a Response for the 404 Exception.
     *
     * The user should be shown a nice 404 page.
     *
     * @return Response
     */
    public function get_response()
    {
		
		$request = Request::current();
		if(empty($request))
		{
			$request = Request::factory('not_found');
		}
		
		$response = Response::factory();
		
		//get the template
		$static = new Controller_Static_Pages($request, $response);
		
		$static->before();
		$static->action_show($request->uri());
		$static->after();
		
        $response = Response::factory()
            ->status(($static->status))
            ->body($static->response->body());
		
        return $response;
		
	}
}