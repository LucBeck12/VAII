<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Models\Auth;
use App\Models\Message;
use App\Models\Forum;

class ForumController extends AControllerBase
{

    public function index()
    {
        return $this->html();
    }

    public function pridat()
    {
        /*if (isset($_FILES['file'])) {
            $name = $_FILES['file']['name'];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);

            // Select file type
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Valid file extensions
            $extensions_arr = array("jpg","jpeg","png","gif");

            // Check extension
            if (in_array($imageFileType, $extensions_arr)) {

                // Convert to base64
                $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
                $image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
                // Insert record

                $login = Auth::getInstance()->getLoggedUser()->getLogin();
                $fotka = new Forum($login, $_POST['popis'], $name);
                $fotka->save();
                $this->json("ok");

                move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
                //}
                return $this->redirect('?c=forum');
            }
        }*/
        return $this->html();
    }

    public function getallPrispevky()
    {
        return $this->json(Forum::getAll());
    }
}

?>