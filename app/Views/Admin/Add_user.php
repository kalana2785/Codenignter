<!DOCTYPE html>
<html>

<head>
    <title>Add User</title>
    <link href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('Assests/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
 
    <link href="<?= base_url('Assests/css/style.css'); ?>" rel="stylesheet">


    <script src="assets/js/main.js"></script>
    <script src="<?= base_url('Assests/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('Assests/js1/jquery-3.7.1.js'); ?>"></script>
    <script src="<?= base_url('Assests/js1/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('Assests/js1/popper.min.js'); ?>"></script>
  


    <style>
     .strength-bar-container {
            position: relative;
        }

        .strength-bar {
            width: 100%;
            height: 20px;
            background-color: #ddd;
            border-radius: 5px;
            margin-top: 5px;
            position: relative;
        }

        .strength-color {
            height: 100%;
            border-radius: 5px;
            transition: width 0.3s ease;
        }

        .strength-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
        }

        .weak {
            background-color: #ff6347; /* Red */
        }

        .medium {
            background-color: #ffd700; /* Yellow */
        }

        .strong {
            background-color: #32cd32; /* Green */
        }
    </style>
    </style>




</head>

<body>

    <?= $this->include('Layout/Admin/header.php') ?>

    <?= $this->include('Layout/Admin/floter.php') ?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Add New User</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Add Section</a></li>
                    <li class="breadcrumb-item active">Add User</li>
                </ol>
            </nav>
        </div>

        <!-- Check if there is an error message and display it -->
        <?php if (session()->has('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session('error') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->has('status')): ?>
            <div class="alert alert-success" role="alert">
                <?= session('status') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('Admin/Addnewuser'); ?>" method="post">
            <div class="row mb-3">
                <label for="input1" class="col-sm-2 col-form-label">User Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" name="username" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="input2" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" name="email" required>
                </div>
            </div>


        <div class="row mb-3">
          <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword3" name="password" required>
              <div class="strength-bar-container">
                  <div class="strength-bar">
                      <div id="strengthColor" class="strength-color"></div>
                      <div class="strength-text" id="strengthText"></div>
                  </div>
              </div>
          </div>
        </div>



          </div>
                  <div class="row mb-3">
                <label for="ug" class="col-sm-2 col-form-label">Select User Group</label>
                <div class="col-sm-10">
                    <select name="ug" id="ug" class="form-control input-lg">
                        <option value="">Select User Group</option>
                        <?php foreach ($user as $row): ?>
                            <option value="<?= $row["ugroup_id"]; ?>"><?= $row["Usergroup_name"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

    
            <div class="row mb-3" id="additionalInputRow" style="display:none;">
                <label for="additionalInput" class="col-sm-2 col-form-label">Select Unit</label>
                <div class="col-sm-10">
                    <select name="unit" id="unit" class="form-control input-lg">
                        <option value="">Select Unit</option>
                        <?php foreach ($unit as $row): ?>
                            <option value="<?= $row["Unit_id"]; ?>"><?= $row["Unit_name"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
      // Password
      function calculatePasswordStrength(password) {
            // Score rules (1 point each):
            // At least 8 characters long
            // Contains at least one uppercase letter
            // Contains at least one lowercase letter
            // Contains at least one number
            // Contains at least one special character

            let score = 0;

            if (password.length >= 8) {
                score++;
            }
            if (/[A-Z]/.test(password)) {
                score++;
            }
            if (/[a-z]/.test(password)) {
                score++;
            }
            if (/\d/.test(password)) {
                score++;
            }
            if (/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password)) {
                score++;
            }

            return score;
        }

        function updatePasswordStrengthIndicator(password) {
            const strengthText = document.getElementById('strengthText');
            const strengthColor = document.getElementById('strengthColor');
            const score = calculatePasswordStrength(password);

            if (score <= 2) {
                strengthText.innerText = 'Weak';
                strengthColor.classList.remove('medium', 'strong');
                strengthColor.classList.add('weak');
            } else if (score <= 3) {
                strengthText.innerText = 'Medium';
                strengthColor.classList.remove('weak', 'strong');
                strengthColor.classList.add('medium');
            } else {
                strengthText.innerText = 'Strong';
                strengthColor.classList.remove('weak', 'medium');
                strengthColor.classList.add('strong');
            }
        }

        // Event listener to update password strength indicator on input
        document.getElementById('inputPassword3').addEventListener('input', function() {
            const password = this.value;
            updatePasswordStrengthIndicator(password);
        });


    // unit display


        $(document).ready(function () {
            $('#ug').change(function () {
                var Ug = $(this).val();
                if (Ug == 3) {
                    $('#additionalInputRow').show();
                } else {
                    $('#additionalInputRow').hide();
                }
            });
        });
    </script>

</body>

</html>
