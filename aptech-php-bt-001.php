<!DOCTYPE html>
<html>
    <head>
        <title>Lê Văn Cảnh</title>
        <style>
            .a1{
                color: blue;
            }
        </style>
    </head>
    <body>
        <?php
                function xepLoai($diem) {
                    if ($diem >= 8) return "Xuất sắc";
                    if ($diem >= 6.5) return "Khá";
                    if ($diem >= 5) return "Trung bình";
                    return "Yếu";
                }

                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $names = $_POST['name'];
                    $score = $_POST['diem'];
                    $student = array();
                    for ($i = 0; $i < count($names); $i++) {
                        $name = test_input($names[$i]);
                        $diem = test_input($score[$i]);
                        if (is_numeric($diem)) {
                            $student[$name] = (float)$diem;
                        }
                    }
                    if ($student) {
                        arsort($student);
                        echo "<h1 '>Kết quả xếp loại</h1>";
                        echo "<table style='background-color: #99FFFF' border='1' cellspacing='0' cellpadding='10'>";
                        echo "<tr><th>Tên</th><th>Điểm</th><th>Xếp loại</th></tr>";

                        $tongdiem = 0;
                        foreach ($student as $name => $diem) {
                            $tongdiem += $diem;
                            echo "<tr >";
                            echo "<td>$name</td>";
                            echo "<td style='color: red'>$diem</td>";
                            echo "<td >" . xepLoai($diem) . "</td>";
                            echo "</tr>";
                        }
                        $diem_trung_binh = $tongdiem / count($student);
                        echo "<h3 class ='a1'>Điểm trung bình của cả lớp: " . number_format($diem_trung_binh, 2) . "</h3>";
                    }
                }
            ?>
        <form method="POST" action="">
            <table>
                <tr>
                    <td><h3>Học Sinh 1:</h3></td>
                </tr>
                <tr>
                    <td>Tên: <input type="text" name="name[]"></td>
                    <td>Điểm: <input size="5" type="text" name="diem[]" pattern="\d+(\.\d{1,2})?" required></td>
                </tr>
            
                <tr>
                    <td><h3>Học Sinh 2:</h3></td>
                </tr>
                <tr>
                    <td>Tên: <input type="text" name="name[]"></td>
                    <td>Điểm: <input size="5" type="text" name="diem[]" pattern="\d+(\.\d{1,2})?" required></td>
                </tr>
                <tr>
                    <td><h3>Học Sinh 3:</h3></td>
                </tr>
                <tr>
                    <td>Tên: <input type="text" name="name[]"></td>
                    <td>Điểm: <input size="5" type="text" name="diem[]" pattern="\d+(\.\d{1,2})?" required></td>
                </tr>
                <tr>
                    <td><h3>Học Sinh 4:</h3></td>
                </tr>
                <tr>
                    <td>Tên: <input type="text" name="name[]"></td>
                    <td>Điểm: <input size="5" type="text" name="diem[]" pattern="\d+(\.\d{1,2})?" required></td>
                </tr>
                <tr>
                    <td><h3>Học Sinh 5:</h3></td>
                </tr>
                <tr>
                    <td>Tên: <input type="text" name="name[]"></td>
                    <td>Điểm: <input size="5" type="text" name="diem[]" pattern="\d+(\.\d{1,2})?" required></td>
                </tr>
                <tr>
                    <td><input style='background-color: #FF99CC' type="submit" name="submit" value="Xếp Loại"></td>
                </tr>
            </table>
        </form>
        
    </body>
</html>
