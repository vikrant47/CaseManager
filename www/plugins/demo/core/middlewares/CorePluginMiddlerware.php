<?php


namespace Demo\Core\Middlewares;


use Demo\Core\Classes\Ifs\IPluginMiddleware;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CorePluginMiddlerware implements IPluginMiddleware
{

    /**This will be executed before request execution*/
    public function before(Request $request)
    {
        $url = $request->getRequestUri();
        if (starts_with($url, '/backend')) {
            $urlSections = explode('/', $url);
            if (count($urlSections) > 3) {
                $request->attributes->set('CURRENT_PLUGIN', $urlSections[2] . '.' . $urlSections[3]);
            }
        }
    }

    /**This will be executed after request execution*/
    public function after(Request $request, $response)
    {
        /*if ($response instanceof Response) {
            $buffer = $response->getContent();
            if (strpos($buffer, '<pre>') !== false) {
                $replace = array(
                    '/<!--[^\[](.*?)[^\]]-->/s' => '',
                    "/<\?php/" => '<?php ',
                    "/\r/" => '',
                    "/>\n</" => '><',
                    "/>\s+\n</" => '><',
                    "/>\n\s+</" => '><',
                );
            } else {
                $replace = array(
                    '/<!--[^\[](.*?)[^\]]-->/s' => '',
                    "/<\?php/" => '<?php ',
                    "/\\n([\S])/" => '$1',
                    "/\\r/" => '',
                    "/\\n/" => '',
                    "/\\r\\n/" => '',
                    "/\t/" => '',
                    "/ +/" => ' ',
                );
            }
            $buffer = preg_replace(array_keys($replace), array_values($replace), $buffer);
            $response->setContent($buffer);
            // ini_set('zlib.output_compression', 'On'); // If you like to enable GZip, too!
        }*/
        return $response;
    }
}