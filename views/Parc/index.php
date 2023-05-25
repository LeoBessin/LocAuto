<?php
include "../../phpFiles/DAO/VoitureDao.php";
include "../../phpFiles/widgets/html-part.php";
$DaoLocation = LocationDao::getInstance();
$DaoVoiture = VoitureDao::getInstance();
$allVoiture = $DaoVoiture->getAllObj();
$availableId = $DaoVoiture->getAllIdAvailable();
$lastSelect = null;
fileStart("Parc");
navBar("Parc");
?>
<h1 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Parc de voiture(s)</h1>
<div class="flex flex-wrap flex-row z-10">
    <?php
    foreach ($allVoiture as $voiture) {
        $imgPath = $voiture->getModele()->getImage();
        echo '<button onclick="location.href='."'../Details/car.php?id=".$voiture->getImmatriculation()."'".'">';
        if (in_array($voiture->getImmatriculation(),$availableId)){
            $location = $DaoLocation->getLastLocationByImmatriculation($voiture->getImmatriculation());
            $color = "#EF476F";
            $text = $location->getClient()->getNom() . ' ' .$location->getClient()->getPrenom();
        }else {
            $color = "#06D6A0";
            $text = "Available";
        }
        echo '<div class="px-6 py-4 flex flex-col hover:scale-110">
                <img class="rounded-full z-[-1]" src="'.$imgPath.'"/>
                <div class="flex flex-row z-[-1] align-middle justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_2" width="30px" version="1.1" viewBox="0 0 1000 1000" xml:space="preserve"><path d="M789.373,376.216c-7.82-7.56-17.27-12.5-27.33-14.36c-0.379-0.07-0.758-0.14-1.136-0.21  c-4.398-0.807-7.594-4.632-7.594-9.103c0-4.108-3.33-7.438-7.438-7.438c-5.686,0-11.352,0.699-16.868,2.08l-23.279,5.828  c-144.527-18.666-240.265,0.539-271.215,8.443c-6.39,1.63-12.64,3.88-18.71,6.71l-110.95,51.74c-6.83,3.18-13.89,5.62-21.11,7.3  l-49.27,11.41c-36.59,8.47-66.88,38.14-80.27,78.61l-2.42,39.41c-1.57,25.72,15.95,47.59,38.14,47.59h22.23  c8.97,29.34,36.26,50.67,68.54,50.67c32.27,0,59.56-21.33,68.53-50.67h311.76c8.97,29.34,36.26,50.67,68.53,50.67  c32.27,0,59.56-21.33,68.54-50.67h10.19c19.55,0,35.96-17.141,38.02-39.74c2.98-32.78,4.22-79.06-7.1-111.82  C826.654,416.466,803.904,390.235,789.373,376.216z M185.983,553.306c-4.97,0-9-6.561-9-14.66c0-8.101,4.03-14.67,9-14.67  c4.97,0,9,6.569,9,14.67C194.983,546.745,190.954,553.306,185.983,553.306z M197.243,508.065c-5.67,1.56-10.5-4.271-7.97-9.58  c4.68-9.82,13.02-22.54,26.37-28.26c16.39-7.02,29.83-4.181,36.37-1.87c2.83,1.01,4.69,3.76,4.51,6.76  c-0.33,5.65-2.76,14.71-14.21,19.11C231.253,498.485,210.673,504.365,197.243,508.065z M322.353,604.226  c-7.7,15.22-23.48,25.67-41.66,25.67c-18.19,0-33.97-10.45-41.67-25.67c-3.2-6.311-5-13.45-5-21c0-25.73,20.93-46.67,46.67-46.67  c25.73,0,46.66,20.939,46.66,46.67C327.353,590.775,325.553,597.915,322.353,604.226z M393.594,437.955  c-1.19,2.9-3.99,4.77-7.13,4.77h-71.41c0.12-0.061,0.24-0.11,0.36-0.16l94.47-44.05L393.594,437.955z M525.813,483.396h-27.67  c-4.69,0-8.5-3.811-8.5-8.5c0-2.351,0.95-4.47,2.49-6.01c1.54-1.54,3.66-2.49,6.01-2.49h27.67c4.69,0,8.5,3.8,8.5,8.5  C534.313,479.585,530.503,483.396,525.813,483.396z M540.864,440.365l-82.62,1.83c-2.61,0.08-4.97-1.14-6.48-3.27  c-1.5-2.141-1.83-4.761-0.9-7.2l20.02-52.38c20.06-3.48,47.74-7.051,82.17-8.53L540.864,440.365z M629.864,438.405l-71.67,1.58  l12.21-69.71c5.25-0.11,10.61-0.17,16.12-0.17c17.28,0,34.84,0.55,52.62,1.64C635.883,396.525,632.294,422.455,629.864,438.405z   M656.133,372.955c14.85,1.19,29.84,2.75,44.95,4.681l31.28,34.25c1.66,1.819,2.35,4.25,1.88,6.67c-0.47,2.41-2,4.41-4.22,5.489  l-24.83,11.99c-1,0.49-2.07,0.75-3.18,0.771l-54.9,1.21C649.743,420.726,653.133,395.755,656.133,372.955z M661.483,483.396  c-4.7,0-8.5-3.811-8.5-8.5c0-2.351,0.95-4.47,2.49-6.01c1.54-1.54,3.66-2.49,6.01-2.49h27.66c4.7,0,8.5,3.8,8.5,8.5  c0,4.689-3.8,8.5-8.5,8.5H661.483z M771.184,604.226c-7.7,15.22-23.48,25.67-41.67,25.67c-18.18,0-33.96-10.45-41.66-25.67  c-3.2-6.311-5-13.45-5-21c0-25.73,20.93-46.67,46.66-46.67c25.74,0,46.67,20.939,46.67,46.67  C776.184,590.775,774.383,597.915,771.184,604.226z M822.904,525.685c-2.45,1.74-5.77,1.62-8.12-0.25  c-5.43-4.33-14.96-14.21-17.68-31.83c-2.22-14.37,4.15-28.17,10.01-37.34c3.16-4.96,10.66-3.96,12.34,1.68  c3.98,13.36,9.88,33.92,12.13,45.56C833.914,515.556,827.513,522.415,822.904,525.685z" style="fill:'.$color.';"/><path d="M280.693,556.226c-14.92,0-27.01,12.09-27.01,27c0,8.479,3.91,16.05,10.04,21  c4.63,3.76,10.54,6,16.97,6c6.43,0,12.33-2.24,16.96-6c6.13-4.95,10.04-12.521,10.04-21  C307.693,568.315,295.603,556.226,280.693,556.226z" style="fill:'.$color.';"/><path d="M729.513,556.226c-14.91,0-27,12.09-27,27c0,8.479,3.91,16.05,10.04,21c4.63,3.76,10.53,6,16.96,6  c6.43,0,12.34-2.24,16.97-6c6.12-4.95,10.03-12.521,10.03-21C756.513,568.315,744.434,556.226,729.513,556.226z" style="fill:'.$color.';"/></svg>
                <p> - '.$text.'</p>
                </div
            </div>';
        echo '</button>';
    }?>
    <button onclick="location.href='../Insert/cars.php'">
<?php
    echo '<div class="px-2 py-4 flex flex-col hover:cursor-pointer mt-6 hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" height="32px" id="Layer_1"  version="1.1" viewBox="0 0 32 32" width="128px" xml:space="preserve"><path d="M28,14H18V4c0-1.104-0.896-2-2-2s-2,0.896-2,2v10H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h10v10c0,1.104,0.896,2,2,2  s2-0.896,2-2V18h10c1.104,0,2-0.896,2-2S29.104,14,28,14z"/></svg>
                <div class="flex flex-row z-[-1] align-middle justify-center">
                <p class="mt-4"> Ajouter </p>
                </div>
            </div>';
    echo '</button>';
    ?>
</div>

<?php
fileEnd();
?>
