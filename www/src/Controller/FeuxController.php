<?php

namespace App\Controller;


class FeuxController extends Controller
{
    private $Feux1;

    public function circulation()
    {
        return $this->render(
            "Post/Feux",
            [
            "tempsFeuxRouge" => $tempsFeuRouge,
            "tempsFeuxOrange" => $tempsFeuxOrange,
            "tempsFeuxVert" => $tempsFeuVert,
            "tempsDepart" => $tempsDepart,
            ]);
    }

}