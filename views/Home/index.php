<?php
include "../../phpFiles/widgets/html-part.php";
include "../../phpFiles/DAO/VoitureDao.php";
$DaoVoiture = VoitureDao::getInstance();
$DaoLocation = LocationDao::getInstance();
fileStart("Acceuil");
navBar("Acceuil");
$allVoiture = $DaoVoiture->getAllObjAvailable();
$allLocation = $DaoLocation->getAllObj();
?>
    <h1 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center mt-6">Les avis de nos clients :</h1>
<div class="overflow-x-auto flex">

    <?php opinionList($allLocation); ?>
</div>
    <h1 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center mt-6">En savoir plus :</h1>
    <div class="container mx-auto my-32">
        <div>

            <div class="bg-white relative shadow rounded-lg w-5/6 md:w-5/6  lg:w-4/6 xl:w-3/6 mx-auto pb-4">
                <div class="flex justify-center">
                    <img src="../../Assets/images/profilePicture/leob.jpg" alt="" class="rounded-full mx-auto absolute -top-20 w-32 h-32 shadow-md border-4 border-white transition duration-200 transform hover:scale-110">
                </div>

                <div class="mt-16">
                    <h1 class="font-bold text-center text-3xl text-gray-900">Léo Bessin</h1>
                    <p class="text-center text-sm text-gray-400 font-medium">Étudiant en informatique</p>
                    <p>
                        <span>

                        </span>
                    </p>
                    <div class="my-5 px-6">
                        <a class="text-gray-200 block rounded-lg text-center font-medium leading-6 px-6 py-3 bg-gray-900 hover:bg-black hover:text-white">Connect with <span class="font-bold">@00h37</span></a>
                    </div>
                    <div class="flex justify-between items-center mt-6 px-6 mb-6">
                        <a href="https://github.com/LeoBessin" target="_blank" class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">GitHub</a>
                        <a href="https://www.linkedin.com/in/l%C3%A9o-bessin-8a4b97241/" target="_blank" class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">LinkedIn</a>
                        <a href="https://www.youtube.com/watch?v=xvFZjo5PgG0&ab_channel=Duran" target="_blank" class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">Twitter</a>
                        <a href="https://www.youtube.com/watch?v=Vn8Wjoxlw3U&ab_channel=JambaMusic" target="_blank" class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">Email</a>
                    </div>
                </div>
            </div>

        </div>
    </div>



<?php fileEnd();
?>
