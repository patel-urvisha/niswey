<?php
include "config.php";
try {
    $type = isset($_GET['a']) ? $_GET['a'] : 'fetch';
    switch ($type) {
        case 'fetch':
            $result = $conn->query("SELECT * FROM contacts limit 10");
            foreach ($result as $row) {

                $data .=  "<tr id='row_{$row->id}'>
                      <td>{$row->id}</td>
                      <td>{$row->name}</td>
                      <td>{$row->phone}</td>
                      <td>
                      <button class='btn btn-primary edit-btn' data-id='{$row->id}'  data-name='{$row->name}'  data-phone='{$row->phone}' data-toggle='modal' data-target='#editModal'>Edit</button>
                      <button class='btn btn-danger delete-btn' data-id='{$row->id}' type='button' >Delete</button>
                      </td>
                  </tr>";
            }
            require('listing.php');
            break;

        case 'delete':
            $id = $_POST['id'];
            $result = $conn->query("DELETE FROM contacts WHERE id=$id");
            echo json_encode(['response' => 'success']);
            break;

        case 'update':
            $id = $_POST['id'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];

            $conn->query("UPDATE contacts SET name='$name', phone='$phone' WHERE id=$id");
            echo json_encode(['response' => 'success']);
            break;


        case 'import':
            $xmlFile = $_FILES['xmlfile']['tmp_name'];
            if (!file_exists($xmlFile) || $_FILES['xmlfile']['size'] == 0) {
                echo json_encode (array('response' => "Error: File not uploaded or is empty!"));
            }

            $xml = simplexml_load_file($xmlFile);
            if (!$xml) {
                echo json_encode (array('response' => "Error: Invalid XML format!"));
            }

            if (file_exists($xmlFile)) {
                $xml = simplexml_load_file($xmlFile);
                foreach ($xml->contact as $contact) {
                    $name = ($contact->name);
                    $phone = ($contact->phone);
                    $conn->query("INSERT INTO contacts (name, phone) VALUES ('$name', '$phone')");
                }
                echo json_encode(['response' => 'success']);
            } else {
                echo json_encode(['response' => 'error']);
            }
            break;
    }
} catch (Exception $ex) {
    $errorMsg = $ex->getMessage();
}
