<?php
require "Vehicle.php";
require "Question.php";
require  "IStorage.php";
require  "Storage.php";

class App
{
    private Storage $storage;

    public function __construct()
    {
        $this->storage = new Storage();

        if (isset($_POST['send'])) {
            $this->storage->store(new Question($_POST['question'], $_POST['text']));
        }

        if (isset($_FILES['file']) && isset($_POST['nazov']) && isset($_POST['popis'])) {
            $this->saveVehicle();
        }

        if (isset($_POST['delete'])) {
            $this->deleteVehicle();
        }

        if (isset($_POST['update'])) {
            $this->updateVehicle();
        }
    }

    private function saveVehicle()
    {
        if ($_FILES['file']['error'] == UPLOAD_ERR_OK) {
            $name = date('Y-m-d-H-m-s_').$_FILES['file']['name']; // nazov filu
            $path = "pictures/$name";
            move_uploaded_file($_FILES['file']['tmp_name'], $path);

            $newVehicle = new Vehicle(image: $name, name: $_POST['nazov'], description: $_POST['popis']);
            $this->storage->soreVehicle($newVehicle);
        } else {
            die('Image upload error');
        }
    }

    public function deleteVehicle() {
        return $this->storage->deleteVehicle($_POST['id_to_delete']);
        //return $id_to_delete = mysqli_real_escape_string()
    }

    public function updateVehicle() {
        return $this->storage->updateVehicle($_POST['id_to_update']);
    }

    public function getAllData() {
        return $this->storage->getAllQuestions();
    }

    public function getAllVehicle() {
        return $this->storage->getAllVehicles();
    }

}