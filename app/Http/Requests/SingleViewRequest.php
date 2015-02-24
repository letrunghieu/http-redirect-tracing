<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SingleViewRequest extends Request {

    const QUERY_URL = 'u';
    const QUERY_HASH = 'h';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function getInputUrl() 
    {
        return $this->get(self::QUERY_URL);
    }

    public static function calculateHash($url)
    {
        $key = \Config::get('app.key');
        return sha1($url . "|" . $key);
    }

    public static function isValid($url, $hash)
    {
        return static::calculateHash($url) === $hash;
    }

    public static function generateQueryString($url)
    {
        $params = [
            self::QUERY_URL => $url,
            self::QUERY_HASH => static::calculateHash($url),
        ];
        return http_build_query($params);
    }

}
