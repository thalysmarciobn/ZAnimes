<?php
namespace App\Http\Controllers;

use App\Services\Contracts\ZAnimesInterface;

class APIController extends Controller {
    private $Zanimes;

    public function __construct(ZAnimesInterface $ZAnimes) {
        $this->Zanimes = $ZAnimes;
    }

    public function animes() {
        return $this->Zanimes->cache('animes');
    }
}