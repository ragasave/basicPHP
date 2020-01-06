
# basicPHP
supported php version v7.0 and heigher
## How To Use
 - Download or pull Source code
 - Extract zip file to root directory or working directory
 - Include ``autoload.php`` file in your code
 - use the require classes

## Functions
	
## Classes
 - ``Access`` - Responsible for access control 
	 - ``::via():RequestMethod`` - define access method
		- ``->post()`` - access via post method
		- ``->get()`` - access via get method
 - ``Redirect`` - Responsible for path redirection
	- ``::to(string $url)`` - redirect to specific path
	- ``::back()`` - redirect to previous URL or page
 - ``Request`` - Handel and validate request
	- ``::create(array $data)`` - creates request
	- ``::put(string $key,  string $value)`` - put custom key in request
	- ``::all():array`` - get all requested parameter
	- ``::get():mix`` - get specific parameter from request `(if parameter not exist then return null)`
	- ``::has(string $param):boolean`` - check request has particular parameter
	- ``::hasFile(string $file_param):boolean`` - check request has particular file
	- ``::file()`` - get file wrapped with `RequestFile` class
		-  ``rename(string $name):RequestFile`` - rename file
		- ``save(string $dir, string $name = null)`` - save file to particular folder
		- ``saveWithThumb(string $dir, string $name = null)`` - save file to particular folder. ``thumbnail supported for images only and store in thumbnail folder which is created auto in given $dir``
	- ``::via():RequestMethod`` - define access method, clone of `Access::via`
	- ``::validate(array $params):array`` - validate request parameters
	- ``::validateCaptcha($captcha_secret_key):boolean`` - validate google captcha
	- ``::isAjax():boolean`` - check if requested with`xmlHttprequest` 
 - ``Response($data mix, $status_code = 200)`` - responsible to custom response
	 - :`:json()` - response as `json` `Content-Type`
