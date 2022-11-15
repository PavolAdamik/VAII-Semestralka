<?php
require "Vehicle.php";
require "Car.php";
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
            $this->storage->storeQuestion(new Question($_POST['question'], $_POST['text']));
        }

        if (isset($_FILES['file']) && isset($_POST['nazov']) && isset($_POST['popis'])) {
            $this->saveVehicleType();
        }

        if (isset($_POST['spzCar']) && isset($_POST['idCategoryCar']) && isset($_POST['minCar']) && isset($_FILES['fileCar']) && isset($_POST['nazovCar']) && isset($_POST['maxCar']) && isset($_FILES['file1Car']) && isset($_FILES['file2Car']) && isset($_FILES['file3Car']) && isset($_POST['yearCar']) && isset($_POST['typeCar'])) {
            $this->saveCar();
        }


        if (isset($_POST['deleteVehicle'])) {
            $this->deleteVehicleType();
        }

        if (isset($_POST['deleteCar'])) {
            $this->deleteCar();
        }

       /* if (isset($_POST['update'])) {
            $this->updateVehicle();
        }*/

        if (isset($_POST['finalUpdate'])) {
            $this->updateVehicleType();
        }

        if (isset($_POST['carFinalUpdate'])) {
            $this->updateCar();
        }
    }

    private function saveVehicleType()
    {
        if ($_FILES['file']['error'] == UPLOAD_ERR_OK) {
            $name = date('Y-m-d-H-m-s_').$_FILES['file']['name']; // nazov filu
            $path = "pictures/$name";
            move_uploaded_file($_FILES['file']['tmp_name'], $path);
            $newVehicle = new Vehicle(image: $name, name: $_POST['nazov'], description: $_POST['popis']);
            $this->storage->soreVehicleType($newVehicle);
        } else {
            die('Image upload error');
        }
    }

    private function saveCar()
    {
        if ($_FILES['fileCar']['error'] == UPLOAD_ERR_OK) {
            //$name = date('Y-m-d-H-m-s_').$_FILES['fileCar']['name']; // nazov filu
            $name1 = date('Y-m-d-H-m-s_').$_FILES['fileCar']['name'];
            $name2 = date('Y-m-d-H-m-s_').$_FILES['file1Car']['name'];
            $name3 = date('Y-m-d-H-m-s_').$_FILES['file2Car']['name'];
            $name4 = date('Y-m-d-H-m-s_').$_FILES['file3Car']['name'];

            $path1 = "pictures/$name1";
            $path2 = "pictures/$name2";
            $path3 = "pictures/$name3";
            $path4 = "pictures/$name4";

            move_uploaded_file($_FILES['fileCar']['tmp_name'], $path1);
            move_uploaded_file($_FILES['file1Car']['tmp_name'], $path2);
            move_uploaded_file($_FILES['file2Car']['tmp_name'], $path3);
            move_uploaded_file($_FILES['file3Car']['tmp_name'], $path4);

            if (isset($_POST['isRentCar'])) { // == null
                $pom = $_POST['isRentCar'];
            } else {
                $pom = 'off';
            }

            $newCar = new Car(spz: $_POST['spzCar'], id_category: $_POST['idCategoryCar'], image: $name1, name: $_POST['nazovCar'],min_price: $_POST['minCar'],max_price: $_POST['maxCar'], detail_image1: $name2, detail_image2: $name3, detail_image3: $name4, isRent: $pom, year: $_POST['yearCar'], type: $_POST['typeCar'] );
            $this->storage->soreCar($newCar);
        } else {
            die('Image upload error');
        }
    }

    public function updateVehicleType() {
        if ($_FILES['fileUpravovane']['error'] == UPLOAD_ERR_OK) {
            $name = date('Y-m-d-H-m-s_').$_FILES['fileUpravovane']['name']; // nazov filu
            $path = "pictures/$name";
            move_uploaded_file($_FILES['fileUpravovane']['tmp_name'], $path);
            return $this->storage->updateVehicleType($_POST['id_for_final_update'], $name, $_POST['nazovUpravovane'], $_POST['popisUpravovane']);
        } else {
            die('Image upload error');
        }
    }

    public function updateCar() {
        if ($_FILES['fileCarUpravovane']['error'] == UPLOAD_ERR_OK) {
            $name1 = $_FILES['fileCarUpravovane']['name'];
            $name2 = $_FILES['file1CarUpravovane']['name'];
            $name3 = $_FILES['file2CarUpravovane']['name'];
            $name4 = $_FILES['file3CarUpravovane']['name'];


            $path1 = "pictures/$name1";
            $path2 = "pictures/$name2";
            $path3 = "pictures/$name3";
            $path4 = "pictures/$name4";

            move_uploaded_file($_FILES['fileCarUpravovane']['tmp_name'], $path1);
            move_uploaded_file($_FILES['file1CarUpravovane']['tmp_name'], $path2);
            move_uploaded_file($_FILES['file2CarUpravovane']['tmp_name'], $path3);
            move_uploaded_file($_FILES['file3CarUpravovane']['tmp_name'], $path4);

           // echo($_POST['isRentCarUpravovane']);
            //$_SESSION['isRentCarUpravovane'] = 'off';
            //if isset
            $pom = '';
            if (isset($_POST['isRentCarUpravovane'])) { // == null
                $pom = $_POST['isRentCarUpravovane'];
            } else {
                $pom = 'off';
            }

            return $this->storage->updateCar($_POST['id_car_final_update'], $_POST['idCategoryCarUpravovane'], $name1, $_POST['nazovCarUpravovane'], $_POST['minCarUpravovane'], $_POST['maxCarUpravovane'], $name2, $name3, $name4,
                $pom,
                $_POST['yearCarUpravovane'], $_POST['typeCarUpravovane']);
        } else {
            die('Image upload error');
        }
    }


    public function deleteVehicleType() {
        return $this->storage->deleteVehicleType($_POST['id_to_delete']);
        //return $id_to_delete = mysqli_real_escape_string()
    }

    public function deleteCar() {
        return $this->storage->deleteCar($_POST['id_car_to_delete']);
    }

    public function updateVehicle() {
        return $this->storage->selectUpdatedVehicleType($_POST['id_to_update']);
    }

    public function getAllData() {
        return $this->storage->getAllQuestions();
    }

    public function getAllVehicleTypes() {
        return $this->storage->getAllVehicleTypes();
    }

    public function getAllCars() {
        return $this->storage->getAllCars();
    }

    public function getVehicleType() {
        return $this->storage->getVehicleType($_POST['id_to_update']);
    }

    public function getCar() {
        return $this->storage->getCar($_POST['id_Car_to_update']);
    }


}