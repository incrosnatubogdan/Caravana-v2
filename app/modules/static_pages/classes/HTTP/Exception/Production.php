<?php

class HTTP_Exception_Production extends HTTP_Exception {

    /**
     * Generate exception response for production
     *
     * The user should be shown a nice error page.
     *
     * @return Response
     */
    public function get_response()
    {
      echo 'wtf';
		$request = Request::factory('error');
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
