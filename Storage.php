<?php
//include 'database.php';
class storage //implements IStorage
{
    private $db;
    private $connection;

    public function __construct()
    {
        $this->db = new mysqli('localhost', 'root', 'dtb456', 'autopozicovna');
        //$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->checkDBErrors();

        try {
            $this->connection = new PDO("mysql:host=localhost;dbname=autopozicovna", "root", "dtb456");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("chyba: " . $e->getMessage());
        }
    }

    public function getAllQuestions()
    {
        $result = [];
        $sql = "SELECT * FROM questions ";
        $dbResult = $this->db->query($sql);
        if ($dbResult->num_rows > 0) {
            while ($record = $dbResult->fetch_assoc()) {
                $result[] = new Question($record['question'], $record['text']);
            }
        }
        return $result;
    }

    public function soreVehicleType(Vehicle $vehicle) {
        $this->connection->prepare("INSERT INTO vehicle_types(image, name, description) VALUES (?,?,?)")->execute([$vehicle->getImage(), $vehicle->getName(), $vehicle->getDescription()]);
    }

    public function soreCar(Car $car) {
        $this->connection->prepare("INSERT INTO car(spz, id_category, image, name, min_price, max_price, detail_image1, detail_image2, detail_image3, isRent, year, type) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)")->execute([$car->getSPZ(), $car->getIdCategory(), $car->getImage(), $car->getName(), $car->getMinPrice(), $car->getMaxPrice(), $car->getDetailImage1(), $car->getDetailImage2(), $car->getDetailImage3(), $car->isRent(), $car->getYear(), $car->getType()]);
    }

    public function  update(Vehicle $vehicle) {
        $data = [
            'id' => $vehicle->getId(),
            'image' => $vehicle->getImage(),
            'name' => $vehicle->getName(),
            'description' => $vehicle->getDescription(),
            ];
        $this->connection->prepare("UPDATE vehicle_types SET id=:id, image=:image, name=:name description=:description WHERE id=:id")->execute($data);
    }

    public function getAllVehicleTypes() {
        $stmt = $this->connection->prepare("SELECT * FROM vehicle_types");
        $stmt->execute();
        //najskor sa zavola konstruktor a potom sa to naplni hodnotami... inak to tam odi tie defaultne hodnoty
        $vehicles = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Vehicle::class );

