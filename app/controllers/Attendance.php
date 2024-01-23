<?php

class Attendance extends Controller{
    public function saveFacedata(){
        $this->view('facerecognition');
        // // Retrieve data from the AJAX request
        // $data = json_decode(file_get_contents("php://input"), true);

        // // Assuming $data['detections'] contains the face descriptors
        // $faceDescriptors = $data['detections'];

        // // Capture the current date and time
        // $attendanceTime = date('Y-m-d H:i:s'); // Format as needed

        // // Save face recognition data and timestamp to the database using the Attendance model
        // foreach ($faceDescriptors as $descriptor) {
        //     // Adjust the column names as per your table structure
        //     $insertData = [
        //         'name' => 'Unknown', // Replace with the actual name or identifier
        //         'arrivalTime' => $attendanceTime,
        //         'face_descriptor' => json_encode($descriptor),
        //         // Add any additional data you want to save
        //     ];

        //     $attendanceModel = new detectMuka();
        //     $attendanceModel->insert($insertData);
        // }
    }


}