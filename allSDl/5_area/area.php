<!DOCTYPE html>
<html>
<head>
    <title>Shape Area Calculator</title>
</head>
<body>
    <h2>Select a Shape</h2>

    <form method="post" action="">
        <input type="radio" name="shape" value="triangle" required> Triangle<br>
        <input type="radio" name="shape" value="square"> Square<br>
        <input type="radio" name="shape" value="circle"> Circle<br>
        <input type="submit" name="select" value="Select Shape">
    </form>

    <?php
    // If a shape is selected, show the input form for dimensions
    if (isset($_POST['select']) && isset($_POST['shape'])) {
        $shape = $_POST['shape'];
        echo "<h3>Enter dimensions for $shape</h3>";
        echo '<form method="post" action="">';
        echo '<input type="hidden" name="shape" value="' . $shape . '">';

        switch ($shape) {
            case 'triangle':
                echo 'Base: <input type="number" step="0.01" name="base" required><br>';
                echo 'Height: <input type="number" step="0.01" name="height" required><br>';
                break;
            case 'square':
                echo 'Side: <input type="number" step="0.01" name="side" required><br>';
                break;
            case 'circle':
                echo 'Radius: <input type="number" step="0.01" name="radius" required><br>';
                break;
        }

        echo '<input type="submit" name="calculate" value="Calculate Area">';
        echo '</form>';
    }

    // Inheritance and area calculation
    abstract class Shape {
        abstract public function area();
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

    // Handle area calculation
    if (isset($_POST['calculate']) && isset($_POST['shape'])) {
        $shape = $_POST['shape'];
        $area = 0;

        switch ($shape) {
            case 'triangle':
                $shapeObj = new Triangle($_POST['base'], $_POST['height']);
                break;
            case 'square':
                $shapeObj = new Square($_POST['side']);
                break;
            case 'circle':
                $shapeObj = new Circle($_POST['radius']);
                break;
        }

        if (isset($shapeObj)) {
            $area = $shapeObj->area();
            echo "<h3>Area of the $shape: " . round($area, 2) . "</h3>";
        }
    }
    ?>
</body>
</html>
