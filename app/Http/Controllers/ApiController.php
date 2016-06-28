<?php
/**
 * Created by PhpStorm.
 * User: samlin
 * Date: 19/06/2016
 * Time: 10:29 PM
 */

namespace App\Http\Controllers;



use Illuminate\Support\Facades\Response;

/**
 * Class ApiController
 * @package App\Http\Controllers
 */
class ApiController extends Controller
{

    /**
     * @var int
     */
    protected $statusCode = 200;


    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function respondNotFound($message = 'Not found')
    {
        return $this->setStatusCode(404)->respondWithError($message);
    }

    /**
     * @param $data
     * @param array $headers
     * @return mixed
     */
    public function respond($data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }

    /**
     * @param $message
     * @return mixed
     */
    public function respondWithError($message)
    {
        return $this->respond([
           'error'  => [
               'message'        => $message,
               'status_code'    => $this->getStatusCode()
            ]
        ]);
    }

    /**
     * @param string $message
     */
    public function respondInternalError($message = 'Internal error')
    {
        $this->setStatusCode(500)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return mixed
     */

    public function respondNoContent($message = 'No result') // $message not needed as 204 won't return body, kept it for consistency
    {
        return $this->setStatusCode(204)->respond($message);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function respondBadRequest($message = 'Bad request')
    {
        return $this->setStatusCode(400)->respondWithError($message);
    }

    public function respondCreated($message = 'Created')
    {
        return $this->setStatusCode(201)->respond($message);
    }

}