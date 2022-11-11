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

    public function soreVehicle(Vehicle $vehicle) {
        $this->connection->prepare("INSERT INTO vehicle_types(image, name, description) VALUES (?,?,?)")->execute([$vehicle->getImage(), $vehicle->getName(), $vehicle->getDescription()]);
    }

    public function getAllVehicles() {
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

    public function getVehicle(int $id_to_update) {
        $stmt = $this->connection->prepare("SELECT * FROM vehicle_types WHERE id = $id_to_update");
        $stmt->execute();
        //najskor sa zavola konstruktor a potom sa to naplni hodnotami... inak to tam odi tie defaultne hodnoty
        $vehicles = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Vehicle::class );
        return $vehicles;
    }

    /** @var @var Question $question */
    public function store(Question $q)
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

    public function deleteVehicle(int $id_to_delete) {
        //$stmt = $this->connection->prepare("DELETE FROM vehicle_types WHERE id = $id");
       // $stmt->execute();
        $sql = "DELETE FROM vehicle_types WHERE id = $id_to_delete";
        $this->connection->exec($sql);
        $this->checkDBErrors();
    }

    public function updateVehicle(int $id_to_update) {
        /*$stmt = $this->connection->prepare("SELECT * FROM vehicle_types WHERE id = $id_to_update");
        $stmt->execute();*/

        $stmt = $this->db->prepare("SELECT * FROM vehicle_types WHERE id = $id_to_update");
        $sql = "SELECT * FROM vehicle_types WHERE id = $id_to_update ";
        $dbResult = $this->db->query($sql);
        if ($dbResult->num_rows > 0) {
            while ($record = $dbResult->fetch_assoc()) {
                $result[] = new Vehicle($id_to_update, $record['image'], $record['name'], $record['description']);
            }
        }
       /* print_r($dbResult);
        print_r($id_to_update);
        print_r($result);*/
        return $result;



        /*$_SESSION['nazov'] = $stmt->getQuestion();
        $text = $q->getText();*/



        /*$sql = "UPDATE vehicle_type SET name = ?? WHERE id = $id_to_update";
        $this->connection->exec($sql);
        $this->checkDBErrors();*/
    }

    public function checkDBErrors() {
        if ($this->db->error) {
            die("DB error: " . $this->db->error);
        }
    }
}