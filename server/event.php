<?php



// Absolute path to db.php
require_once 'C:/xampp/htdocs/calendar-interview/config/db.php';

// The rest of your event.php logic goes here

// Get the request method
$method = $_SERVER['REQUEST_METHOD'];

// Parse the input for PUT/DELETE requests
parse_str(file_get_contents("php://input"), $_DATA);

// Route the request based on the method
switch ($method) {
    case 'POST':
        createEvent($pdo);
        break;

    case 'GET':
        fetchEvents($pdo);
        break;

    case 'PUT':
        updateEvent($pdo, $_DATA);
        break;

    case 'DELETE':
        deleteEvent($pdo, $_DATA);
        break;

    default:
        echo json_encode(["success" => false, "message" => "Invalid request method."]);
        break;
}
error_log(file_get_contents("php://input"));
error_log(print_r($_DATA, true));

// Function to create a new event (POST)
function createEvent($pdo) {

    $data = $_POST;

   
    $title = $data['eventTitle'] ?? null;
    $label = $data['eventLabel'] ?? null;
    $start_date = $data['eventStartDate'] ?? null;
    $end_date = $data['eventEndDate'] ?? null;
    $all_day = isset($data['allDaySwitch']) && $data['allDaySwitch'] === 'on' ? 1 : 0;
    $url = $data['eventURL'] ?? null;
    $guests = isset($data['eventGuests']) && is_array($data['eventGuests']) ? implode(',', $data['eventGuests']) : '';
    $location = $data['eventLocation'] ?? null;
    $description = $data['eventDescription'] ?? null;

    // Insert into the database
    $sql = "INSERT INTO events (title, label, start_date, end_date, all_day, url, guests, location, description)
            VALUES (:title, :label, :start_date, :end_date, :all_day, :url, :guests, :location, :description)";

    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([
        ':title' => $title,
        ':label' => $label,
        ':start_date' => $start_date,
        ':end_date' => $end_date,
        ':all_day' => $all_day,
        ':url' => $url,
        ':guests' => $guests,
        ':location' => $location,
        ':description' => $description
    ])) {
        echo json_encode(["success" => true, "message" => "Event created successfully!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to create event!"]);
    }
}


// Function to fetch all events (GET)
function fetchEvents($pdo) {
    header('Content-Type: application/json');
    $stmt = $pdo->query("SELECT * FROM events ORDER BY start_date ASC");
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($events);
}

// Function to update an event (PUT)
function updateEvent($pdo, $data) {
    $id = $data['id'] ?? null;
    $title = $data['eventTitle'] ?? null;
    $label = $data['eventLabel'] ?? null;
    $start_date = $data['eventStartDate'] ?? null;
    $end_date = $data['eventEndDate'] ?? null;
    $all_day = isset($data['allDaySwitch']) && $data['allDaySwitch'] === 'on' ? 1 : 0;
    $url = $data['eventURL'] ?? null;
    $guests = isset($data['eventGuests']) && is_array($data['eventGuests']) ? implode(',', $data['eventGuests']) : '';
    $location = $data['eventLocation'] ?? null;
    $description = $data['eventDescription'] ?? null;

    $sql = "UPDATE events SET 
            title = :title, label = :label, start_date = :start_date, end_date = :end_date,
            all_day = :all_day, url = :url, guests = :guests, location = :location, description = :description
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([
        
        ':title' => $title,
        ':label' => $label,
        ':start_date' => $start_date,
        ':end_date' => $end_date,
        ':all_day' => $all_day,
        ':url' => $url,
        ':guests' => $guests,
        ':location' => $location,
        ':description' => $description,
        ':id' => $id
    ])) {
        echo json_encode(["success" => true, "message" => "Event updated successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to update event."]);
    }
}

// Function to delete an event (DELETE)
function deleteEvent($pdo, $data) {
    $id = $data['id'];

    $sql = "DELETE FROM events WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([':id' => $id])) {
        echo json_encode(["success" => true, "message" => "Event deleted successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to delete event."]);
    }
}
?>
