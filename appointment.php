<?php
include 'connect.php';

if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $addr = $_POST['addr'];
        $phone = $_POST['phone'];
        $doctor = $_POST['doctor'];
        $date = $_POST['date'];
        $time = $_POST['time'];

        $sql =  "insert into `caregroup`.`appointment` (name, email, addr, phone, doctor, date, time) values ('$name', '$email', '$addr', '$phone ', '$doctor', '$date', '$time')";

        $result = mysqli_query($connect, $sql);

        if($result){
            header('location: feedback.php');
        }

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Appointment Booking Form</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    body {
      background-color: #f8f9fa;
    }
    .appointment-form {
      max-width: 600px;
      margin: 50px auto;
      background-color: #ffffff;
      border: 2px solid #1C39BB;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 0 15px rgba(28, 57, 187, 0.2);
    }
    .appointment-form h2 {
      color: #1C39BB;
      margin-bottom: 25px;
      text-align: center;
    }
    .form-label {
      color: #1C39BB;
      font-weight: 500;
    }
    .form-control:focus {
      border-color: #93E9BE;
      box-shadow: 0 0 5px #93E9BE;
    }
    .btn-custom {
      background-color: #1C39BB;
      color: #ffffff;
    }
    .btn-custom:hover {
      background-color: #93E9BE;
      color: #1C39BB;
    }
    .form-text {
      color: #808080;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="appointment-form">
      <h2>Book an Appointment</h2>
      <form id="appointmentForm" novalidate method="post">
        <div class="mb-3">
          <label for="name" class="form-label">Full Name</label>
          <input type="text" name="name" class="form-control" id="name" required />
          <div class="invalid-feedback">Please enter your full name.</div>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label"> Email</label>
          <input type="email" name="email" class="form-control" id="email" required />
          <div class="invalid-feedback">Please enter a valid email address.</div>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label"> Address</label>
          <input type="text" name="addr" class="form-control" id="addr" required />
          <div class="invalid-feedback">Please enter a valid email address.</div>
        </div>

        <div class="mb-3">
          <label for="phone" class="form-label">Phone Number</label>
          <input type="tel" name="phone" class="form-control" id="phone" required />
          <div class="form-text">Enter a 10-digit phone number.</div>
          <div class="invalid-feedback">Phone number must be 10 digits only.</div>
        </div>

        <div class="mb-3">
          <label for="doctor" class="form-label">Select Doctor</label>
          <select class="form-select" name="doctor" id="doctor" required>
            <option value="">-- Select a Doctor --</option>
            <option value="Dr. Smith">Dr. Smith</option>
            <option value="Dr. Johnson">Dr. Johnson</option>
            <option value="Dr. Williams">Dr. Williams</option>
            <option value="Dr. Brown">Dr. Brown</option>
            <option value="Dr. Taylor">Dr. Taylor</option>
          </select>
          <div class="invalid-feedback">Please select a doctor.</div>
        </div>

        <div class="mb-3">
          <label for="date" class="form-label">Appointment Date</label>
          <input type="date" name="date" class="form-control" id="date" required />
          <div class="invalid-feedback">Please choose a date.</div>
        </div>

        <div class="mb-3">
          <label for="time" class="form-label">Appointment Time</label>
          <input type="time" name="time" class="form-control" id="time" required />
          <div class="invalid-feedback">Please select a time.</div>
        </div>

        <button type="submit" name="submit" class="btn btn-custom w-100">Book Appointment</button>
      </form>
    </div>
  </div>

  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JavaScript Validation -->
  <script>
    document.getElementById('appointmentForm').addEventListener('submit', function (event) {
      const form = event.target;
      let isValid = true;

      const fields = ['name', 'email','addr', 'phone', 'doctor', 'date', 'time'];

      fields.forEach(id => {
        const input = document.getElementById(id);
        const value = input.value.trim();

        // Basic empty check
        if (!value) {
          input.classList.add('is-invalid');
          isValid = false;
          return;
        } else {
          input.classList.remove('is-invalid');
        }

        // Phone validation: exactly 10 digits only
        if (id === 'phone') {
          const phoneRegex = /^\d{10}$/;
          if (!phoneRegex.test(value)) {
            input.classList.add('is-invalid');
            isValid = false;
          } else {
            input.classList.remove('is-invalid');
          }
        }
      });

      // event.preventDefault();
     if (valid) {
        alert('Form submitted successfully!');
        // You can handle actual submission here
      }
    });


  </script>

</body>
</html>