        /*$stmt = $this->connection->prepare("SELECT * FROM comments WHERE post_id = ?");
        foreach ($posts as $post) {
            $stmt->execute([intval($post->getId())]);
            $comments = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Comment::class);
            $post->setComments($comments);
        }*/
        return $vehicles;
    }

    public function getAllCars() {
        $stmt = $this->connection->prepare("SELECT * FROM car");
        $stmt->execute();
        $cars = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Car::class );
        return $cars;
    }

    public function getVehicleType(int $id_to_update) {
        $stmt = $this->connection->prepare("SELECT * FROM vehicle_types WHERE id = $id_to_update");
        $stmt->execute();
        //najskor sa zavola konstruktor a potom sa to naplni hodnotami... inak to tam odi tie defaultne hodnoty
        $vehicle = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Vehicle::class );
        /*print ($vehicle);
        echo($vehicle);*/
        return $vehicle;
    }

    public function getCar(string $id_Car_to_update) {
        $stmt = $this->connection->prepare("SELECT * FROM car WHERE spz = '$id_Car_to_update'");
        $stmt->execute();
        $car = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Car::class );

        return $car;
    }

    /** @var @var Question $question */
    public function storeQuestion(Question $q)
    {
        $stmt = $this->db->prepare("INSERT INTO questions(question, text) VALUES (?,?)");
        $quest = $q->getQuestion();
        $text = $q->getText();
        $stmt->bind_param('ss', $quest, $text);
        $stmt->execute();
        $this->checkDBErrors();
    }

    public function deleteQuestion(Question $q) {
        $stmt = $this->db->prepare("DELETE FROM questions(question, text) VALUES (?,?)");
        $stmt->execute();
        $this->checkDBErrors();
    }

    public function deleteVehicleType(int $id_to_delete) {
        $select = "SELECT image FROM vehicle_types WHERE id = $id_to_delete ";
        $dbResult = $this->db->query($select);
        $image = '';
        if ($dbResult->num_rows > 0) {
            while ($record = $dbResult->fetch_assoc()) {
                $image = $record['image'];
            }
        }

        $path = "pictures/$image";

        $stmt = $this->db->prepare("DELETE FROM vehicle_types WHERE id = $id_to_delete");
        $stmt->execute();
        $this->checkDBErrors();

        /*
        $sql = "DELETE FROM vehicle_types WHERE id = $id_to_delete";
        $this->connection->exec($sql);
        $this->checkDBErrors();*/

        unlink($path);
    }

    public function deleteCar(string $id_car_to_delete) {
        $select = "SELECT image, detail_image1, detail_image2, detail_image3 FROM car WHERE spz = '$id_car_to_delete'";
        $dbResult = $this->db->query($select);
        $image = '';
        $detail_image1 = '';
        $detail_image2 = '';
        $detail_image3 = '';
        if ($dbResult->num_rows > 0) {
            while ($record = $dbResult->fetch_assoc()) {
                $image = $record['image'];
                $detail_image1 = $record['detail_image1'];
                $detail_image2 = $record['detail_image2'];
                $detail_image3 = $record['detail_image3'];
            }
        }

        $path1 = "pictures/$image";
        $path2 = "pictures/$detail_image1";
        $path3 = "pictures/$detail_image2";
        $path4 = "pictures/$detail_image3";

        $stmt = $this->db->prepare("DELETE FROM car WHERE spz = '$id_car_to_delete'");
        $stmt->execute();
        $this->checkDBErrors();

        unlink($path1);
        unlink($path2);
        unlink($path3);
        unlink($path4);
    }

    public function selectUpdatedVehicleType($id_to_update) {
        $sql = "SELECT * FROM vehicle_types WHERE id = $id_to_update ";
        $dbResult = $this->db->query($sql);
        if ($dbResult->num_rows > 0) {
            while ($record = $dbResult->fetch_assoc()) {
                $result = new Vehicle($id_to_update, $record['image'], $record['name'], $record['description']);
            }
        }
        return $result;
    }

    public function updateVehicleType(int $id_for_final_update, string $newImage, string $newName, string $newDescription) {
        $select = "SELECT image FROM vehicle_types WHERE id = $id_for_final_update ";
        $dbResult = $this->db->query($select);
        $image = '';
        if ($dbResult->num_rows > 0) {
            while ($record = $dbResult->fetch_assoc()) {
                $image = $record['image'];
            }
        }

        $path = "pictures/$image";
        unlink($path);


        $id = $id_for_final_update;
        $image = $newImage;
        $name = $newName;
        $description = $newDescription;

        $stmt = $this->db->prepare("UPDATE vehicle_types SET id='$id', image='$image', name='$name', description='$description' WHERE id = $id_for_final_update");

        $stmt->execute();
        $this->checkDBErrors();
    }

    public function updateCar(string $id_car_final_update, int $newIdCategory, string $newImage, string $newName, int $newMin, int $newMax, string $newDetailImage1 , string $newDetailImage2 , string $newDetailImage3, string $newIsRent, int $newYear, string $newType) {
        $select = "SELECT image, detail_image1, detail_image2, detail_image3 FROM car WHERE spz = '$id_car_final_update'";
        $dbResult = $this->db->query($select);
        $image = '';
        $detail_image1 = '';
        $detail_image2 = '';
        $detail_image3 = '';
        if ($dbResult->num_rows > 0) {
            while ($record = $dbResult->fetch_assoc()) {
                $image = $record['image'];
                $detail_image1 = $record['detail_image1'];
                $detail_image2 = $record['detail_image2'];
                $detail_image3 = $record['detail_image3'];
            }
        }

        $path1 = "pictures/$image";
        $path2 = "pictures/$detail_image1";
        $path3 = "pictures/$detail_image2";
        $path4 = "pictures/$detail_image3";

        unlink($path1);
        unlink($path2);
        unlink($path3);
        unlink($path4);

        $spz = $id_car_final_update;
        $id_category = $newIdCategory;
        $image = $newImage;
        $name = $newName;
        $min_price = $newMin;
        $max_price = $newMax;
        $detail_image1 = $newDetailImage1;
        $detail_image2 = $newDetailImage2;
        $detail_image3 = $newDetailImage3;
        $pom = 0;
        if($newIsRent == 'on') {
            $pom = 1;
        } else {
            $pom = 0;
        }
        $isRent = $pom; // alebo tu dam bez uvodzoviek
       // $isRent = $newIsRent;
        $year = $newYear;
        $type = $newType;

        $stmt = $this->db->prepare(
            "UPDATE car SET spz='$spz', 
               id_category='$id_category', 
               image='$image', 
               name='$name', 
               min_price='$min_price', 
               max_price='$max_price', 
               detail_image1='$detail_image1', 
               detail_image2='$detail_image2', 
               detail_image3='$detail_image3', 
               isRent='$isRent', 
               year='$year', 
               type='$type' 
                WHERE spz = '$id_car_final_update'");
        $stmt->execute();
        $this->checkDBErrors();
    }

    public function checkDBErrors() {
        if ($this->db->error) {
            die("DB error: " . $this->db->error);
        }
    }
}