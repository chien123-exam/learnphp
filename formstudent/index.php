<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $students = [
        [
            'id' => 1,
            'name' => 'Nguyen Van A',
            'email' => 'aaaa@gmail.com',
            'address' => 'Ha Noi',
            'gender' => 1,
        ],

        [
            'id' => 2,
            'name' => 'Nguyen Van B',
            'email' => 'bbbb@gmail.com',
            'address' => 'Vinh Phuc',
            'gender' => 1,
        ],

        [
            'id' => 3,
            'name' => 'Nguyen Van C',
            'email' => 'cccc@gmail.com',
            'address' => 'Ho Chi Minh',
            'gender' => 1,
        ],

        [
            'id' => 4,
            'name' => 'Vu Duc Dam',
            'email' => 'damvd@gmail.com',
            'address' => 'Hai Duong',
            'gender' => 1,
        ],

        [
            'id' => 5,
            'name' => 'Xuan Phuc',
            'email' => 'xuanphuc@gmail.com',
            'address' => 'Viet Nam',
            'gender' => 1,
        ],


        [
            'id' => 6,
            'name' => 'Tan Dung',
            'email' => 'xuanphuc@gmail.com',
            'address' => 'Bac Lieu',
            'gender' => 2,
        ],
    ];

    function search_students($students, $query) {
        $results = [];

        foreach($students as $student) {
            if(strpos(strtolower($student['name']), strtolower($query)) !== false
                || strpos(strtolower($student['email']), strtolower($query)) !== false
                || strpos(strtolower($student['address']), strtolower($query)) !== false
            ) {
                $results[] = $student;
            }
        }

        return $results;
    }

    if(isset($_GET['query'])){
        $query = $_GET['query'];

        $results = search_students($students, $query);


        if(empty($results)) {
            echo 'không tìm thấy';
        } else {
            foreach($results as $result) {
                echo '<h3>'.$query.' ở trong danh sách</h3>';
            }
        }
    }

    ?>


    <form action="" method="GET">
        <div class="search">
            <input type="text" name="query" id="" placeholder="Nhập email, tên hoặc,địa chỉ" value="<?= $query ?>">
            <input type="radio" name="" id="">
            <label for="">Nam</label>
            <input type="radio" name="" id="">
            <label for="">Nữ</label>
            <button type="submit">Tìm kiếm</button>
        </div>
    </form>

    <div class="form">
        <table width="800" border="1" cellspacing="0" cellpadding="0">
    <tr>
        <td>ID</td>
        <td>Họ và tên</td>
        <td>Email</td>
        <td>Địa chỉ</td>
        <td>Giới tính</td>
        <td>Hành động</td>
    </tr>
    <?php foreach ($students as $student): ?>
        <tr>
            <td><?= $student['id'] ?></td>
            <td><?= $student['name'] ?></td>
            <td><?= $student['email'] ?></td>
            <td><?= $student['address'] ?></td>
            <td><?= $student['gender'] == 1 ? 'Nam' : 'Nữ' ?></td>
            <!-- <td> -->
                <!-- <a href="">Xem chi tiết</a> -->
            <!-- </td> -->
            <td><a href="">">Xem chi tiết</a></td>
        </tr>
    <?php endforeach; ?>

    <?php 
        $student_id = $_GET['id'];
        $selected_student = null;
        foreach($students as $student) {
            if($student['id'] == $student_id) {
                $selected_student = $students;
                break;
            }
        }
        if($selected_student != null) {
            echo "ID sinh viên: " .$selected_student['id'];
            echo "Họ tên: " .$selected_student['name'];
        }
    ?>
</table>
    </div>
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
</body>
</html>