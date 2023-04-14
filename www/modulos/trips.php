<?php
    $getTripsResults = getTrips($conn,$lang);
    // echo "<pre>"; print_r($getTripsResults); echo "</pre>"; die;
    foreach($getTripsResults AS $trip) {
        $trips.= '<div class="col-12">
            <div class="row">
                <div class="col-12 col-md-4">
                    <img class="img-fluid" src="'.$baseURL.'/assets/uploads/'.$trip['imagen'].'" alt="'.$trip['nombre']. '">
                </div>
                <div class="col-12 col-md-8">
                    <div class="titulo">'.$trip['nombre']. '</div>
                    <div class="textos">
                        <span>'.$trip['descripcion']. '</span>
                        <span class="showMore-trip" style="display:none;">'.$trip['descripcion_hidden']. '</span>
                    </div>
                    <div>
                        <button type="button" class="btn btn-custom-servicios readMore-trip">Read More</button>
                        <button type="button" class="btn btn-custom-servicios readLess-trip" style="display:none;">Read Less</button>
                    </div>
                </div>
            </div>
        </div>';
    }