<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shape Area Calculator</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #83a4d4, #b6fbff);
            text-align: center;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
            transition: all 0.3s ease-in-out;
        }

        .container:hover {
            transform: scale(1.02);
        }

        h2 {
            color: #444;
            margin-bottom: 10px;
        }

        .shape-selection {
            margin: 15px 0;
        }

        .shape-selection label {
            display: inline-block;
            padding: 8px 15px;
            border-radius: 8px;
            border: 2px solid #3498db;
            color: #3498db;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .shape-selection input {
            display: none;
        }

        .shape-selection input:checked + label {
            background: #3498db;
            color: white;
        }

        .input-group {
            display: none;
            margin-top: 15px;
            animation: fadeIn 0.5s ease-in-out;
        }

        .input-group input {
            width: 90%;
            padding: 10px;
            margin-top: 5px;
            border: 2px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            text-align: center;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background: #27ae60;
            color: white;
            border: none;
            font-size: 18px;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 15px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #2ecc71;
        }

        .result {
            font-size: 20px;
            font-weight: bold;
            color: #2c3e50;
            margin-top: 20px;
            animation: fadeIn 0.5s ease-in-out;
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
    <script>
        function showInputs(shape) {
    
        document.querySelectorAll(".input-group").forEach(div => {
            div.style.display = "none";
            div.querySelectorAll("input").forEach(input => input.removeAttribute("required"));
    });

    
    let selectedDiv = document.getElementById(shape + "_inputs");
    if (selectedDiv) {
        selectedDiv.style.display = "block";
        selectedDiv.querySelectorAll("input").forEach(input => input.setAttribute("required", "true"));
    }
}

    </script>
</head>
<body>

<div class="container">
    <h2>🔷 Shape Area Calculator 🔷</h2>

    <form method="POST">
        <div class="shape-selection">
            <input type="radio" name="shape" id="triangle" value="triangle" onclick="showInputs('triangle')" required>
            <label for="triangle">🔺 Triangle</label>

            <input type="radio" name="shape" id="square" value="square" onclick="showInputs('square')">
            <label for="square">🟦 Square</label>

            <input type="radio" name="shape" id="circle" value="circle" onclick="showInputs('circle')">
            <label for="circle">⚫ Circle</label>
        </div>

        <div id="triangle_inputs" class="input-group">
            <input type="number" name="base" placeholder="Enter base" step="0.1" required><br>
            <input type="number" name="height" placeholder="Enter height" step="0.1" required><br>
        </div>

        <div id="square_inputs" class="input-group">
            <input type="number" name="side" placeholder="Enter side length" step="0.1" required><br>
        </div>

        <div id="circle_inputs" class="input-group">
            <input type="number" name="radius" placeholder="Enter radius" step="0.1" required><br>
        </div>

        <button type="submit" name="calculate" class="btn">Calculate Area</button>
    </form>

    <?php
    class Shape {
        public function area() {
            return 0;
        }
    }

    class Triangle extends Shape {
        private $base, $height;
        public function __construct($base, $height) {
            $this->base = $base;
            $this->height = $height;
        }
        public function area() {
            return 0.5 * $this->base * $this->height;
        }
    }

    class Square extends Shape {
        private $side;
        public function __construct($side) {
            $this->side = $side;
        }
        public function area() {
            return $this->side * $this->side;
        }
    }

    class Circle extends Shape {
        private $radius;
        public function __construct($radius) {
            $this->radius = $radius;
        }
        public function area() {
            return pi() * $this->radius * $this->radius;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['calculate'])) {
        if (!isset($_POST['shape'])) {
            echo "<p class='result' style='color: red;'>❌ Please select a shape.</p>";
        } else {
            $selectedShape = $_POST['shape'];

            switch ($selectedShape) {
                case "triangle":
                    if (!empty($_POST['base']) && !empty($_POST['height'])) {
                        $triangle = new Triangle((float)$_POST['base'], (float)$_POST['height']);
                        $area = $triangle->area();
                    }
                    break;
                case "square":
                    if (!empty($_POST['side'])) {
                        $square = new Square((float)$_POST['side']);
                        $area = $square->area();
                    }
                    break;
                case "circle":
                    if (!empty($_POST['radius'])) {
                        $circle = new Circle((float)$_POST['radius']);
                        $area = $circle->area();
                    }
                    break;
                default:
                    $area = null;
            }

            if (isset($area)) {
                echo "<p class='result'>✅ The area is: " . number_format($area, 2) . "</p>";
            } else {
                echo "<p class='result' style='color: red;'>❌ Invalid input!</p>";
            }
        }
    }
    ?>
</div>

</body>
</html>