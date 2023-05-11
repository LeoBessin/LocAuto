<?php
include "../../phpFiles/DAO/ClientDao.php";
include "../../phpFiles/DAO/LocationDao.php";
include "../../phpFiles/widgets/html-part.php";
$DaoLocation = LocationDao::getInstance();
$DaoClient = ClientDao::getInstance();
$allClient = $DaoClient->getAllObj();
fileStart();
navBar();
$clientWithLoc = $DaoClient->getAllIdWithLocation();
?>
    <h1 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Annuaire des client(s)</h1>
    <div class="flex flex-wrap flex-row z-10">
        <?php foreach ($allClient as $client) {
            if (in_array($client->getId(), $clientWithLoc)) {
                $color = "#06D6A0";
            } else {
                $color = "#EF476F";
            }
            $locations = $DaoLocation->getAllObjByIdClient($client->getId());
            echo '<button onclick="location.href=' .
                "'../details/car.php?id=" .
                $client->getId() .
                "'" .
                '">';
            echo '<div class="px-6 py-4 flex flex-col hover:scale-110">
                <div class="flex flex-col">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="64px" version="1.1" viewBox="0 0 24 24" xml:space="preserve"><g id="info"/><g id="icons"><path d="M12,0C5.4,0,0,5.4,0,12c0,6.6,5.4,12,12,12s12-5.4,12-12C24,5.4,18.6,0,12,0z M12,4c2.2,0,4,2.2,4,5s-1.8,5-4,5   s-4-2.2-4-5S9.8,4,12,4z M18.6,19.5C16.9,21,14.5,22,12,22s-4.9-1-6.6-2.5c-0.4-0.4-0.5-1-0.1-1.4c1.1-1.3,2.6-2.2,4.2-2.7   c0.8,0.4,1.6,0.6,2.5,0.6s1.7-0.2,2.5-0.6c1.7,0.5,3.1,1.4,4.2,2.7C19.1,18.5,19.1,19.1,18.6,19.5z" id="user2"/></g></svg>

                    <div class="flex flex-row">
                <div class="flex flex-row z-[-1] align-middle justify-center">
                <p class="pr-2">' .
                $client->getNom() .
                " " .
                $client->getPrenom() .
                ' - </p>
                <svg xmlns="http://www.w3.org/2000/svg" width="16px" viewBox="0 0 512 512"><path d="M336 0c-97.2 0-176 78.8-176 176c0 14.71 2.004 28.93 5.406 42.59l-156 156C3.371 380.6 0 388.8 0 397.3V496C0 504.8 7.164 512 16 512l96 0c8.836 0 16-7.164 16-16v-48h48c8.836 0 16-7.164 16-16v-48h57.37c4.242 0 8.312-1.688 11.31-4.688l32.72-32.72C307.1 349.1 321.3 351.1 336 351.1c97.2 0 176-78.8 176-176S433.2 0 336 0zM376 176c-22.09 0-40-17.91-40-40S353.9 96 376 96S416 113.9 416 136S398.1 176 376 176z" fill="' .
                $color .
                '"/></svg>
                    </div>
                                    
                </div>
                <p class="text-xs">'.sizeof($locations).'  location(s)</p>
                </div>';
            echo "</button>";
        } ?>
        <button onclick="location.href='../Insert/clients.php'">
            <?php
            echo '<div class="px-2 py-3 flex flex-col hover:cursor-pointer mt-6 hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="32px" id="Layer_1"  version="1.1" viewBox="0 0 32 32" width="128px" xml:space="preserve"><path d="M28,14H18V4c0-1.104-0.896-2-2-2s-2,0.896-2,2v10H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h10v10c0,1.104,0.896,2,2,2  s2-0.896,2-2V18h10c1.104,0,2-0.896,2-2S29.104,14,28,14z"/></svg>
                <div class="flex flex-row z-[-1] align-middle justify-center">
                <p class="mt-4"> Add </p>
                </div>
            </div>';
            echo "</button>";
            ?>
    </div>

<?php fileEnd();
?>
