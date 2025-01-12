<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Base class Shape
class Shape {
    public function area() {
        return 0;
    }
}

// Triangle subclass
class Triangle extends Shape {
    public $base;
    public $height;

    public function __construct($base, $height) {
        $this->base = $base;
        $this->height = $height;
    }

    public function area() {
        return 0.5 * $this->base * $this->height;
    }
}

// Square subclass
class Square extends Shape {
    public $side;

    public function __construct($side) {
        $this->side = $side;
    }

    public function area() {
        return $this->side * $this->side;
    }
}

// Circle subclass
class Circle extends Shape {
    public $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return pi() * $this->radius * $this->radius;
    }
}

// Handle form submission
$area = null;
$shapeType = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['shape'])) {
        $shapeType = $_POST['shape'];
        if ($shapeType == 'triangle' && isset($_POST['base']) && isset($_POST['height'])) {
            $triangle = new Triangle($_POST['base'], $_POST['height']);
            $area = $triangle->area();
        } elseif ($shapeType == 'square' && isset($_POST['side'])) {
            $square = new Square($_POST['side']);
            $area = $square->area();
        } elseif ($shapeType == 'circle' && isset($_POST['radius'])) {
            $circle = new Circle($_POST['radius']);
            $area = $circle->area();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shape Area Calculation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Basic reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(135deg, #6a11cb, #2575fc); /* Gradient background for a dynamic effect */
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
    transition: background 0.3s ease-in-out;
}

.form-container {
    background: #ffffff;
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px;
    transition: all 0.3s ease;
    transform: scale(0.98);
}

.form-container:hover {
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    transform: scale(1);
}

h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
    font-size: 28px;
    text-transform: uppercase;
    letter-spacing: 2px;
    animation: fadeIn 1s ease-out;
}

.form-group {
    margin-bottom: 20px;
    animation: slideIn 0.8s ease-out;
}

.form-group label {
    font-weight: bold;
    color: #555;
    font-size: 16px;
    margin-bottom: 5px;
    display: block;
}

.form-group input {
    border-radius: 8px;
    border: 1px solid #ddd;
    padding: 12px;
    width: 100%;
    margin-bottom: 15px;
    font-size: 16px;
    transition: border 0.3s ease, box-shadow 0.3s ease;
    background-color: #fafafa;
}

.form-group input:focus {
    border-color: #2575fc;
    outline: none;
    box-shadow: 0 0 10px rgba(37, 117, 252, 0.5);
}

.shape-radio {
    display: inline-block;
    margin-right: 20px;
    animation: fadeIn 1s ease-out;
}

.shape-radio input {
    margin-right: 8px;
    transition: transform 0.2s ease;
}

.shape-radio input:checked {
    transform: scale(1.1);
}

.btn {
    background-color: #2575fc;
    border: none;
    color: white;
    padding: 12px 20px;
    width: 100%;
    border-radius: 8px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn:hover {
    background-color: #1d62d0;
    transform: translateY(-3px);
}

.result-container {
    background-color: #f8f9fa;
    padding: 20px;
    margin-top: 20px;
    border-radius: 8px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    animation: slideIn 1s ease-out;
}

.result-container p {
    color: #333;
    font-size: 18px;
    font-weight: bold;
}

@keyframes fadeIn {
    0% {
        opacity: 0;
        transform: translateY(-20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideIn {
    0% {
        opacity: 0;
        transform: translateX(-30px);
    }
    100% {
        opacity: 1;
        transform: translateX(0);
    }
}

@media (max-width: 768px) {
    .form-container {
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    h2 {
        font-size: 24px;
    }

    .btn {
        font-size: 16px;
    }
}

    </style>
</head>
<body>
<div class="form-container shadow-lg">
    <h2>Shape Area Calculator</h2>
    <form method="post" id="shape-form">
        <div class="form-group">
            <label>Select Shape</label><br>
            <div class="shape-radio">
                <input type="radio" id="triangle" name="shape" value="triangle" <?php echo (isset($_POST['shape']) && $_POST['shape'] == 'triangle') ? 'checked' : ''; ?>> 
                <label for="triangle">Triangle</label>
            </div>

            <div class="shape-radio">
                <input type="radio" id="square" name="shape" value="square" <?php echo (isset($_POST['shape']) && $_POST['shape'] == 'square') ? 'checked' : ''; ?>> 
                <label for="square">Square</label>
            </div>

            <div class="shape-radio">
                <input type="radio" id="circle" name="shape" value="circle" <?php echo (isset($_POST['shape']) && $_POST['shape'] == 'circle') ? 'checked' : ''; ?>> 
                <label for="circle">Circle</label>
            </div>
        </div>

        <div id="dimensions">
            <div class="form-group" id="triangle-dimension" style="display: none;">
                <label for="base">Base of Triangle</label>
                <input type="number" class="form-control" name="base" id="base" placeholder="Enter base" value="<?php echo isset($_POST['base']) ? $_POST['base'] : ''; ?>" required>
                <label for="height-triangle">Height of Triangle</label>
                <input type="number" class="form-control" name="height" id="height-triangle" placeholder="Enter height" value="<?php echo isset($_POST['height']) ? $_POST['height'] : ''; ?>" required>
            </div>

            <div class="form-group" id="square-dimension" style="display: none;">
                <label for="side-square">Side of Square</label>
                <input type="number" class="form-control" name="side" id="side-square" placeholder="Enter side" value="<?php echo isset($_POST['side']) ? $_POST['side'] : ''; ?>" required>
            </div>

            <div class="form-group" id="circle-dimension" style="display: none;">
                <label for="radius-circle">Radius of Circle</label>
                <input type="number" class="form-control" name="radius" id="radius-circle" placeholder="Enter radius" value="<?php echo isset($_POST['radius']) ? $_POST['radius'] : ''; ?>" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Calculate Area</button>
    </form>

    <!-- Display Area Result -->
    <div id="result" class="result-container">
        <?php
        if (isset($area)) {
            if ($shapeType == "circle") {
                echo "Area of the " . ucfirst($shapeType) . " (Radius = " . (isset($_POST['radius']) ? $_POST['radius'] : '') . "): " . round($area, 2);
            } elseif ($shapeType == "square") {
                echo "Area of the " . ucfirst($shapeType) . " (Side = " . (isset($_POST['side']) ? $_POST['side'] : '') . "): " . round($area, 2);
            } elseif ($shapeType == "triangle") {
                echo "Area of the " . ucfirst($shapeType) . " (Base = " . (isset($_POST['base']) ? $_POST['base'] : '') . ", Height = " . (isset($_POST['height']) ? $_POST['height'] : '') . "): " . round($area, 2);
            }
        }
        ?>
    </div>
</div>


    <!-- Bootstrap 5 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>
// JavaScript to toggle the input fields based on selected shape and manage "required" fields
document.querySelectorAll('input[name="shape"]').forEach((radio) => {
    radio.addEventListener('change', function() {
        // Hide all shape inputs initially
        document.getElementById('triangle-dimension').style.display = 'none';
        document.getElementById('square-dimension').style.display = 'none';
        document.getElementById('circle-dimension').style.display = 'none';

        // Clear all input fields
        document.querySelectorAll('.form-control').forEach((input) => {
            input.value = ''; // Clear input field
            input.removeAttribute('required');
        });

        // Show the relevant inputs based on selected shape
        if (this.value === 'triangle') {
            document.getElementById('triangle-dimension').style.display = 'block';
            document.getElementById('base').setAttribute('required', 'required');
            document.getElementById('height-triangle').setAttribute('required', 'required');
        } else if (this.value === 'square') {
            document.getElementById('square-dimension').style.display = 'block';
            document.getElementById('side-square').setAttribute('required', 'required');
        } else if (this.value === 'circle') {
            document.getElementById('circle-dimension').style.display = 'block';
            document.getElementById('radius-circle').setAttribute('required', 'required');
        }
    });
});

// Check if the page was manually reloaded
if (window.performance.navigation.type === 1) { // Manual reload
    document.getElementById('shape-form').reset(); // Clear form values
    document.getElementById('result').innerHTML = ''; // Clear the result message
    // Remove the checked radio button after reload
    document.querySelectorAll('input[name="shape"]').forEach((radio) => {
        radio.checked = false; // Uncheck all radio buttons
    });
} else {
    // Trigger change event on page load for automatically reloaded form (after form submission)
    document.querySelector('input[name="shape"]:checked')?.dispatchEvent(new Event('change'));
}

    </script>


</body>
</html>
